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
use App\Registrations;
use App\Cahotech;
class CahotechController extends Controller
{
    
    public function __construct(){

        $today = date('Y-m-d');
        $this->categorylist = Cahotech::select('fee_category')
                                    ->distinct()->orderby('fee_category','ASC')->get();
        $this->programlist = Programs::where('status','=',1)
                                        ->whereRaw("DATE(program_enddate) >='$today'")
                                       ->pluck('title', 'id');
    }

    /* Add */

    ## Get 

    public function Add()
    {

        $courseslist='';
        $categorylist =  $this->categorylist;
        $programlist =  $this->programlist;

        return view('dashboard.Cahotech.add-edit', compact('courseslist','categorylist','programlist'));

    }

    ## Post 
    public function postdata(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
        ]);


        if($validator->fails())
        {
            return redirect('dashboard/cahotech/add/new')
                ->withErrors($validator)
                ->withInput();
        }


        if($request->ordering==''){
            $input['ordering']='0';
        }

        $menudata=Cahotech::create($input);

        $programid = $menudata->id;

        ## Add data to Program Data 

       

        return redirect('dashboard/cahotech')->with('success', 'Registration Added Successfully');
    }


    /* Edit */

    public function GetEdit(Request $request , $id)
    {
        //dd($id);
        $articles = Cahotech::find($id);

        $courseslist='';
       // dd($courseslist);
         $categorylist =  $this->categorylist;
         $programlist =  $this->programlist;
        return 	view('dashboard.Cahotech.add-edit',compact('articles','courseslist','categorylist','programlist'));
    }

    public function PostEdit(Request $request , $id)
    {
        //dd($request->all());

        $artlist = Cahotech::find($id);

        $validator =Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
        ]);

        if($validator->fails())
        {
            return redirect('dashboard/cahotech/eidt/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        //update post data

        $input = $request->all();
       
        $artlist->update($input);


        return redirect('dashboard/cahotech')->with('success', 'Registration Update Successfully');
    }

    ## Listing 

    public function listing(Request $request)
    {
        //$artlist = Registrations::all();

        $artlist = Cahotech::where('status','!=','');

        $input = $request->all();
        $order_status='';$cat_id='';$designation='';$order_status='';$state='';$city='';

        
        $today = date('Y-m-d');
        $curryear = date('Y');

        if(isset($input['cat_id']))
        {
            $cat_id = $input['cat_id'];
            if($cat_id){
                $artlist = $artlist->where('fee_category','LIKE',"$cat_id");
            }
        }
       
        
       
        if(isset($input['designation']))
        {
            $designation = $input['designation'];
            if($designation){
                $artlist = $artlist->where('designation','LIKE',"$designation");
            }
        }

        if(isset($input['city']))
        {
            $city = $input['city'];
            if($city){
                $artlist = $artlist->where('city','LIKE',"$city");
            }
        }

        if(isset($input['state']))
        {
            $state = $input['state'];
            if($state){
                $artlist = $artlist->where('state','LIKE',"$state");
            }
        }

        if(isset($input['order_status']))
        {
            $order_status = $input['order_status'];
            if($order_status){
                $artlist = $artlist->where('order_status','LIKE',"$order_status");
            }
        }

        $current=1;

        $ids = Cahotech::select('id')->whereRaw("YEAR(registered_on)='$curryear'")->get()->toArray();
        $finalids = array_column($ids, 'id');

        if(isset($input['programstatus']))
        {
            $programstatus = $input['programstatus'];
            if($programstatus)
            {
                
                

                if($programstatus=='past')
                {
                    
                    $artlist = $artlist->whereNotIn('id', $finalids);
                    
                    $current=0;
                }
                else
                {
                    $artlist = $artlist->whereIn('id', $finalids);
                   
                }
            }
        }
        else
        {
            
            $artlist = $artlist->whereIn('id', $finalids);

            
        }

        if($current==1)
        {
            $programlist = Cahotech::select('designation')
                                     ->whereIn('id', $finalids)
                                    ->distinct()->orderby('designation','ASC')->get();

            $citylist = Cahotech::select('city')
                                     ->whereIn('id', $finalids)
                                    ->distinct()->orderby('city','ASC')->get();
            $statelist = Cahotech::select('state')
                                        ->whereIn('id', $finalids)
                                        ->distinct()->orderby('state','ASC')->get();
            $program_locationlist = Cahotech::select('order_status')
                                                ->whereIn('id', $finalids)
                                                  ->distinct()->orderby('order_status','ASC')->get();
            
            $categorylist = Cahotech::select('fee_category')
                                            ->whereIn('id', $finalids)
                                           ->distinct()->orderby('fee_category','ASC')->get();
        }
        else
        {
            $programlist = Cahotech::select('designation')
                                     ->whereNotIn('id', $finalids)
                                    ->distinct()->orderby('designation','ASC')->get();
            
              $citylist = Cahotech::select('city')
                                       ->whereNotIn('id', $finalids)
                                      ->distinct()->orderby('city','ASC')->get();
              $statelist = Cahotech::select('state')
                                          ->whereNotIn('id', $finalids)
                                          ->distinct()->orderby('state','ASC')->get();
            $program_locationlist = Cahotech::select('order_status')
                                          ->whereNotIn('id', $finalids)
                                            ->distinct()->orderby('order_status','ASC')->get();

          $categorylist = Cahotech::select('fee_category')
                                            ->whereNotIn('id', $finalids)
                                           ->distinct()->orderby('fee_category','ASC')->get();
        }

        
        
        $artlist = $artlist->get();

         //dd($artlist->toSql());

        // $categorylist =  $this->categorylist;
         

         
        
        return 	view('dashboard.Cahotech/listing',['articles'=>$artlist,'categorylist'=>$categorylist,
        'programlist'=>$programlist,'citylist'=>$citylist,'statelist'=>$statelist,
        'program_locationlist'=>$program_locationlist,'order_status'=>$order_status,'cat_id'=>$cat_id,'designation'=>$designation,'city'=>$city
        ,'state'=>$state,'programstatus'=>$programstatus,'current'=>$current]);
    }

    

    /* Actions  */

    public function activate(Request $request,$id)
    {
        $artlist = Cahotech::find($id);
        $artlist->update(array('status' => '1'));
        return redirect('dashboard/cahotech')->with('success', 'Success! The registration is activated successfully.');
    }

    public function deactivate(Request $request,$id){
        $artlist = Cahotech::find($id);
        $artlist->update(array('status' => '0'));
        return redirect('dashboard/cahotech')->with('success', 'Success! The registration is deactivated successfully.');
    }

    public function destroy(Request $request,$id)
    {
        //dd($id);
        $artlist = Cahotech::findOrFail($id);
        $artlist->delete();
        return redirect('dashboard/cahotech')->with('success', 'Success! registration is deleted successfully.');
    }


    public function PostBulkAction(Request $request)
    {
       
        if($request->action=="Active")
        {

            foreach ($request->chkid as $id)
            {
                $artlist = Cahotech::find($id);
                $artlist->update(array('status' => '1'));
            }

            return redirect('dashboard/cahotech')->with('success', 'registrations Status Updated Successfully');
        }


        if($request->action=="Inactive")
        {
            foreach ($request->chkid as $id)
            {
                $artlist = Cahotech::find($id);
                $artlist->update(array('status' => '0'));
            }
            return redirect('dashboard/cahotech')->with('success', 'registrations Status Updated Successfully');
        }

        if($request->action=="Delete")
        {
            $delete = Cahotech::whereIn('id', $request->chkid)->delete();
            //dd($dues);
            return redirect('dashboard/cahotech')->with('success', 'registrations Delete Successfully');
        }



    }

    public function GetBulkAction()
    {

        $artlist = Cahotech::all();
        return 	view('dashboard.Cahotech.listing',['articles'=>$artlist]);
    }

}
