<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use Sentinel;
use App\User;
class CategoriesController extends Controller
{

    
    /* Add */

    ## Get 

    public function Add()
    {

        $acategorys="";
        return view('dashboard.Categories.add-edit', compact('acategorys'));

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
            return redirect('dashboard/categories/add/new')
                ->withErrors($validator)
                ->withInput();
        }


        $input = $request->all();
        $alias=str_slug($input['title'],'-');

        $input['cat_slug'] = $alias;

        if($request->ordering==''){
            $input['ordering']='0';
        }


        $menudata=Category::create($input);

        return redirect('dashboard/categories')->with('success', 'Category Added Successfully');
    }


    /* Edit */

    public function GetEdit(Request $request , $id)
    {
        //dd($id);
        $articles = Category::find($id);

       $acategorys="";
        
        return 	view('dashboard.Categories.add-edit',compact('acategorys','articles'));
    }

    public function PostEdit(Request $request , $id)
    {
        //dd($request->all());

        $artlist = Category::find($id);

        $validator =Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'status' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect('dashboard/categories/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        //update post data

        $input = $request->all();
        $artlist->update($input);
        return redirect('dashboard/categories')->with('success', 'Category Update Successfully');
    }

    ## Listing 

    public function listing()
    {
        $artlist = Category::all()->where('cat_type','=','article');
        return 	view('dashboard.Categories/listing',['articles'=>$artlist]);
    }

    

    /* Actions  */

    public function activate(Request $request,$id)
    {
        $artlist = Category::find($id);
        $artlist->update(array('status' => '1'));
        return redirect('dashboard/categories')->with('success', 'Success! The Categories is activated successfully.');
    }

    public function deactivate(Request $request,$id){
        $artlist = Category::find($id);
        $artlist->update(array('status' => '0'));
        return redirect('dashboard/categories')->with('success', 'Success! The Categories is deactivated successfully.');
    }

    public function destroy(Request $request,$id)
    {
        //dd($id);
        $artlist = Category::findOrFail($id);
        $artlist->delete();
        return redirect('dashboard/categories')->with('success', 'Success! Categories is deleted successfully.');
    }


    public function PostBulkAction(Request $request)
    {
       
        if($request->action=="Active")
        {

            foreach ($request->chkid as $id)
            {
                $artlist = Category::find($id);
                $artlist->update(array('status' => '1'));
            }

            return redirect('dashboard/categories')->with('success', 'Categories Status Updated Successfully');
        }


        if($request->action=="Inactive")
        {
            foreach ($request->chkid as $id)
            {
                $artlist = Category::find($id);
                $artlist->update(array('status' => '0'));
            }
            return redirect('dashboard/categories')->with('success', 'Categories Status Updated Successfully');
        }

        if($request->action=="Delete")
        {
            $delete = Category::whereIn('id', $request->chkid)->delete();
            //dd($dues);
            return redirect('dashboard/categories')->with('success', 'Categories Delete Successfully');
        }



    }

    public function GetBulkAction()
    {

        $artlist = Category::all();
        return 	view('dashboard.Categories.listing',['articles'=>$artlist]);
    }


   

    

   

    

   


}