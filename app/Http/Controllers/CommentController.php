<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Publication $publication)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        Comment::create([
            'content' => $request->content,
            'publication_id' => $publication->id,
            'profile_id' => auth()->id(), // Utilisateur connecté
        ]);

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
    }

    // Dans ton contrôleur
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
    
        // Vérifie si l'utilisateur connecté est bien le propriétaire du commentaire
        if (Auth::id() !== $comment->profile->user_id) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à supprimer ce commentaire.');
        }
    
        $comment->delete();
    
        return redirect()->back()->with('success', 'Commentaire supprimé avec succès.');
    }
    


    
}
