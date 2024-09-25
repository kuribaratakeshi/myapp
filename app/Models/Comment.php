<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'article_id',
        'comment'
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);  

    }
    
    public function article()
    {
        return $this->belongsTo(Article::class); 
    }

            
    public function comment_scores()
    {
        return $this->hasMany(Comment_Score::class);  

    }
}
