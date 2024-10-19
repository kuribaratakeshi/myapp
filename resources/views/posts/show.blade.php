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
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
                
                @foreach ($images as $image)
                @if($image->path)
                    <img src="{{ $image->path }}"width="20%" height="20%" alt="画像が読み込めません。">
                @endif
                @endforeach
               
            </div>
        </div>
        <div class ="comment">
        <h1>コメント</h1>
            <form action="/posts/{{$post->id}}/comment" method="POST">
            @csrf
                <input type="text" name="comment" placeholder="タイトル"/>
                <input type="submit"  value="送信">

                <p class ="image__error" style = "color:red">{{$errors -> first('comment')}}</p>
            </form>

        </div>
        <div class = "comments">
        <h1>コメント欄</h1>
                @foreach (\App\Models\Comment::where('article_id',$post->id)->get() as $comment)
                    <p>{{ $comment->comment }}</p>    
                @endforeach
        


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
