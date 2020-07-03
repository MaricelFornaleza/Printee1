<!-- 
/*
 * Filename: c:\laragon\www\printee\resources\views\admin.blade.php
 * Path: c:\laragon\www\printee
 * Created Date: Tuesday, June 23rd 2020, 12:54:40 pm
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
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Amatic+SC:wght@700&display=swap"
    rel="stylesheet">

<!-- icon -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!-- Styles -->
<link href="{{ asset('css/user.css') }}" rel="stylesheet">

@section('content')
<div class="container-small ">
    <div class="row bg-white shadow-sm">
        <div class="profile left-text">
            <img src="/img/{{$user->avatar}}" class="rounded-circle one-edge-shadow avatar_user" >

        </div>
        <div class="d-row-head align-middle">

            <div class="col-12 p-3 ">
                <div class="d-flex label-con">
                    <div class="post-con  ">
                        <p class="number ">
                            <strong> {{$user->posts->count()}}</strong>
                        </p>
                        <p class="label">
                            POSTS
                        </p>
                    </div>
                    <div class="post-con ">
                        <p class="number">
                            <strong>{{$count ->count()}}</strong>
                        </p>

                        <p class="label">TRANSACTIONS</p>
                    </div>

                </div>
            </div>

            <div class="col-12  p-0">
                <div class=" d-flex font-weight-bold ">
                    <h1 class="username">{{ $user->username }}</h1>
                    <a href="/admin/{{$user->id}}/edit"><i class=" material-icons pr-2">edit</i>
                    </a>
                </div>

                <div class="font-weight-bold">{{ $user->email }}</div>
                <div>{{ $user->phone }}</div>
                <div> {{ $user->address }}</div>
            </div>



            <!-- for posts -->
            <div class="with-shadow mt-4 p-4">
                <div class="d-flex col-12 mb-3 mt-3 justify-content-between  ">
                    <h1>Posts</h1>
                    <a href="/post/create">
                        <div class="btn-add align-items-center d-flex justify-content-between ">
                            <i class="material-icons pr-2">add_circle</i> New Post
                        </div>
                    </a>
                </div>

                <div class="a-row-head align-middle">
                    @forelse($posts as $post)
                    <div class="col-4 pt-0 pl-3 pr-3 w-100">
                        <div class="img-con ">

                            <img src="/storage/{{ $post->image}}" class="image w-100 two-edge-shadow align-center">

                            <div class="text-caption ">
                                {{$post->description}}
                                <br>
                                {{$post->created_at}}
                            </div>
                            <div class="middle">
                                <a href="/post/{{$post->id}}/edit">
                                    <div class="edit-action">
                                        Edit
                                    </div>
                                </a>
                                <form action="/post/{{$post->id}}" method="post">
                                    @csrf
                                    @method("DELETE")

                                    <input type="submit" value="Delete" name="submit" class="delete-action">

                                </form>


                            </div>
                        </div>



                    </div>

                    @empty
                    <div class=" col-12 mb-3 mt-3  ">

                        <h5 style="color: #3e3e3e;">Nothing to show.</h5>
                        <h3 style="color: #3e3e3e;">Create your first post and advertise your business!</h3>
                    </div>
                    @endforelse
                </div>

            </div>


            <div class="pg-links col-12 ">
                {{$posts->links()}}
            </div>

        </div>





    </div>



</div>
@endsection