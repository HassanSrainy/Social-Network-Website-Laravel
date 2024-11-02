<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Publication;

class LikeController extends Controller
{
    public function like(Request $request, Publication $publication)
    {
        // Vérifie si l'utilisateur a déjà liké ou disliké la publication
        $existingLike = Like::where('user_id', auth()->id())
                            ->where('publication_id', $publication->id)
                            ->first();

        if ($existingLike) {
            // Si l'utilisateur a déjà liké, il peut choisir de l'annuler
            if ($existingLike->is_like) {
                $existingLike->delete();
                return redirect()->back()->with('success', 'Vous avez retiré votre like.');
            } else {
                // Si l'utilisateur a disliké, il change pour like
                $existingLike->is_like = true;
                $existingLike->save();
                return redirect()->back()->with('success', 'Vous aimez maintenant cette publication.');
            }
        } else {
            // L'utilisateur aime la publication pour la première fois
            Like::create([
                'user_id' => auth()->id(),
                'publication_id' => $publication->id,
                'is_like' => true,
            ]);
            return redirect()->back()->with('success', 'Vous aimez maintenant cette publication.');
        }
    }
    public function dislike(Request $request, Publication $publication)
    {
        // Vérifie si l'utilisateur a déjà liké ou disliké la publication
        $existingLike = Like::where('user_id', auth()->id())
                            ->where('publication_id', $publication->id)
                            ->first();

        if ($existingLike) {
            // Si l'utilisateur a déjà disliké, il peut choisir de l'annuler
            if (!$existingLike->is_like) {
                $existingLike->delete();
                return redirect()->back()->with('success', 'Vous avez retiré votre dislike.');
            } else {
                // Si l'utilisateur a liké, il change pour dislike
                $existingLike->is_like = false;
                $existingLike->save();
                return redirect()->back()->with('success', 'Vous n\'aimez plus cette publication.');
            }
        } else {
            // L'utilisateur dislike la publication pour la première fois
            Like::create([
                'user_id' => auth()->id(),
                'publication_id' => $publication->id,
                'is_like' => false,
            ]);
            return redirect()->back()->with('success', 'Vous n\'aimez pas cette publication.');
        }
    }
}
