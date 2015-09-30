@extends('app')
@include('pages.components.header')
@section('content')


    @include('pages.components.menu')
    <section class="ent-home-container-global">
        <div class="ent-bandeauTitre-container">
            <ul class="ent-bandeauTitre-titre"><li>Historique des commandes</li></ul>
        </div>
        <div class="ent-home-tab">

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
                    <th>Facture</th>
                </tr>


                {{--@foreach($orderInfo as $item)--}}
                {{--<tr>--}}
                    {{--<td>{{ $item->order_id }}</td>--}}
                    {{--//TODO-steph Je n'arrive pas as bouclé la 2ème table--}}
                    {{--<td>{{ $item->order->created_date }}</td>--}}
                    {{--<td>{{ $item->billing_last_name }} {{ $item->billing_first_name }}</td>--}}
                    {{--<td>{{ $item->billing_address_1 }}</td>--}}
                    {{--<td>{{ $item->billing_zip }}</td>--}}
                    {{--<td>{{ $item->billing_city }}</td>--}}
                    {{--<td>{{ $item->orderItem->orderitem_name }}</td>--}}
                    {{--<td>{{ $item->order->order_total}}</td>--}}
                    {{--<td>Logo</td>--}}
                    {{--<td><a href="{{ URL::to( '/details') }}/{{ $item->orderinfo_id }}">Voir</a><i class="fa fa-location-arrow fa-2x"></i></td>--}}

                {{--</tr>--}}
                {{--@endforeach--}}

                @foreach($orderInfo as $item)
                <tr>
                <td>{{ $item->order_id }}</td>
                <td>{{ $item->order->created_date }}</td>
                <td>{{ $item->billing_last_name }} {{ $item->billing_first_name }}</td>
                <td>{{ $item->billing_address_1 }}</td>
                <td>{{ $item->billing_zip }}</td>
                <td>{{ $item->billing_city }}</td>
                    {{--Essaye de mettre en relation la table orderItem--}}
                {{--<td>{{ $item->orderItem->orderitem_name }}</td>--}}
                <td>{{ $item->order->order_total}}</td>
                <td>Logo</td>
                <td><a href="{{ URL::to( '/details') }}/{{ $item->orderinfo_id }}">Voir</a><i class="fa fa-location-arrow fa-2x"></i></td>
                <td><i class="fa fa-file-pdf-o fa-2x"></i></td>
                </tr>
                @endforeach




            </table>
        </div>

        <div class="ent-home-footer">
            <div><i class="fa fa-star fa-2x"></i> Non Lu</div>
            <div><i class="fa fa-clock-o fa-2x"></i> En cours de traitement</div>
            <div><i class="fa fa-times fa-2x"></i> Annulé</div>
            <div><i class="fa fa-motorcycle fa-2x"></i> En cours de livraison</div>
            <div><i class="fa fa-check-square-o fa-2x"></i> Livré</div>
        </div>
    </section>
    @include('pages.components.footer')
@stop

