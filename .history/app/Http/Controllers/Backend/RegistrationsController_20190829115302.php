<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Sentinel;
use App\User;
use App\Programs;
use App\Category;

class RegistrationsController extends Controller
{
    
    public function __construct(){

        $this->facultylist = Category::where('status','=',1)->pluck('title', 'cat_slug');
        $this->lablist = Programs::where([['status','=',1]])->pluck('title', 'id');
    }

    /* Add */

    ## Get 

    public function Add()
    {

        $courseslist='';
        $facultylist =  $this->facultylist;
        $lablist =  $this->lablist;
        return view('dashboard.Registrations.add-edit', compact('courseslist','facultylist','lablist'));

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
            return redirect('dashboard/registrations/add/new')
                ->withErrors($validator)
                ->withInput();
        }


        if($request->ordering==''){
            $input['ordering']='0';
        }

        $menudata=Program::create($input);

        $programid = $menudata->id;

        ## Add data to Program Data 

       

        return redirect('dashboard/registrations')->with('success', 'Data Added Successfully');
    }


    /* Edit */

    public function GetEdit(Request $request , $id)
    {
        //dd($id);
        $articles = Program::find($id);

       $courseslist = $articles->courses;
       if($courseslist->count()==0){
           $courseslist='';
       }
       // dd($courseslist);
        $facultylist =  $this->facultylist;
        $lablist =  $this->lablist;
        return 	view('dashboard.Registrations.add-edit',compact('articles','courseslist','facultylist','lablist'));
    }

    public function PostEdit(Request $request , $id)
    {
        //dd($request->all());

        $artlist = Program::find($id);

        $validator =Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'alias' => 'required',
            'status' => 'required',
            'title' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect('dashboard/programs/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        //update post data

        $input = $request->all();
        if(isset($input['facultylist_iddata']))
        {
            $input['facultylist_id']=implode(',',$input['facultylist_iddata']);
        }

        if(isset($input['lablist_iddata']))
        {
            $input['lablist_id']=implode(',',$input['lablist_iddata']);
        }
        $artlist->update($input);


        return redirect('dashboard/programs')->with('success', 'Programs Update Successfully');
    }

    ## Listing 

    public function listing()
    {
        $artlist = Program::all();
        return 	view('dashboard.Registrations/listing',['articles'=>$artlist]);
    }

    

    /* Actions  */

    public function activate(Request $request,$id)
    {
        $artlist = Program::find($id);
        $artlist->update(array('status' => '1'));
        return redirect('dashboard/programs')->with('success', 'Success! The Programs is activated successfully.');
    }

    public function deactivate(Request $request,$id){
        $artlist = Program::find($id);
        $artlist->update(array('status' => '0'));
        return redirect('dashboard/programs')->with('success', 'Success! The Programs is deactivated successfully.');
    }

    public function destroy(Request $request,$id)
    {
        //dd($id);
        $artlist = Program::findOrFail($id);
        $artlist->delete();
        return redirect('dashboard/programs')->with('success', 'Success! Programs is deleted successfully.');
    }


    public function PostBulkAction(Request $request)
    {
       
        if($request->action=="Active")
        {

            foreach ($request->chkid as $id)
            {
                $artlist = Program::find($id);
                $artlist->update(array('status' => '1'));
            }

            return redirect('dashboard/programs')->with('success', 'Programs Status Updated Successfully');
        }


        if($request->action=="Inactive")
        {
            foreach ($request->chkid as $id)
            {
                $artlist = Program::find($id);
                $artlist->update(array('status' => '0'));
            }
            return redirect('dashboard/programs')->with('success', 'Programs Status Updated Successfully');
        }

        if($request->action=="Delete")
        {
            $delete = Program::whereIn('id', $request->chkid)->delete();
            //dd($dues);
            return redirect('dashboard/programs')->with('success', 'Programs Delete Successfully');
        }



    }

    public function GetBulkAction()
    {

        $artlist = Program::all();
        return 	view('dashboard.Registrations.listing',['articles'=>$artlist]);
    }

}
