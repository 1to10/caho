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

		$today = date('Y-m-d');
        $ids = Programs::select('id')->whereRaw("DATE(program_enddate) >='$today'")->get()->toArray();
		$finalids = array_column($ids, 'id');
		

		$programs = Programs::select('title','status')
							 ->where([['status','=',1]])
							 ->whereIn('id', $finalids)
							 ->count();

		$Activeuserreg = Registrations::select('title','status')
							 ->where([['status','=',1]])
							 ->whereIn('program_id', $finalids)
							 ->count();
		
		return view('dashboard.home',compact('categories','programs'));
	}
}
