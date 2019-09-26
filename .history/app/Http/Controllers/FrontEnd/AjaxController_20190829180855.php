<?php

namespace App\Http\Controllers\FrontEnd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Programs;
use App\Registrations;
use Hash;
use Validator;
class Ajaxcontroller extends Controller
{
    
    public function savedata(Request $request)
    {
        
        
        $status=1;$message='';
        
         $validator =Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'catname' => 'required',
            'cat_code' => 'required',
            'program_title' => 'required',
        ]);

        if($validator->fails())
        {
             $status=0;$message=$validator;
        }
        else
        {
            $input = $request->all();
            $catname = $input['catname'];
            $cat_code = $input['cat_code'];
            $program_title = $input['program_title'];
            $uniqueid = $input['uniqueid'];
            $applied_for_sub_cat = $input['applied_for_sub_cat'];
            $location = $input['location'];
            

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
            }
            else
            {
                $catid = $slugobj->first()->id;
            }

            if($applied_for_sub_cat)
            {
                $subcat_name = $input['subcat_name'];

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
                $Programobj->cat_id = $catid;
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
            $slugobj = Registrations::where('uniqueid', $uniqueid)->get();
            $cat_cnt =$slugobj->count();
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
