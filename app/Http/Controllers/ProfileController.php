<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\Publication;
use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ModifierProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class ProfileController extends BaseController
{   
    
    public function __construct()
{
    $this->middleware('auth')->except(['create', 'store']);
}
    public function index()  {
        $profiles=Profile::paginate(8);
        return view('profile.index',compact('profiles'));
    }
    public function show(Profile $profile)  {
        $nbrpublications=Publication::where('profile_id', $profile->id)->count();
        $user = auth()->user();
        $isFollowing = Follower::where('follower_id', $user->id)->where('followed_id', $profile->id)->exists();
        $followerCount = $profile->followerCount(); // Compte les followers
        $followingCount = $profile->followingCount(); // Compte les suivis
        return view('profile.show',compact(['profile','nbrpublications','isFollowing','followerCount','followingCount']));
    }
    public function create(Request $request)  {
        return view('profile.create');
    }
    public function store(ProfileRequest $request)  {
      // $name=$request->name;
      //$email=$request->email;
      //$password=$request->password;
      //$bio=$request->bio;
       //validation
       $formFields=$request->validated();
       //Hash
       $formFields['password']=Hash::make($request->password);
       if ($request->hasFile('image')) {
        $formFields['image'] = $request->file('image')->store('profile', 'public');
    }
   Profile::create($formFields);
       return redirect()->route('login.show')->with('success','votre comptre est bie créé.');
    }
    public function destroy(Profile $profile){
     $profile->delete();
     return to_route('profiles.index')->with('success','Le profil a été bien supprimé');
    }
    public function edit(Profile $profile){
        if (Auth::id() !== $profile->id) {
            abort(403); // Interdit d'accès si l'utilisateur n'est pas le propriétaire
        }
        return view('profile.edit',compact('profile'));
    }
    public function update(ModifierProfileRequest $request, Profile $profile)
{
    // Récupère les champs validés
    $formFields = $request->validated();

    // Si un mot de passe est fourni, on le hash et on l'ajoute aux champs à mettre à jour
    if (!empty($formFields['password'])) {
        $formFields['password'] = bcrypt($formFields['password']);  // Hasher le mot de passe
    } else {
        // Si le mot de passe n'est pas fourni, on retire cette clé pour éviter de l'écraser avec null
        unset($formFields['password']);
    }

    if ($request->hasFile('image')) {
        $formFields['image'] = $request->file('image')->store('profile', 'public');
    }
    // Mise à jour du profil avec les champs valides
    $profile->fill($formFields)->save();

    // Redirection après succès
    return to_route('profiles.edit', $profile->id)->with('success', 'Le profil a été bien modifié');
}

}
