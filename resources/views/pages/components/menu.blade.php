<nav>
    <div class="ent-menu-container">

        <ul class="ent-menu">
            <li><a href="{{ URL::to( 'commandes') }}">Commandes en attente</a></li>
            <li><a href="{{ url::to( '/') }}">Historiques des commandes</a></li>
            <li><a href="{{ URL::to('statistiques') }}">Statistiques</a></li>
            <li><a href="{{ URL::to( 'factures') }}">Factures</a></li>
        </ul>
    </div>
</nav>

<div class="ent-bandeauTitre-container">
    <ul class="ent-bandeauTitre-titre"><li>Titre de la page --> Change selon la page</li></ul>
</div>