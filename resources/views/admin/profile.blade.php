@extends('admin/layout')
@section('page_title','Profile')
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
    <h1 class="mb10">Category</h1>
    <a href="{{url('admin/profile/manage_profile')}}">
        <button type="button" class="btn btn-success">
            Add Profile
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
                            <th>Header</th>
                            <th>Name</th>
                          
                            <th>Designation</th>
                            <th>Text</th>
                            
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Action</th>
                            <th>Delete</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->header}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{$list->designation}}</td>
                            <td>{{$list->text}}</td>
                            
                            <td>
                            
                            <img width="100px" src="{{asset('storage/media/profile/'.$list->profile_image)}}"/>
                          
                            </td>
                            <td><a href="{{url('admin/profile/manage_profile/')}}/{{$list->id}}"><button type="button" class="btn btn-success"><i class="fa fa-pencil-square" aria-hidden="true"></i></button></a></td>
                            <td>


                                @if($list->status==1)
                                    <a href="{{url('admin/profile/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button></a>
                                 @elseif($list->status==0)
                                    <a href="{{url('admin/profile/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>
                                @endif

                                
                            </td>
                            <td><a href="{{url('admin/profile/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a></td>
                        </tr>
                        @endforeach 

                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
                        
@endsection