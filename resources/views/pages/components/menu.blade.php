<nav>
    <div class="ent-menu-container">

        <ul class="ent-menu">
            <li><a href="{{ URL::to('/') }}">Historique des commandes</a></li>
            <li><a href="{{ URL::to('commandes') }}">Commandes en attente</a></li>
            <li><a href="{{ URL::to('statistiques') }}">Statistiques</a></li>
            {{--<li><a href="{{ URL::to( 'factures') }}">Factures</a></li>--}}
        </ul>
    </div>
</nav>

