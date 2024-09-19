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
<a href="/gestionnaire/annonces" class="btn btn-warning" style="font-size:2em"><i class="ti-arrow-left"></i></a>
</nav><hr>

<div class="intro-section" id="home" style="background-color: #eee ;">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-5 mx-auto text-center" data-aos="fade-up">
          <form action="/ajouterAn" method="post" style="margin:20px">
                @csrf
                <div class="form-group">  
                  <label>titre</label>
                  <input type="text" class="form-control" name="title" style="margin:20px" required>
                </div>
                <div class="form-group">  
                  <label>date debut</label>
                  <input type="date" class="form-control" name="dateD" style="margin:20px" required>
                </div>
                <div class="form-group">  
                  <label>date fin</label>
                  <input type="date" class="form-control" name="dateF" style="margin:20px" required>
                </div>
                <div class="form-group">contenu:
                  <textarea name="text" class="form-control" rows="8" style="margin:20px" required></textarea>
                </div>
                <div class="form-group">  
                  <label>Nom de l'activité</label>
                  @if(!empty($activites))
                  <select name="idAct" class="form-control" style="margin:20px">
                    @foreach($activites as $i)
                      <option value="{{$i->idAct}}">{{$i->nomAct}}</option>
                    @endforeach
                  </select>
                  @else
                  <p style="color:red;margin:20px">pas d'activites </p>
                  @endif
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top:20px">Ajouter</button> &mdash;
                <a href="/gestionnaire/annonces" class="btn btn-secondary" style="margin-top:20px">Annuler</a> 
          </form>
          </div>
        </div>
      </div>
</div>
</div>

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