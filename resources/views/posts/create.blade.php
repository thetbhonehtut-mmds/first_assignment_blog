@extends ('layout')
@section ('content')
<div id="content">
    <form method="POST" action="/posts">
        @csrf
        <div class="flex-box">
            <div style="float: left;flex-grow:1">
                <select id="categories" name="category_id">
                    <option value="" disabled selected hidden>Select your option</option>
                    @foreach($categories as $category){
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    }
                    @endforeach

                </select>
            </div>

            <div style="float:right;flex-grow: 1;">
                <div style="float:right;width:50%">
                    <select id="audience" name="is_published">
                        <option value=1>Public</option>
                        <option value=0>Private</option>

                    </select>
                </div>



            </div>
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
                <button class="submit" type="submit">Create Post</button>
            </div>
        </div>
    </form>

</div>

@endsection