@extends('layouts.master')
@section('title')
Profile
@endsection
@section('main')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card my-4 py-4 col-md-8">
            <img class="card-img-top w-25 mx-auto rounded-circle" 
                 src="{{ asset('storage/' . $profile->image) }}" 
                 alt="Profile Image">
            <div class="card-body text-center">
                <h4 class="card-title mb-2">{{ $profile->id }} {{ $profile->name }}</h4> 
                <p class="card-text text-muted">Membre depuis le {{ $profile->created_at->format('d-m-Y') }}</p>
                <p class="card-text">
                    <strong>Email : </strong> <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                </p>
                <p class="card-text">{{ $profile->bio }}</p>
                <div class="profile-stats row mt-3">
                    <div class="col text-center">
                        <strong>Publications :</strong> {{$nbrpublications}}
                    </div>
                    <div class="col text-center">
                        <strong>Followers :</strong> {{ $followerCount }}
                    </div>
                    <div class="col text-center">
                        <strong>Suivis :</strong> {{$followingCount}}
                    </div>
                </div>

                @if(Auth::id() === $profile->id)
                <div class="d-flex justify-content-center mt-3">
                    <form action="{{ route('profiles.edit', $profile->id) }}" method="GET">
                        @csrf
                        <button class="btn btn-primary btn-sm mx-2">Modifier</button>
                    </form>
                    <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce profil ?');">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?');">Supprimer</button>
                    </form>
                </div>
                @else
                <div class="d-flex justify-content-center mt-3">
                    @if($isFollowing)
                    <a href="{{ route('unfollow', $profile) }}" class="btn btn-success btn-sm mx-2">
                        <i class="bi bi-person-plus"></i> Ne plus suivre
                    </a> 
                    @else                   
                    <a href="{{ route('follow', $profile) }}" class="btn btn-success btn-sm mx-2">
                        <i class="bi bi-person-plus"></i> Suivre
                    </a> 
                    @endif                   
                    <button class="btn btn-secondary btn-sm mx-2" onclick="alert('Contact clicked!')">
                        <i class="bi bi-envelope"></i> Contacter
                    </button>
                </div>   
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <h3 class="text-center mt-4">Publications</h3>  
        <div class="container w-75 mx-auto">
            @foreach ($profile->publications as $publication)
            <x-publication :canUpdate="auth()->user()->id===$publication->profile_id" :publication="$publication"/>
            @endforeach
        </div>
        @if(Auth::id() === $profile->id)
        <div class="text-center">
            <a class="btn btn-success mt-4" href="{{ route('publications.create') }}">Ajouter publication</a>
        </div>
        @endif
    </div>
</div>
@endsection
