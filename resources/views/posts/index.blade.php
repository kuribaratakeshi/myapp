<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Article</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    </head>

<x-app-layout>
    <x-slot name="header">
    Article Index
    </x-slot>

    <body>
        <h2>
        <a href="/posts/serch">検索</a>
        </h2>
        <h2>
        <a href='/posts/create'>create</a>
        </h2>

        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='name'>{{ Auth::user()->name }}</h2>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <h1>画像表示</h1>
                
                @foreach (\App\Models\Image::find($post->article_images()->where('article_id',$post->id)->get('image_id')) as $post)
                @if($post->path)
                    <img src="{{ $post->path }}" width="10%" height="10%" alt="画像が読み込めません。">
                @endif
                @endforeach
                    
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>

                </div>

            @endforeach
        </div>
        
        <div class='paginate'>
            {{ $posts->links() }}
        </div>

        <script>
            function deletePost(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</x-app-layout>
   
</html>

