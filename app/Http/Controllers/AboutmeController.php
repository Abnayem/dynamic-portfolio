<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Aboutme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class AboutmeController extends Controller
{
    public function index()
    {
        $result['data']=Aboutme::all();
        return view('admin/aboutme',$result);
    }
    public function manage_aboutme(Request $request,$id='')
    {
        if($id>0){
            $arr=Aboutme::where(['id'=>$id])->get(); 

       
        
            $result['designation']=$arr['0']->designation;
            $result['text']=$arr['0']->text;
        
            $result['image']=$arr['0']->image;
            $result['id']=$arr['0']->id;

            $result['aboutme']=DB::table('aboutmes')->where(['status'=>1])->where('id','!=',$id)->get();
        }else{
        
            $result['designation']='';
            $result['text']='';
           
            $result['image']="";
            $result['id']=0;

            $result['aboutme']=DB::table('aboutmes')->where(['status'=>1])->get();
            
        }

        return view('admin/manage_aboutme',$result);
    }
    public function manage_aboutme_process(Request $request)
    {
        //return $request->post();
        
        $request->validate([
            
          
            'designation'=>'required',
            'text'=>'required',
            'image'=>'mimes:jpeg,jpg,png',
            
        ]);

        if($request->post('id')>0){
            $model=Aboutme::find($request->post('id'));
            $msg="About-Meupdated";
        }else{
            $model=new Aboutme();
            $msg="About-Me inserted";
        }

        if($request->hasfile('image')){

            if($request->post('id')>0){
                $arrImage=DB::table('aboutmes')->where(['id'=>$request->post('id')])->get();
                if(Storage::exists('/public/media/image/'.$arrImage[0]->image)){
                    Storage::delete('/public/media/image/'.$arrImage[0]->image);
                }
            }

            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/aboutme',$image_name);
            $model->image=$image_name;
        }
    

        $model->designation=$request->post('designation');
        $model->text=$request->post('text');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/aboutme');
        
    }

    public function delete(Request $request,$id){
        $model=Aboutme::find($id);
        $model->delete();
        $request->session()->flash('message','About-Me deleted');
        return redirect('admin/aboutme');
    }

    public function status(Request $request,$status,$id){
        $model=Aboutme::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','About-Me status updated');
        return redirect('admin/aboutme');
    }
}
