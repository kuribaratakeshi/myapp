<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\Image;
use App\Models\Article_Image;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Cloudinary;
use App\Http\Requests\PostRequest; 
use App\Http\Requests\CommentPostRequest; 


class PostController extends Controller
{
    //



    public function index(Article $article)//インポートしたArticleをインスタンス化して$postとして使用。
    {
        return view('posts.index')->with(['posts' => $article->getPaginateByLimit()]);  
    }


    //web.phpのgetの名前({post}のような)にArticleの名前を一致させる必要がある

    public function show(Article $post)
    {


        //$res = glob('./images/*');
        //function console_log($data){
        //    echo '<script>';
        //    echo 'console.log('.json_encode($data).')';
        //    echo '</script>';
        //}
        //var_dump($res);
        
        
        return view('posts.show')->with(['post' => $post]);
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
       // function console_log($data){
         //   echo '<script>';
         //   echo 'console.log('.json_encode($data).')';
       //     echo '</script>';
        //}
        

        $input = $request['post'];
        
       // console_log(count($input["image"], COUNT_RECURSIVE));
  
        
        //if (! file_exists ( 'images' )) {
        //    mkdir ( 'images' );
        //}


        $article  = new Article;
        //$user = User::all()->first();
        $user = Auth::user();
        //dump($user);
        //dd(Auth::user());
        //dd($user);

        $article->user_id = $user->id;
        $article->fill($input)->save();

        
        //$temp_file = $input["image"] ;
        //$dir = './images/';
        //$image_name = uniqid(mt_rand(),false);
        //$image_name .= '.png';


                
        //move_uploaded_file($temp_file, $dir . $image_name);
        //$image_list = new Image;
        //$image_list-> fill(['image'=> $image_name]) ;
        //$image_list ->save();
              
        foreach($input["image"] as $key => $image_value){

            //$image_name = uniqid(mt_rand(),false);
            //$image_name .= '.png';

            
            //move_uploaded_file($temp_value, $dir . $image_name);

            $image_url = Cloudinary::upload($image_value->getRealPath())->getSecurePath();


            $image_list = new Image;
            $image_list-> fill(['path'=> $image_url ]) ;
            $image_list ->save();


            $article_image  = new Article_Image;
            $article_image -> fill(['article_id'=> $article->id]);
            $article_image -> fill(['image_id'=> $image_list->id]);
            $article_image ->save();

        }



        return redirect('/posts/' . $article->id);
    }


    public function comment(Article $post,CommentPostRequest $request)
    {
        $comment  = new comment;
        $user = Auth::user();
        $comment->user_id = $user->id;
        $comment->article_id = $post ->id;
        $comment->comment =$request->comment;
        $comment->save();

        return redirect('/posts/'.$post->id);
    }



    public function edit(Article $post)
    {

        return view('posts.edit')->with(['post' => $post]);

    }

    public function update(PostRequest $request,Article $post)
    {
        
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);

    }

    public function delete(Article $post)
    {
        $post->delete();
        return redirect('/');
        
    }


}
