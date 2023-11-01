@extends('admin/layout')
@section('page_title','Skills')
@section('Skills_select','active')
@section('container')
    @if(session()->has('message'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        {{session('message')}}  
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> 
    @endif                     
    <h1 class="mb10">Skills</h1>
    <a href="{{url('admin/skills/manage_skills')}}">
        <button type="button" class="btn btn-success">
            Add Skills
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
                            <th>Skills</th>
                          
                            <th>percentice</th>
                            <th>skillname</th>
                            <th>Edit</th>
                            <th>Action</th>
                            <th>Delete</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->skills}}</td>
                            
                            <td>{{$list->percentice}}</td>
                            <td>{{$list->skillname}}</td>
                            
                            
                            <td><a href="{{url('admin/skills/manage_skills/')}}/{{$list->id}}"><button type="button" class="btn btn-success"><i class="fa fa-pencil-square" aria-hidden="true"></i></button></a></td>
                            <td>


                                @if($list->status==1)
                                    <a href="{{url('admin/skills/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary">CodingSkill</button></a>
                                 @elseif($list->status==0)
                                    <a href="{{url('admin/skills/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">ProfessionalSkill</button></a>
                                @endif

                                
                            </td>
                            <td><a href="{{url('admin/skills/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a></td>
                        </tr>
                        @endforeach 

                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
                        
@endsection