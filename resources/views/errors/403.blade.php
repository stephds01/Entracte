@extends('app')
@section('content')
	@include('pages.components.header')
	@include('pages.components.menu')
	<section class="ent-commande-container-global">
		<h2 class="alert-info">Désolé, vous n'avez pas accès à la <span class="text-danger">page demandée</span> !</h2>
	</section>
	@include('pages.components.footer')
@stop
