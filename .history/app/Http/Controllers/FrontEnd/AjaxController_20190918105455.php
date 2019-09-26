<?php

namespace App\Http\Controllers\FrontEnd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Programs;
use App\Registrations;
use App\Enquiry;
use App\Subscribes;
use App\Cahotech;
use App\Cahocon;
use App\MembershipRegistrations;
use Hash;
use Validator;
class Ajaxcontroller extends Controller
{
    

    ## Cahotech Registration 

    public function updatecahotech(Request $request)
    {
        $status=1;$message='';
        
        $input = $request->all();
        $OrderId = $input['order_id'];
        if($OrderId)
        {
            $Programobj= new Cahotech();
            $prodataobj = Cahotech::where('order_id', $OrderId)->get();
            $pro_cnt =$prodataobj->count();
            if($pro_cnt==0)
            {
                $prodataobjnew = $prodataobj->first();
                
                $prodataobjnew->order_status=$input['order_status'];
                $prodataobjnew->status = 1;
                $prodataobjnew->status_message = $input['status_message'];
                $prodataobjnew->tracking_id = $input['tracking_id'];
                $prodataobjnew->save();

            }
        }
       
        $message='updated';

        $response =  json_encode(['status'=>$status,'message'=>$message]); 
        //echo $response;
        die;

    }

    public function cahocon(Request $request)
    {
        $status=1;$message='';
        
        $input = $request->all();
        $menudata=Cahocon::create($input);
        $message='';

        $response =  json_encode(['status'=>$status,'message'=>$message]); 
        //echo $response;
        die;

    }

    public function cahotech(Request $request)
    {
        $status=1;$message='';
        
        $input = $request->all();
        $input['registered_on']=date('Y-m-d H:i:s');
        $menudata=Cahotech::create($input);
        $message='';

        $response =  json_encode(['status'=>$status,'message'=>$message]); 
        //echo $response;
        die;

    }

    ## Membership

    public function createmembershipinfo(Request $request)
    {
        $status=1;$message='';
        
        $input = $request->all();
        $menudata=MembershipRegistrations::create($input);
        $message='Membership created';

        $response =  json_encode(['status'=>$status,'message'=>$message]); 
        //echo $response;
        die;

    }

    public function updatemembershipinfo(Request $request)
    {
        $status=1;$message='';
        
        $input = $request->all();
        $OrderId = $input['OrderId'];
        if($OrderId)
        {
            $Programobj= new MembershipRegistrations();
            $prodataobj = MembershipRegistrations::where('OrderId', $OrderId)->get();
            $pro_cnt =$prodataobj->count();
            if($pro_cnt==0)
            {
                $prodataobjnew = $prodataobj->first();
                
                $prodataobjnew->Transactionid=$input['Transactionid'];
                $prodataobjnew->status = 1;
                $prodataobjnew->StatusMessage = $input['StatusMessage'];
                $prodataobjnew->RegistrationNO = $input['RegistrationNO'];
                $prodataobjnew->save();

            }
        }
       
        $message='Membership created';

        $response =  json_encode(['status'=>$status,'message'=>$message]); 
        //echo $response;
        die;

    }

    
    
    ## Save Newsletter 
    
    public function savenewsletter(Request $request)
    {
        $status=1;$message='';
        $validator =Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required'
        ]);

        if($validator->fails())
        {
             $status=0;$message=$validator;
        }
        else
        { 
            $input = $request->all();
            $menudata=Subscribes::create($input);
            $message='Enquiry created';
        }

        $response =  json_encode(['status'=>$status,'message'=>$message]); 
        //echo $response;
        die;

    }

    ## save Enquiry 

    public function saveenquiry(Request $request)
    {
        $status=1;$message='';
        $validator =Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'email' => 'required',
            'mobile' => 'required',
        ]);

        if($validator->fails())
        {
             $status=0;$message=$validator;
        }
        else
        { 
            $input = $request->all();
            $menudata=Enquiry::create($input);
            $message='Enquiry created';
        }

        $response =  json_encode(['status'=>$status,'message'=>$message]); 
        //echo $response;
        die;

    }

    public function savedata(Request $request)
    {
        
        
        $status=1;$message='';
        
         $validator =Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'program_title' => 'required',
        ]);

        if($validator->fails())
        {
             $status=0;$message=$validator;
        }
        else
        {
            $input = $request->all();
            $catname = '';
            $cat_code = $input['applied_for'];
            $program_title = $input['program_title'];
            $uniqueid = $input['uniqueid'];
            if(isset($input['applied_for_sub_cat']))
            {
                $applied_for_sub_cat = $input['applied_for_sub_cat'];
            }
            else
            {
                $applied_for_sub_cat="";
            }
            
            $location = $input['program_location'];
            $program_startdate = $input['program_startdate'];
            $program_enddate = $input['program_enddate'];
            

            ## category code start 
            $categoryobj= new Category();
            $slugobj = Category::where('cat_slug', $cat_code)->get();
            $cat_cnt =$slugobj->count();
            if($cat_cnt==0)
            {
                $categoryobj->title=$catname;
                $categoryobj->cat_slug=$cat_code;
                $categoryobj->status = 1;
                $categoryobj->save();

                $catid = $categoryobj->id;
                $catcat_slug = $categoryobj->cat_slug;
            }
            else
            {
                $catinfo = $slugobj->first();
                $catid = $catinfo->id;
                $catcat_slug = $catinfo->cat_slug;
            }

            if($applied_for_sub_cat)
            {
                $subcat_name = $input['applied_for_sub_cat'];

                $categoryobj= new Category();
                $slugobj = Category::where('cat_slug', $applied_for_sub_cat)->get();
                $cat_cnt =$slugobj->count();
                if($cat_cnt==0)
                {
                    $categoryobj->title=$subcat_name;
                    $categoryobj->cat_slug=$applied_for_sub_cat;
                    $categoryobj->parent_id = $catid;
                    $categoryobj->status = 1;
                    $categoryobj->save();
                }
            }
            ## category code end 


            ## Program code start 
            $Programobj= new Programs();
            $prodataobj = Programs::where('title', $program_title)->get();
            $pro_cnt =$prodataobj->count();
            if($pro_cnt==0)
            {
                $Programobj->title=$program_title;
                $Programobj->status = 1;
                $Programobj->cat_id = $catcat_slug;
                $Programobj->location = $location;
                $Programobj->program_startdate = $program_startdate;
                $Programobj->program_enddate = $program_enddate;
                $Programobj->save();
                $programid = $Programobj->id;

            }
            else
            {
                $proinfo = $prodataobj->first();
                $programid = $proinfo->id;
            }
          
            ## Program code end 

            ## Registration code start 
            $registerobj= new Registrations();
            if($uniqueid)
            {
                $slugobj = Registrations::where('uniqueid', $uniqueid)->get();
                $cat_cnt =$slugobj->count();
            }
            else
            {
                $cat_cnt='';
            }
            
            if($cat_cnt==0)
            {
                $input['program_id'] = $programid;

                $categorydata=Registrations::create($input);
                if($categorydata)
                {
                    $status=1;$message="Added Successfully!";
                }
                else
                {
                    $status=0;$message="Sorry! Unable to Save the Data..";
                }
            }
            else
            {
                $status=0;$message="Records alredy Exist!.";
            }
            ## Registration code end  
        }

        $response =  json_encode(['status'=>$status,'message'=>$message]); 
        echo $response;
        die;

    }



}
