@extends('layout')
@section('content')
<div id="content">
  <div id="title">
    <h2>{{$post->post_title}}</h2>
  </div>
  <div id="body" class="flex-box">
    <div class="reaction-box">
      @auth
      <form method="POST" action="/posts/{{$post->id}}/react">
        @csrf
        <input type="hidden" name="post_id" value="{{$post->id}}" />
        <div>
          <button class="header handle-react">
            <i class="fa-regular fa-heart"></i>
          </button>
        </div>
      </form>
      @else
      <div>
        <button class="header" disabled>
          <i class="fa-regular fa-heart"></i>
        </button>
      </div>
      @endauth
      <center>
        <h5>{{$post->like_count}}</h5>
      </center>
    </div>
    <div class="flex-grow">
      <p class="show">
        {{$post->post_detail}}
      </p>
    </div>

  </div>

</div>
<!-- 
  <script type="text/javascript">
        $('.handle-react').click(function(event) {
            event.preventDefault();

            let post_id = $("input[name=post_id]").val();
            let user_id = $("input[name=user_id]").val();
            console.log(user_id)
        })
    </script> -->

@endsection