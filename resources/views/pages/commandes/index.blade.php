@extends('app')


@section('content')
    @include('pages.components.header')
    @include('pages.components.menu')

    <section class="ent-commande-container-global">
        <div class="ent-bandeauTitre-container">
            <ul class="ent-bandeauTitre-titre"><li>Commande en Attente</li></ul>
        </div>


        <div class="ent-commande-tab">

            <table align="center" border="1px"  cellpadding="5px"   width="95%" >
                <tr>
                    <th>Référence commande</th>
                    <th>Heures de commande</th>
                    <th>Heures de validation</th>
                    <th>Heures de la livraison</th>
                    <th>Clients</th>
                    <th>Localité</th>
                    <th>Montant</th>
                    <th>Statut</th>
                    <th>Logo</th>
                    <th>Détails</th>
                </tr>

                @foreach($address as $item)
                <tr>
                    <td>Référence commande</td>
                    <td>Hrs commande</td>
                    <td>Hrs validation</td>
                    <td>hrs livraison</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->city }}</td>
                    <td>Montant</td>
                    <td>{{ $item->type }}</td>
                    <td><i class="fa fa-star fa-3x"></i></td>
                    <td><a href="{{ URL::to( 'details') }}">Voir</a><i class="fa fa-location-arrow fa-2x"></i></td>
                </tr>
                @endforeach




            </table>
        </div>

        <div class="ent-commande-footer">
            <div><i class="fa fa-star fa-2x"></i> Non Lu</div>
            <div><i class="fa fa-clock-o fa-2x"></i> En cours de traitement</div>
            <div><i class="fa fa-exclamation-circle fa-2x"></i> En retard</div>
            <div><i class="fa fa-motorcycle fa-2x"></i> En cours de livraison</div>
            <div><i class="fa fa-check-square-o fa-2x"></i> Livré</div>
        </div>
    </section>
    @include('pages.components.footer')
@stop

