@extends('layouts.master')
@section('title')
Se connecter
@endsection
@section('main')

<div class="container w-80 my-5 bg-light p-5">
    <h3>Authentification</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Login</label>
            <input type="text" name="login" class="form-control" value="{{old('login')}}">
            @error('login')
                <div class="text-danger">{{ $message }}</div> <!-- Display the error message -->
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="d-grid">
            <button class="btn btn-primary">Se connecter</button>
        </div>
    </form>
</div>

@endsection
