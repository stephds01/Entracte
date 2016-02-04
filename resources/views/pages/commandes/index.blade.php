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
                    <th>Montant</th>
                    <th>Statut</th>
                    <th>Détails</th>
                </tr>

                @foreach($orderInfo as $item)
                    @if($item->order->order_state_id === 1)
                        <tr>
                            <td>{{ $item->order_id }}</td>
                            <td>{{ $item->order->created_date }}</td>
                            <td>{{ $item->billing_last_name }} {{ $item->billing_first_name }}</td>
                            <td>{{ $item->billing_address_1 }}<br>
                                {{ $item->billing_zip }}<br>
                                {{ $item->billing_city }}
                            </td>
                            <td>{{ $item->order->order_total}}</td>
                            <td><i class="fa fa-clock-o fa-2x"></i></td>
                            <td><a href="{{ URL::to( '/details') }}/{{ $item->order_id }}">Voir</a><i class="fa fa-location-arrow fa-2x"></i></td>
                        </tr>
                    @endif
                @endforeach

                    @if(count($order)=== 0)
                        <tr>
                            <td colspan="9">Aucune commande en attente</td>
                        </tr>
                    @endif




            </table>
        </div>

        <div class="ent-commande-footer">
            <div><i class="fa fa-clock-o fa-2x"></i>En cours de traitement</div>
            <div><i class="fa fa-exclamation-circle fa-2x"></i> Commande Annulée</div>
            <div><i class="fa fa-motorcycle fa-2x"></i> En cours de livraison</div>
            <div><i class="fa fa-check-square-o fa-2x"></i> Livré</div>
        </div>
    </section>
    @include('pages.components.footer')
@stop

