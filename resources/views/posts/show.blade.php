<?php

                
        $comments = array();
        
        foreach (\App\Models\Comment::where('article_id', $post->id)->get() as $index => $comment) {
            
            $comments[$index] = $comment->comment;
           
        }
        

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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <body class="bg-gray-100 min-h-screen flex items-center justify-center p-8">
                <div class="max-w-4xl w-full bg-white shadow-lg rounded-lg overflow-hidden">
                    <!-- 上半分：画像とコメント欄 -->
                    <div class="flex flex-col md:flex-row h-auto">
                    <!-- 画像部分 -->
                    <div class="md:w-1/2">

                                                
                            @foreach ($images as $image)
                            @if($image->path)
                                    <img 
                                    src="{{ $image->path }}" 
                                    alt="画像が読み込めません。" 
                                    class="object-cover w-full h-full"
                                    />
                            @endif
                            @endforeach
               
                       
                    </div>

                    <!-- コメント欄 -->
                    <div class="md:w-1/2 p-6 flex flex-col gap-4">
                        <h2 class="text-2xl font-bold mb-4">コメント</h2>
                                <!-- 過去のコメント表示エリア -->
                                <div 
                                id="comments" 
                                class="flex-1 overflow-y-auto max-h-48 border border-gray-300 rounded-lg p-4"
                                >
                                <!-- コメントがここに追加される -->
                                </div>

                                <form action="/posts/{{$post->id}}/comment" method="POST">
                                @csrf
                                
                                <textarea
                                    type="text" 
                                    name="comment"
                                    class="resize-none border border-gray-300 rounded-lg w-full h-40 p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="コメントを入力してください..."
                                ></textarea>
                                <button 
                                    type="submit"
                                    value="送信"
                                    class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg"
                                >
                                    送信
                                </button>

                                <p class ="image__error" style = "color:red">{{$errors -> first('comment')}}</p>
                                </form>



               

                    </div>
                    </div>

                    <!-- 下半分：タイトルと説明 -->
                    <div class="p-6 flex flex-col gap-4">
                    <h1 class="text-3xl font-bold" id="title"> {{ $post->title }}</h1>
                    <p class="text-gray-700 leading-relaxed" id="description">
                        {{ $post->body }}
                    </p>
                    </div>
                </div>


  <script>
    const commentsContainer = document.getElementById("comments");
    // コメントを初期化して表示する
    function loadComments() {

        
        const comments = <?php echo json_encode($comments); ?>;
        comments.forEach(comment => addCommentToList(comment));
    }

    // コメントリストにコメントを追加
    function addCommentToList(comment) {
      const commentElement = document.createElement("p");
      commentElement.classList.add("text-gray-800", "border-b", "pb-2", "mb-2", "last:border-b-0");
      commentElement.textContent = comment;
      commentsContainer.appendChild(commentElement);
    }

    // 新規コメントを送信する関数
    function addComment() {
      const newCommentInput = document.getElementById("newComment");
      const newComment = newCommentInput.value.trim();

      if (newComment) {
        addCommentToList(newComment); // コメント一覧に追加
        newCommentInput.value = "";  // 入力欄をクリア
      }
    }

    // ページ読み込み時にコメントを表示
    loadComments();
  </script>
                </body>
        </div>
    </div>
    

</x-app-layout>
    
</html>
