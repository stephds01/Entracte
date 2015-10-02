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
                        {{--<li>ID commande : {{ $order->id }}</li>--}}
                        {{--<li>Facture N° : {{ $item->order_id }}</li>--}}
                        {{--<li>Montant : {{ $order->order_total }}</li>--}}
                        {{--<li>Date : {{ $item->created_date }}</li>--}}
                    </ul>


                </div>
                <div class="ent-detail-informationClient">
                    <h2>Information Client</h2>

                    <ul>
                        {{--@foreach($orderInfo as $item)--}}
                        {{--<li>Nom : {{ $item->billing_last_name }} </li>--}}
                        {{--<li>Prénom : {{ $item->billing_last_name }}</li>--}}
                        {{--<li>Téléphone :{{ $item->billing_phone_1 }}</li>--}}
                        {{--<li>E-mail :{{ $orderInfo->user_email }} </li>--}}
                        {{--<li>Mémo du client : {{ $item->$order->customer_note }}</li>--}}
                        {{--@endforeach--}}
                    </ul>

                </div>
                <div class="ent-detail-infoPaiement">
                    <h2>Information Paiement</h2>
                    {{--<ul>--}}
                        {{--<li>Payé en : {{ $order->orderpayment_type }}</li>--}}
                        {{--<li>Status du paiement : {{ $order->transaction_status }} </li>--}}
                    {{--</ul>--}}

                </div>
                <div class="ent-detail-infoStatut">
                    <h2>Information Statut</h2>

                    <form action="#" method="get"></form>
                    <p><label for="statutCommande">Staut de la commande</label>
                        <select name="statusCommande" id="statusCommande">
                            <option value="enCoursTraitement">En cours de traitement</option>
                            <option value="Annulé">Annulé</option>
                            <option value="EnCoursLivraison">En cours de livraison</option>
                            <option value="livre">Livré</option>
                        </select></p>




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

                {{--//TODO-steph LA BOUCLE FOREACH NE MARCHE PAS ! --}}
                {{--@foreach($orderItem as $item)--}}
                <tr>
                    {{--<td>{{ $order->orderitem_sku  }}</td>--}}
                    {{--<td>{{ $orderItem->orderitem_sku  }}</td>--}}
                    {{--<td>{{ $item->orderitem_name }}</td>--}}
                    {{--<td>{{ $item->orderitem_price }}</td>--}}
                    {{--<td>{{ $item->orderitem_quantity }}</td>--}}
                    {{--<td>{{ $item->orderitem_discount }}</td>--}}
                    {{--<td>{{ $item->orderitem_final_price }}</td>--}}

                {{--</tr>--}}
                {{--@endforeach--}}
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="right">Sous Total</td>
                    <td>.....</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="right">Total</td>
                    <td>.....</td>
                </tr>
            </table>
        </section>

    </div>



    @include('pages.components.footer')

@stop