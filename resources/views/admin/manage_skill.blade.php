@extends('admin/layout')
@section('page_title','Manage Skill')
@section('category_select','active')
@section('container')
    <h1 class="mb10">Manage Skill</h1>
    <a href="{{url('admin/skills')}}">
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
                            <form action="{{route('skills.manage_skills_process')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                          <label for="skills" class="control-label mb-1">Skills</label>
                                          <input id="skills"  name="skills" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                     @error('skills')
                                    <div class="alert alert-danger" role="alert">
                                    {{$message}}		
                                    </div>
                                    @enderror 
                                          </div>

                                        

                                        <div class="col-md-4">
                                            <label for="percentice" class="control-label mb-1">percentice</label>
                                            <input id="percentice" value="percentice" name="percentice" type="number" class="form-control" aria-required="true" aria-invalid="false" required>
                                           
                                      @error('percentice')
                                    <div class="alert alert-danger" role="alert">
                                    {{$message}}		
                                    </div>
                                    @enderror  
                                    
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="skillname" class="control-label mb-1">Skillname</label>
                                    <input id="skillname" name="skillname" type="skillname" class="form-control" aria-required="true" aria-invalid="false">
                                   
                                    @error('skillname')
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