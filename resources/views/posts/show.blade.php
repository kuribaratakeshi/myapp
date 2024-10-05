<!DOCTYPE HTML>
<html lang="ja">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>

    <x-app-layout>
    <x-slot name="header">
        　（ヘッダー名）
</x-slot>
   
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
                @foreach (\App\Models\Image::find($post->article_images()->where('article_id',$post->id)->get('image_id')) as $post)
                @if($post->path)
                    <img src="{{ $post->path }}"width="20%" height="20%" alt="画像が読み込めません。">
                @endif
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
</x-app-layout>
    
</html>
