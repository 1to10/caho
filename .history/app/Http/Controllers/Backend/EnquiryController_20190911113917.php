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
use App\Subscribes;

class EnquiryController extends Controller
{
    
    public function __construct(){

        $today = date('Y-m-d');
       
    }

    ## Listing 

    public function listing(Request $request)
    {
        //$artlist = Enquiry::all();

        $artlist = Enquiry::where('type','=','enquiry');

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

        
        $artlist = $artlist->get();

        
        return 	view('dashboard.Enquiry/listing',['articles'=>$artlist,'program'=>$program,'cat_id'=>$cat_id,'location'=>$location,'city'=>$city
        ,'state'=>$state]);
    }


    public function feedback(Request $request)
    {
        //$artlist = Enquiry::all();

        $artlist = Enquiry::where('type','=','feedback');

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

        
        $artlist = $artlist->get();

        
        return 	view('dashboard.Enquiry/feedback',['articles'=>$artlist,'program'=>$program,'cat_id'=>$cat_id,'location'=>$location,'city'=>$city
        ,'state'=>$state]);
    }

    


}
