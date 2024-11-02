<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'publication_id', 'profile_id'];

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
