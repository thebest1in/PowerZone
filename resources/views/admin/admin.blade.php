<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
@if(!empty($_SESSION["id"]) && $_SESSION["idTest"]=='admin')
@extends("master")
        @section("nav")
        <nav class="site-navigation position-relative text-right" role="navigation">
            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="/logout" class="nav-link ">Déconnecter</a></li>
            </ul>
        </nav>
        @endsection
        @section("section")
        @isset($admin)
        <div class="intro-section" id="home" style="background-color: #eee ;">
            <div class="container">
                <div class="row align-items-center">
                <div class="col-sm-6 mx-auto " data-aos="fade-up">
                <h2 style="color:black">Bonjour {{$admin[0]->nom}} {{$admin[0]->prenom}}</h2><hr>
                <strong>- - - -  </strong><hr>
                        <a href="/admin/utilisateur" class="btn btn-warning" style="width:40%">utilisateur</a>
                        <a href="/admin/compte" class="btn btn-warning" style="width:40%">profil</a>
                </div>
                <div class="col-sm-6 mx-auto text-center" data-aos="fade-up">
                        <img src="./logo.png" alt="image :-(" style="width: 100%;">
                </div>
                </div>
            </div>
        </div>
        @endisset
        @endsection
@else
@section("section")
<div class="intro-section" id="home" style="background-color: #eee ;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-5 mx-auto text-center" data-aos="fade-up">
                <h3>Vous n'êtes pas connecté</h3>
                <a href="/login" class="btn btn-warning">clique ici</a>
            </div>
            <div class="col-sm-7 mx-auto text-center" data-aos="fade-up">
                <img src="./logo.png" alt="image :-(" style="width: 100%;">
            </div>
        </div>
    </div>
</div>
@endsection
@endif