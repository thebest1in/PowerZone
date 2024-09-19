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
<a href="/gestionnaire/adherents/{{$groupe[0]}}" class="btn btn-warning" style="font-size:2em"><i class="ti-arrow-left"></i></a>
</nav><hr>

<div class="intro-section" id="home" style="background-color: #eee ;">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-5 mx-auto text-center" data-aos="fade-up">
          <form action="/ajouterAd" method="post" style="margin:20px">
                @csrf
                <div class="form-group">  
                  <label>Nom</label>
                  <input type="text" class="form-control" name="nom" style="margin:20px" required>
                  <input type="hidden" class="form-control" name="idgroupe" value="{{$groupe[0]}}" style="margin:10px">
                </div>
                <div class="form-group">  
                  <label>Prenom</label>
                  <input type="text" class="form-control" name="prenom" style="margin:20px" required>
                </div>
                <div class="form-group">  
                  <label>date Naissance</label>
                  <input type="date" class="form-control" name="date" style="margin:20px" required>
                </div>
                <div class="form-group">  
                  <label>tel</label>
                  <input type="number" class="form-control" name="tel" style="margin:20px" required>
                </div>
                <div class="form-group">  
                  <label>Nom d'abonnement</label>
                  @if(!empty($rs))
                  <select name="idAb" class="form-control" style="margin:20px">
                    @foreach($rs as $i)
                      <option value="{{$i->idAb}}">{{$i->nomAb}}</option>
                    @endforeach
                  </select>
                  @else
                  <p style="color:red;margin:20px">pas d'abonnement </p>
                  @endif
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top:20px">Ajouter</button> &mdash;
                <a href="/gestionnaire/adherents/{{$groupe[0]}}" class="btn btn-secondary" style="margin-top:20px">Annuler</a> 
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
</body>
</html>