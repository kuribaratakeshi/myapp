<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article_Stamp extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'article_id',
        'stamp_id'
    ];
    
    public function article()
    {
        return $this->belongsTo(Article::class); 
    }

    public function stamp()
    {
        return $this->belongsTo(Stamp::class); 
    }

}
