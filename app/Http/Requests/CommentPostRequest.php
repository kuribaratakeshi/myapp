<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentPostRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'comment' => 'required|string|max:200'
        ];
    }


    
}
