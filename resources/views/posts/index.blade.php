@extends('layout')
@section('content')
<div id="content">
    @foreach($posts as $post)
    @auth
    @if($post->is_published or $post->user_id==Auth::user()->id)
    <div style="border: 1px solid black;border-radius: 10px; margin-bottom:10px;padding:20px">
        <div class="flex-box">
            <div style="flex-grow: 1;">
                <h3>{{$post->post_title}}</h3>
            </div>
            <div>
                <h4>
                    Author:: {{$post->user->name}} | Last Edited :: {{$post->created_at}}

                </h4>
            </div>
        </div>
        <hr />
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
    @endif
    @else
    @if($post->is_published)
    <div style="border: 1px solid black;border-radius: 10px; margin-bottom:10px;padding:20px">
        <div class="flex-box">
            <div style="flex-grow: 1;">
                <h3>{{$post->post_title}}</h3>
            </div>
            <div>
                <h4>
                    Author::{{$post->user->name}} | {{$post->created_at}}
                </h4>
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
    @endif
    @endauth
    @endforeach

</div>

@endsection

<!-- <div id="reaction-box">
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
            </div> -->