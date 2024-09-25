<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{

    use SoftDeletes;
    use HasFactory;
    

    protected $fillable = [
        'user_id',
        'title',
        'body'
    ];
    
    

    
 
    public function getPaginateByLimit(int $limit_count = 1)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }


    public function user()
    {
        return $this->belongsTo(User::class);  

    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);  

    }
    public function comments()
    {
        return $this->hasMany(Comment::class);  

    }

    public function article_images()
    {
        return $this->hasMany(Article_Image::class);  

    }
    public function article_tags()
    {
        return $this->hasMany(Article_Tag::class);  

    }
    public function article_stamps()
    {
        return $this->hasMany(Article_Stamp::class);  

    }
}
