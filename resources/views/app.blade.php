<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Back-office Restaurant Pizzeria L'Entracte</title>

	{{--todo remplacer fichier par min--}}
	<link rel="stylesheet" href="{{asset('bower_components/jquery-ui-1.11.4.custom/jquery-ui.css')}}">
{{--	<link rel="stylesheet" href="{{asset('bower_components/jquery-ui-1.11.4.custom/jquery-ui.min.css')}}">--}}
	<link rel="stylesheet" href="{{asset('bower_components/jquery-ui-1.11.4.custom/jquery-ui.theme.css')}}">
{{--	<link rel="stylesheet" href="{{asset('bower_components/jquery-ui-1.11.4.custom/jquery-ui.theme.min.css')}}">--}}

	<link rel="stylesheet" href="{{asset('css/css/week-picker-view.css')}}">
	<link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}" />

	<link href="{{ asset('css/style.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	@yield('content')








	<!-- Scripts -->
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{asset('bower_components/jquery-ui-1.11.4.custom/jquery-ui.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/week-picker.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>
