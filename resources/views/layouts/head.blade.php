<!-- Title -->
        <title>@yield("title")</title>
        <link rel="shortcut icon" href="{{URL::asset('assets/img/fav.png')}}" />
		<!-- Bootstrap css -->
		<link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/fonts/style.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/css/main.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/vendor/daterange/daterange.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/vendor/chartist/css/chartist.min.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/vendor/chartist/css/chartist-custom.css')}}" rel="stylesheet">
		@yield('css')
		