@extends('app')
@section('content')
	@include('pages.components.header')
	@include('pages.components.menu')
	<section class="ent-commande-container-global">
		<h2 class="alert-info">Désolé, une erreur s'est produite. Nous ne sommes pas en mesure d'afficher la <span class="text-danger">page demandée</span>.</h2>
	</section>
	@include('pages.components.footer')
@stop
