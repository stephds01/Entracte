@extends('app')


@section('content')
	@include('pages.components.header')
	@include('pages.components.menu')
	<section class="ent-commande-container-global">
		<h2 class="alert-info">Désolé, nous ne sommes pas en mesure d'afficher la <span class="text-danger">page demandée</span> :(</h2>
    	<h3 class="alert-info">L'adresse mail et/ou le mot de passe fourni lors de l'authentification est <span class="text-danger">incorrect</span></h3>.
	</section>
	@include('pages.components.footer')
@stop
