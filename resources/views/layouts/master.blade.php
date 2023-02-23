<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		@include('layouts.head')
	</head>

	<body>
		@include('layouts.main-header')		
		<h1 class="text-center">	
		@yield('page-header')
		</h1>
		

		@yield('content')
		@include('layouts.footer')
		@include('layouts.footer-scripts')	
	</body>
</html>