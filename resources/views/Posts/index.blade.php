@extends('layout')

@section('content')
@foreach($posts as $post)
@if($post->is_published)
<div style="border: 1px solid black;border-radius: 10px; margin-bottom:10px;padding:20px">
    <div style="display:flex">
        <div style="flex-grow: 1;">
            <h3>{{$post->post_title}}</h3>
        </div>
        <div>
            <h5> {{$post->created_at}}</h5>
        </div>
    </div>
    <div style="display:flex">
        <p>{{$post->post_detail}}</p>
    </div>
    <div style="display:flex">
        Reactions: {{$post->like_count}}
    </div>
</div>
@endif
@endforeach
@endsection