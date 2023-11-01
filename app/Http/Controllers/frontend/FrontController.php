<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect,Response;
class FrontController extends Controller
{
  public function index(Request $request)
  {
    
    $result['header_home']=DB::table('profiles')
                ->where(['status'=>1])
                 ->get();

                 $result['about']=DB::table('aboutmes')
                ->where(['status'=>1])
                 ->get();

                 $result['edu_skill']=DB::table('journeys')
                 ->where(['status'=>0])
                ->get();

                  $result['experi_skill']=DB::table('journeys')
                  ->where(['status'=>1])
                 ->get();

                 $result['coding_skill']=DB::table('my_skills')
                 ->where(['status'=>1])
                ->get();

                $result['profe_skill']=DB::table('my_skills')
                ->where(['status'=>0])
               ->get();



                
    return view('front.index',$result);


  }
  public function education(Request $request ,$education)
  {
   
     
    return view('front.index');

  }
}

