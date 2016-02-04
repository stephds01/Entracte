@extends('app')



@section('content')

    @include('pages.components.header')
    @include('pages.components.menu')


    <div class="ent-statistique-container-global">
        <div class="ent-bandeauTitre-container">
            <ul class="ent-bandeauTitre-titre"><li>Statistiques</li></ul>
        </div>


        <section>
            <h2>Jour : {{date('d-F')}}</h2>
            <input type="date" placeholder="jj/mm/aaaa">

            <article>
                <ul>
                    <li>$</li>
                    <li>Cash</li>
                    <li>Paypal</li>
                    <li>CB</li>
                </ul>
                <div>
                    <div>Total</div>
                </div>
            </article>
        </section>
        <section>
            <h2>Semaine : {{date('W')}}</h2>
            <input type="date" placeholder="jj/mm/aaaa">

            <article>
                <ul>
                    <li>$</li>
                    <li>Cash</li>
                    <li>Paypal</li>
                    <li>CB</li>
                </ul>
                <div>
                    <div>Total</div>
                </div>
            </article>
        </section>
        <section>
            <h2>Mois : {{date('F')}}</h2>
            <input type="date" placeholder="jj/mm/aaaa">

            <article>
                <ul>
                    <li>$</li>
                    <li>Cash</li>
                    <li>Paypal</li>
                    <li>CB</li>
                </ul>
                <div>
                    <div>Total</div>
                </div>
            </article>
        </section>
        <section>
            <h2>Année : {{date('Y')}}</h2>
            <input type="date" placeholder="jj/mm/aaaa">

            <article>
                <ul>
                    <li>$</li>
                    <li>Cash</li>
                    <li>Paypal</li>
                    <li>CB</li>
                </ul>
                <div>
                    <div>Total</div>
                </div>
            </article>
        </section>
    </div>

    @include('pages.components.footer')


@stop