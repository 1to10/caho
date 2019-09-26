<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Programs;
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
            return redirect('dashboard/programs/add/new')
                ->withErrors($validator)
                ->withInput();
        }


        $input = $request->all();
        if($request->ordering==''){
            $input['ordering']='0';
        }


        $menudata=Programs::create($input);

        return redirect('dashboard/programs')->with('success', 'Location Added Successfully');
    }


    /* Edit */

    public function GetEdit(Request $request , $id)
    {
        //dd($id);
        $articles = Programs::find($id);

       $acategorys="";
        
        return 	view('dashboard.Locations.add-edit',compact('acategorys','articles'));
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
        return redirect('dashboard/programs')->with('success', 'Location Update Successfully');
    }

    ## Listing 

    public function listing()
    {
        $artlist = Programs::all();
        return 	view('dashboard.Locations/listing',['articles'=>$artlist]);
    }

    

    /* Actions  */

    public function activate(Request $request,$id)
    {
        $artlist = Programs::find($id);
        $artlist->update(array('status' => '1'));
        return redirect('dashboard/programs')->with('success', 'Success! The Location is activated successfully.');
    }

    public function deactivate(Request $request,$id){
        $artlist = Programs::find($id);
        $artlist->update(array('status' => '0'));
        return redirect('dashboard/programs')->with('success', 'Success! The Location is deactivated successfully.');
    }

    public function destroy(Request $request,$id)
    {
        //dd($id);
        $artlist = Programs::findOrFail($id);
        $artlist->delete();
        return redirect('dashboard/programs')->with('success', 'Success! Location is deleted successfully.');
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

            return redirect('dashboard/programs')->with('success', 'Locations Status Updated Successfully');
        }


        if($request->action=="Inactive")
        {
            foreach ($request->chkid as $id)
            {
                $artlist = Programs::find($id);
                $artlist->update(array('status' => '0'));
            }
            return redirect('dashboard/programs')->with('success', 'Locations Status Updated Successfully');
        }

        if($request->action=="Delete")
        {
            $delete = Programs::whereIn('id', $request->chkid)->delete();
            //dd($dues);
            return redirect('dashboard/programs')->with('success', 'Locations Delete Successfully');
        }



    }

    public function GetBulkAction()
    {

        $artlist = Programs::all();
        return 	view('dashboard.Locations.listing',['articles'=>$artlist]);
    }


   

    

   

    

   


}