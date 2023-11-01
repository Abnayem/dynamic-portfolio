@extends('admin/layout')
@section('page_title','Manage Category')
@section('category_select','active')
@section('container')
    <h1 class="mb10">Manage Category</h1>
    <a href="{{url('admin/profile')}}">
        <button type="button" class="btn btn-success">
            Back
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('profile.manage_profile_process')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                          <label for="header" class="control-label mb-1">Header Name</label>
                                          <input id="header" value="Header" name="header" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                     @error('header')
                                    <div class="alert alert-danger" role="alert">
                                    {{$message}}		
                                    </div>
                                    @enderror 
                                          </div>

                                        <div class="col-md-4">
                                        <label for="name" class="control-label mb-1"> Name</label>
                                        <input id="name" value="Name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required> 
                                        @error('name')
                                    <div class="alert alert-danger" role="alert">
                                    {{$message}}		
                                    </div>
                                    @enderror 
                                        </div>

                                        <div class="col-md-4">
                                            <label for="designation" class="control-label mb-1">Designation</label>
                                            <input id="designation" value="designation" name="designation" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                           
                                      @error('designation')
                                    <div class="alert alert-danger" role="alert">
                                    {{$message}}		
                                    </div>
                                    @enderror  
                                    
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="text" class="control-label mb-1">Text</label>
                                    <input id="text" name="text" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                   
                                    @error('text')
                                    <div class="alert alert-danger" role="alert">
                                    {{$message}}		
                                    </div>
                                    @enderror  
                                    
                                    
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1"> Image</label>
                                    <input id="profile_image" name="profile_image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                  
                                    @error('profile_image')
                                    <div class="alert alert-danger" role="alert">
                                    {{$message}}		
                                    </div>
                                    @enderror  
                                    

                                    
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Submit
                                    </button>
                                </div>
                                <input type="hidden" name="id" value="{{$id}}"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
                        
@endsection