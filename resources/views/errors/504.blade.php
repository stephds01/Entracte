@extends('app')
@section('content')
	@include('pages.components.header')
	@include('pages.components.menu')
	<section class="ent-commande-container-global">
		<h2 class="alert-info">Désolé, le temps d'attente est écoulé. Le serveur n'a pu répondre à votre <span class="text-danger">requête</span>.</h2>
	</section>
	@include('pages.components.footer')
@stop
