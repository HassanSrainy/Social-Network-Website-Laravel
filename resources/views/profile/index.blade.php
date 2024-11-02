@extends('layouts.master')
@section('title')
Profiles
@endsection
@section('main')
<div class="container">
    <h4>Profiles</h4>
    <div class="row">
        @foreach ($profiles as $profile)
        <div class="col-md-3" style="margin-bottom: 3%;">
            <x-profile-card :canUpdate="auth()->user()->id===$profile->id" :profile="$profile"/> 
        </div>
        @endforeach
    </div> 
</div>
{{$profiles->links()}}
@endsection