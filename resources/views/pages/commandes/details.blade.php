@extends('app')


@section('content')
    @include('pages.components.header')
    @include('pages.components.menu')


    <div class="ent-detail-container-global">
        <div class="ent-bandeauTitre-container">
            <ul class="ent-bandeauTitre-titre"><li>Détails de la commande</li></ul>
        </div>

        <section class="ent-detail-infoCommande">
            <div class="ent-detail-container">

                <div class="ent-detail-infoCommande">
                    <h2>Information Commande</h2>

                    <ul class="list-group text-primary">
                        <li class="list-group-item">ID commande : <strong>{{ $order->order_id }}</strong></li>
                        <li class="list-group-item">Facture N° : <strong>{{ $order->order_id }}</strong></li>
                        <li class="list-group-item">Montant : <strong>{{ $order->order_total }}</strong></li>
                        <li class="list-group-item">Date : <strong>{{ date('d/m/Y H:i:s',strtotime($order->created_date)+3600*($timezone+date("I")))}}</strong></li>
                    </ul>
                </div>
                <div class="ent-detail-informationClient">
                    <h2>Information Client</h2>

                    <ul class="list-group text-primary">
                        <li class="list-group-item">Nom : <span class="text-capitalize"><strong>{{ $orderInfo->billing_last_name }}</strong> </span></li>
                        <li class="list-group-item">Prénom : <span class="text-capitalize"><strong>{{ $orderInfo->billing_last_name }}</strong></span></li>
                        <li class="list-group-item">Téléphone : <strong>{{ $orderInfo->billing_phone_1 }}</strong></li>
                        <li class="list-group-item">E-mail : <strong>{{ $orderInfo->user_email }}</strong></li>
                        <li class="alert-info">
                            <i class="fa fa-2x fa-pencil-square-o"></i>
                            <span class="">{{ $order->customer_note }}</span>
                        </li>
                    </ul>

                </div>
                <div class="ent-detail-infoPaiement">
                    <h2>Information Paiement</h2>
                    <ul class="list-group text-primary">
                        <li class="list-group-item text-center">Type de paiement : <strong>{{ paiement($order->orderpayment_type) }}</strong></li>
                        <li class="list-group-item text-center">Status du paiement : <strong>{{ $order->transaction_status }}</strong></li>
                    </ul>

                </div>
                <div class="ent-detail-infoStatut">
                    <h2>Information Statut</h2>
                    <ul class="list-group text-primary">
                        <li class="list-group-item text-center">Statut actuel :
                            @if($order->order_state_id == 1 || $order->order_state_id == 4)
                                <i class="fa fa-clock-o fa-2x"></i>
                            @elseif($order->order_state_id == 2)
                                <i class="fa fa-check-square-o fa-2x"></i>
                            @elseif($order->order_state_id == 3)
                                <i class="fa fa-exclamation-circle fa-2x"></i>
                            @elseif($order->order_state_id == 5)
                                <i class="fa fa-times fa-2x"></i>
                            @endif
                        </li>
                        <li class="list-group-item text-center">
                            <form action="{{route('valid_status')}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                                <label for="order_state" class="label label-info">Statut de la commande</label>
                                <select name="order_state" id="order_state">
                                    <option value="">...</option>
                                    <option value="stay">En cours de traitement</option>
                                    <option value="confirm"><i class="fa fa-check-square-o fa-2x"></i> Livré</option>
                                    <option value="stop"><i class="fa fa-exclamation-circle fa-2x"></i> Commande Annulée</option>
                                </select>
                                <button type="submit" name="state" class="btn btn-success"><i class="fa fa-check"></i></button>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
        </section>

        <section class="ent-detail-detailCommande" >
            <h2>Détails de la Commande</h2>

            <table align="center" border="1px" cellpadding="5px" width="60%">
                <tr>
                    <th>Sku</th>
                    <th>Articles</th>
                    <th>Options</th>
                    <th>Prix Unitaire (hors options)</th>
                    <th>Quantité</th>
                    <th>Prix Total</th>
                </tr>

                @foreach($orderItems as $item)
                    <tr class="alert-info">
                        <td>{{ $item->orderitem_sku }}</td>
                        <td><strong>{{ $item->orderitem_name }}</strong></td>
                        <td>
                            @foreach($attrib as $v)
                                <?php $sku= $v->orderitem_id;
                                $opt=$v->orderitem_attribute_names;
                                $opt = explode('\\', $opt);
                                ?>
                                    @foreach($opt as $k=>$val)
                                        @if($val == '"value')
                                            @if($sku == $item->orderitem_id)
                                                <strong>{{str_replace('"', '', $opt[$k+2])}}</strong>
                                                <br>
                                            @endif
                                        @endif
                                    @endforeach
                            @endforeach
                        </td>
                        <td><strong>{{ floatval($item->orderitem_price) }} €</strong></td>
                        <td><strong>{{ $item->orderitem_quantity }}</strong></td>
                        <td><strong>{{ floatval($item->orderitem_final_price) }} €</strong></td>

                </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="right"></td>
                </tr>
                <tr class="alert-info">

                <td colspan="5" class="right">Sous-total</td>
                    <td><strong>{{ floatval($order->order_subtotal)}} €</strong></td>
                </tr>
                <tr class="alert-info">
                    <td colspan="5" class="right">Réduction</td>
                    <td><strong>{{ floatval($order->order_discount)}} €</strong></td>
                </tr>
                <tr class="alert-info">
                    <td colspan="5" class="right">Total</td>
                    <td><strong>{{ floatval($order->order_total) }} €</strong></td>
                </tr>
            </table>
        </section>

    </div>



    @include('pages.components.footer')

@stop