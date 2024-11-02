@extends('layouts.master')
@section('title')
Ajouter Publication
@endsection
@section('main')
<h4>Ajouter Publication</h4>
<div class="mb-3">
    <form action="{{ route('publications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf 
    <div class="mb-3">
        <label class="form-label">Titre</label>
        <input type="text" name="titre" class="form-control" value="{{old('titre')}}">
        @error('titre')
           <div class="text-danger"> {{$message}}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="body" class="form-control" rows="3">{{old('body')}}</textarea>
        @error('body')
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
        <button type="submit" class="btn btn-primary btn-block">Ajouter publication</button>
    </div>
</form>
</div>
@endsection