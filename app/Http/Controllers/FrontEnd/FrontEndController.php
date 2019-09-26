<?php
namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Sentinel;
use App\Banner;
use App\Content;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
/**
 * Class LoginController
 * @package App\Http\Controllers\Backend
 */

class frontendController extends Controller
{
    public function index($slug='#')
    {
       
        $pageinfo = Content::where('alias','=','home')->first();
         return \View::make('frontend.index',compact('slug','pageinfo'));
    }

}