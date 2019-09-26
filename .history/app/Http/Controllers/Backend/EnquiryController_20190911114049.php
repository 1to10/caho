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

        


        
        $artlist = $artlist->get();

        
        return 	view('dashboard.Enquiry/feedback',['articles'=>$artlist]);
    }

    


}
