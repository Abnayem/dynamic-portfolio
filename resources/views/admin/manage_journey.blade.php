@extends('admin/layout')
@section('page_title','Manage Journey')
@section('category_select','active')
@section('container')
    <h1 class="mb10">Manage Journey</h1>
    <a href="{{url('admin/journey')}}">
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
                            <form action="{{route('journey.manage_journey_process')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        

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
                                            <label for="Date" class="control-label mb-1">Date</label>
                                            <input id="date" value="date" name="date" type="date" class="form-control" aria-required="true" aria-invalid="false" required>
                                           
                                      @error('date')
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
                                  <label for="education" class="control-label mb-1">Education</label>
                                  <input id="education" name="education" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                  @error('education')
                                    <div class="alert alert-danger" role="alert">
                                    {{$message}}		
                                    </div>
                                    @enderror  
                                    
                                </div>
                                <div class="form-group">
                                  <label for="experience" class="control-label mb-1">Experience</label>
                                  <input id="experience" name="experience" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                  @error('experience')
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