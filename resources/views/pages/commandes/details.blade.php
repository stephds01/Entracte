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

                    <ul>
                        <li>ID commande : {{ $order->order_id }}</li>
                        <li>Facture N° : {{ $order->order_id }}</li>
                        <li>Montant : {{ $order->order_total }}</li>
                        <li>Date : {{ date('d/m/Y H:i:s',strtotime($order->created_date)+3600*($timezone+date("I")))}}</li>
                    </ul>
                </div>
                <div class="ent-detail-informationClient">
                    <h2>Information Client</h2>

                    <ul>
                        <li>Nom : {{ $orderInfo->billing_last_name }} </li>
                        <li>Prénom : {{ $orderInfo->billing_last_name }}</li>
                        <li>Téléphone :{{ $orderInfo->billing_phone_1 }}</li>
                        <li>E-mail :{{ $orderInfo->user_email }} </li>
                        <li class="bg-info text-primary">Mémo du client : {{ $order->customer_note }}</li>
                    </ul>

                </div>
                <div class="ent-detail-infoPaiement">
                    <h2>Information Paiement</h2>
                    <ul>
                        <li>{{ paiement($order->orderpayment_type) }}</li>
                        <li>Status du paiement : {{ $order->transaction_status }} </li>
                    </ul>

                </div>
                <div class="ent-detail-infoStatut">
                    <h2>Information Statut</h2>
                    <p>Statut actuel :
                        @if($order->order_state_id == 1)
                            <i class="fa fa-clock-o fa-2x"></i>
                        @elseif($order->order_state_id == 2)
                            <i class="fa fa-check-square-o fa-2x"></i>
                        @elseif($order->order_state_id == 3 || $order->order_state_id == 5)
                            <i class="fa fa-exclamation-circle fa-2x"></i>
                        @endif
                    </p>
                    <form action="{{route('valid_status')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                        <p>
                            <label for="order_state">Statut de la commande</label>
                            <select name="order_state" id="order_state">
                                <option value="">...</option>
                                <option value="stay">En cours de traitement</option>
                                <option value="confirm"><i class="fa fa-check-square-o fa-2x"></i> Livré</option>
                                <option value="stop"><i class="fa fa-exclamation-circle fa-2x"></i> Commande Annulée</option>
                            </select>
                            <input type="submit" value="valider" name="state">
                        </p>
                    </form>
                </div>

            </div>
        </section>

        <section class="ent-detail-detailCommande" >
            <h2>Détails de la Commande</h2>

            <table align="center" border="1px" cellpadding="5px" width="60%">
                <tr>
                    <th>Sku</th>
                    <th>Article</th>
                    <th>Options</th>
                    <th>Prix Unitaire</th>
                    <th>Quantité</th>
                    <th>Prix Total</th>
                </tr>

                @foreach($orderItems as $item)
                <tr>
                    <td>{{ $item->orderitem_sku }}</td>
                    <td>{{ $item->orderitem_name }}</td>
                    <td>
                    @foreach($attrib as $v)

                    <?php $sku= $v->orderitem_id;
                            $opt=$v->orderitem_attribute_names;
                    $opt = explode('\\', $opt);
                        ?>
                    @foreach($opt as $k=>$val)
                        @if($val == '"value')
                            @if($sku == $item->orderitem_id)
                                    {{str_replace('"', '', $opt[$k+2])}}
                                    <br>
                                @endif
                        @endif
                    @endforeach
                    @endforeach
                        </td>
                        <td>{{ floatval($item->orderitem_price) }} €</td>
                    <td>{{ $item->orderitem_quantity }}</td>
                    <td>{{ floatval($item->orderitem_final_price) }} €</td>

                </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="right"></td>
                </tr>
                <tr>
                    <td colspan="5" class="right">Sous-total</td>
                    <td>{{ floatval($order->order_subtotal)}} €</td>
                </tr>
                <tr>
                    <td colspan="5" class="right">Réduction</td>
                    <td>{{ floatval($order->order_discount)}} €</td>
                </tr>
                <tr>
                    <td colspan="5" class="right">Total</td>
                    <td>{{ floatval($order->order_total) }} €</td>
                </tr>
            </table>
        </section>

    </div>



    @include('pages.components.footer')

@stop