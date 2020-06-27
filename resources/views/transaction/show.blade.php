@extends('layouts.app')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
/* Set height of body and the document to 100% to enable "full page tabs" */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 33.3%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 20px;
  height: 100%;
  width: 100%;
}


#Request {background-color: green;}
#Queue {background-color: blue;}
#Completed {background-color: orange;}
#defaultOpen{display:block;}

</style>
@section('content')
<div class="container-small ">
    <div class="row bg-white shadow-sm">
        
        <section class="first shadow-sm align-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f76c6c" fill-opacity="1" d="M0,288L80,288C160,288,320,288,480,266.7C640,245,800,203,960,208C1120,213,1280,267,1360,293.3L1440,320L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
            </svg>
        </section>
        <section class="second align-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f8e9a1" fill-opacity="0.6" d="M0,64L80,58.7C160,53,320,43,480,42.7C640,43,800,53,960,90.7C1120,128,1280,192,1360,224L1440,256L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
            </svg>
        </section>

        <div class="d-row-head align-middle">
            <div class="col-3 p-5">
                <img src="https://cdn.pixabay.com/photo/2018/04/18/18/56/user-3331256__340.png" class="rounded-circle" style="height: 200px; width: 200px;">
            </div>
            <div class="col-9 pt-5">

                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>  
                </div>

                <div class="d-flex">
                    <div class = "pr-5"><strong></strong> posts</div>
                    <div class = "pr-5"><strong>23k</strong> transactions</div>  
                </div>

                <div class="pt-4 font-weight-bold">{{ $user->email }}</div>
                <div>{{ $user->phone }}</div>
                <div> {{ $user->address }}</div>
            </div>
        
            <div class="col-12">

                 <!-- tabs -->
                <button class="tablink" onclick="openPage('Request', this, 'green')" id="defaultOpen">Requests</button>
                <button class="tablink" onclick="openPage('Queue', this, 'blue')">Queue</button>
                <button class="tablink" onclick="openPage('Completed', this, 'orange')">Completed</button>

                <div id="Request" class="tabcontent">
                    <h3>Request</h3>
                        <table class="w3-table-all w3-hoverable">
                            <tr class="w3-light-grey">
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
                                    <form action="/transaction/{{$transaction->id}}" enctype="multipart/form-data" method="post">
                                    @csrf 
                                    @method('PUT')
                                        <input type="hidden" value="queue" name="status">
                                        <button class="btn btn-primary">Accept</button>
                                    </form>
                                     |<form action="/transaction/{{$transaction->id}}" enctype="multipart/form-data"method="post">
                                    @csrf 
                                    @method('PUT')
                                        <input type="hidden" value="cancelled" name="status">
                                        <button class="btn btn-primary">Decline</button>
                                    </form>
                                </td>
                                        
                                    </tr>
                                @endif

                            @empty
                            <tr>
                                <td class="colspan-5">
                                    No record
                                </td>
                            </tr>
                                
                            @endforelse
                    </table>

                </div>

                <div id="Queue" class="tabcontent">
                    <h3>Queue</h3>
                    <table class="w3-table-all w3-hoverable">
                        <tr class="w3-light-grey">
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
                                    <form action="/transaction/{{$transaction->id}}" enctype="multipart/form-data"method="post">
                                    @csrf 
                                    @method('PUT')
                                        <input type="hidden" value="completed" name="status">
                                        <button class="btn btn-primary">Finish</button>
                                    </form>
                                    <a href="/storage/uploads/{{$transaction->file}}" download="{{$transaction->file}}">
        <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download">Download</i></button>
        </a>
                                    </td>
                                    
                                </tr>
                            @endif

                        @empty
                        <tr>
                            <td class="colspan-5">
                                No record
                            </td>
                        </tr>
                            
                        @endforelse
                    </table>
                </div>

                <div id="Completed" class="tabcontent">
                    <h3>Completed</h3>
                    <table class="w3-table-all w3-hoverable">
                        <tr class="w3-light-grey">
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
                                No record
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

    window.onload = function(e){ 
        document.getElementById("defaultOpen").click();
    }   

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
  

</script>