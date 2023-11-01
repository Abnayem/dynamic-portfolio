<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Journey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class JourneyController extends Controller
{
    public function index()
    {
        $result['data']=Journey::all();
        return view('admin/journey',$result);
    }
    public function manage_journey(Request $request,$id='')
    {
        if($id>0){
            $arr=Journey::where(['id'=>$id])->get(); 

           
        
            $result['name']=$arr['0']->name;
            $result['date']=$arr['0']->date;
            $result['text']=$arr['0']->text;
            
            $result['id']=$arr['0']->id;

            $result['journey']=DB::table('journeys')->where(['status'=>1])->where('id','!=',$id)->get();
        }else{
           
            $result['name']='';
            $result['text']='';
            
            $result['id']=0;

            $result['journey']=DB::table('journeys')->where(['status'=>1])->get();
            
        }

        return view('admin/manage_journey',$result);
    }
    public function manage_journey_process(Request $request)
    {
        //return $request->post();
        
        $request->validate([
            
           
            'name'=>'required',
            'text'=>'required',
          
            
            'image'=>'mimes:jpeg,jpg,png',
            
        ]);

        if($request->post('id')>0){
            $model=Journey::find($request->post('id'));
            $msg="Journey-Meupdated";
        }else{
            $model=new Journey();
            $msg="Journey inserted";
        }

        
     

        $model->name=$request->post('name');
        $model->text=$request->post('text');
        $model->date=$request->post('date');
       
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/journey');
        
    }

    public function delete(Request $request,$id){
        $model=Journey::find($id);
        $model->delete();
        $request->session()->flash('message','journey deleted');
        return redirect('admin/journey');
    }

    public function status(Request $request,$status,$id){
        $model=Journey::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','journey status updated');
        return redirect('admin/journey');
    }
}
