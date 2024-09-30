<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
                <h2 class='imgname'>あれ{{\App\Models\Image::find($post->article_images()->where('article_id',$post->id)->get('image_id'))->count() }}</h2>
                @foreach (\App\Models\Image::find($post->article_images()->where('article_id',$post->id)->get('image_id')) as $post)
                    <h2 class='imgname'>{{$post->path }}</h2>
                    <img src="../images/{{$post->path }}" width=auto height="600">
                @endforeach



            </div>
        </div>
        <div class="edit">
            <a href="/posts/{{ $post->id }}/edit">edit</a>
        </div>

        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
