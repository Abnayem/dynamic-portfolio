@extends('admin/layout')
@section('page_title','About-Me')
@section('profile_select','active')
@section('container')
    @if(session()->has('message'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        {{session('message')}}  
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> 
    @endif                     
    <h1 class="mb10">About Me</h1>
    <a href="{{url('admin/aboutme/manage_aboutme')}}">
        <button type="button" class="btn btn-success">
            Add Aboutme
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
            
                            <th>Picture</th>
                            <th>Designation</th>
                            <th>Text</th>
                          
                            <th>Action</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $list)
                        <tr class="col-md-12">
                            <td>{{$list->id}}</td>
                          
                            <td>
                            
                            <img width="100px" src="{{asset('storage/media/aboutme/'.$list->image)}}"/>
                          
                            </td>
                            <td>{{$list->designation}}</td>
                            
                            <td>{{$list->text}}</td>
                         
                          
                            
                            <td>


                                @if($list->status==1)
                                    <a href="{{url('admin/aboutme/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button></a>
                                 @elseif($list->status==0)
                                    <a href="{{url('admin/aboutme/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>
                                @endif

                                
                            </td>
                            <td><a href="{{url('admin/aboutme/manage_aboutme/')}}/{{$list->id}}"><button type="button" class="btn btn-success"><i class="fa fa-pencil-square" aria-hidden="true"></i></button></a></td>
                            
                            <td><a href="{{url('admin/aboutme/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a></td>
                        </tr>
                        @endforeach 

                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
                        
@endsection