{{-- @dump(Auth::user()) --}}
<!doctype html>
<html lang="fr">
  <head>
    <title>Formation Laravel Première Session</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{asset("css/app2.css")}}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset("css/style.css")}}" >

</head>
  <body>
      <header>
          <nav class="navbar navbar-expand-sm navbar-dark bg-success">

                <a class="navbar-brand ml-5" href="{{route('accueil')}}">Formation DSI</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse d-flex justify-content-between" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link"  href="{{route('accueil')}}">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('procedure',"burkina faso - Ouagadougou")}}">La procedure</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('produits.liste')}}">Liste Produit</a>
                        </li>
                                               
                    </ul>
                    <ul class="navbar-nav mr-5 mt-2 mt-lg-0">
                        
                        <li class="nav-item dropdown">

                            @guest
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connexion</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="{{ route('login')}}">Login</a>
                                    <a class="dropdown-item" href="{{ route('register')}}">Créer votre compte</a>
                                </div>

                            @else

                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name}}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="{{ route('logout')}}" onclick="
                                    event.preventDefault();
                                    document.getElementById('deconnexion').submit();
                                    ">Déconnexion</a>
                                
                                <form id="deconnexion" method = "post" action="{{ route('logout')}}">
                                    @csrf
                                </form>
                                
                                </div>

                            @endguest
                        </li>
                        
                       

                        
                    </ul>
                   
             </div>
          </nav>
      </header>
      <main>
        {{ $slot }}
      </main>
      <footer class="bg-success">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                   <br> <img src="https://www.mdenp.gov.bf/fileadmin/user_upload/storages/armoiries.png" style="height:100px">
                </img>
                </div>
                <div class="col-md-9 text-white">
                  <br>  Téléphone : (+226) 25 25 25 25 Fax : (+226) 25 25 25 25 Email : contact@mdenp.gov.bf <br> Adresse : Ouagadougou, Kadiogo, Burkina Faso
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center text-white">
                    <small>
                    @ copyright 2021-MENPTD
                    </small>
                </div>
            </div>
        </div>
      </footer>
      
    <!-- Optional JavaScript -->
    
    {{-- commenter cette partie puis ajouter --}}
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
 
{{-- ajouter ceci pour compenser--}}
<script src="{{asset('js/app2.js')}}"></script>

</body>
</html>