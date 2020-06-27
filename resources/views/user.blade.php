@extends('layouts.app')
<style>
.card {
  /* Add shadows to create the "card" effect */
  width:250px !important;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}
.create{
    width: 100%;
    padding: 5px;
    color: white;
    background: green;
    margin-bottom: 10px;
    outline: none;
    border: none;
    height: 50px;
}
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
                    <div class = "pr-5"><strong>23k</strong> transactions</div>
                    
                </div>
                <div class="pt-4 font-weight-bold">{{ $user->email }}</div>
                <div>{{ $user->phone }}</div>
                <div> {{ $user->address }}</div>
            </div>
        
        <!-- for shops -->
        <h1>Available Printing Shops</h1>

        </table>

        <div class="d-row-head align-middle">
            @foreach ($userlist as $users)
            <div class="col-4">
                <div class="card m-4 ">
                    <img src="https://cdn.pixabay.com/photo/2018/04/18/18/56/user-3331256__340.png" alt="Avatar" style="width:100%">
                    <div class="container">
                        <h4><b>{{$users -> username}}</b></h4>
                        <p>{{$users -> phone}} <br>
                            {{$users -> address}} <br>
                            {{$users -> email}}</p>
                        <a href="/transaction/upload/{{$users -> id}}">
                            <button class="create">
                                Create Transaction
                            </button>
                        </a>
                    </div>

                </div>
                
            </div>
            
            @endforeach
            
        </div>
        {{ $userlist->links() }}

 

    </div>
        

        
    </div>
    
</div>
@endsection
