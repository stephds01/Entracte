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
                        <li>Date : {{ $order->created_date }}</li>
                    </ul>


                </div>
                <div class="ent-detail-informationClient">
                    <h2>Information Client</h2>

                    <ul>
                        <li>Nom : {{ $orderInfo->billing_last_name }} </li>
                        <li>Prénom : {{ $orderInfo->billing_last_name }}</li>
                        <li>Téléphone :{{ $orderInfo->billing_phone_1 }}</li>
                        <li>E-mail :{{ $orderInfo->user_email }} </li>
                        <li>Mémo du client : {{ $order->customer_note }}</li>
                    </ul>

                </div>
                <div class="ent-detail-infoPaiement">
                    <h2>Information Paiement</h2>
                    <ul>
                        <li>Payé en : {{ $order->orderpayment_type }}</li>
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
                        @elseif($order->order_state_id == 3)
                            <i class="fa fa-exclamation-circle fa-2x"></i>
                        @elseif($order->order_state_id == 4)
                            <i class="fa fa-motorcycle fa-2x"></i>
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
                            <option value="livraison"><i class="fa fa-motorcycle fa-2x"></i> En cours de livraison</option>
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
                    <th>Réduction</th>
                    <th>Prix Total</th>
                </tr>

                @foreach($orderItems as $item)
                <tr>
                    <td>{{ $item->orderitem_sku }}</td>
                    <td>{{ $item->orderitem_name }}</td>
                    {{--<td>{{ $item->orderitem_attributes }} </td>--}}
                    <td>{{ $item->orderitem_price }} €</td>
                    <td>{{ $item->orderitem_quantity }}</td>
                    <td>{{ $item->orderitem_discount }}</td>
                    <td>{{ $item->orderitem_final_price }} €</td>

                </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="right">Total</td>
                    <td>{{ $order->order_total }} €</td>
                </tr>
            </table>
        </section>

    </div>



    @include('pages.components.footer')

@stop