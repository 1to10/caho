<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Memberships;
use Sentinel;
use App\User;
use App\MembershipRegistrations;
class MembershipController extends Controller
{

    
   


    /* Edit */

    public function GetEdit(Request $request , $id)
    {
        //dd($id);
        $articles = Memberships::find($id);

       $acategorys="";
        return 	view('dashboard.Memberships.add-edit',compact('acategorys','articles'));
    }

    public function PostEdit(Request $request , $id)
    {
        //dd($request->all());

        $artlist = Memberships::find($id);

        $validator =Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if($validator->fails())
        {
            return redirect('dashboard/membership/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        //update post data

        $input = $request->all();
        $artlist->update($input);
        return redirect('dashboard/membership')->with('success', 'Membership Plan Update Successfully');
    }

    ## Listing 

    public function listing()
    {
        $artlist = Memberships::all();
        $plan1_member = MembershipRegistrations::where('membership_id','=',1)->count();
        $plan2_member = MembershipRegistrations::where('membership_id','=',2)->count();
        $plan3_member = MembershipRegistrations::where('membership_id','=',3)->count();
        $array_number[1]=$plan1_member;$array_number[2]=$plan2_member;$array_number[3]=$plan3_member;

        $activecnt = MembershipRegistrations::where('MembershipStatus','LIKE','%Active%')->count();
        $expiredcnt = MembershipRegistrations::where('MembershipStatus','LIKE','%EXPIRED%')->count();

        return 	view('dashboard.Memberships/listing',['articles'=>$artlist,'array_number'=>$array_number]);
    }

    

    /* Actions  */

    public function activate(Request $request,$id)
    {
        $artlist = Memberships::find($id);
        $artlist->update(array('status' => '1'));
        return redirect('dashboard/membership')->with('success', 'Success! The Memberships Plan  activated successfully.');
    }

    public function deactivate(Request $request,$id){
        $artlist = Memberships::find($id);
        $artlist->update(array('status' => '0'));
        return redirect('dashboard/membership')->with('success', 'Success! The Memberships  deactivated successfully.');
    }

    


}