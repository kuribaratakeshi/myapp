<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article_Image extends Model
{
    use HasFactory;

    protected $table ='article_image';

    protected $fillable = [
        'article_id',
        'image_id'
    ];
    
    public function article()
    {
        return $this->belongsTo(Article::class); 
    }

    public function image()
    {
        return $this->belongsTo(Image::class); 
    }
}
