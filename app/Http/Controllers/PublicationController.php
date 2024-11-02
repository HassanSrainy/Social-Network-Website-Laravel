<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Requests\PublicationRequest;
use App\Http\Requests\ModifierPublicationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class PublicationController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
   

    public function index()
    {
        $publications=Publication::latest()->paginate();
        foreach ($publications as $publication) {
            $publication->nbrComments = $publication->comments()->count(); // Compte des commentaires
        }
    
        return view('publication.index',compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publication.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {   
        $formFields=$request->validated();
        $this->uploadImage($request,$formFields);
        $formFields['profile_id']=Auth::id();
        Publication::create($formFields);
        return to_route('publications.index')->with('success','votre publication est bien publiée.');

    }
    private function uploadImage(Request $request, array &$formFields)
{
    // Supprimer l'image des champs validés pour éviter de la traiter si elle est absente.
    unset($formFields['image']);

    if ($request->hasFile('image')) {
        $formFields['image'] = $request->file('image')->store('publication', 'public');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        $comments = $publication->comments()->with('profile')->get();
        $publication->nbrComments = $publication->comments()->count();
        return view('publication.show',compact('publication','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        if (Auth::id() !== $publication->profile_id) {
            abort(403); // Interdit d'accès si l'utilisateur n'est pas le propriétaire
        }
        
        return view('publication.edit',compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModifierPublicationRequest $request, Publication $publication)
    {
        $formFields=$request->validated();
        $this->uploadImage($request,$formFields);
        $isupdated=$publication->fill($formFields)->save();
        return to_route('publications.index')->with('success','votre publication est bien modifiée.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return redirect()->route('publications.index')->with('success', 'Publication est supprimée.');

    }
}
