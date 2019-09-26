<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Sentinel;
use App\User;
use App\Enquiry;

class EnquiryController extends Controller
{
    
    public function __construct(){

        $today = date('Y-m-d');
       
    }

    /* Add */

    ## Get 

    public function Add()
    {

        $courseslist='';
       

        return view('dashboard.Enquiry.add-edit', compact('courseslist','categorylist','programlist'));

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
            return redirect('dashboard/Enquiry/add/new')
                ->withErrors($validator)
                ->withInput();
        }


        if($request->ordering==''){
            $input['ordering']='0';
        }

        $menudata=Enquiry::create($input);

        $programid = $menudata->id;

        ## Add data to Program Data 

       

        return redirect('dashboard/Enquiry')->with('success', 'Registration Added Successfully');
    }


    /* Edit */

    public function GetEdit(Request $request , $id)
    {
        //dd($id);
        $articles = Enquiry::find($id);

        $courseslist='';
       // dd($courseslist);
         $categorylist =  $this->categorylist;
         $programlist =  $this->programlist;
        return 	view('dashboard.Enquiry.add-edit',compact('articles','courseslist','categorylist','programlist'));
    }

    public function PostEdit(Request $request , $id)
    {
        //dd($request->all());

        $artlist = Enquiry::find($id);

        $validator =Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'status' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect('dashboard/Enquiry/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        //update post data

        $input = $request->all();
       
        $artlist->update($input);


        return redirect('dashboard/Enquiry')->with('success', 'Registration Update Successfully');
    }

    ## Listing 

    public function listing(Request $request)
    {
        //$artlist = Enquiry::all();

        $artlist = Enquiry::where('status','!=','');

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

        if(isset($input['programstatus']))
        {
            $programstatus = $input['programstatus'];
            if($programstatus)
            {
                $today = date('Y-m-d');
                $ids = Programs::select('id')->whereRaw("DATE(program_enddate) >='$today'")->get()->toArray();
                $finalids = array_column($ids, 'id');

                if($programstatus=='past')
                {
                    
                    $artlist = $artlist->whereNotIn('program_id', $finalids);
                    
                    $current=0;
                }
                else
                {
                    $artlist = $artlist->whereIn('program_id', $finalids);
                   
                }
            }
        }
        else
        {
            $today = date('Y-m-d');
            $ids = Programs::select('id')->whereRaw("DATE(program_enddate) >='$today'")->get()->toArray();
            $finalids = array_column($ids, 'id');

            $artlist = $artlist->whereIn('program_id', $finalids);

            
        }

        if($current==1)
        {
            $programlist = Programs::where('status','=',1)
                                        ->whereRaw("DATE(program_enddate) >='$today'")
                                       ->pluck('title', 'id');

            $citylist = Enquiry::select('city')
                                     ->whereIn('program_id', $finalids)
                                    ->distinct()->orderby('city','ASC')->get();
            $statelist = Enquiry::select('state')
                                        ->whereIn('program_id', $finalids)
                                        ->distinct()->orderby('state','ASC')->get();
            $program_locationlist = Enquiry::select('program_location')
                                                  ->whereIn('program_id', $finalids)
                                                  ->distinct()->orderby('program_location','ASC')->get();
        }
        else
        {
            $programlist = Programs::where('status','=',1)
                                        ->whereRaw("DATE(program_enddate) <'$today'")
                                       ->pluck('title', 'id');
            
              $citylist = Enquiry::select('city')
                                       ->whereNotIn('program_id', $finalids)
                                      ->distinct()->orderby('city','ASC')->get();
              $statelist = Enquiry::select('state')
                                          ->whereNotIn('program_id', $finalids)
                                          ->distinct()->orderby('state','ASC')->get();
              $program_locationlist = Enquiry::select('program_location')
                                                    ->whereNotIn('program_id', $finalids)
                                                    ->distinct()->orderby('program_location','ASC')->get();
        }

        
        
        $artlist = $artlist->get();

         //dd($artlist->toSql());

         $categorylist =  $this->categorylist;
         //$programlist =  $this->programlist;

         
        
        return 	view('dashboard.Enquiry/listing',['articles'=>$artlist,'categorylist'=>$categorylist,
        'programlist'=>$programlist,'citylist'=>$citylist,'statelist'=>$statelist,
        'program_locationlist'=>$program_locationlist,'program'=>$program,'cat_id'=>$cat_id,'location'=>$location,'city'=>$city
        ,'state'=>$state,'programstatus'=>$programstatus]);
    }

    

    /* Actions  */

    public function activate(Request $request,$id)
    {
        $artlist = Enquiry::find($id);
        $artlist->update(array('status' => '1'));
        return redirect('dashboard/Enquiry')->with('success', 'Success! The registration is activated successfully.');
    }

    public function deactivate(Request $request,$id){
        $artlist = Enquiry::find($id);
        $artlist->update(array('status' => '0'));
        return redirect('dashboard/Enquiry')->with('success', 'Success! The registration is deactivated successfully.');
    }

    public function destroy(Request $request,$id)
    {
        //dd($id);
        $artlist = Enquiry::findOrFail($id);
        $artlist->delete();
        return redirect('dashboard/Enquiry')->with('success', 'Success! registration is deleted successfully.');
    }


    public function PostBulkAction(Request $request)
    {
       
        if($request->action=="Active")
        {

            foreach ($request->chkid as $id)
            {
                $artlist = Enquiry::find($id);
                $artlist->update(array('status' => '1'));
            }

            return redirect('dashboard/Enquiry')->with('success', 'Enquiry Status Updated Successfully');
        }


        if($request->action=="Inactive")
        {
            foreach ($request->chkid as $id)
            {
                $artlist = Enquiry::find($id);
                $artlist->update(array('status' => '0'));
            }
            return redirect('dashboard/Enquiry')->with('success', 'Enquiry Status Updated Successfully');
        }

        if($request->action=="Delete")
        {
            $delete = Enquiry::whereIn('id', $request->chkid)->delete();
            //dd($dues);
            return redirect('dashboard/Enquiry')->with('success', 'Enquiry Delete Successfully');
        }



    }

    public function GetBulkAction()
    {

        $artlist = Enquiry::all();
        return 	view('dashboard.Enquiry.listing',['articles'=>$artlist]);
    }

}
