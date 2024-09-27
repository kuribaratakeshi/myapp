<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST"enctype="multipart/form-data">
            @csrf
            <div class = "image">
                <input type="file" name="post[image]">
                <p class ="image__error" style = "color:red">{{$errors -> first('post.image')}}</p>
            </div>
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/>
                <p class ="title__error" style = "color:red">{{$errors -> first('post.title')}}</p>
            </div>
            <div class="body">
                <h2>Caption</h2>
                <textarea name="post[body]" placeholder="キャプション"></textarea>
                <p class ="caption__error" style = "color:red">{{$errors -> first('post.body')}}</p>
            </div>
            <input type="submit" value="アップロード"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>