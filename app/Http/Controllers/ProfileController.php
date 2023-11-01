<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $result['data']=Profile::all();
        return view('admin/profile',$result);
    }
    public function manage_profile(Request $request,$id='')
    {
        if($id>0){
            $arr=Profile::where(['id'=>$id])->get(); 

            $result['header']=$arr['0']->header;
            $result['name']=$arr['0']->name;
            $result['designation']=$arr['0']->designation;
            $result['text']=$arr['0']->text;
           
            $result['profile_image']=$arr['0']->profile_image;
            $result['id']=$arr['0']->id;

            $result['profile']=DB::table('profiles')->where(['status'=>1])->where('id','!=',$id)->get();
        }else{
            $result['header']='';
            $result['name']='';
            $result['designation']='';
            $result['text']='';
          
            $result['profile_image']="";
            $result['id']=0;

            $result['profile']=DB::table('profiles')->where(['status'=>1])->get();
            
        }

        return view('admin/manage_profile',$result);
    }
    public function manage_profile_process(Request $request)
    {
        //return $request->post();
        
        $request->validate([
            'name'=>'required',
            'header'=>'required',
            'designation'=>'required',
            'text'=>'required',
            
            'profile_image'=>'mimes:jpeg,jpg,png',
            
        ]);

        if($request->post('id')>0){
            $model=Profile::find($request->post('id'));
            $msg="Category updated";
        }else{
            $model=new Profile();
            $msg="Category inserted";
        }

        if($request->hasfile('profile_image')){

            if($request->post('id')>0){
                $arrImage=DB::table('profiles')->where(['id'=>$request->post('id')])->get();
                if(Storage::exists('/public/media/profile/'.$arrImage[0]->profile_image)){
                    Storage::delete('/public/media/profile/'.$arrImage[0]->profile_image);
                }
            }

            $image=$request->file('profile_image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/profile',$image_name);
            $model->profile_image=$image_name;
        }
        $model->header=$request->post('header');
        $model->name=$request->post('name');
        $model->designation=$request->post('designation');
        $model->text=$request->post('text');
       
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/profile');
        
    }

    public function delete(Request $request,$id){
        $model=Profile::find($id);
        $model->delete();
        $request->session()->flash('message','Category deleted');
        return redirect('admin/profile');
    }

    public function status(Request $request,$status,$id){
        $model=Profile::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Category status updated');
        return redirect('admin/profile');
    }

}
