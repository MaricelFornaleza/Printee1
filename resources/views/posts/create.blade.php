@extends('layouts.app')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
<link href="{{ asset('css/user.css') }}" rel="stylesheet">
@section('content')
<div class="container-small">
    <form action="/post" enctype="multipart/form-data" method="post">

    @csrf 
    <div class="c-row">
    
        <div class="w-100">

                <div class="">
                    <h1>Add New Post</h1>
                </div>
                <div class="form-group ">
                    <label for="description" class="col-form-label">Post description</label>

                        
                        <input id="description" 
                            type="text" 
                            class="form-control @error('description') is-invalid @enderror" 
                            name="description"
                            value="{{ old('description') }}"  
                            autocomplete="description" autofocus>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                </div>

                <div class="">
                    <label for="image" class="col-form-label">Post Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class=" pt-4">
                    <button class="btn btn-primary">Add New Post</button>
                </div>
        </div>
    </div>
    </form>
<!-- 

   <form action="/post" enctype="multipart/form-data" method="post">

    @csrf 
    <div class="c-row ">
       
        <div class="c-row ">

                <div class="post-con">
                    <h1>Add New Post</h1>
                </div>
                <div class="form-group post-con">
                    <label for="description" class="col-md-4 col-form-label">Post description</label>

                        
                        <input id="description" 
                            type="text" 
                            class="form-control @error('description') is-invalid @enderror" 
                            name="description"
                            value="{{ old('description') }}"  
                            autocomplete="description" autofocus>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Add New Post</button>
                </div>
        </div>
    </div>
   </form> -->
</div>
@endsection
