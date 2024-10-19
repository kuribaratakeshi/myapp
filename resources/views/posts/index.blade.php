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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("index") }}
                </div>
               
                <button 
                class="bg-red-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded"
                type="button" onclick="location.href = '/posts/create'">
                create
                </button> 
            </div>
        </div>
    </div>
    
    <body class="bg-gray-100 min-h-screen flex items-center justify-center">

 
   
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-7 gap-4 p-4">

                    @foreach ($posts as $post)
                        <div>       
                        
                            @foreach (  $post->images as $index=> $image)
                                @if($image->path)
                                    @if($index < 1)
                            <div    class="relative max-w-xs overflow-hidden bg-cover bg-no-repeat"
                                    data-twe-ripple-init
                                    data-twe-ripple-color="light"   >
                        
                                
                                <div class="aspect-w-1 aspect-h-1 ">
                                    <img  src="{{ $image->path }}" alt="画像が読み込めません。" class="object-cover w-full h-full rounded-lg shadow-md" />
                                </div>

                                <a href='/posts/{{ $post->id }}'>
                                    <div
                                    class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsl(0,0%,98.4%,0.2)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
                                    </div>
                                </a>
                                <h2 class='name'>{{ $post->title }}</h2>
                                <h2 class='name'>{{ $post->user->name }}</h2>     
                                

                            </div>
                                    @endif
                                @endif
                            @endforeach
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

