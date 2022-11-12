<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
        @include('layouts.head')
	</head>
	<body>
		<!-- Loading starts -->
		<div id="loading-wrapper">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<!-- Loading ends -->
        @include('layouts.header')
		<!-- Screen overlay start -->
		<div class="screen-overlay"></div>
		<!-- Screen overlay end -->
		<!-- Container fluid start -->
		<div class="container-fluid">
            @include('layouts.navbar')
            @yield('content')
            @include('layouts.footer')
		</div>
		@include('layouts.footer-scripts')
	</body>
</html>