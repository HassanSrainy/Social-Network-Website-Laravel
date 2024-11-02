@extends('layouts.master')
@section('title')
Publications
@endsection
@section('main')
<div class="container mt-5">
    <h4 class="text-center mb-4">Publications</h4>
    <div class="container w-75 mx-auto">
        @foreach ($publications as $publication)
        <x-publication :canUpdate="auth()->user()->id===$publication->profile_id" :publication="$publication"/>
        @endforeach
    </div>
</div>

{{$publications->links()}}
@endsection