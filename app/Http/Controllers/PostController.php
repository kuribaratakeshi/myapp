<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
class PostController extends Controller
{
    //


    public function index(Article $article)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view('posts.index')->with(['posts' => $article->getPaginateByLimit()]);  
    }


    public function show(Article $post)
    {

        return view('posts.show')->with(['post' => $post]);
    }

}
