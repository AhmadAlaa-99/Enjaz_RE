@extends('layouts.master2')
@section('css')
	<!-- Data Tables -->
    <link href="{{URL::asset('assets/css/lg.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/util.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/util.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/animate/animate.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/animsition/css/animsition.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('vendor/daterangepicker/daterangepicker.css')}}" rel="stylesheet">




@endsection
@section('content')
<div class="limiter">

		<div class="container-login100" style="background-image: url('assets/img/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5"method="POST" action="{{ route('login') }}">
                @csrf

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input id="email" type="email"  class="input100 @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocusplaceholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input id="password" class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password"required autocomplete="current-password">
                       @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
    <div id="dropDownSelect1"></div>
    @endsection
    @section('js')
	<!-- Data Tables -->
    <script src="{{URL::asset('assets/js/lg.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/animsition/js/animsition.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/countdowntime/countdowntime.js')}}"></script>




@endsection


