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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <body>

    <button 
                class="bg-red-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded"
                type="button" onclick="location.href = '/posts/create'">create</button> 

        <div >
            @foreach ($posts as $post)
                <div>
                    <h2 class='name'>{{ Auth::user()->name }}</h2>
                    <button 
                    class="bg-red-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded"
                    type="button" onclick="location.href = '/posts/{{ $post->id }}'">{{ $post->title }}</button> 
                    </form>
                
                @foreach ( $post->images as $image)
                @if($image->path)

                <div class="aspect-w-1 aspect-h-1 ">
                    <img    class=" object-cover w-full h-full rounded-lg shadow-md" src="{{ $image->path }}" alt="画像が読み込めません。"/>
                </div>

                   
                @endif
                @endforeach
                    
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button 
                    class="bg-red-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded"
                    type="button" onclick="deletePost({{ $post->id }})">delete</button> 
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

