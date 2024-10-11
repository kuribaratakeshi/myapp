<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{


    public function rules(): array
    {
        return [
            'post.image'=>'required|array',
            'post.image.*' => '|image|mimes:jpeg,png,jpg|max:25000',
            'post.title' => 'required|string|max:100',
            'post.body' => 'required|string|max:400',
        ];
    }

    public function messages()
    {
        return[
            'post.body.required'=>'キャプションを記入してください。',
            'post.title.required'=>'タイトルを記入してください。',
            'post.image.required'=>'画像を選択してください。',
            'post.image.*.max'=>'25MBを超えるファイルはアップロードできません。',
            'post.image.*.image'=>'ファイル形式がちがう',
            'post.image.*.mimes'=>'画像の拡張子',
        ];
    }
    



}
