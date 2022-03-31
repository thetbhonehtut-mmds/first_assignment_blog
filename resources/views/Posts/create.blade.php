<!DOCTYPE html>
<html>
    <header>

    </header>

    <body>
    <div>
        <form method="POST" action="/posts">
            <div>
                <label for="title"><span>Title</span></label>
                <input id="title" type="text" name="post_title">
            </div>

            <div>
                <lable for="detail"><span></span></lable>
                <textarea id="detail" name="post_detail"></textarea>
            </div>

            <div>
                <input type="text" name="category_id">

            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
    </body>
</html>