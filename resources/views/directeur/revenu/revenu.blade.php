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
@if(!empty($_SESSION["id"]) && $_SESSION["idTest"]=='directeur')

<div class="container" style="margin-top:100px;font-size:0.55cm">
<nav>
    <a href="/directeur" class="btn btn-warning" style="font-size:2em"><i class="ti-arrow-left"></i></a>
</nav><hr>

  @if(!empty($revenu[0]->prixTotal))
  <div style="margin-left:auto;margin-right:auto;border:1px solid black;width:50%;padding:10px;margin-top:50px;">
  Date :  
  <hr>
  <h3 style="text-align:center">{{$dateD}}  &mdash; {{$dateF}}</h3><hr>
  le revenu est :  
  <hr>
  <h2 style="text-align:center"><b style="color:green;">{{$revenu[0]->prixTotal}}</b> dhs</h2>
  </div>
  <a href="/directeur/revenu" class="btn btn-primary">Annuler</a>
  @else
  <form action="/directeur/revenu/recherche" method="post">
  @csrf

  <table style="margin-bottom:20px;text-align:center;width:100%">
  <tr><td>
  Date debut:
  <input type="date" name="dateMin"> </td><td>
  Date fin:
  <input type="date" name="dateMax"></td></tr>
  </table>

  <div style="text-align:center">
  <button type="submit" class="btn btn-primary"><i class="ti-search"></i></button> 
  <a href="/directeur/revenu" class="btn btn-secondary">Annuler</a></div>

  </form>
  <p style="color:red;margin-top:100px;text-align:center;font-size:1cm"> pas de resultats taper une date</p>
  @endif

@else
    <div class="container">
        <div class="row align-items-center text-center" style="margin-top:100px">
                <h3>pas de resultat</h3>
                <a href="/login" class="btn btn-warning" width="auto">clique ici</a>
        </div>
    </div>
@endif