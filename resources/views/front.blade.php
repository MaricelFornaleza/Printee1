<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/jpg" href="/img/bg.png"/>
        <title>Printee</title>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
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
                                
                                <a  href="{{ route('transaction.show', auth()->user()->id)}}">Transactions</a>    
                            @elseif (Auth::user()->type=='user')
                                <a href="{{ route('user.show', auth()->user()->id)}}">Dashboard</a>
                                
                                <a  href="{{ route('transaction.view', auth()->user()->id)}}">Transactions</a> 
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
                        <p class="msg">A web application that collaborates with Printing Companies for a convenient printing transactions.</p>   
                    </div>
                    <div class="mySlides fade">
                        <p class="msg">Create your account and be part of the  <br> Printee Communitee! </p>   
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

                            @else
                            <div class="">
                                <a href="{{ route('register') }}">
                                    <div class="signup-btn">
                                        <p class="text">Register</p> 
                                    </div>
                                </a>
                            </div>
                            <div class="login">
                                            Already have an account? <br>Click here to  <a href="{{ route('login') }}" class="log-text">Login</a>
                                        </div>

                            @endauth
                    @endif



                    

                </div>
                <div class="col-6">
                    <img src="/img/printer_bg.png" class="printer-bg" alt="" >
                </div>

            </div>
        </div>      

            <!-- end of first box -->
            <div class="second-con">


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
           if (slideIndex > slides.length) {slideIndex = 1}    
               for (i = 0; i < dots.length; i++) {
                   dots[i].className = dots[i].className.replace(" active", "");
               }
               slides[slideIndex-1].style.display = "block";  
               dots[slideIndex-1].className += " active";
               setTimeout(showSlides, 4000); // Change every 4 seconds
           }

       
       </script>
    </body>
</html>
