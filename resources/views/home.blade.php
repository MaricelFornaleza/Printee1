<!-- 
/*
 * Filename: c:\laragon\www\printee\resources\views\home.blade.php
 * Path: c:\laragon\www\printee
 * Created Date: Saturday, June 20th 2020, 6:01:09 pm
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

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection