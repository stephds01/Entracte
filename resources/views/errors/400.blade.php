@extends('app')


@section('content')
    @include('pages.components.header')
    @include('pages.components.menu')
    <section class="ent-commande-container-global">
        <h2 class="alert-info">Désolé, la requête HTTP n'a pas pu être comprise par le serveur en raison <span class="text-danger">d'une syntaxe erronée</span>.</h2>
    </section>
    @include('pages.components.footer')
@stop
