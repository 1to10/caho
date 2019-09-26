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
       
        $artlist = $artlist->get();

        
        return 	view('dashboard.Enquiry/listing',['articles'=>$artlist]);
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

    public function newsletters(Request $request)
    {
        //$artlist = Enquiry::all();

        $artlist = Enquiry::where('type','=','feedback');

        $input = $request->all();
        $program='';$cat_id='';$location='';$city='';$state='';$programstatus='';
        
        $artlist = $artlist->get();

        
        return 	view('dashboard.Enquiry/feedback',['articles'=>$artlist]);
    }

    


}
