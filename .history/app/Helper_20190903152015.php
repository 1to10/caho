<?php
/**
 * change date subscript
 *
 * @param $number
 */
use Illuminate\Pagination\Paginator;
new \Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Programs;
use App\Registrations;

## db functions start 
function getLocation($catcode)
{
    $today = date('Y-m-d');
    $program_locationlist = Programs::select('location')
    ->where('cat_id','=',$catcode)
    ->where('location','!=','')
    ->whereRaw("DATE(program_enddate) >='$today'")
    ->distinct()->orderby('location','ASC')->get();
    return $program_locationlist;
}

function Usercount($catcode,$location)
{
    $today = date('Y-m-d');
    $userlist = Registrations::where('applied_for', '=', $catcode)
                            ->where('program_location','LIKE',$location)
                            ->whereRaw("DATE(program_enddate) >='$today'")
                            ->get();
    $userCount = $userlist->count();
    return $userCount;
}


## db functions end 

function ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return 'th';
    else
        return $ends[$number % 10];
}
function xssafe($data,$encoding='UTF-8')
{
    return htmlspecialchars($data,ENT_QUOTES | ENT_HTML401,$encoding);
}

function paginate($items, $perPage = 15, $page = null, $options = [])
{

    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    //$items = $items instanceof Collection ? $items : Collection::make($items);
    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
}

function month_date_convert($date){
    $date_year=substr($date,0,4);
    $date_month=substr($date,5,2);
    $date_day=substr($date,8,2);
    $date=date("jS M", mktime(0,0,0,$date_month,$date_day,$date_year));
    return $date;
}

function day($date){
    $date_year=substr($date,0,4);
    $date_month=substr($date,5,2);
    $date_day=substr($date,8,2);
    $date=date("d", mktime(0,0,0,$date_month,$date_day,$date_year));
    return $date;
}
function month($date){
    $date_year=substr($date,0,4);
    $date_month=substr($date,5,2);
    $date_day=substr($date,8,2);
    $date=date("M", mktime(0,0,0,$date_month,$date_day,$date_year));
    return $date;
}
function year($date){
    $date_year=substr($date,0,4);
    $date_month=substr($date,5,2);
    $date_day=substr($date,8,2);
    $date=date("Y", mktime(0,0,0,$date_month,$date_day,$date_year));
    return $date;
}

function date_day_convert($date){
    $date_year=substr($date,0,4);
    $date_month=substr($date,5,2);
    $date_day=substr($date,8,2);
    $date=date("jS F, l", mktime(0,0,0,$date_month,$date_day,$date_year));
    return $date;
}

function date_convert($date){
    $date_year=substr($date,0,4);
    $date_month=substr($date,5,2);
    $date_day=substr($date,8,2);
    $date=date("F jS, Y", mktime(0,0,0,$date_month,$date_day,$date_year));
    return $date;
}



function datetime_convert($date){
    $date_year=substr($date,0,4);
    $date_month=substr($date,5,2);
    $date_day=substr($date,8,2);

    $date_hour = substr($date,11,2);
    $date_min = substr($date,14,2);
    $date_seconds = substr($date,17,2);

    $date=date("jS F Y  h:i:s A", mktime($date_hour,$date_min,$date_seconds,$date_month,$date_day,$date_year));
    return $date;
}


function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}

function SEARCH_REPLACE($content)
{
    $site_url = env('APP_URL');
    $placeholder = array('http://192.168.1.149/veritas');
    $replaceby = array($site_url);
    $finalcontent = str_replace($placeholder,$replaceby,$content);
    return $finalcontent;
}