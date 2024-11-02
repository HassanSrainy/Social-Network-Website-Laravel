@extends('layouts.master')
@section('title')
Ajouter Profile
@endsection
@section('main')
<h4>Ajouter Profile</h4>
<div class="mb-3">
    <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf 
    <div class="mb-3">
        <label class="form-label">Nom complet</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}">
        @error('name')
           <div class="text-danger"> {{$message}}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control" value="{{old('email')}}">
        @error('email')
        <div class="text-danger"> {{$message}}</div>
     @enderror
    </div>
    
    <div class="mb-3">
        <label class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control">
    @error('password')
        <div class="text-danger"> {{$message}}</div>
     @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Comfirmation du mot de passe</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>
    
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="bio" class="form-control" rows="3">{{old('bio')}}</textarea>
        @error('bio')
        <div class="text-danger"> {{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control">
    @error('image')
        <div class="text-danger"> {{$message}}</div>
     @enderror
    </div>
    
    <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-block">Ajouter profile</button>
    </div>
</form>
</div>
@endsection