<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Stamp extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);  

    }
    public function article_stamps()
    {
        return $this->hasMany(Article_Stamp::class);  

    }
}
