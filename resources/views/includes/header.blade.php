<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Location De Voiture</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="{{ request()->routeIs('home') ? 'active':'' }}"><a href="{{route('home')}}">Accueil <span class="sr-only">(current)</span></a></li>
            <li class="{{ request()->routeIs('cars.*') ? 'active':'' }}"><a href="{{route('cars.index')}}">Voitures</a></li>
            <li class="dropdown {{ ((request()->routeIs('users.*') && !request()->is('users')) || request()->routeIs('login')) ? 'active': '' }}">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Compte <span class="caret"></span></a>
            <ul class="dropdown-menu">
            @if(!Auth::check())
                <li><a href="{{url('/login')}}">Connexion</a></li>
                <li><a href="{{route('users.create')}}">Inscription</a></li>
            @else
                <li><a href="{{route('users.show',Auth::user()->id)}}">Profile</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{route('users.logout')}}">Déconnexion</a></li>
            @endif
            </ul>
            </li>
            @if(Auth::check() && Auth::user()->isAdmin)
            <li class="dropdown {{ (request()->routeIs('admin.*') || request()->is('commands')|| request()->is('users')) ? 'active': '' }}">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="{{route('admin.index')}}">Voitures</a></li>
                <li><a href="{{route('commands.index')}}">Commandes</a></li>
                <li><a href="{{route('users.index')}}">Inscrits</a></li>
            </ul>
            </li>
            @endif
        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>



