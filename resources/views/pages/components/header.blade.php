<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand images" href="#"><img src="{{asset('images/vignette-logo-entracte-pizzeria-95.png')}}"  alt="Logo restaurant pizzeria l'Entracte" height="50"/></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}"><h6>Restaurant - Pizzeria L'Entracte<br />Gestion des commandes</h6></a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a class="href="{{ url('/auth/login') }}">Se connecter</a></li>
                    <li><a href="{{ url('/auth/register') }}">Créer un compte</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/auth/logout') }}">Se déconnecter</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>











