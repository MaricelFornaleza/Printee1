<!-- 
/*
 * Filename: c:\laragon\www\printee\resources\views\transaction\upload.blade.php
 * Path: c:\laragon\www\printee
 * Created Date: Friday, June 26th 2020, 12:22:10 pm
 * Author: Maricel L. Fornaleza
 * Honor Code:
 *   This is my own work and I have not received any unauthorized help in completing this. 
 *   I have not copied from my classmate, friend, nor any unauthorized resource. 
 *   I am well aware of the policies stipulated in the handbook regarding academic dishonesty. 
 *   If proven guilty, I won't be credited any points for this endeavor.
 * 
 * Copyright (c) 2020 
 */
 -->

@extends('layouts.app')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
<link href="{{ asset('css/user.css') }}" rel="stylesheet">
@section('content')
<div class="container-small">
    <form action="/transaction" enctype="multipart/form-data" method="post">

        @csrf
        <div class="c-row">

            <div class="w-100">

                <div class="">

                    <h1>New Transaction </h1>
                </div>
                <div class="form-group ">
                    <input type="hidden" name="admin_id" value="{{$admin_id}}">
                    <label for="description" class="col-form-label">Description</label>


                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                        name="description" value="{{ old('description') }}" autocomplete="description"
                        placeholder="Indicate your custom format" autofocus>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="">
                    <label for="image" class="col-form-label">File</label>
                    <input type="file" class="form-control-file" id="file" name="file">
                    @error('file')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class=" pt-4">
                    <button class="btn btn-primary">Request Print</button>
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