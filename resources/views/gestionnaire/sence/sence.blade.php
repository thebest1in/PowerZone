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
<a href="/gestionnaire" class="btn btn-warning" style="font-size:2em"><i class="ti-arrow-left"></i></a>
</nav><hr>

<a class="btn btn-warning float-end" href="/ajouterSence">ajouter Sence</a>

<form action="/gestionnaire/emploi" method="get">
<div style="text-align:center">
<select name="jour" style="padding:6px;margin:10px">
@foreach($jeur as $k)
    <option value="{{$k}}">{{$k}}</option>
@endforeach
</select>
<button type="submit" class="btn btn-secondary"><i class="ti-search"></i></button> &mdash; 
<a href="/gestionnaire/emploi" class="btn btn-secondary">Annuler</a></div>
</form><hr>
@if(isset($_GET["jour"]))

<table class="table  table-hover">
  <thead>
    <tr>
      <th scope="col">Jour</th>
      <th scope="col">heure debut</th>
      <th scope="col">heure fin</th>
      <th scope="col">groupe</th>
      <th scope="col">moniteur</th>
      <th scope="col">activité</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>

  @foreach($sences as $j)
    @if($j->jour == $_GET["jour"])
    <tr>
      <td>{{$j->jour}}</td>
      <td>{{$j->heurDebut}}</td>
      <td>{{$j->heurFin}}</td>

      @foreach($groupes as $k)
      @if($j->idgroupe == $k->idgroupe)
      <td>{{$k->nomgroupe}}</td>
      @endif
      @endforeach

      @foreach($moniteur as $k)
      @if($j->codeM == $k->codeM)
      <td>{{$k->nom}} {{$k->prenom}}</td>
      @endif
      @endforeach

      @foreach($activites as $k)
      @if($j->idAct == $k->idAct)
      <td>{{$k->nomAct}}</td>
      @endif
      @endforeach


      <td>
        <a href="/updateSence/{{$j->idS}}" class="btn btn-primary"><i class="ti-pencil"></i></a>
        <a href="/deleteSence/{{$j->idS}}" class="btn btn-danger"><i class="ti-trash"></i></a>
      </td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>
@else
<table class="table  table-hover">
  <thead>
    <tr>
      <th scope="col">Jour</th>
      <th scope="col">heure debut</th>
      <th scope="col">heure fin</th>
      <th scope="col">groupe</th>
      <th scope="col">moniteur</th>
      <th scope="col">activité</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($sences as $j)
    <tr>
      <td>{{$j->jour}}</td>
      <td>{{$j->heurDebut}}</td>
      <td>{{$j->heurFin}}</td>

      @foreach($groupes as $k)
      @if($j->idgroupe == $k->idgroupe)
      <td>{{$k->nomgroupe}}</td>
      @endif
      @endforeach

      @foreach($moniteur as $k)
      @if($j->codeM == $k->codeM)
      <td>{{$k->nom}} {{$k->prenom}}</td>
      @endif
      @endforeach

      @foreach($activites as $k)
      @if($j->idAct == $k->idAct)
      <td>{{$k->nomAct}}</td>
      @endif
      @endforeach

      <td>
        <a href="/updateSence/{{$j->idS}}" class="btn btn-primary"><i class="ti-pencil"></i></a>
        <a href="/deleteSence/{{$j->idS}}" class="btn btn-danger"><i class="ti-trash"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif



@else
    <div class="container">
        <div class="row align-items-center text-center" style="margin-top:100px">
                <h3>pas de resultat</h3>
                <a href="/login" class="btn btn-warning" width="auto">clique ici</a>
        </div>
    </div>
@endif