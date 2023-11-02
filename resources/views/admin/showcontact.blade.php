@extends('admin/layout')
@section('page_title','ShowContact')
@section('Skills_select','active')
@section('container')
                  
    <h1>Contact Us</h1>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Subject</th>
                            <th>Massage</th>
                            
                          
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $list)
                        <tr>
                           <td>{{$list->id}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{$list->email}}</td>
                            
                            <td>{{$list->mobile}}</td>
                            <td>{{$list->subject}}</td>
                            <td>{{$list->message}}</td>
                            
                            
                            <tr>
                        @endforeach 

                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
                        
@endsection