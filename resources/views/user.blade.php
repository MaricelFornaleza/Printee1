<!-- 
/*
 * Filename: c:\laragon\www\printee\resources\views\user.blade.php
 * Path: c:\laragon\www\printee
 * Created Date: Tuesday, June 23rd 2020, 12:55:08 pm
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
            <img src="/img/{{$user->avatar}}" class="rounded-circle one-edge-shadow"
                style="height: 210px; width: 210px; border: 10px solid white; object-fit:cover;">
        </div>
        <div class="d-row-head align-middle">
            <div class="col-12 p-3 ">
                <div class="d-flex user-label">
                    <div class="col-6 pt-0">
                        <div class="d-flex font-weight-bold ">
                            <h1 class="">{{ $user->username }}</h1>
                            <a href="/user/{{$user->id}}/edit"><i class=" material-icons pr-2">edit</i>
                            </a>
                        </div>

                        <div class="font-weight-bold">{{ $user->email }}</div>
                        <div>{{ $user->phone }}</div>
                        <div> {{ $user->address }}</div>
                    </div>
                    <div class="post-con ">
                        <p class="number">
                            <strong>{{$user->transactions->count()}}</strong>
                        </p>

                        <p class="label">TRANSACTIONS</p>
                    </div>

                </div>


            </div>



            <!-- <div class="col-12 pt-0">
                <div class="font-weight-bold ">
                    <h1 class="username">{{ $user->username }}</h1>
                </div>

                <div class="font-weight-bold">{{ $user->email }}</div>
                <div>{{ $user->phone }}</div>
                <div> {{ $user->address }}</div>
            </div> -->

            <!-- for shops -->
            <div class="with-shadow mt-4 p-4" style="width: 100%">
                <div class="d-flex col-12 mb-3 mt-3">
                    <h1>Available Printing Shops</h1>
                </div>

                <div class="d-row-head align-middle">
                    @foreach ($userlist as $users)
                    <div class="col-3 w-100 pt-0">
                        <div class="card ">
                            <img src="/img/{{$users->avatar}}" alt="Avatar"
                                style="height:100px; width: 100%; object-fit:cover; ">
                            <div class="container">
                                <h3><b>{{$users -> username}}</b> </h3>
                                <p>{{$users -> phone}} <br>
                                    {{$users -> address}}</p>
                                <a href="/transaction/upload/{{$users -> id}}">
                                    <button class="create align-items-center d-flex justify-content-center">
                                        <i class="material-icons pr-1">add_circle</i>Transaction
                                    </button>
                                </a>
                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

            <div class="pg-links col-12 ">
                {{$userlist->links()}}
            </div>



        </div>



    </div>

</div>
@endsection