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
@if(!empty($_SESSION["id"]) && $_SESSION["idTest"]=='admin')
@isset($utilisateur)
<div class="container" style="margin-top:100px;">
<nav>
<a href="/admin" class="btn btn-warning" style="font-size:2em"><i class="ti-arrow-left"></i></a>
</nav><hr>
<div style="text-align:center">
<a href="/ajouterUtilisateur" class="btn btn-primary" ><i class="ti-plus"></i> Utilisateur</a></div><hr>
<table class="table  table-hover">
  <thead>
    <tr>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">email</th>
      <th scope="col">role</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($utilisateur as $i)
    <tr>
      <td>{{$i->nom}}</td>
      <td>{{$i->prenom}}</td>
      <td>{{$i->email}}</td>
      <td>{{$i->role}}</td>
      <td>
        <a href="/deleteUtilisateur/{{$i->id}}" class="btn btn-danger"><i class="ti-trash"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
  </div>
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