<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use App\Models\Profile;

class Publication extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['titre','body','image','profile_id'];

    public function profile(){
        return $this->belongsTo(Profile::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likeCount()
    {
        return $this->likes()->where('is_like', true)->count();
    }

    public function dislikeCount()
    {
        return $this->likes()->where('is_like', false)->count();
    }
    public function comments()
{
    return $this->hasMany(Comment::class);
}
}
