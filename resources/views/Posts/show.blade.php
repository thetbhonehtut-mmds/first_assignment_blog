@extends('layout')
@section('content')
<div id="content">
  <div id="title">
    <h2>{{$post->post_title}}</h2>
  </div>
  <div id="body" class="flex-box">
    <div id="reaction-box">
      @auth
      <button class="header">
        <i class="fa-regular fa-heart"></i>
      </button>
      @else
      <button class="header" disabled>
        <i class="fa-regular fa-heart"></i>
      </button>
      @endauth
      <center>

        <h5>{{$post->like_count}}</h5>
      </center>
    </div>
    <div style="flex-grow:1">
      <p>
        {{$post->post_detail}}
      </p>
    </div>

  </div>
</div>

@endsection