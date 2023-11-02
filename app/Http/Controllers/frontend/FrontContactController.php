<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\FrontContact;
use Illuminate\Http\Request;

class FrontContactController extends Controller
{
    public function contact(Request $request)
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






        $request->validate([
            
           
            'mobile'=>'required|numeric|min:11',
          
            
           
            
        ]);

        
            $model=new FrontContact();
            $msg="Contact inserted";

        $model->name=$request->post('name');
        $model->email=$request->post('email');
        $model->mobile=$request->post('mobile');
        $model->subject=$request->post('subject');
        $model->message=$request->post('message');
       
       
        $model->save();
        $request->session()->flash('message',$msg);
        return view('front.index',);
        
    }
    

   
}
