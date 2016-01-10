@extends('app')


@section('content')
    @include('pages.components.header')
    @include('pages.components.menu')

    <section class="ent-commande-container-global">

        <!-- Nav tabs -->
        <div class="ent-bandeauTitre-container">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#histo" aria-controls="home" role="tab" data-toggle="tab">Historique</a></li>
                <li role="presentation"><a href="#wait" aria-controls="profile" role="tab" data-toggle="tab">Commandes en attente</a></li>
                <li role="presentation"><a href="#livraison" aria-controls="messages" role="tab" data-toggle="tab">Commandes en cours de livraisons</a></li>
                <li role="presentation"><a href="#confirm" aria-controls="settings" role="tab" data-toggle="tab">Commandes livrées</a></li>
                <li role="presentation"><a href="#stop" aria-controls="settings" role="tab" data-toggle="tab">Commandes annulées</a></li>
            </ul>
        </div>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="histo">
                <div class="ent-bandeauTitre-container">
                    <ul class="ent-bandeauTitre-titre">
                        <li>Historique des commandes</li>
                    </ul>
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
                            <tr>
                                <td>{{ $item->order_id }}</td>
                                <td>{{ $item->order->created_date }}</td>
                                <td>{{ $item->billing_last_name }} {{ $item->billing_first_name }}</td>
                                <td>{{ $item->billing_address_1 }}<br>
                                    {{ $item->billing_zip }}<br>
                                    {{ $item->billing_city }}
                                </td>
                                <td>{{ $item->order->order_total}}</td>
                                <td>
                                    @if($item->order->order_state_id == 0)
                                        <i class="fa fa-star fa-2x"></i>
                                    @elseif($item->order->order_state_id == 1)
                                        <i class="fa fa-clock-o fa-2x"></i>
                                    @elseif($item->order->order_state_id == 2)
                                        <i class="fa fa-check-square-o fa-2x"></i>
                                    @elseif($item->order->order_state_id == 3)
                                        <i class="fa fa-exclamation-circle fa-2x"></i>
                                    @elseif($item->order->order_state_id == 4)
                                        <i class="fa fa-motorcycle fa-2x"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ URL::to( '/details') }}/{{ $item->order_id }}">
                                        <i class="fa fa-plus fa-2x"></i>
                                    </a>
                                </td>
                                @if($item->order->order_state_id == 2)
                                    <td>
                                        <i class="fa fa-download fa-2x"></i>
                                    </td>
                                @else
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach
                        @if(count($order)==0)
                            <tr>
                                <td colspan="9">Aucune commande</td>
                            </tr>
                        @endif
                    </table>
                </div>

            </div>

            <div role="tabpanel" class="tab-pane" id="wait">
                <div class="ent-bandeauTitre-container">
                    <ul class="ent-bandeauTitre-titre">
                        <li>Historique des commandes en attente</li>
                    </ul>
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
                            @if($item->order->order_state_id == 1)
                                <tr>
                                    <td>{{ $item->order_id }}</td>
                                    <td>{{ $item->order->created_date }}</td>
                                    <td>{{ $item->billing_last_name }} {{ $item->billing_first_name }}</td>
                                    <td>{{ $item->billing_address_1 }}<br>
                                        {{ $item->billing_zip }}<br>
                                        {{ $item->billing_city }}
                                    </td>
                                    <td>{{ $item->order->order_total}}</td>
                                    <td>
                                        @if($item->order->order_state_id == 0)
                                            <i class="fa fa-star fa-2x"></i>
                                        @elseif($item->order->order_state_id == 1)
                                            <i class="fa fa-clock-o fa-2x"></i>
                                        @elseif($item->order->order_state_id == 2)
                                            <i class="fa fa-check-square-o fa-2x"></i>
                                        @elseif($item->order->order_state_id == 3)
                                            <i class="fa fa-exclamation-circle fa-2x"></i>
                                        @elseif($item->order->order_state_id == 4)
                                            <i class="fa fa-motorcycle fa-2x"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to( '/details') }}/{{ $item->order_id }}">
                                            <i class="fa fa-plus fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        @if(count($wait)==0)
                            <tr>
                                <td colspan="9">Aucune commande en attente</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="livraison">
                <div class="ent-bandeauTitre-container">
                    <ul class="ent-bandeauTitre-titre">
                        <li>Historique des commandes en livraison</li>
                    </ul>
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
                            @if($item->order->order_state_id == 4)
                                <tr>
                                    <td>{{ $item->order_id }}</td>
                                    <td>{{ $item->order->created_date }}</td>
                                    <td>{{ $item->billing_last_name }} {{ $item->billing_first_name }}</td>
                                    <td>{{ $item->billing_address_1 }}<br>
                                        {{ $item->billing_zip }}<br>
                                        {{ $item->billing_city }}
                                    </td>
                                    <td>{{ $item->order->order_total}}</td>
                                    <td>
                                        @if($item->order->order_state_id == 0)
                                            <i class="fa fa-star fa-2x"></i>
                                        @elseif($item->order->order_state_id == 1)
                                            <i class="fa fa-clock-o fa-2x"></i>
                                        @elseif($item->order->order_state_id == 2)
                                            <i class="fa fa-check-square-o fa-2x"></i>
                                        @elseif($item->order->order_state_id == 3)
                                            <i class="fa fa-exclamation-circle fa-2x"></i>
                                        @elseif($item->order->order_state_id == 4)
                                            <i class="fa fa-motorcycle fa-2x"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to( '/details') }}/{{ $item->order_id }}">
                                            <i class="fa fa-plus fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        @if(count($road)==0)
                            <tr>
                                <td colspan="9">Aucune commande en livraison</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="confirm">
                <div class="ent-bandeauTitre-container">
                    <ul class="ent-bandeauTitre-titre">
                        <li>Historique des commandes livrées</li>
                    </ul>
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
                            <th>Facture</th>
                        </tr>

                        @foreach($orderInfo as $item)
                            @if($item->order->order_state_id == 2)
                                <tr>
                                    <td>{{ $item->order_id }}</td>
                                    <td>{{ $item->order->created_date }}</td>
                                    <td>{{ $item->billing_last_name }} {{ $item->billing_first_name }}</td>
                                    <td>{{ $item->billing_address_1 }}<br>
                                        {{ $item->billing_zip }}<br>
                                        {{ $item->billing_city }}
                                    </td>
                                    <td>{{ $item->order->order_total}}</td>
                                    <td>
                                        @if($item->order->order_state_id == 0)
                                            <i class="fa fa-star fa-2x"></i>
                                        @elseif($item->order->order_state_id == 1)
                                            <i class="fa fa-clock-o fa-2x"></i>
                                        @elseif($item->order->order_state_id == 2)
                                            <i class="fa fa-check-square-o fa-2x"></i>
                                        @elseif($item->order->order_state_id == 3)
                                            <i class="fa fa-exclamation-circle fa-2x"></i>
                                        @elseif($item->order->order_state_id == 4)
                                            <i class="fa fa-motorcycle fa-2x"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to( '/details') }}/{{ $item->order_id }}">
                                            <i class="fa fa-plus fa-2x"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <i class="fa fa-download fa-2x"></i>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        @if(count($confirm)==0)
                            <tr>
                                <td colspan="9">Aucune commande livrée</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="stop">
                <div class="ent-bandeauTitre-container">
                    <ul class="ent-bandeauTitre-titre">
                        <li>Historique des commandes annulées</li>
                    </ul>
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
                            @if($item->order->order_state_id == 3)
                                <tr>
                                    <td>{{ $item->order_id }}</td>
                                    <td>{{ $item->order->created_date }}</td>
                                    <td>{{ $item->billing_last_name }} {{ $item->billing_first_name }}</td>
                                    <td>{{ $item->billing_address_1 }}<br>
                                        {{ $item->billing_zip }}<br>
                                        {{ $item->billing_city }}
                                    </td>
                                    <td>{{ $item->order->order_total}}</td>
                                    <td>
                                        @if($item->order->order_state_id == 0)
                                            <i class="fa fa-star fa-2x"></i>
                                        @elseif($item->order->order_state_id == 1)
                                            <i class="fa fa-clock-o fa-2x"></i>
                                        @elseif($item->order->order_state_id == 2)
                                            <i class="fa fa-check-square-o fa-2x"></i>
                                        @elseif($item->order->order_state_id == 3)
                                            <i class="fa fa-exclamation-circle fa-2x"></i>
                                        @elseif($item->order->order_state_id == 4)
                                            <i class="fa fa-motorcycle fa-2x"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to( '/details') }}/{{ $item->order_id }}">
                                            <i class="fa fa-plus fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        @if(count($stop)== 0)
                            <tr>
                                <td colspan="9">Aucune commande annulée</td>
                            </tr>
                        @endif

                    </table>
                </div>
            </div>
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

