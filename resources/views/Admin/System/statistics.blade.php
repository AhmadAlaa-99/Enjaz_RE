@extends('layouts.master')
@section('css')

    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.date.css')}}" rel="stylesheet">


@endsection
@section('title')
الاحصائيات
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">الادارة </li>
        <li class="breadcrumb-item active"> الاحصائيات </li>
    </ol>

    <ul class="app-actions">
        <li>
            <a href="#" id="reportrange">
                <span class="range-text"></span>
                <i class="icon-chevron-down"></i>
            </a>
        </li>
        <li>
            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print">
                <i class="icon-print"></i>
            </a>
        </li>
        <li>
            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download CSV">
                <i class="icon-cloud_download"></i>
            </a>
        </li>
    </ul>
</div>
	<!-- Content wrapper start -->
    <div class="content-wrapper">

	<!-- Row starts -->
    <div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">الاحصائيات</div>
								</div>
								<div class="card-body">
									<!-- Row starts -->
									<div class="row gutters">
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
											<div class="goal-card">
												<h5>عدد المنشأت العقارية</h5>
												<p class="percentage">يمكن للمالك امتلاكه اكثر من منشأة</p>
												<div class="progress progress-dot">
													<div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="107" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<h4>{{\App\Models\Realty::count()}}</h4>
											</div>
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
											<div class="goal-card">
												<h5>عدد الوحدات الايجارية</h5>
												<p class="percentage">يتم حساب الوحدات كلها الشاغرة والمؤجرة</p>
												<div class="progress progress-dot">
													<div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="107" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<h4>{{\App\Models\Units::count()}}</h4>
											</div>
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
											<div class="goal-card">
												<h5>عدد العقود</h5>
												<p class="percentage"> يتم حساب العقود المنتهية</p>
												<div class="progress progress-dot">
													<div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="107" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<h4>{{\App\Models\Lease::count()}}</h4>
											</div>
										</div>

									</div>
									<!-- Row ends -->

								</div>
							</div>
						</div>
					</div>
					<!-- Row ends -->
</div>




</div>
<!-- Content wrapper end -->
@endsection
@section('js')

    <script src="{{URL::asset('assets/vendor/datepicker/js/picker.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/datepicker/js/picker.date.js')}}"></script>
    <script src="{{URL::asset('assets/datepicker/js/custom-picker.js')}}"></script>
@endsection
