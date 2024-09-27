<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image'
    ];
    
    public function article_images()
    {
        return $this->hasMany(Article_Image::class);  

    }

}
