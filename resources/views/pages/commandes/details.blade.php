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
                        <li>ID commande : {{ $orderInfo->order_id }}</li>
                        <li>Facture N° : {{ $orderInfo->order_id }}</li>
                        {{--<li>Montant : {{ $orderStatus->order_total }}</li>--}}
                        {{--<li>Date : {{ $orderStatus->created_date }}</li>--}}
                    </ul>

                </div>
                <div class="ent-detail-informationClient">
                    <h2>Information Client</h2>

                    <ul>
                        <li>Nom : {{ $orderInfo->billing_last_name }} </li>
                        <li>Prénom : {{ $orderInfo->billing_last_name }}</li>
                        <li>Téléphone :{{ $orderInfo->billing_phone_1 }}</li>
                        <li>E-mail :{{ $orderInfo->user_email }} </li>
                        {{--<li>Mémo du client : {{ $orderStatus->customer_note }}</li>--}}
                    </ul>

                </div>
                <div class="ent-detail-infoPaiement">
                    <h2>Information Paiement</h2>

                    <form action="#" method="get"></form>
                    <p><label for="statut">Statut du paiement</label>
                        <select name="statusPaiement" id="statusPaiement">
                            <option value="Confirme">Confirmé</option>
                            <option value="Echoue">Echoué</option>
                            <option value="En Attente">En Attente</option>
                        </select></p>
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
                    <th>Article</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                </tr>
                <tr>
                    <td>.....</td>
                    <td>.....</td>
                    <td>.....</td>
                </tr>
                <tr>
                    <td>.....</td>
                    <td>.....</td>
                    <td>.....</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td class="right">Sous Total</td>
                    <td>.....</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td class="right">Total</td>
                    <td>.....</td>
                </tr>
            </table>
        </section>

    </div>



    @include('pages.components.footer')

@stop