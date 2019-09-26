<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Programs;
use App\Category;
use Sentinel;
use App\User;
class LocationsController extends Controller
{

    
    public function __construct(){

        $this->categorylist = Category::where([['status','=',1],['parent_id','=',0]])->pluck('title', 'cat_slug');
    }

    /* Add */

    ## Get 

    public function Add()
    {

        $acategorys="";
        $categorylist =  $this->categorylist;
        return view('dashboard.Programs.add-edit', compact('acategorys','categorylist'));

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
            return redirect('dashboard/programs/add/new')
                ->withErrors($validator)
                ->withInput();
        }


        $input = $request->all();
        if($request->ordering==''){
            $input['ordering']='0';
        }


        $menudata=Programs::create($input);

        return redirect('dashboard/programs')->with('success', 'Program Added Successfully');
    }


    /* Edit */

    public function GetEdit(Request $request , $id)
    {
        //dd($id);
        $articles = Programs::find($id);

       $acategorys="";
       $categorylist =  $this->categorylist;
        return 	view('dashboard.Programs.add-edit',compact('acategorys','articles','categorylist'));
    }

    public function PostEdit(Request $request , $id)
    {
        //dd($request->all());

        $artlist = Programs::find($id);

        $validator =Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'status' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect('dashboard/programs/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        //update post data

        $input = $request->all();
        $artlist->update($input);
        return redirect('dashboard/programs')->with('success', 'Program Update Successfully');
    }

    ## Listing 

    public function listing($catslug='')
    {
        dd($catslug);
        if($catslug){
            $artlist = Programs::all()->where('cat_id',$catslug);
        }else{
            $artlist = Programs::all();
        }
       
        return 	view('dashboard.Programs/listing',['articles'=>$artlist]);
    }

    

    /* Actions  */

    public function activate(Request $request,$id)
    {
        $artlist = Programs::find($id);
        $artlist->update(array('status' => '1'));
        return redirect('dashboard/programs')->with('success', 'Success! The Program is activated successfully.');
    }

    public function deactivate(Request $request,$id){
        $artlist = Programs::find($id);
        $artlist->update(array('status' => '0'));
        return redirect('dashboard/programs')->with('success', 'Success! The Program is deactivated successfully.');
    }

    public function destroy(Request $request,$id)
    {
        //dd($id);
        $artlist = Programs::findOrFail($id);
        $artlist->delete();
        return redirect('dashboard/programs')->with('success', 'Success! Program is deleted successfully.');
    }


    public function PostBulkAction(Request $request)
    {
       
        if($request->action=="Active")
        {

            foreach ($request->chkid as $id)
            {
                $artlist = Programs::find($id);
                $artlist->update(array('status' => '1'));
            }

            return redirect('dashboard/programs')->with('success', 'Programs Status Updated Successfully');
        }


        if($request->action=="Inactive")
        {
            foreach ($request->chkid as $id)
            {
                $artlist = Programs::find($id);
                $artlist->update(array('status' => '0'));
            }
            return redirect('dashboard/programs')->with('success', 'Programs Status Updated Successfully');
        }

        if($request->action=="Delete")
        {
            $delete = Programs::whereIn('id', $request->chkid)->delete();
            //dd($dues);
            return redirect('dashboard/programs')->with('success', 'Programs Delete Successfully');
        }



    }

    public function GetBulkAction()
    {

        $artlist = Programs::all();
        return 	view('dashboard.Programs.listing',['articles'=>$artlist]);
    }


   

    

   

    

   


}