@extends('layout')

@section('content')
<div id="content">
    @foreach($posts as $post)
    @if($post->is_published)
    <div style="border: 1px solid black;border-radius: 10px; margin-bottom:10px;padding:20px">
        <div class="flex-box">
            <div style="flex-grow: 1;">
                <h3>{{$post->post_title}}</h3>
            </div>
            <div>
                <h5> {{$post->created_at}}</h5>
            </div>
        </div>
        <div class="flex-box">
            <p>{{$post->post_detail}}</p>
        </div>
        <div class="flex-box">
            Reactions: {{$post->like_count}}
        </div>
    </div>
    @endif
    @endforeach
</div>

@endsection