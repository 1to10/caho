<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Sentinel;
use App\User;
use App\Programs;
use App\Category;
use App\Registrations;
use App\MembershipRegistrations;

class MemberRegistrationsController extends Controller
{
    
    public function __construct(){

        $today = date('Y-m-d');
        $this->categorylist = Category::where('status','=',1)->pluck('title', 'cat_slug');
        $this->programlist = Programs::where('status','=',1)
                                        ->whereRaw("DATE(program_enddate) >='$today'")
                                       ->pluck('title', 'id');
    }

    /* Add */

    ## Get 

    public function Add()
    {

        $courseslist='';
        $categorylist =  $this->categorylist;
        $programlist =  $this->programlist;

        return view('dashboard.Members-Registrations.add-edit', compact('courseslist','categorylist','programlist'));

    }

    ## Post 
    public function postdata(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'status' => 'required',
        ]);


        if($validator->fails())
        {
            return redirect('dashboard/registrations/add/new')
                ->withErrors($validator)
                ->withInput();
        }


        if($request->ordering==''){
            $input['ordering']='0';
        }

        $menudata=Registrations::create($input);

        $programid = $menudata->id;

        ## Add data to Program Data 

       

        return redirect('dashboard/registrations')->with('success', 'Registration Added Successfully');
    }


    /* Edit */

    public function GetEdit(Request $request , $id)
    {
        //dd($id);
        $articles = Registrations::find($id);

        $courseslist='';
       // dd($courseslist);
         $categorylist =  $this->categorylist;
         $programlist =  $this->programlist;
        return 	view('dashboard.Members-Registrations.add-edit',compact('articles','courseslist','categorylist','programlist'));
    }

    public function PostEdit(Request $request , $id)
    {
        //dd($request->all());

        $artlist = Registrations::find($id);

        $validator =Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'status' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect('dashboard/registrations/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        //update post data

        $input = $request->all();
       
        $artlist->update($input);


        return redirect('dashboard/registrations')->with('success', 'Registration Update Successfully');
    }

    ## Listing 

    public function listing(Request $request , $membershipid)
    {
        //$artlist = Registrations::all();

        $artlist = MembershipRegistrations::where('membership_id','=',$membershipid);

        $input = $request->all();
        $Organization='';$classification='';$location='';$city='';$state='';$programstatus='';
        $membertype="";$fromdate="";$enddate="";

        

        if(isset($input['Organization']))
        {
            $Organization = $input['Organization'];
            if($Organization){
                $artlist = $artlist->where('organization_name','=',"$Organization");
            }
        }
       
        if(isset($input['classification']))
        {
            $classification = $input['classification'];
            if($classification){
                $artlist = $artlist->where('classification','LIKE',"$classification");
            }
        }
       
        

        if(isset($input['city']))
        {
            $city = $input['city'];
            if($city){
                $artlist = $artlist->where('city','LIKE',"$city");
            }
        }

        if(isset($input['state']))
        {
            $state = $input['state'];
            if($state){
                $artlist = $artlist->where('state','LIKE',"$state");
            }
        }

        if(isset($input['fromdate']) && isset($input['enddate']))
        {
            //$membertype = $input['membertype'];
            $fromdate = $input['fromdate'];
            $enddate = $input['enddate'];

            if($fromdate && $enddate)
            {
                $fromdate = date('Y-m-d',strtotime($fromdate));
                $enddate = date('Y-m-d',strtotime($enddate));
                //$artlist = $artlist->whereRaw("DATE(MembershipValidity) < '$fromdate' AND DATE(MembershipValidity) >='$enddate'");
                $artlist = $artlist->whereRaw("DATE(MembershipValidity) >='$enddate'");
            }
            
        }

        $current=1;

       
       

        $citylist = MembershipRegistrations::select('city')
            ->where('membership_id', $membershipid)
            ->distinct()->orderby('city','ASC')->get();
        $statelist = MembershipRegistrations::select('state')
                ->where('membership_id', $membershipid)
                ->distinct()->orderby('state','ASC')->get();
        $program_locationlist = MembershipRegistrations::select('organization_name')
                        ->where('membership_id', $membershipid)
                        ->distinct()->orderby('organization_name','ASC')->get();
                        

        $categorylist = MembershipRegistrations::select('classification')
                        ->where('membership_id', $membershipid)
                        ->distinct()->orderby('classification','ASC')->get();

        
        
        $artlist = $artlist->get();

         //dd($artlist->toSql());

        // $categorylist =  $this->categorylist;
        

         
        $arrplan = array(1=>'REGULAR MEMBERSHIP INSTITUTION',2=>'ASSOCIATE MEMBERSHIP INSTITUTION',3=>'ASSOCIATE MEMBERSHIP INDIVIDUAL');
        $planname = $arrplan[$membershipid];

        return 	view('dashboard.Members-Registrations/listing',['articles'=>$artlist,'categorylist'=>$categorylist,
       'citylist'=>$citylist,'statelist'=>$statelist,
        'program_locationlist'=>$program_locationlist,'Organization'=>$Organization,'classification'=>$classification,'location'=>$location,'city'=>$city
        ,'state'=>$state,'membershipid'=>$membershipid,'planname'=>$planname,'fromdate'=>$fromdate,'enddate'=>$enddate]);
    }

    

    /* Actions  */

    public function activate(Request $request,$id)
    {
        $artlist = Registrations::find($id);
        $artlist->update(array('status' => '1'));
        return redirect('dashboard/registrations')->with('success', 'Success! The registration is activated successfully.');
    }

    public function deactivate(Request $request,$id){
        $artlist = Registrations::find($id);
        $artlist->update(array('status' => '0'));
        return redirect('dashboard/registrations')->with('success', 'Success! The registration is deactivated successfully.');
    }

    public function destroy(Request $request,$id)
    {
        //dd($id);
        $artlist = Registrations::findOrFail($id);
        $artlist->delete();
        return redirect('dashboard/registrations')->with('success', 'Success! registration is deleted successfully.');
    }


    public function PostBulkAction(Request $request)
    {
       
        if($request->action=="Active")
        {

            foreach ($request->chkid as $id)
            {
                $artlist = Registrations::find($id);
                $artlist->update(array('status' => '1'));
            }

            return redirect('dashboard/registrations')->with('success', 'registrations Status Updated Successfully');
        }


        if($request->action=="Inactive")
        {
            foreach ($request->chkid as $id)
            {
                $artlist = Registrations::find($id);
                $artlist->update(array('status' => '0'));
            }
            return redirect('dashboard/registrations')->with('success', 'registrations Status Updated Successfully');
        }

        if($request->action=="Delete")
        {
            $delete = Registrations::whereIn('id', $request->chkid)->delete();
            //dd($dues);
            return redirect('dashboard/registrations')->with('success', 'registrations Delete Successfully');
        }



    }

   

}
