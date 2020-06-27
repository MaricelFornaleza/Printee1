@extends('layouts.app')
<style>
.text-caption{
   
    padding: 10px;
    height: 60px;
    background-color:rgba(0, 0, 0, 0.5);
    color: white;
    position: relative;
    bottom: 60px;
    width:100%;
}
.img-con, .text-caption{
    transition: .5s ease;
    backface-visibility: hidden;
    background-color: none;
    
}
.img-con:hover .image, .img-con:hover .text-caption{
  opacity: 0.3;
}
.img-con:hover .middle {
  opacity: 1;
}
.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}
.edit-action {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
  margin-bottom: 10px;
  border-radius: 10px;
}
.delete-action {
  background-color: red;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
  border-radius: 10px;

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
                    <a href="/post/create">Add New Post</a>
                    
                </div>
                <div class="d-flex">
                    <div class = "pr-5"><strong></strong> posts</div>
                    <div class = "pr-5"><strong>23k</strong> transactions</div>
                    
                </div>
                <div class="pt-4 font-weight-bold">{{ $user->email }}</div>
                <div>{{ $user->phone }}</div>
                <div> {{ $user->address }}</div>
            </div>
        


        <!-- for posts -->

        <div class="col-12 two-edge-shadow mb-3">
            <h1>Posts</h1>
        </div>
        @foreach($posts as $post)
            <div class="col-4  pb-3 w-100" >
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
        @endforeach
    {{$posts->links()}}

    </div>
        

        
    </div>
    
</div>
@endsection
