<!-- 
/*
 * Filename: c:\laragon\www\printee\resources\views\transaction\show.blade.php
 * Path: c:\laragon\www\printee
 * Created Date: Saturday, June 27th 2020, 11:23:13 am
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
                            <strong>{{$count}}</strong>
                        </p>

                        <p class="label">TRANSACTIONS</p>
                    </div>

                </div>
            </div>

            <div class="col-12  pb-3">
                <div class=" d-flex font-weight-bold">
                    <h2 class="username">{{ $user->username }}</h2>
                    <a href="/admin/{{$user->id}}/edit"><i class=" material-icons pr-2">edit</i>
                    </a>
                </div>

                <div class="font-weight-bold">{{ $user->email }}</div>
                <div>{{ $user->phone }}</div>
                <div> {{ $user->address }}</div>
            </div>

            <div class="col-12 mt-4 mb-4 p-0">

                <!-- tabs -->
                <button class="tablink" onclick="openPage('Request', this, '#3a0268')"
                    id="defaultOpen">Requests</button>
                <button class="tablink" onclick="openPage('Queue', this, '#5e0782')">Queue</button>
                <button class="tablink" onclick="openPage('Completed', this, '#a727c2')">Completed</button>

                <div id="Request" class="tabcontent">

                    <p class="note">Here are the requests from our valued customers. <br> Click accept and start
                        printing!</p>
                    <table class="table table-striped table-hover">

                        <tr class="">
                            <th>Username</th>
                            <th>File</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th class="colspan-2">Action</th>
                        </tr>
                        @forelse($transactions as $transaction)
                        @if($transaction->status=='request')
                        <tr>
                            <td>{{$transaction->name}}</td>
                            <td>{{$transaction->file}}</td>
                            <td>{{$transaction->description}}</td>
                            <td>{{$transaction->created_at}}</td>
                            <td>{{$transaction->status}}</td>
                            <td>
                                <div class="d-flex ">
                                    <form action="/transaction/{{$transaction->id}}" enctype="multipart/form-data"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="queue" name="status">
                                        <button class="btn btn-primary mr-2">Accept</button>
                                    </form>
                                    <form action="/transaction/{{$transaction->id}}" enctype="multipart/form-data"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="cancelled" name="status">
                                        <button class="btn btn-primary">Decline</button>
                                    </form>

                                </div>

                            </td>

                        </tr>
                        @endif

                        @empty
                        <tr class="">
                            <td class="colspan-5">
                                No record found
                            </td>
                        </tr>

                        @endforelse
                    </table>

                </div>

                <div id="Queue" class="tabcontent">
                    <p class="note">Download the file! <br> Click finish when done.</p>


                    <table class="table table-striped table-hover">

                        <tr class="">
                            <th>Username</th>
                            <th>File</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        @forelse($transactions as $transaction)
                        @if($transaction->status=='queue')
                        <tr>
                            <td>{{$transaction->name}}</td>
                            <td>{{$transaction->file}}</td>
                            <td>{{$transaction->description}}</td>
                            <td>{{$transaction->created_at}}</td>
                            <td>{{$transaction->status}}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="/transaction/{{$transaction->id}}" enctype="multipart/form-data"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="completed" name="status">
                                        <button class="btn btn-primary mr-2 pt-2 pb-2">Finish</button>
                                    </form>
                                    <a href="{{ Storage::url($transaction->file) }}" download="{{$transaction->file}}">
                                        <button type="button" class="btn btn-primary "><i
                                                class="material-icons">cloud_download</i></button>
                                    </a>
                                </div>


                            </td>

                        </tr>
                        @endif

                        @empty
                        <tr class="">
                            <td class="colspan-5">
                                No record found
                            </td>
                        </tr>

                        @endforelse
                    </table>
                </div>

                <div id="Completed" class="tabcontent">
                    <p class="note">Successfull transactions. <br> Keep it up!.</p>


                    <table class="table table-striped table-hover">

                        <tr class="">
                            <th>Username</th>
                            <th>File</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Status</th>


                        </tr>
                        @forelse($transactions as $transaction)
                        @if($transaction->status=='completed')
                        <tr>
                            <td>{{$transaction->name}}</td>
                            <td>{{$transaction->file}}</td>
                            <td>{{$transaction->description}}</td>
                            <td>{{$transaction->created_at}}</td>
                            <td>{{$transaction->status}}</td>



                        </tr>
                        @endif

                        @empty
                        <tr>
                            <td class="colspan-5">
                                No record found
                            </td>
                        </tr>

                        @endforelse
                    </table>
                </div>
                <!-- endtabs -->

            </div>



        </div>

    </div>

</div>
@endsection

<script>
function openPage(pageName, elmnt, color) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove the background color of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }

    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";

    // Add the specific color to the button used to open the tab content
    elmnt.style.backgroundColor = color;
}

window.onload = function(e) {
    document.getElementById("defaultOpen").click();
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>