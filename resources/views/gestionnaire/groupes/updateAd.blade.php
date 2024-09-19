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
<a href="/gestionnaire/adherents/{{$ab[0]->idgroupe}}" class="btn btn-warning" style="font-size:2em"><i class="ti-arrow-left"></i></a>
</nav><hr>

<div class="intro-section" id="home" style="background-color: #eee ;">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-5 mx-auto text-center" data-aos="fade-up">
          <form action="/modifierAdherents" method="post" style="margin:20px">
                @csrf
                <div class="form-group">  
                  <label>Nom</label>
                  <input type="text" class="form-control" name="nom" style="margin:20px" value="{{$adherent[0]->nom}}" required>
                </div>
                <div class="form-group">  
                  <label>Prenom</label>
                  <input type="text" class="form-control" name="prenom" style="margin:20px" value="{{$adherent[0]->prenom}}" required>
                  <input type="hidden" class="form-control" name="codeA" value="{{$adherent[0]->codeA}}" style="margin:10px">
                  <input type="hidden" class="form-control" name="num" value="{{$adherent[0]->num}}" style="margin:10px">
                </div>
                <div class="form-group">  
                  <label>date Naissance</label>
                  <input type="date" class="form-control" name="date" style="margin:20px" value="{{$adherent[0]->dateNaissance}}" required>
                </div>
                <div class="form-group">  
                  <label>tel</label>
                  <input type="number" class="form-control" name="tel" style="margin:20px" value="{{$adherent[0]->tel}}" required>
                </div>
                <div class="form-group">  
                  <label>Nom d'abonnement</label>
                  @if(!empty($rs))
                  <select name="idAb" class="form-control" style="margin:20px" >
                    @foreach($rs as $i)
                    @if($i->idAb == $ab[0]->idAb)
                    <option value="{{$ab[0]->idAb}}" selected>{{$ab[0]->nomAb}}</option>
                    @else
                      <option value="{{$i->idAb}}">{{$i->nomAb}}</option>
                    @endif
                    @endforeach
                  </select>
                  @else
                  <p style="color:red;margin:20px">pas d'abonnement </p>
                  @endif
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top:20px">modifier</button> &mdash;
                <a href="/gestionnaire/adherents/{{$ab[0]->idgroupe}}" class="btn btn-secondary" style="margin-top:20px">Annuler</a> 
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