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
@isset($admin)
  <div class="container" style="margin-top:100px;">
  <nav>
  <a href="/admin" class="btn btn-warning" style="font-size:2em"><i class="ti-arrow-left"></i></a>
  </nav><hr>

  <div class="intro-section" id="home" style="background-color: #eee ;">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-sm-5 mx-auto text-center" data-aos="fade-up">
            <form action="/updateAdmin" method="post" style="margin:20px">
                  @csrf
                  <table>
                  <tr>
                    <td> <label>Nom : </label> </td>
                    <td> <input type="text" name="nom" style="margin:20px" value="{{$admin[0]->nom}}" required> </td>
  </tr>
  <tr>
                <td> <label>Prenom : </label> </td>
                <td> <input type="text" name="prenom" style="margin:20px" value="{{$admin[0]->prenom}}" required> </td>
  </tr>
  <tr>
                <td> <label>Email address : </label> </td>
                <td> <input type="email" name="email" aria-describedby="emailHelp" style="margin:20px" value="{{$admin[0]->email}}" required></td>

  </tr>
  <tr>
                <td> <label>Password : </label></td>
                <td> <input type="text" name="password" style="margin:20px" value="{{$admin[0]->password}}" required></td>
  </tr>
  <tr>
                <td> <label>confirmer le mot de passe : </label> </td>
                <td> <input type="password" name="confirmer"  style="margin:20px" required> </td>
  </tr>
  <tr>
    <td colspan='2'>
                    @isset($error)
                    <p style="color:red">{{$error}}</p>
                    @endisset
    </td>
  </tr>
  <tr>
    <td> <button type="submit" class="btn btn-primary" >Modifier</button> </td>
    <td> <a href="/admin" class="btn btn-danger">Annuler</a> </td>
  </tr>
        </table> 
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