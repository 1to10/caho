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

        $this->facultylist = Faculty::where('status','=',1)->pluck('name', 'id');
        $this->lablist = Content::where([['status','=',1],['labpage_status','=',1]])->pluck('title', 'id');
    }

    /* Add */

    ## Get 

    public function Add()
    {

        $courseslist='';
        $facultylist =  $this->facultylist;
        $lablist =  $this->lablist;
        return view('dashboard.Programs.add-edit', compact('courseslist','facultylist','lablist'));

    }

    ## Post 
    public function postdata(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'alias' => 'required|max:255|unique:programs',
            'status' => 'required',
            'type' => 'required',
        ]);


        if($validator->fails())
        {
            return redirect('dashboard/programs/add/new')
                ->withErrors($validator)
                ->withInput();
        }


        $input = $request->all();
        $alias=str_slug($input['alias'],'-');

        $input['alias'] = $alias;
      

        if($request->ordering==''){
            $input['ordering']='0';
        }

        if(isset($input['facultylist_iddata']))
        {
            $input['facultylist_id']=implode(',',$input['facultylist_iddata']);
        }

        if(isset($input['lablist_iddata']))
        {
            $input['lablist_id']=implode(',',$input['lablist_iddata']);
        }

        $menudata=Program::create($input);

        $programid = $menudata->id;

        ## Add data to Program Data 

        if(isset($input['featurestitle']))
        {
            $featurestitle = $input['featurestitle'];
            $featureimg = $input['featureimg'];
            $featuresorder = $input['featuresorder'];
            $programdataid = $input['programdataid'];
            $today = date('Y-m-d H:i:s');
            if(!empty($featurestitle))
            {
                
                foreach($featurestitle as $key=>$data)
                {
                    $progobj = new Programdata();

                    $program_title = $featurestitle[$key];
                    $program_img = $featureimg[$key];
                    
                    $program_order = $featuresorder[$key];
                    $programdata_id = $programdataid[$key];
                    if($program_title)
                    {
                        $progobj->programid = $programid;
                        $progobj->name = $program_title;
                        $progobj->img = $program_img;
                        $progobj->ordering = $program_order;
                        $progobj->save(); 
                    }
                    
                }
            }
        }

        return redirect('dashboard/programs')->with('success', 'Program Added Successfully');
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
        return 	view('dashboard.Programs.add-edit',compact('articles','courseslist','facultylist','lablist'));
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



        ## Add / Update Program data 
        
        $programid = $id;

        if(isset($input['featurestitle']))
        {
            $featurestitle = $input['featurestitle'];
            $featureimg = $input['featureimg'];
            $featuresorder = $input['featuresorder'];
            $programdataid = $input['programdataid'];
            $today = date('Y-m-d H:i:s');
            if(!empty($featurestitle))
            {
                

                //Programdata::where('programid', '=', $programid)->delete();

                Programdata::where('programid', '=', $programid)->update(array('status' =>2));

                $insert_success = 0;

                foreach($featurestitle as $key=>$data)
                {
                    $progobj = new Programdata();

                    $program_title = $featurestitle[$key];
                    $program_img = $featureimg[$key];
                    
                    $program_order = $featuresorder[$key];
                    $programdata_id = $programdataid[$key];
                    if($program_title)
                    {
                        $progobj->programid = $programid;
                        $progobj->name = $program_title;
                        $progobj->img = $program_img;
                        $progobj->ordering = $program_order;
                        $progobj->save(); 

                        $insert_success=1;
                    }
                    
                }

                if($insert_success==1)
                {
                    Programdata::where([['programid', '=', $programid],['status', '=', 2]])->delete();
                }
            }
        }
        else
        {
            Programdata::where('programid', '=', $programid)->delete();
        }



        return redirect('dashboard/programs')->with('success', 'Programs Update Successfully');
    }

    ## Listing 

    public function listing()
    {
        $artlist = Program::all();
        return 	view('dashboard.Programs/listing',['articles'=>$artlist]);
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
        return 	view('dashboard.Programs.listing',['articles'=>$artlist]);
    }

}
