<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>MovieVote</title>

		<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
	</head>

	<body>

		<div class="container">

			@include('movie.components.nav')

			@yield('content')

		</div> <!-- /container -->

		<script src="{{ asset('assets/js/jquery-2.1.0.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/app.js') }}"></script>

	</body>
</html>

