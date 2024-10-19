<?php

if (isset($_GET['search'])) {
  $search = htmlspecialchars($_GET['search']);
  $search_value = $search;
}else {
  $search = '';
  $search_value = '';
}
 $stmt = \App\Models\Article::where('title', 'like', '%'.$search.'%')->get();

 ?>
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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <body>
        <div class='articleserch'>
            
            <div class="footer">
                <a href="/">戻る</a>
            </div>

        <h1>記事の検索</h1>
            <form action="" method="get">
                <input type="text" name="search" value=""><br>
                <input type="submit" name="" value="検索">
            </form>
        </div>
        <div>
            @foreach ($stmt as $post)
                <h2>{{ $post->title }} </h2>
                @foreach (\App\Models\Image::find($post->article_images()->where('article_id',$post->id)->get('image_id')) as $post)
                @if($post->path)
                    <img src="{{ $post->path }}" width="10%" height="10%" alt="画像が読み込めません。">
                @endif
                @endforeach


            @endforeach

        </div>

    </body>
    </x-app-layout>
</html>
