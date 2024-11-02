@extends('layouts.master')
@section('title')
Modifier profile
@endsection
@section('main')
<h4>Modifier profile</h4>
<div class="mb-3">
    <form action="{{ route('profiles.update',$profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nom complet</label>
        <input type="text" name="name" class="form-control" value="{{old('name',$profile->name)}}">
        @error('name')
           <div class="text-danger"> {{$message}}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control" value="{{old('email',$profile->email)}}">
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
        <textarea name="bio" class="form-control" rows="3">{{old('bio',$profile->bio)}}</textarea>
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
    <div>
        <img src="{{ asset('storage/' . $profile->image) }}" width="200" alt="">
    </div>
    
    <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-block">Modifier</button>
    </div>
</form>
</div>
@endsection