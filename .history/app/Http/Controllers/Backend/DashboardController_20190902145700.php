<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Sentinel;
use App\User;
use App\Content;
use App\Enquiry;
use App\Programs;
use App\Category;
use App\Registrations;

class DashboardController extends Controller
{
    public function index()
	{
		
		$categories = Category::select('title','status')->where('status','=',1)->count();
		$programs = Programs::select('title','status')->where([['status','=',1]])->count();
		$users = Registrations::select('title','status')->where([['status','=',1]])->count();
		
		return view('dashboard.home',compact('categories','programs','users'));
	}
}
