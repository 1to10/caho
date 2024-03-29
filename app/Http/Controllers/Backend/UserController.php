<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Sentinel;
use App\User;
use Illuminate\Support\Facades\DB;
use Activation;
use App\Client;
use Session;
use Auth;
use Route;
use Hash;
use Mail;
use Carbon\Carbon;
use App\Register;
use App\Moreabout;
use App\Connect;
class UserController extends Controller
{
    public function listUser()
    {
        $userlist = DB::table('users')
            ->join('role_users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->select('users.*', 'roles.name', 'role_users.role_id')
            ->get();
//dd($userlist);
        return 	view('dashboard/Users.user',['users'=>$userlist]);
    }

    public function actionUser()
    {

        $userlist = DB::table('users')
            ->join('role_users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->select('users.*', 'roles.name', 'role_users.role_id')
            ->get();

//dd($user);
        return 	view('dashboard/Users.user',['users'=>$userlist]);
    }


    public function statusUser(Request $request)
    {
        //dd(count($request->chkid));

        if($request->action=="Active")
        {

            foreach ($request->chkid as $id)
            {
                $user = Sentinel::findById($id);
                $user->update(array('status' => '1'));

                $user = Sentinel::findById($id);
                $activation = Activation::completed($user);
                $activation = Activation::create($user);
                $activation = Activation::complete($user, $activation->code);

                $rg = Register::where('user_id', $id)->count();
                $cl=Client::where('user_id', $id)->count();

                if($rg>0) {
                    $customerlist = Register::where('user_id', $id)->first();
                    $customerlist->update(array('status' => '1'));
                }
                if($cl>0) {
                    $clientlist = Client::where('user_id', $id)->first();
                    $clientlist->update(array('status' => '1'));
                }

            }

            return redirect('dashboard/user')->with('success', 'User Status Updated Successfully');
        }


        if($request->action=="Inactive")
        {
            foreach ($request->chkid as $id)
            {
                $user = Sentinel::findById($id);
                $user->update(array('status' => '0'));
                $users = Sentinel::findById($id);
                Activation::remove($users);

                $rg = Register::where('user_id', $id)->count();
                $cl=Client::where('user_id', $id)->count();

                if($rg>0) {
                    $customerlist = Register::where('user_id', $id)->first();
                    $customerlist->update(array('status' => '0'));
                }

                if($cl>0) {
                    $clientlist = Client::where('user_id', $id)->first();
                    $clientlist->update(array('status' => '0'));
                }


            }
            return redirect('dashboard/user')->with('success', 'User Status Updated Successfully');
        }

        if($request->action=="Delete")
        {
            $delete = User::whereIn('id', $request->chkid)->delete();
            //dd($dues);
            DB::table("role_users")->whereIn('user_id', $request->chkid)->delete();
            DB::table("activations")->whereIn('user_id', $request->chkid)->delete();


            $delete = Register::whereIn('user_id', $request->chkid)->delete();
            DB::table("moreabouts")->whereIn('user_id', $request->chkid)->delete();
            DB::table("connects")->whereIn('user_id', $request->chkid)->delete();

            $delete = Client::whereIn('user_id', $request->chkid)->delete();


            return redirect('dashboard/user')->with('success', 'User Delete Successfully');
        }



    }


    public function permissions($id)
    {

        $user = Sentinel::findById($id);

        $routes = Route::getRoutes();
        $actions = [];
        foreach ($routes as $route) {
            if ($route->getName() != "" && !substr_count($route->getName(), 'payment')) {
                $actions[] = $route->getName();
            }
        }
        // dd (array_filter($actions));

        //remove store option
        $input = preg_quote("store", '~');
        $var = preg_grep('~' . $input . '~', $actions);
        $actions = array_values(array_diff($actions, $var));

        //remove update option
        $input = preg_quote("update", '~');
        $var = preg_grep('~' . $input . '~', $actions);
        $actions = array_values(array_diff($actions, $var));



        $var = [];
        $i = 0;
        foreach ($actions as $action) {

            $input = preg_quote(explode('.', $action )[0].".", '~');
            $var[$i] = preg_grep('~' . $input . '~', $actions);
            $actions = array_values(array_diff($actions, $var[$i]));
            $i += 1;
        }

        $actions = array_filter($var);

        //dd (array_filter($actions));

        return view('dashboard/Users.permissions', compact('actions','user'));

    }





    public function save($id, Request $request)
    {
        //dd($request);
        //return $request->permissions;
        $user = Sentinel::findById($id);
        $user->permissions = [];
        if($request->permissions){
            foreach ($request->permissions as $permission) {
                if(explode('.', $permission)[1] == 'create'){
                    $user->addPermission($permission);
                    $user->addPermission(explode('.', $permission)[0].".store");
                }
                else if(explode('.', $permission)[1] == 'edit'){
                    $user->addPermission($permission);
                    $user->addPermission(explode('.', $permission)[0].".update");
                }
                else{
                    $user->addPermission($permission);
                }
            }
        }

        $user->save();

        return redirect('dashboard/user')->with('success', 'Success! Permissions are stored successfully.');
    }



    public function activate(Request $request,$id)
    {

        //dd($id);

        $user = Sentinel::findById($id);

        //$activation = Activation::completed($user);

        /*if($activation)
        {
            return redirect('dashboard/user')->with('error', 'Warning! The user is already activated.');
        }*/
        //$activation = Activation::create($user);
       // $activation = Activation::complete($user, $activation->code);
        //$role = $user->roles()->first()->name;

        $user->update(array('status' => '1'));

        $rg = Register::where('user_id', $id)->count();
        $cl=Client::where('user_id', $id)->count();

        if ($rg >0) {
            $customerlist = Register::where('user_id', $id)->first();
            $customerlist->update(array('status' => '1'));
        }
        if($cl>0) {
            $clientlist = Client::where('user_id', $id)->first();
            $clientlist->update(array('status' => '1'));
        }

        return redirect('dashboard/user')->with('success', 'Success! The user is activated successfully.');
    }

    public function deactivate(Request $request,$id){

        $user = Sentinel::findById($id);
        //Activation::remove($user);
        $user->update(array('status' => '0'));

        $rg = Register::where('user_id', $id)->count();
        $cl=Client::where('user_id', $id)->count();
        if ($rg >0) {
            $customerlist = Register::where('user_id', $id)->first();
            $customerlist->update(array('status' => '0'));
        }
        if($cl>0) {
            $clientlist = Client::where('user_id', $id)->first();
            $clientlist->update(array('status' => '0'));
        }

        return redirect('dashboard/user')->with('success', 'Success! The user is deactivated successfully.');
    }

    public function destroy(Request $request,$id)
    {
        //dd($id);
        $user = User::findOrFail($id);
        $user->delete();

        $rg = Register::where('user_id', $id)->count();
        $cl=Client::where('user_id', $id)->count();

        if ($rg >0){
            $delete = Register::where('user_id', $id)->delete();
        DB::table("moreabouts")->where('user_id', $id)->delete();
        DB::table("connects")->where('user_id', $id)->delete();
         }

        if($cl>0){
        $delete = Client::where('user_id', $id)->delete();
        }


        return redirect('dashboard/user')->with('success', 'Success! User is deleted successfully.');
    }








    public function Add()
    {
        return 	view('dashboard/Users.add-edit-user');
    }

    public function AddUser(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'location' => 'required|string|max:255',
            'role' => 'required',
            'status' => 'required',
        ]);



        if($validator->fails())
        {
            return redirect('dashboard/user/add/new')
                ->withErrors($validator)
                ->withInput();
        }

//dd($request->all());

        $user=Sentinel::registerAndActivate($request->all());

        $role=Sentinel::findRoleBySlug($request->role);
        $role->users()->attach($user);


        $register = $request->all();

        //dd($user->first_name);
        $register['status'] = 1;
        $register['user_id'] =$user->id;
        $register['user_type']='Backend';
        $register['email'] =$request->email;
        $register['Mobile'] =$request->mobile;
        $register['First_Name'] =$user->first_name;
        $register['Last_Name'] =$user->last_name;
        $registers=Register::create($register);



        return redirect('dashboard/user')->with('success', 'User Added Successfully');
    }

    public function viewEditUser(Request $request , $id)
    {
        //dd($id);
        $user = User::find($id);
        $role= DB::table('role_users')->where('user_id', $user->id)->first();
        //dd($role->role_id);
        $role_name= DB::table('roles')->where('id', $role->role_id)->first();
        //dd($role_name->slug);
        //pass posts data to view and load list view
        return view('dashboard/Users.add-edit-user', ['users' => $user], ['roles' => $role_name]);
        //return 	view('backend.add-edit-user');
    }
    public function editUser(Request $request , $id)
    {
        $validator =Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'password' => 'required|string|min:6|confirmed',
            'location' => 'required|string|max:255',
            'role' => 'required',
            'status' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect('dashboard/add-edit-user/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        //update post data
        $user = User::find($id)->update($request->has('password') ? array_merge($request->except('password'), ['password' => bcrypt($request->input('password'))]) : $request->except('password'));
        $results = DB::table('roles')->where('slug', $request->role)->first();
        DB::table('role_users')->where('user_id', $id)->update(array('role_id' => $results->id));


        return redirect('dashboard/user')->with('success', 'User Update Successfully');
    }


}
