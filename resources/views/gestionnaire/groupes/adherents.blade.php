<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerZone</title>
    <link rel="stylesheet" href="{{url('./bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('./assets/vendors/themify-icons/css/themify-icons.css')}}">
    
</head>
<body>


<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
@if(!empty($_SESSION["id"]) && $_SESSION["idTest"]=='gestionnaire')
<div class="container" style="margin-top:100px;">
<nav>
<a href="/gestionnaire/groupes" class="btn btn-warning" style="font-size:2em"><i class="ti-arrow-left"></i></a>
</nav><hr>
<div style="background-color:#FFC696;padding:10px;text-align:center">
    <b>Groupe : {{$groupes[0]->nomgroupe}}</b>
    <div style="margin-top:20px;">
    <a href="/updateGroupes/{{$groupes[0]->idgroupe}}" class="btn btn-primary"><i class="ti-pencil"></i></a>
    <a href="/deleteGroupes/{{$groupes[0]->idgroupe}}" class="btn btn-danger"><i class="ti-trash"></i></a>
    </div>
</div><br>

        <div>
            <a href="/ajouterAdherents/{{$groupes[0]->idgroupe}}" class="btn btn-primary"><i class="ti-plus"></i> Adherent</a>
        </div>
        <hr>
        @if(!empty($adherents))

        <table class="table table-hover" style="text-align:center">
        <thead>
            <tr>
            <th scope="col">nom et prenom</th>
            <th scope="col">date Naissance</th>
            <th scope="col">tel</th>
            <th scope="col">abonnement</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adherents as $i)
            <tr>
            <td>{{$i->nom}} {{$i->prenom}}</td>
            <td>{{$i->dateNaissance}}</td>
            <td>{{$i->tel}}</td>
            <td>{{$i->nomAb}}</td>
            
            <td>
                <a href="/updateAdherents/{{$i->codeA}}" class="btn btn-primary"><i class="ti-pencil"></i></a>
                <a href="/deleteAdherents/{{$i->codeA}}" class="btn btn-danger"><i class="ti-trash"></i></a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>

        @else
        <div class="row align-items-center text-center" style="margin-top:100px">
            <h3>pas des adherents</h3>
        </div>
        @endif

@else
    <div class="container">
        <div class="row align-items-center text-center" style="margin-top:100px">
                <h3>pas de resultat</h3>
                <a href="/login" class="btn btn-warning" width="auto">clique ici</a>
        </div>
    </div>
@endif