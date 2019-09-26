<?php

namespace App\Http\Controllers\FrontEnd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Locations;
use Hash;
use Validator;
class Ajaxcontroller extends Controller
{
    
    public function savecategory(Request $request)
    {
        
        
        $status=1;$message='';
        
         $validator =Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'cat_slug' => 'required',
        ]);

        if($validator->fails())
        {
             $status=0;$message=$validator;
        }
        else
        {
            $input = $request->all();
            $alias=str_slug($input['cat_slug'],'-');

            $categoryobj= new Category();
            $slugobj = Category::where('cat_slug', $alias)->get();
            $cat_cnt =$slugobj->count();
            if($cat_cnt >0)
            {
                $status=0;$message="Records alredy Exist!.";
            }
            else
            {
                $categorydata=Category::create($input);
                if($categorydata)
                {
                    $status=1;$message="<p class='success'>Added Successfully!</p>";
                }
                else
                {
                    $status=0;$message="Sorry! Unable to Save the Data..";
                }
            }
        }

        $response =  json_encode(['status'=>$status,'message'=>$message]); 
        return $response;
        die;

    }



}
