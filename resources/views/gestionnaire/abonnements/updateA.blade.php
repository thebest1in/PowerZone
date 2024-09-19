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
<a href="/gestionnaire/abonnements" class="btn btn-warning" style="font-size:2em"><i class="ti-arrow-left"></i></a>
</nav><hr>

<div class="intro-section" id="home" style="background-color: #eee ;">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-5 mx-auto text-center" data-aos="fade-up">
          <form action="/modifierAbonnements" method="post" style="margin:20px">
                @csrf
                @foreach($abonnements as $i)
                <div class="form-group">  
                  <label>nom d'abonnement</label>
                  <input type="text" class="form-control" name="nomAb" value="{{$i->nomAb}}" style="margin:20px" required>
                </div>
                <div class="form-group">  
                  <label>durée d'abonnement ( mois )</label>
                  <input type="number" class="form-control" name="duree" value="{{$i->duree}}" min="1" max="12" style="margin:20px" placeholder="Enter 1 et 12" required>
                </div>
                <div class="form-group">  
                  <label>Prix de l'abonnement</label>
                  <input type="text" class="form-control" name="prix" value="{{$i->prixActuel}}" style="margin:20px" required>
                </div>
                <div class="form-group">  
                  <label >Nom de l'activité</label>
                  <select name="idAct" class="form-control" style="margin:20px">
                    @foreach($rs as $j)
                      @if($i->idAct == $j->idAct)
                        <option value="{{$j->idAct}}" selected>{{$j->nomAct}}</option>
                      @endif
                      <option value="{{$j->idAct}}">{{$j->nomAct}}</option>
                    @endforeach
                  </select>
                  <input type="hidden" class="form-control" name="id" value="{{$i->idAb}}" style="margin:20px">
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary" style="margin-top:20px">Modifier</button> &mdash;
                <a href="/gestionnaire/abonnements" class="btn btn-secondary" style="margin-top:20px">Annuler</a> 
          </form>
          </div>
        </div>
      </div>
</div>
</div>
@endisset
@else
    <div class="container">
        <div class="row align-items-center text-center" style="margin-top:100px">
                <h3>pas de resultat</h3>
                <a href="/login" class="btn btn-warning" width="auto">clique ici</a>
        </div>
    </div>
@endif
</body>
</html>