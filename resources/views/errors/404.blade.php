@extends('app')
@section('content')
	@include('pages.components.header')
	@include('pages.components.menu')
	<section class="ent-commande-container-global">
			<h2 class="alert-info">Désolé, la page que vous avez demandé <span class="text-danger">n'existe pas</span> !</h2>
	</section>
	@include('pages.components.footer')
@stop
