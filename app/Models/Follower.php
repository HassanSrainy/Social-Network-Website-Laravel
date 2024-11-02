<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    // Les colonnes qui peuvent être assignées en masse
    protected $fillable = [
        'follower_id', // ID de l'utilisateur qui suit
        'followed_id', // ID de l'utilisateur suivi
    ];

    // Relation avec le modèle Profile pour le follower
    public function follower()
    {
        return $this->belongsTo(Profile::class, 'follower_id');
    }

    // Relation avec le modèle Profile pour le suivi
    public function followed()
    {
        return $this->belongsTo(Profile::class, 'followed_id');
    }
}

