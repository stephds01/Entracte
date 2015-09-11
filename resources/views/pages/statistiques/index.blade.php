@extends('app')



@section('content')

    @include('pages.components.header')
    @include('pages.components.menu')


    <div class="ent-statistique-container-global">
        <div class="ent-bandeauTitre-container">
            <ul class="ent-bandeauTitre-titre"><li>Statistiques</li></ul>
        </div>


        <section class="ent-statistique-container">

            <div class="ent-statistique-tab">

                <table align="center" border="1px"  cellpadding="5px"   width="50%" >
                    <tr>
                        <th>Paiement</th>
                        <th>Commande</th>
                        <th>Total</th>
                    </tr>

                    <tr>
                        <th>Paypal</th>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th>Chèques</th>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th>Espèces</th>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th>Cb</th>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th>Tickets Restos</th>
                        <td></td>
                        <td></td>
                    </tr>


                </table>
            </div>

            <div class="ent-statistique-graphique">
                <div class="chart">
                    <div class="graph">
                        <div id="paypal" class="hold">
                            <div class="pie"></div>
                        </div>
                        <div id="cheque" class="hold">
                            <div class="pie"></div>
                        </div>
                        <div id="espece" class="hold">
                            <div class="pie"></div>
                        </div>
                        <div id="cb" class="hold">
                            <div class="pie"></div>
                        </div>
                        <div id="ticketResto" class="hold">
                            <div class="pie"></div>
                        </div>
                        <div id="autre" class="hold">
                            <div class="pie"></div>
                        </div>
                    </div>

                    <div class="legend">
                        <div id="paypal-lbl">Paypal <span>32.3%</span></div>
                        <div id="cheque-lbl">Chèques <span>30.5%</span></div>
                        <div id="espece-lbl">Espèces <span>2.8%</span></div>
                        <div id="cb-lbl">Carte bancaire <span>1.7%</span></div>
                        <div id="ticketResto-lbl">Ticket Restaurant <span>1.6%</span></div>
                        <div id="autre-lbl">Autres<span>31.1%</span></div>
                    </div>
                </div>

            </div>

        </section>

        <section>

            <div class="ent-statistique-recherche">

                <p><label for="jour">Afficher les commandes : </label>
                    <select name="tri-journee" id="tri-journee">
                        <option value="jourPrecedent">Jour Précédent</option>
                        <option value="aujourdHui">Aujourd'hui</option>
                        <option value="jourSuivant">Jour Suivant</option>
                    </select>
                </p>

                <p><label for="autresMois">Date personnalisé : </label>
                    <select name="tri-date" id="tri-date">
                        <option value="dateMoisAns-dispo">Date disponible</option>
                    </select>
                    <select name="tri-date" id="tri-date">
                        <option value="dateJour-dispo">1</option>
                        <option value="dateJour-dispo">31</option>
                    </select>
                    <input type="submit" value="Ok"/>
                </p>

            </div>
        </section>

    </div>

    @include('pages.components.footer')


@stop