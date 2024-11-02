<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Publication;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates=['created_at'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image'
    ];
    public function publications(){
        return $this->hasMany(Publication::class);
    }
    public function followers()
    {
        return $this->belongsToMany(Profile::class, 'followers', 'followed_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(Profile::class, 'followers', 'follower_id', 'followed_id');
    }

    // Compte le nombre de followers
    public function followerCount()
    {
        return $this->followers()->count();
    }

    // Compte le nombre de suivis
    public function followingCount()
    {
        return $this->following()->count();
    }
    
}
