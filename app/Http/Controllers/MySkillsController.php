<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\MySkills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MySkillsController extends Controller
{
    public function index()
    {
        $result['data']=MySkills::all();
        return view('admin/skill',$result);
    }
    public function manage_skills(Request $request,$id='')
    {
        if($id>0){
            $arr=MySkills::where(['id'=>$id])->get(); 

            $result['skills']=$arr['0']->skills;
        
            $result['percentice']=$arr['0']->percentice;
            $result['skillname']=$arr['0']->skillname;
            $result['id']=$arr['0']->id;
            $result['my_skill']=DB::table('my_skills')->where(['status'=>1])->where('id','!=',$id)->get();
        }else{
            $result['codingskills']='';
            $result['skills']='';
            $result['percentice']='';
            $result['skillname']="";
            $result['id']=0;

            $result['my_skill']=DB::table('my_skills')->where(['status'=>1])->get();
            
        }

        return view('admin/manage_skill',$result);
    }
    public function manage_skills_process(Request $request)
    {
        //return $request->post();
        
        $request->validate([
            
           
          
            'percentice'=>'required',
            'skillname'=>'required',
           
            
        ]);

        if($request->post('id')>0){
            $model=MySkills::find($request->post('id'));
            $msg="Skill-Meupdated";
        }else{
            $model=new MySkills();
            $msg="Skill inserted";
        }

        
        $model->skills=$request->post('skills');

        $model->percentice=$request->post('percentice');
        $model->skillname=$request->post('skillname');
       
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/skills');
        
    }

    public function delete(Request $request,$id){
        $model=MySkills::find($id);
        $model->delete();
        $request->session()->flash('message','Skill deleted');
        return redirect('admin/skills');
    }

    public function status(Request $request,$status,$id){
        $model=MySkills::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Skill status updated');
        return redirect('admin/skills');
    }
}
