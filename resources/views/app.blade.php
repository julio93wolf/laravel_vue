<!DOCTYPE html>
<html lang="{{ config('app.local') }}">
<head>
	<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href=" {{ asset('css/app.css') }} ">
	<title>Laravel Vue</title>
</head>
<body>
	<div class="container">
		@yield('content')
	</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>