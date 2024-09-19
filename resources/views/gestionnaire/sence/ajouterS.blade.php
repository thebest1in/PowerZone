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
<a href="/gestionnaire/emploi" class="btn btn-warning" style="font-size:2em"><i class="ti-arrow-left"></i></a>
</nav><hr>

<div class="intro-section" id="home" style="background-color: #eee ;">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-5 mx-auto text-center" data-aos="fade-up">
          <form action="/ajouterS" method="post" style="margin:20px">
                @csrf
                <div class="form-group">
                <label>Jour </label>
                <select name="jour" class="form-control" style="margin:20px">
                @foreach($jeur as $j)
                    <option value="{{$j}}">{{$j}}</option>
                @endforeach
                </select>
                </div>

                <div class="form-group">
                  <label>heure debut </label>
                  <input type="text" class="form-control" name="HD" style="margin:20px" required>
                  @error('HD')
                    <p style='color:red'>{{$message}}</p>
                  @enderror
                </div>

                <div class="form-group">
                  <label>heure fin </label>
                  <input type="text" class="form-control" name="HF" style="margin:20px" required>
                  @error('HF')
                    <p style='color:red'>{{$message}}</p>
                  @enderror
                </div>

                <div class="form-group">
                <label>Groupe </label>
                <select name="idG" class="form-control" style="margin:20px">
                @foreach($groupes as $i)
                    <option value="{{$i->idgroupe}}">{{$i->nomgroupe}}</option>
                @endforeach
                </select>
                </div>

                <div class="form-group">
                <label>Moniteur </label>
                <select name="idM" class="form-control" style="margin:20px">
                @foreach($moniteur as $i)
                    <option value="{{$i->codeM}}">{{$i->nom}} {{$i->prenom}}</option>
                @endforeach
                </select>
                </div>

                <div class="form-group">
                <label>Activité </label>
                <select name="idA" class="form-control" style="margin:20px">
                @foreach($activites as $i)
                    <option value="{{$i->idAct}}">{{$i->nomAct}}</option>
                @endforeach
                </select>
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top:20px">Ajouter</button> &mdash;
                <a href="/gestionnaire/emploi" class="btn btn-secondary" style="margin-top:20px">Annuler</a> 
          </form>
          </div>
        </div>
      </div>
</div>
</div>
@if ($message = Session::get('danger'))
    <div class="alert alert-danger" style='position: fixed;bottom: 0;'>
        <p>{{ $message }}</p>
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