@extends("master")


@section("section")
<div>
    <div class="intro-section" id="home" style="background-color: #eee ;">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-5 mx-auto text-center" data-aos="fade-up">

          <form action="/verify" method="post">
                @csrf
                <div class="form-group">
                  @isset($login)
                    <p style="color:red">{{$login}}</p>
                  @endisset
                  <label>Email:</label>
                  <input type="email" class="form-control" name="email" placeholder="Entrer email" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                <label>Mot de passe:</label>
                  <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-warning" style="color:white !important">submit</button> <hr>
          </form>

          </div>
          <div class="col-sm-7 mx-auto text-center" data-aos="fade-up">
                <img src="./logo.png" alt="image :-(" style="width: 100%;">
          </div>
        </div>
      </div>
    </div>
    
</div>
@endsection