@extends('layouts.master')

@section('title')
Accueil
@endsection

@section('main')
<div class="container my-5">
    <!-- Section Hero -->
    @guest
    <section class="text-center py-5 bg-primary text-white rounded">
        <h1>Bienvenue sur RéseauSocial</h1>
        <p class="lead">Connectez-vous avec vos amis, partagez vos moments et découvrez de nouveaux liens.</p>
        <div class="d-flex justify-content-center mt-3">
            <a href="{{ route('profiles.create') }}" class="btn btn-light btn-lg mx-2">Rejoignez-nous maintenant</a>
            <a href="{{ route('login.show') }}" class="btn btn-light btn-lg mx-2">Se connecter</a>
        </div>
    </section>
    
    @endguest
    <!-- Section À propos -->
    <section id="about" class="my-5 text-center">
    <h2 class="text-primary mb-4">À propos de RéseauSocial</h2>
    <p class="lead text-muted">RéseauSocial est une plateforme pour vous connecter avec vos proches et élargir votre réseau.</p>
</section>

<!-- Section Fonctionnalités -->
<section id="features" class="my-5">
    <h2 class="text-center text-primary mb-4">Fonctionnalités</h2>
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card mb-4 shadow-lg border-0">
                <div class="card-body">
                    <h4 class="card-title text-primary">Partage de contenu</h4>
                    <p class="card-text">Publiez des photos, vidéos, et bien plus encore. Profitez d'une expérience immersive pour capturer vos souvenirs.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-lg border-0">
                <div class="card-body">
                    <h4 class="card-title text-primary">Discussions instantanées</h4>
                    <p class="card-text">Envoyez des messages instantanés à vos amis, restez en contact en temps réel et ne manquez jamais une occasion de communiquer.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-lg border-0">
                <div class="card-body">
                    <h4 class="card-title text-primary">Communautés</h4>
                    <p class="card-text">Rejoignez des groupes pour partager vos intérêts, découvrir de nouvelles passions et élargir votre cercle social.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Témoignages -->
<section id="testimonials" class="my-5 text-center">
    <h2 class="text-primary mb-4">Ce que disent nos utilisateurs</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <blockquote class="blockquote">
                <p class="blockquote-text">“RéseauSocial m'a permis de rester en contact avec mes amis !”</p>
                <footer class="blockquote-footer text-muted">Alexandre</footer>
            </blockquote>
        </div>
        <div class="col-md-4">
            <blockquote class="blockquote">
                <p class="blockquote-text">“Une plateforme simple et efficace pour partager mes souvenirs.”</p>
                <footer class="blockquote-footer text-muted">Sophie</footer>
            </blockquote>
        </div>
        <div class="col-md-4">
            <blockquote class="blockquote">
                <p class="blockquote-text">“J'ai rencontré des personnes formidables grâce aux communautés.”</p>
                <footer class="blockquote-footer text-muted">Yasmine</footer>
            </blockquote>
        </div>
    </div>
</section>

</div>
@endsection
