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
                @foreach ($post->article_images as $image)
                {{$image}}
                    @foreach ($image->image() as $picture)
                    <h1>{{$picture}}</h1>
                    @endforeach
              

                @endforeach
                <img src="../images/{{$post->path }}" width=auto height="400">
                <h2 class='imgname'>{{$post->path }}</h2>



            @endforeach
            <?php foreach ($stmt as $post): ?>
            <p><strong>記事の名前</strong><br>
            <?php echo $post['title'] ?><br>
                    @foreach (\App\Models\Image::find($post->article_images()->where('article_id',$post->id)->get('image_id')) as $post)
                    <img src="../images/{{$post->path }}" width=auto height="400">
                    <h2 class='imgname'>{{$post->path }}</h2>
                    @endforeach
            <?php endforeach; ?>
        </div>

    </body>
</html>
