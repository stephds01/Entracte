    @extends('app')
@include('pages.components.header')
@section('content')


    @include('pages.components.menu')
    <section class="ent-home-container-global">
            <article class="home-stats">
                <div>
                    <p>
                        <span class="text-info">{{count($order)}}</span>
                        commandes au total
                    </p>
                </div>
                <div>
                    <p>
                        <span class="text-info">{{$stay}}</span>
                        commandes en cours
                    </p>
                </div>
                <div>
                    <p>
                        <span  class="text-info">{{$confirm}}</span>
                        commandes livrées
                    </p>
                </div>
                <div>
                    <p>
                        <span  class="text-danger">{{$stop}}</span>
                        commandes annulées
                    </p>
                </div>
                <div>
                    <p>Total CA :
                        <span class="text-success">{{number_format($total, 2)}} €</span>
                    </p>
                </div>
            </article>



        <div class="ent-bandeauTitre-container">
            <ul class="ent-bandeauTitre-titre"><li>Dernières commandes</li></ul>
        </div>
        <div class="ent-home-tab">

            <table align="center" border="1px"  cellpadding="5px"   width="95%" >
                <tr>
                    <th>Référence commande</th>
                    <th>Heures de commande</th>
                    <th>Clients</th>
                    <th>Adresse</th>
                    <th>Montant</th>
                    <th>Logo</th>
                    <th>Détails</th>
                </tr>

                @foreach($orderInfo as $item)

                    @if($item->order_state_id == 1 || $item->order_state_id == 4)
                        <tr>
                            <td>{{ $item->order_id }}</td>
                            <td>{{ date('d/m/Y H:i:s',strtotime($item->created_date )+3600*($timezone+date("I")))}}</td>
                            <td>{{ $item->billing_last_name }} {{ $item->billing_first_name }}</td>
                            <td>{{ $item->billing_address_1 }}<br>
                                {{ $item->billing_zip }}<br>
                                {{ $item->billing_city }}
                            </td>
                            <td>{{ number_format(floatval($item->order_total), 2)}} €</td>
                            <td><i class="fa fa-clock-o fa-2x"></i></td>
                            <td><a href="{{ URL::to( '/commande') }}/{{ $item->order_id }}">
                                    <i class="fa fa-plus fa-2x"></i></a>
                            </td>
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

        <div class="ent-home-footer">
            <div><i class="fa fa-clock-o fa-2x"></i> En cours de traitement</div>
            <div><i class="fa fa-exclamation-circle fa-2x"></i> Commande Annulée</div>
            <div><i class="fa fa-times fa-2x"></i> Paiement non finalisé</div>
            <div><i class="fa fa-check-square-o fa-2x"></i> Livré</div>
        </div>
    </section>
    @include('pages.components.footer')
@stop

