<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\Follower;
use Illuminate\Http\Request;


class FollowController extends Controller
{
    
    public function follow(Request $request, Profile $profile)
    {
        // Vérifiez si l'utilisateur est authentifié
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Veuillez vous connecter pour suivre un profil.');
    }

    $user = auth()->user();
    if (Follower::where('follower_id', $user->id)->where('followed_id', $profile->id)->exists()) {
        return to_route('profiles.show', $profile->id)->with('warning', 'Vous suivez déjà ce profil.');
    }

        Follower::create([
            'follower_id' => $user->id,
            'followed_id' => $profile->id,
        ]);
        return to_route('profiles.show',$profile->id)->with('success', 'Vous suivez maintenant ' . $profile->name);
    }
    public function unfollow(Request $request, Profile $profile)
    {
        $user = auth()->user();

        // Vérifiez si l'utilisateur est authentifié
        if (!auth()->check()) {
            return redirect()->route('login'); // Redirige vers la page de connexion
        }

        // Vérifiez si l'utilisateur suit déjà le profil
        $isFollowing = Follower::where('follower_id', $user->id)
                                ->where('followed_id', $profile->id)
                                ->exists();

        // Si l'utilisateur suit déjà le profil, détachons-le
        if ($isFollowing) {
            Follower::where('follower_id', $user->id)
                    ->where('followed_id', $profile->id)
                    ->delete(); // Détache la relation
            return to_route('profiles.show', $profile->id)->with('success', 'Vous ne suivez plus ' . $profile->name);
        }

        return to_route('profiles.show', $profile->id)->with('warning', 'Vous ne suivez pas ce profil.');
    }
    

}
