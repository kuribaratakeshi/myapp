<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class = "content__image">
                    <input type="file" name="post[image]">
                        <p class ="image__error" style = "color:red">{{$errors -> first('post.image')}}</p>
                </div>
                <div class="content__title">
                    <h2>Title</h2>
                        <input type="text" name="post[title]" value="{{ $post->title }}"/>
                    <p class ="title__error" style = "color:red">{{$errors -> first('post.title')}}</p>
                </div>
                <div class="content__body">
                    <h2>Caption</h2>
                        <input name="post[body]" value="{{ $post->body }}"></input>
                    <p class ="caption__error" style = "color:red">{{$errors -> first('post.body')}}</p>
                </div>

                <input type="submit" value="保存">
            </form>
        </div>
    </body>
    </html>