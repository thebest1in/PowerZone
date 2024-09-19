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
@isset($abonnements)
<div class="container" style="margin-top:100px;">
<nav>
<a href="/gestionnaire" class="btn btn-warning" style="font-size:2em"><i class="ti-arrow-left"></i></a>
</nav><hr>
<div style="text-align:center">
<a href="/ajouterAbonnements" class="btn btn-primary" ><i class="ti-plus"></i> Abonnement</a></div><hr>

<table class="table  table-hover" style="text-align:center">
  <thead>
    <tr>
      <th scope="col">nom d'abonnement</th>
      <th scope="col">durée d'abonnement ( mois )</th>
      <th scope="col">prix</th>
      <th scope="col">nom d'activité</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($abonnements as $i)
    <tr>
      <td>{{$i->nomAb}}</td>
      <td>{{$i->duree}}</td>
      <td>{{$i->prixActuel}} dhs</td>
      <td>{{$i->nomAct}}</td>
      <td>
        <a href="/updateAbonnements/{{$i->idAb}}" class="btn btn-primary"><i class="ti-pencil"></i></a>
        <a href="/deleteAbonnements/{{$i->idAb}}" class="btn btn-danger"><i class="ti-trash"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@if ($message = Session::get('danger'))
    <div class="alert alert-danger" style='position: fixed;bottom: 0;'>
        <p>{{ $message }}</p>
    </div>
@endif
@endisset
@else
    <div class="container">
        <div class="row align-items-center text-center" style="margin-top:100px">
                <h3>pas de resultat</h3>
                <a href="/login" class="btn btn-warning" width="auto">clique ici</a>
        </div>
    </div>
@endif