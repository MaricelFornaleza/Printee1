<!-- 
/*
 * Filename: c:\laragon\www\printee\resources\views\transaction\index.blade.php
 * Path: c:\laragon\www\printee
 * Created Date: Thursday, June 25th 2020, 9:14:52 pm
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
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Amatic+SC:wght@700&display=swap"
    rel="stylesheet">

<!-- icon -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!-- Styles -->
<link href="{{ asset('css/transaction.css') }}" rel="stylesheet">
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
                        <div class=" d-flex font-weight-bold ">
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

            <div class="col-12 table-wrapper shadow-sm">
                <div class="table-title">
                    <div class="">
                        <div class="col-sm-6">
                            <h2>Transactions</h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Username</th>
                        <th>File</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    @forelse($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->username}}</td>
                        <td>{{$transaction->file}}</td>
                        <td>{{$transaction->description}}</td>
                        <td>{{$transaction->created_at}}</td>
                        <td>{{$transaction->status}}</td>
                    </tr>


                    @empty
                    <tr>
                        <td class="colspan-5">
                            No record
                        </td>
                    </tr>

                    @endforelse
                </table>

            </div>




        </div>

        <div class="pg-links col-12 ">
            {{$transactions->links()}}
        </div>

    </div>

</div>
@endsection