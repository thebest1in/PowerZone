@extends("master")

@section("nav")
<nav class="site-navigation position-relative text-right" role="navigation">
    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
        <li><a href="#home" class="nav-link">Accueil</a></li>
        <li><a href="#activites" class="nav-link">Activités</a></li>
        <li><a href="#abonnements" class="nav-link">Abonnements</a></li>
        <li><a href="#emploi" class="nav-link">Emploi</a></li>
        <li><a href="#annonces" class="nav-link">Annonces</a></li>
        <li><a href="/login" class="nav-link">Se connecter</a></li>
        <li><a class="nav-link btn btn-warning " href="/formulaire" style="color:white !important">s'inscrire</a></li>
    </ul>
</nav>
@endsection
@section("section")

<div>
    <div class="intro-section" id="Accueil" style="background-color: #eeeeeec3 ;">
      <div class="container">
        <div class="row align-items-center">
        <div class="col-sm-4 mx-auto text-center" data-aos="fade-up">
                <h1 class="mb-3" style="color: rgba(255, 99, 71, 0.795); font-family: 'Times New Roman', Times, serif;">Bienvenue </br>à </br>PowerZone</h1>
          </div>
          <div class="col-sm-7 mx-auto " data-aos="fade-up">
                <img src="./home.jpg" alt="image :-(" style="width: 100%;border-radius:40px 0px">
          </div>
          
        </div>
      </div>
    </div>

    <div class="schedule-wrap">
      <div class="d-md-flex align-items-center">
        <div class="hours mr-md-4 mb-4 mb-lg-0">
        <strong class="d-block">Lundi, Mardi, Mercredi, Jeudi, Vendredi</strong>
          Ouvrir: 8:00am &mdash;
          Fermer: 10:00pm
          <strong class="d-block">Samedi</strong>
          Ouvrir: 8:00am &mdash;
          Fermer: 8:00pm
        </div>
       
      </div>
    </div>
    @if(!empty($activites))
    <div class="site-section" id="activites">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <h2 class="heading mb-3">Activités</h2>
          </div>
        </div>
        <div class="col-lg-10">
            @foreach($activites as $i)
                <div class="class-item d-flex align-items-center">
                <div class="class-item-text">
                    <h2 style="margin:1em"><a href="single.html">{{$i->nomAct}}</a></h2>
                </div>
                </div>
            @endforeach
        </div>
        </div>
    </div>
    @else
    <div class="site-section" id="activites">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <h2 class="heading mb-3">la base de données est vide</h2>
          </div>
        </div>
      </div>
    </div>
    @endif

    <div class="bgimg" style="background-image: url('images/bg_2.jpg');"  data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7">
            <h2 class="">Hard Work Always Pays off</h2>
            
          </div>
        </div>
      </div>
    </div>
    @if(!empty($Exempleabonnements))
    <div class="site-section" id="abonnements">
      <div class="container">
        <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
          <div class="col-md-8  section-heading">
            <h2 class="heading mb-3">Abonnements</h2>
          </div>
        </div>
        <div class="row">
        @foreach($Exempleabonnements as $ab)
        <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="">
            <div class="ftco-feature-1">
              <span class="icon flaticon-fit"></span>
              <div class="ftco-feature-1-text">
                <h2>Abonnements : {{$ab->nomAb}}</h2>
                <p>Durée : {{$ab->duree}} mois</p>
                <p>activité : {{$ab->nomAct}}</p>
                <h2>prix : {{$ab->prixActuel}} dhs</h2>
              </div>
            </div>
          </div>
        @endforeach
        </div>
        <a href="/abonnements" class="btn btn-warning">voir tous</a>
      </div>
    </div>
    @else
    <div class="site-section" id="abonnements">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <h2 class="heading mb-3">la base de données est vide</h2>
          </div>
        </div>
      </div>
    </div>
    @endif

    <div class="bgimg" style="background-image: url('images/bg_3.jpg');"  data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7">
            <h2 class="">I Dont' Think Limits</h2>
          </div>
        </div>
      </div>
    </div>
    @if(!empty($emploiG) && !empty($emploiM))
    <div class="site-section" id="emploi">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <h2 class="heading mb-3">Emploi du temps</h2>
          </div>
        </div>
          <div class="row">
          <table class="table  table-bordered">
            <thead>
              <tr>
                <th scope="col">Jour</th>
                <th scope="col">Groupes</th>
                <th scope="col">Moniteur</th>
              </tr>
            </thead>
            <tbody>
            @foreach($jeur as $j)
            <tr>
              <td style="color:tomato">{{$j}}</td>
              <td>
                @foreach($emploiG as $i)
                @if($i->jour == $j)
                {{$i->nomgroupe}} :<span style="margin:1em">{{$i->heurDebut}} - {{$i->heurFin}}</span><hr>
                @endif
                @endforeach
              </td>
              <td>
                @foreach($emploiM as $m)
                @if($m->jour == $j)
                {{$m->nom}} {{$m->prenom}} :<span style="margin:1em">{{$m->heurDebut}} - {{$m->heurFin}}</span><hr>
                @endif
                @endforeach
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>

      </div>
    </div>
    @else
    <div class="site-section" id="emploi">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <h2 class="heading mb-3">la base de données est vide</h2>
          </div>
        </div>
      </div>
    </div>
    @endif

    <div class="bgimg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7">
            <h2 class="">Never Cry Never Complain Just Work</h2>
          </div>
        </div>
      </div>
    </div>
    @if(!empty($annonces))
    <div class="site-section" id="annonces">
      <div class="container">
        <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
          <div class="col-md-8  section-heading">
            <h2 class="heading mb-3">Annonces</h2>
          </div>
        </div>
        <div class="row">
        @foreach($annonces as $an)
        <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="">
            <div class="ftco-feature-1">
              <span class="icon flaticon-fit"></span>
              <div class="ftco-feature-1-text">
                <h2>title : {{$an->title}}</h2>

                @foreach($activites as $j)
                  @if($an->idAct == $j->idAct)
                    <h2>activité : {{$j->nomAct}}</h2>
                  @endif
                @endforeach

                <p>{{$an->contenue}}</p>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
    @else
    <div class="site-section" id="annonces">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <h2 class="heading mb-3">la base de données est vide</h2>
          </div>
        </div>
      </div>
    </div>
    @endif
<br>
    <div class="schedule-wrap2 clearfix">
    </div>

</div>
@endsection
