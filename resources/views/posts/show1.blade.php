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
        <p>{{$post->title}}</p>   
        <p>{{$images}}</p>   
                @foreach ($images as $image)
                
                    <img src="{{ $image->path }}"width="20%" height="20%" alt="画像が読み込めません。">
               
                @endforeach


    </body>
</x-app-layout>
    
</html>
