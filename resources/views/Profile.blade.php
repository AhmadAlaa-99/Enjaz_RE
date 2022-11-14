@extends('layouts.master')
@section('css')

    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.date.css')}}" rel="stylesheet">


@endsection
@section('title')
 الملف الشخصي
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> الاعدادات </li>
        <li class="breadcrumb-item active">الملف الشخصي</li>
    </ol>

    <ul class="app-actions">
       
    </ul>
</div>
<!-- Content wrapper start -->
<div class="content-wrapper">

<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="user-details h-320">
								<div class="user-thumb">
									<img src="{{URL::asset('assets/img/profile.png')}}" alt="Admin Template" />
								</div>

								<h4>{{Auth::user()->name}}</h4>
								<h6>{{Auth::user()->email}}</h6>
								<p>{{Auth::user()->natiolity}}</p>
								<button class="btn btn-lg btn-primary">{{Auth::user()->role_name}}</button>
							</div>
						</div>

</div>
<!-- Content wrapper end -->
@endsection
@section('js')

    <script src="{{URL::asset('assets/vendor/datepicker/js/picker.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/datepicker/js/picker.date.js')}}"></script>
    <script src="{{URL::asset('assets/datepicker/js/custom-picker.js')}}"></script>
@endsection
