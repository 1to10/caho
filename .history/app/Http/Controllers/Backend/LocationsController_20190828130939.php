<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Locations;
use Sentinel;
use App\User;
class LocationsController extends Controller
{

    
    /* Add */

    ## Get 

    public function Add()
    {

        $acategorys="";
        return view('dashboard.Locations.add-edit', compact('acategorys'));

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
            return redirect('dashboard/locations/add/new')
                ->withErrors($validator)
                ->withInput();
        }


        $input = $request->all();
        if($request->ordering==''){
            $input['ordering']='0';
        }


        $menudata=Locations::create($input);

        return redirect('dashboard/locations')->with('success', 'Location Added Successfully');
    }


    /* Edit */

    public function GetEdit(Request $request , $id)
    {
        //dd($id);
        $articles = Locations::find($id);

       $acategorys="";
        
        return 	view('dashboard.Locations.add-edit',compact('acategorys','articles'));
    }

    public function PostEdit(Request $request , $id)
    {
        //dd($request->all());

        $artlist = Locations::find($id);

        $validator =Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'status' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect('dashboard/locations/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        //update post data

        $input = $request->all();
        $artlist->update($input);
        return redirect('dashboard/locations')->with('success', 'Location Update Successfully');
    }

    ## Listing 

    public function listing()
    {
        $artlist = Locations::all();
        return 	view('dashboard.Locations/listing',['articles'=>$artlist]);
    }

    

    /* Actions  */

    public function activate(Request $request,$id)
    {
        $artlist = Locations::find($id);
        $artlist->update(array('status' => '1'));
        return redirect('dashboard/locations')->with('success', 'Success! The Location is activated successfully.');
    }

    public function deactivate(Request $request,$id){
        $artlist = Locations::find($id);
        $artlist->update(array('status' => '0'));
        return redirect('dashboard/locations')->with('success', 'Success! The Location is deactivated successfully.');
    }

    public function destroy(Request $request,$id)
    {
        //dd($id);
        $artlist = Locations::findOrFail($id);
        $artlist->delete();
        return redirect('dashboard/locations')->with('success', 'Success! Location is deleted successfully.');
    }


    public function PostBulkAction(Request $request)
    {
       
        if($request->action=="Active")
        {

            foreach ($request->chkid as $id)
            {
                $artlist = Locations::find($id);
                $artlist->update(array('status' => '1'));
            }

            return redirect('dashboard/locations')->with('success', 'Locations Status Updated Successfully');
        }


        if($request->action=="Inactive")
        {
            foreach ($request->chkid as $id)
            {
                $artlist = Locations::find($id);
                $artlist->update(array('status' => '0'));
            }
            return redirect('dashboard/locations')->with('success', 'Locations Status Updated Successfully');
        }

        if($request->action=="Delete")
        {
            $delete = Category::whereIn('id', $request->chkid)->delete();
            //dd($dues);
            return redirect('dashboard/locations')->with('success', 'Locations Delete Successfully');
        }



    }

    public function GetBulkAction()
    {

        $artlist = Category::all();
        return 	view('dashboard.Categories.listing',['articles'=>$artlist]);
    }


   

    

   

    

   


}