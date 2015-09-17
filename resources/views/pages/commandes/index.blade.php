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
                    <th>Clients</th>
                    <th>Adresse</th>
                    <th>Code Postal</th>
                    <th>Localité</th>
                    <th>Montant</th>
                    <th>Logo</th>
                    <th>Détails</th>
                </tr>

                @foreach($orderInfo as $item)
                <tr>
                    <td>{{ $item->order_id }}</td>
                    <td>....</td>
                    <td>{{ $item->billing_last_name }} {{ $item->billing_first_name }}</td>
                    <td>{{ $item->billing_address_1 }}</td>
                    <td>{{ $item->billing_zip }}</td>
                    <td>{{ $item->billing_city }}</td>
                    <td>....</td>
                    <td><i class="fa fa-star fa-3x"></i></td>
                    <td><a href="{{ URL::to( 'details') }}/{{ $item->user_id }}">Voir</a><i class="fa fa-location-arrow fa-2x"></i></td>
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

