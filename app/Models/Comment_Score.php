<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_Score extends Model
{
    protected $table = 'comment_scores';
    
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'comment_user_id',
        'review_user_id',
        'score'
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);  
    }
    
    public function comment()
    {
        return $this->belongsTo(Comment::class);  
    }
    
    
}
