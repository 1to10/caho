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

        $menudata=MembershipRegistrations::create($input);

        $programid = $menudata->id;

        ## Add data to Program Data 

       

        return redirect('dashboard/registrations')->with('success', 'Registration Added Successfully');
    }


    /* Edit */

    public function GetEdit(Request $request , $id)
    {
        //dd($id);
        $articles = MembershipRegistrations::find($id);

        $courseslist='';
       // dd($courseslist);
         $categorylist =  $this->categorylist;
         $programlist =  $this->programlist;
        return 	view('dashboard.Members-Registrations.add-edit',compact('articles','courseslist','categorylist','programlist'));
    }

    public function PostEdit(Request $request , $id)
    {
        //dd($request->all());

        $artlist = MembershipRegistrations::find($id);

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
        $program='';$cat_id='';$location='';$city='';$state='';$programstatus='';

        

        if(isset($input['program']))
        {
            $program = $input['program'];
            if($program){
                $artlist = $artlist->where('program_id','=',"$program");
            }
        }
       
        if(isset($input['cat_id']))
        {
            $cat_id = $input['cat_id'];
            if($cat_id){
                $artlist = $artlist->where('applied_for','LIKE',"$cat_id");
            }
        }
       
        if(isset($input['location']))
        {
            $location = $input['location'];
            if($location){
                $artlist = $artlist->where('program_location','LIKE',"$location");
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

        $current=1;

       

              

            $citylist = MembershipRegistrations::select('city')
                                     ->whereIn('membership_id', $membershipid)
                                    ->distinct()->orderby('city','ASC')->get();
            $statelist = MembershipRegistrations::select('state')
                                        ->whereIn('membership_id', $finalids)
                                        ->distinct()->orderby('state','ASC')->get();
            

        
        
        $artlist = $artlist->get();

         //dd($artlist->toSql());

         $categorylist =  $this->categorylist;
         //$programlist =  $this->programlist;

         
        
        return 	view('dashboard.Members-Registrations/listing',['articles'=>$artlist,'categorylist'=>$categorylist,
        'citylist'=>$citylist,'statelist'=>$statelist,'program'=>$program,'cat_id'=>$cat_id,'location'=>$location,'city'=>$city
        ,'state'=>$state,'programstatus'=>$programstatus]);
    }

    

    /* Actions  */

    public function activate(Request $request,$id)
    {
        $artlist = MembershipRegistrations::find($id);
        $artlist->update(array('status' => '1'));
        return redirect('dashboard/registrations')->with('success', 'Success! The registration is activated successfully.');
    }

    public function deactivate(Request $request,$id){
        $artlist = MembershipRegistrations::find($id);
        $artlist->update(array('status' => '0'));
        return redirect('dashboard/registrations')->with('success', 'Success! The registration is deactivated successfully.');
    }

    public function destroy(Request $request,$id)
    {
        //dd($id);
        $artlist = MembershipRegistrations::findOrFail($id);
        $artlist->delete();
        return redirect('dashboard/registrations')->with('success', 'Success! registration is deleted successfully.');
    }


    public function PostBulkAction(Request $request)
    {
       
        if($request->action=="Active")
        {

            foreach ($request->chkid as $id)
            {
                $artlist = MembershipRegistrations::find($id);
                $artlist->update(array('status' => '1'));
            }

            return redirect('dashboard/registrations')->with('success', 'registrations Status Updated Successfully');
        }


        if($request->action=="Inactive")
        {
            foreach ($request->chkid as $id)
            {
                $artlist = MembershipRegistrations::find($id);
                $artlist->update(array('status' => '0'));
            }
            return redirect('dashboard/registrations')->with('success', 'registrations Status Updated Successfully');
        }

        if($request->action=="Delete")
        {
            $delete = MembershipRegistrations::whereIn('id', $request->chkid)->delete();
            //dd($dues);
            return redirect('dashboard/registrations')->with('success', 'registrations Delete Successfully');
        }



    }

   

}