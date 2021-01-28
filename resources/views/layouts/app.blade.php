<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Uji Test Code PT. ICS">
	<meta name="author" content="Agus Suandi">
	<meta name="keywords" content="testing code PT. ICS agus suandi">
	<link rel="shortcut icon" href="{{ asset('img/icons/icon-48x48.png') }}" />
	<title>Agus | PT. ICS</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div class="wrapper">
		@include('layouts.sidebar')
		<div class="main">
            @include('layouts.header')
			<main class="content">
				<div class="container-fluid p-0">
					@include('layouts.message-flash')
                    @yield('content')
				</div>
            </main>
            @include('layouts.footer')
		</div>
	</div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('javascript')
</body>
</html>