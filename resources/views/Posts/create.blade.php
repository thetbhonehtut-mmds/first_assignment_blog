@auth
@extends ('layout')
@section ('content')
<div id="content">
    <form method="POST" action="/posts">
        @csrf
        <div class="flex-box">
            <select>
                <option value="" disabled selected hidden>Select your option</option>
                @foreach($categories as $category){
                <option value="{{$category->name}}">{{$category->name}}</option>
                }
                @endforeach
            </select>
        </div>
        <div class="flex-box">
            <input id="title" name="post_title" type="text" placeholder="Title" />
        </div>
        <div class="flex-box">
            <textarea id="textarea" name="post_detail" rows="10" placeholder="Description"></textarea>
        </div>
        <div class="flex-box">
            <div style="flex-grow: 1;">

            </div>
            <div>
                <button class="cancel">Cancel</button>
            </div>
            <div>
                <button class="submit">Create Post</button>
            </div>
        </div>
    </form>

</div>

@endsection
@endauth