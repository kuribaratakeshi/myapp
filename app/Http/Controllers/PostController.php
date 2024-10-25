<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\Image;
use App\Models\Article_Image;
use App\Models\Comment;
use App\Models\Comment_Score;
use Illuminate\Support\Facades\Auth;
use Cloudinary;
use App\Http\Requests\PostRequest; 
use App\Http\Requests\CommentPostRequest; 


class PostController extends Controller
{
    
    public function index(Article $article)//インポートしたArticleをインスタンス化して$postとして使用。
    {
        return view('posts.index')->with(['posts' => $article->getPaginateByLimit()]);  
    }


    public function myindex(Article $article)//インポートしたArticleをインスタンス化して$postとして使用。
    {
        $user = Auth::user();
       
        return view('posts.myindex')->with(['posts' => $article->getMyPaginateByLimit(10,$user->id)]);  
    }

    //web.phpのgetの名前({post}のような)にArticleの名前を一致させる必要がある

    public function show(Article $article)
    {   

        //$image = $article->article_images()->where('article_id',$article->id)->get('image_id');
        $post = $article::with('images')->findOrfail($article->id);
        $images = $post->images;
        //dd($images);
        
        return view('posts.show')->with(['post' => $article ,'images' =>$images]);
    }

    public function create()
    {
        return view('posts.create');

    }
    public function serch(Article $article)
    {
        return view('posts.serch');
    }

    public function store(PostRequest $request)
    {   
        $input = $request['post'];
        $article  = new Article;
        $user = Auth::user();
        $article->user_id = $user->id;
        $article->fill($input)->save();
        foreach($input["image"] as $key => $image_value) {
            $image_url = Cloudinary::upload($image_value->getRealPath())->getSecurePath();
            $image = new Image;
            $image->path = $image_url;
            $image->save();
            $article_image  = new Article_Image;
            $article_image->article_id = $article->id;
            $article_image->image_id = $image->id;
            $article_image->save();
        }

        return redirect('/posts/' . $article->id);
    }

    public function testcomment()
    {
        $score = new Comment_Score;
        $a = $score->get();
        
        dd($a);


        $comments = Auth::user()->comments;


    }

    public function comment(Article $article,CommentPostRequest $request)
    {
        $comment  = new comment;
        $user = Auth::user();
        $comment->user_id = $user->id;
        $comment->article_id = $article ->id;
        $comment->comment =$request->comment;
        $comment->save();

        return redirect('/posts/'.$article->id);
    }



    public function edit(Article $article)
    {

        return view('posts.edit')->with(['post' => $article]);

    }

    public function update(PostRequest $request,Article $article)
    {
        
        $input_post = $request['post'];
        $article->fill($input_post)->save();

        return redirect('/posts/' . $article->id);

    }

    public function delete(Article $article)
    {
        $article->delete();
        return redirect('/posts/myindex');
        
    }


}
