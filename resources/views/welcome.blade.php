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

        <!-- icon -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        
        <!-- Styles -->
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        
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
            <div class="content">
                
                <div class="parent">
                    <div class="welcome  foldtl two-edge-shadow">
                        <img src="img/bg.png" alt=""  class="bg center_text">
                        <div class="title_shad center_text">
                            2020
                        </div>
                        <div class="title center_text">
                            P R I N T E E
                        </div>
                        <div class="subtitle center_text">
                            You send it, we print it.
                        </div>
                        <div class="subtext center_text">
                            by MissCL
                        </div>
                    </div>
                    <div class="next_div  two-edge-shadow">
                        <div class="carousel center_text">
                            <div class="mySlides fade">
                            <i class="material-icons center_text print" >print</i>
                            <div class="text center_text">Partner with excellent printing companies in Naga City.</div>
                            </div>

                            <div class="mySlides fade">
                            <i class="material-icons center_text print" >receipt_long</i>
                            <div class="text center_text">Fast Transaction! Send it now, get it later.</div>
                            </div>

                            <div class="mySlides fade">
                            <i class="material-icons center_text print" >local_shipping</i>
                            
                            <div class="text center_text">Pick-up or Delivery options</div>
                            </div>

                        
                        <br>

                        <div style="text-align:center; position: absolute; bottom: 10%;" class="center_text">
                            <span class="dot"></span> 
                            <span class="dot"></span> 
                            <span class="dot"></span> 
                        </div>

                        @if (Route::has('login'))
                            <div class="buttons center_text">
                                @auth
                                    <h2 class="welcome_msg">Hello {{ auth()->user()->name}}! <br> Welcome to Printee.</h2>
                                    <a href="{{ route('admin.show', auth()->user()->id)}}"><button class="register center_text">
                                    Go to Dashboard
                                    </button></a>
                                @else
                                        <a href="{{ route('register') }}"><button class="register center_text">
                                            REGISTER
                                        </button></a>
                                        <div class="login center_text">
                                            Already have an account? Click here to <a href="{{ route('login') }}" class="log-text">Login</a>
                                        </div>
                                @endauth
                            
                            </div>
                        @endif
                           
                        </div>
                    </div>
                
                </div>
                

                
            </div>
        </div>


        <!-- scripts -->
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
                setTimeout(showSlides, 2000); // Change image every 2 seconds
            }

        
        </script>
    </body>
</html>
