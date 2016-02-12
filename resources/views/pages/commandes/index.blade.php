@extends('app')


@section('content')
    @include('pages.components.header')
    @include('pages.components.menu')

    <section class="ent-commande-container-global">

        <!-- Nav tabs -->
        <div class="ent-bandeauMenu">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#histo" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-eye"></i> Toutes les commandes</a></li>
                <li role="presentation"><a href="#wait" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-clock-o"></i> Commandes en cours</a></li>
                <li role="presentation"><a href="#confirm" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-check-square-o"></i> Commandes livrées</a></li>
                <li role="presentation"><a href="#stop" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-exclamation-circle"></i> Commandes annulées <i class="fa fa-times"></i></a></li>
            </ul>
        </div>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="histo">
                <div class="ent-bandeauTitre-container">
                    <ul class="ent-bandeauTitre-titre">
                        <li>Toutes les commandes</li>
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
                                <td>{{ date('d/m/Y H:i:s',strtotime($item->created_date )+3600*($timezone+date("I")))}}</td>
                                <td>{{ $item->billing_last_name }} {{ $item->billing_first_name }}</td>
                                <td>{{ $item->billing_address_1 }}<br>
                                    {{ $item->billing_zip }}<br>
                                    {{ $item->billing_city }}
                                </td>
                                <td>{{ floatval($item->order_total)}} €</td>
                                <td>
                                    @if($item->order_state_id == 1 || $item->order_state_id == 4)
                                        <i class="fa fa-clock-o fa-2x"></i>
                                    @elseif($item->order_state_id == 2)
                                        <i class="fa fa-check-square-o fa-2x"></i>
                                    @elseif($item->order_state_id == 3)
                                        <i class="fa fa-exclamation-circle fa-2x"></i>
                                    @elseif($item->order_state_id == 5)
                                        <i class="fa fa-times fa-2x"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ URL::to( '/commande') }}/{{ $item->order_id }}">
                                        <i class="fa fa-plus fa-2x"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @if(is_null(count($order)))
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
                        <li>Commandes en cours</li>
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
                            @if($item->order_state_id == 1 || $item->order_state_id == 4)
                                <tr>
                                    <td>{{ $item->order_id }}</td>
                                    <td>{{ date('d/m/Y H:i:s',strtotime($item->created_date )+3600*($timezone+date("I")))}}</td>
                                    <td>{{ $item->billing_last_name }} {{ $item->billing_first_name }}</td>
                                    <td>{{ $item->billing_address_1 }}<br>
                                        {{ $item->billing_zip }}<br>
                                        {{ $item->billing_city }}
                                    </td>
                                    <td>{{ floatval($item->order_total)}} €</td>
                                    <td>
                                        @if($item->order_state_id == 1 || $item->order_state_id == 4)
                                            <i class="fa fa-clock-o fa-2x"></i>
                                        @elseif($item->order_state_id == 2)
                                            <i class="fa fa-check-square-o fa-2x"></i>
                                        @elseif($item->order_state_id == 3)
                                            <i class="fa fa-exclamation-circle fa-2x"></i>
                                        @elseif($item->order_state_id == 5)
                                            <i class="fa fa-times fa-2x"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to( '/commande') }}/{{ $item->order_id }}">
                                            <i class="fa fa-plus fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        @if(is_null($wait))
                            <tr>
                                <td colspan="9">Aucune commande en attente</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="confirm">
                <div class="ent-bandeauTitre-container">
                    <ul class="ent-bandeauTitre-titre">
                        <li>Commandes livrées</li>
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
                            @if($item->order_state_id == 2)
                                <tr>
                                    <td>{{ $item->order_id }}</td>
                                    <td>{{ date('d/m/Y H:i:s',strtotime($item->created_date )+3600*($timezone+date("I")))}}</td>
                                    <td>{{ $item->billing_last_name }} {{ $item->billing_first_name }}</td>
                                    <td>{{ $item->billing_address_1 }}<br>
                                        {{ $item->billing_zip }}<br>
                                        {{ $item->billing_city }}
                                    </td>
                                    <td>{{ floatval($item->order_total)}} €</td>
                                    <td>
                                        @if($item->order_state_id == 1 || $item->order_state_id == 4)
                                            <i class="fa fa-clock-o fa-2x"></i>
                                        @elseif($item->order_state_id == 2)
                                            <i class="fa fa-check-square-o fa-2x"></i>
                                        @elseif($item->order_state_id == 3)
                                            <i class="fa fa-exclamation-circle fa-2x"></i>
                                        @elseif($item->order_state_id == 5)
                                            <i class="fa fa-times fa-2x"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to( '/commande') }}/{{ $item->order_id }}">
                                            <i class="fa fa-plus fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        @if($confirm == 0)
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
                        <li>Commandes annulées</li>
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
                            @if($item->order_state_id == 3 || $item->order_state_id == 5)
                                <tr>
                                    <td>{{ $item->order_id }}</td>
                                    <td>{{ date('d/m/Y H:i:s',strtotime($item->created_date )+3600*($timezone+date("I")))}}</td>
                                    <td>{{ $item->billing_last_name }} {{ $item->billing_first_name }}</td>
                                    <td>{{ $item->billing_address_1 }}<br>
                                        {{ $item->billing_zip }}<br>
                                        {{ $item->billing_city }}
                                    </td>
                                    <td>{{ floatval($item->order_total)}} €</td>
                                    <td>
                                        @if($item->order_state_id == 1 || $item->order_state_id == 4)
                                            <i class="fa fa-clock-o fa-2x"></i>
                                        @elseif($item->order_state_id == 2)
                                            <i class="fa fa-check-square-o fa-2x"></i>
                                        @elseif($item->order_state_id == 3)
                                            <i class="fa fa-exclamation-circle fa-2x"></i>
                                        @elseif($item->order_state_id == 5)
                                            <i class="fa fa-times fa-2x"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to( '/commande') }}/{{ $item->order_id }}">
                                            <i class="fa fa-plus fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        @if(is_null($stop))
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
            <div><i class="fa fa-times fa-2x"></i> Paiement non finalisé</div>
            <div><i class="fa fa-check-square-o fa-2x"></i> Livré</div>
        </div>
    </section>
    @include('pages.components.footer')
@stop

