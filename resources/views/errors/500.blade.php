@extends('app')


@section('content')
	@include('pages.components.header')
	@include('pages.components.menu')
	<section class="ent-commande-container-global">
			<h2 class="title alert-info">Erreur interne du serveur. Nous vous conseillons de revenir dans quelques minutes</h2>
			<h3 class="title alert-info">Merci de votre compréhension!</h3>
	</section>
	@include('pages.components.footer')
@stop
