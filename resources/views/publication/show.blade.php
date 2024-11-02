@extends('layouts.master')
@section('title')
Publication
@endsection
@section('main')
<x-publication :canUpdate="auth()->user()->id===$publication->profile_id" :publication="$publication"/>
    <!-- Formulaire pour ajouter un commentaire -->
    <form action="{{ route('comments.store', $publication) }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="content" class="form-label">Votre commentaire</label>
            <textarea name="content" id="content" class="form-control" rows="3" placeholder="Écrivez votre commentaire ici..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-chat-dots me-1"></i> Commenter
        </button>
    </form>
    

<!-- Liste des commentaires -->
@foreach ($comments as $comment)
    <div class="mb-3 p-3 border rounded shadow-sm d-flex align-items-start justify-content-between">
        <div class="d-flex align-items-start">
            <!-- Affiche la photo de profil en cercle -->
            <img src="{{ asset('storage/' . $comment->profile->image) }}" 
                 alt="Profile Image" 
                 class="rounded-circle me-3" 
                 width="50" height="50">
            
            <div>
                <!-- Nom de l'utilisateur et contenu du commentaire -->
                <strong>{{ $comment->profile->name }}</strong>: {{ $comment->content }}
                <div class="text-muted small mt-1">
                    Publié le {{ $comment->created_at->format('d/m/Y H:i') }}
                    @if($comment->created_at != $comment->updated_at)
                        | Modifié le {{ $comment->updated_at->format('d/m/Y H:i') }}
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Formulaire pour supprimer le commentaire -->
        @if(auth()->user() && auth()->user()->id == $comment->profile_id)
            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="ms-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
            </form>
        @endif
    </div>
@endforeach



@endsection