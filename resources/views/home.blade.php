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
                    <th>Heures de validation</th>
                    <th>Heures de la livraison</th>
                    <th>Clients</th>
                    <th>Localité</th>
                    <th>Montant</th>
                    <th>Logo</th>
                    <th>Détails</th>
                    <th>Facture</th>
                </tr>

                <tr>
                    <td>Ref commande</td>
                    <td>Hrs commande</td>
                    <td>Hrs validation</td>
                    <td>hrs livraison</td>
                    <td>Clients</td>
                    <td>Localité</td>
                    <td>Montant</td>
                    <td><i class="fa fa-star fa-3x"></i></td>
                    <td><a href="{{ URL::to( 'details') }}">Voir</a><i class="fa fa-location-arrow fa-2x"></i></td>
                    <td><i class="fa fa-file-pdf-o fa-2x"></i></td>
                </tr>

                <tr>
                    <td>Ref commande</td>
                    <td>Hrs commande</td>
                    <td>Hrs validation</td>
                    <td>hrs livraison</td>
                    <td>Clients</td>
                    <td>Localité</td>
                    <td>Montant</td>
                    <td><i class="fa fa-clock-o fa-3x"></i></td>
                    <td><a href="{{ URL::to( 'details') }}">Voir</a><i class="fa fa-location-arrow fa-2x"></i></td>
                    <td><i class="fa fa-file-pdf-o fa-2x"></i></td>

                </tr>

                <tr>
                    <td>Ref commande</td>
                    <td>Hrs commande</td>
                    <td>Hrs validation</td>
                    <td>hrs livraison</td>
                    <td>Clients</td>
                    <td>Localité</td>
                    <td>Montant</td>
                    <td><i class="fa fa-times fa-3x"></i></td>
                    <td><a href="{{ URL::to( 'details') }}">Voir</a><i class="fa fa-location-arrow fa-2x"></i></td>
                    <td><i class="fa fa-file-pdf-o fa-2x"></i></td>

                </tr>

                <tr>
                    <td>Ref commande</td>
                    <td>Hrs commande</td>
                    <td>Hrs validation</td>
                    <td>hrs livraison</td>
                    <td>Clients</td>
                    <td>Localité</td>
                    <td>Montant</td>
                    <td><i class="fa fa-check-square-o fa-3x"></i></td>
                    <td><a href="{{ URL::to( 'details') }}">Voir</a><i class="fa fa-location-arrow fa-2x"></i></td>
                    <td><i class="fa fa-file-pdf-o fa-2x"></i></td>

                </tr>

                <tr>
                    <td>Ref commande</td>
                    <td>Hrs commande</td>
                    <td>Hrs validation</td>
                    <td>hrs livraison</td>
                    <td>Clients</td>
                    <td>Localité</td>
                    <td>Montant</td>
                    <td><i class="fa fa-motorcycle fa-3x"></i></td>
                    <td><a href="{{ URL::to( 'details') }}">Voir</a><i class="fa fa-location-arrow fa-2x"></i></td>
                    <td><i class="fa fa-file-pdf-o fa-2x"></i></td>

                </tr>


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

