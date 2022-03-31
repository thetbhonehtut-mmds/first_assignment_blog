@extends('layout')
@section('content')
<div id="title">
  <h2>{{$post->post_title}}</h2>
</div>
<div id="body" style="display:flex">
  <div id="reaction-box">
    <button class="header">
      <i class="fa-regular fa-heart"></i>
    </button>
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
@endsection