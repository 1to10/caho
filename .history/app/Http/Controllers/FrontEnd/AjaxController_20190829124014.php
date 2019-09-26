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
            }
            ## category code end 


            ## Program code start 
            $Programobj= new Programs();
            $prodataobj = Programs::where('title', $program_title)->get();
            $pro_cnt =$prodataobj->count();
            if($pro_cnt==0)
            {
                $prodataobj->title=$program_title;
                $prodataobj->status = 1;
                $proinfo = $prodataobj->save();

            }
            else
            {
                $proinfo = $prodataobj->first();
            }
            ## Program code end 
        }

        $response =  json_encode(['status'=>$status,'message'=>$message]); 
        echo $response;
        die;

    }



}
