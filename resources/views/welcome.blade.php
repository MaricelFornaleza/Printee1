<!-- 
/*
 * Filename: c:\laragon\www\printee\resources\views\welcome.blade.php
 * Path: c:\laragon\www\printee
 * Created Date: Saturday, June 20th 2020, 1:59:35 pm
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

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/jpg" href="/img/P.png" />
    <title>Printee</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Amatic+SC:wght@700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Styles -->
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">

</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="navbar one-edge-shadow">

            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                @if (Auth::user()->type=='service')
                <a href="{{ route('admin.show', auth()->user()->id)}}">Dashboard</a>

                <a href="{{ route('transaction.show', auth()->user()->id)}}">Transactions</a>
                @elseif (Auth::user()->type=='user')
                <a href="{{ route('user.show', auth()->user()->id)}}">Dashboard</a>

                <a href="{{ route('transaction.view', auth()->user()->id)}}">Transactions</a>
                @endif
                @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
        <div class="d-flex first-con">
            <div class="col-6 textarea">
                <p class="w-msg">Welcome to Printee!</p>
                <div class="mySlides fade">
                    <p class="msg">A web application that collaborates with Printing Companies for a convenient printing
                        transactions.</p>
                </div>
                <div class="mySlides fade">
                    <p class="msg">Create your account and be part of the <br> Printee Communitee! </p>
                </div>
                <div class="mySlides fade">
                    <p class="msg">Have a printing shop? <br> Advertise your printing services through Printee.</p>
                </div>
                <div style="text-align:center; position: absolute; bottom: 10%;" class="center_text">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>

                @if (Route::has('login'))
                @auth
                <h1 class="hello">Hello {{auth()->user()->username}}!</h1>
                <p></p>
                @else
                <div class="">
                    <a href="{{ route('register') }}">
                        <div class="signup-btn">
                            <p class="text">Register</p>
                        </div>
                    </a>
                </div>
                <div class="login">
                    Already have an account? <br>Click here to <a href="{{ route('login') }}" class="log-text">Login</a>
                </div>

                @endauth
                @endif





            </div>
            <div class="col-6">
                <img src="/img/printer_bg.png" class="printer-bg" alt="">
            </div>

        </div>
    </div>

    <!-- end of first box -->
    <div class="second-con one-edge-shadow  ">
        <div class="c-3 d-flex">
            <div class=" box">
                <img src="/img/shops.png" alt="" class="icon-con">
                <div class="caption">
                    Partner with excellent printing companies in Naga City
                </div>
            </div>
            <div class=" box">
                <img src="/img/time.png" alt="" class="icon-con">
                <div class="caption">
                    Fast and Easy Transaction!
                </div>
            </div>
            <div class=" box">
                <img src="/img/truck.png" alt="" class="icon-con">
                <div class="caption">
                    Pick-up or Delivery options
                </div>
            </div>
        </div>

    </div>

    <!-- end of second box -->
    <div class="third-con">
        <div class="c-3 d-flex footer">
            <div class="comment">
                <img src="/img/P.png" alt="" class="foo-log">
            </div>
            <div class="about-us">
                <h3><strong>About </strong> </h3>
                <p>Printee is web based application that allows printing companies to promote their services.</p>
                <h5 class="dev"><strong>Developed By: MISSCL</strong></h5>
                <h6 class="name">Maricel L. Fornaleza</h6>
            </div>
            <div class="contact-us">
                <h3> <strong>Contact Us</strong> </h3>
                <p><i class="inline-icon material-icons">local_phone</i> 09772779609</p>
                <p><i class="inline-icon material-icons">email</i> maformaleza@gbox.adnu.edu.ph</p>
            </div>

        </div>
        <div class="container">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">

                <path fill="white" fill-opacity=".3"
                    d="M0,288L40,272C80,256,160,224,240,218.7C320,213,400,235,480,234.7C560,235,640,213,720,181.3C800,149,880,107,960,106.7C1040,107,1120,149,1200,144C1280,139,1360,85,1400,58.7L1440,32L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
                </path>

            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#000b76" fill-opacity=".3"
                    d="M0,160L48,176C96,192,192,224,288,240C384,256,480,256,576,240C672,224,768,192,864,197.3C960,203,1056,245,1152,245.3C1248,245,1344,203,1392,181.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="yellow" fill-opacity=".4"
                    d="M0,288L48,282.7C96,277,192,267,288,266.7C384,267,480,277,576,282.7C672,288,768,288,864,277.3C960,267,1056,245,1152,234.7C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>

        </div>

    </div>

    <script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 4000); // Change every 4 seconds
    }
    </script>
</body>

</html>