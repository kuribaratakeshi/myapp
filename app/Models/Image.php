<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path'
    ];
    
    public function article_images()
    {
        return $this->hasMany(Article_Image::class);  

    }
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

}
