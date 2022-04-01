@extends('layout')
@section('loop-content')
<div style="border: 1px solid black;border-radius: 10px; margin-bottom:10px;padding:20px">
    <div class="flex-box">
        <div style="flex-grow: 1;">
            <h3>{{$post->post_title}}</h3>
        </div>
        <div>
            <h4>
                Author::{{Auth::user()->name}}
            </h4>
        </div>
        <div>
            <h5> {{$post->created_at}}</h5>
        </div>
    </div>
    <div class="flex-box">

        <p class="index">{{$post->post_detail}}</p>
    </div>
    <div class="flex-box">
        <div class="flex-grow">
            Reactions: {{$post->like_count}}
        </div>
        <div>
            <a href="/posts/{{$post->id}}">
                See Post &gt;&gt;
            </a>
        </div>
    </div>
</div>
<hr />
@endsection