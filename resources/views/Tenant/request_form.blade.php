
@extends('layouts.master')
@section('css')

    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.date.css')}}" rel="stylesheet">


@endsection
@section('title')
ارسال طلب صيانة
@stop
@section('content')

<div class="main-container">


				<!-- Page header start -->
				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">طلبات الصيانة</li>
						<li class="breadcrumb-item active">ارسال طلب</li>
					</ol>
				</div>
				<!-- Page header end -->
				<!-- Content wrapper start -->
				<div class="content-wrapper">
					<div class="row justify-content-center gutters">
						<div class="col-xl-7 col-lg-7 col-md-8 col-sm-10">
                        <form action="{{ route('request_send') }}" method="post" enctype="multipart/form-data"autocomplete="off">
                                     {{ csrf_field() }}

								<div class="card m-0">
									<div class="card-header">
										<div class="card-title">طلب صيانة  </div>
										<div class="card-sub-title">يرجى تزويدنا بالتفاصيل</div>
									</div>
									<div class="card-body">

										<div class="row gutters">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group">
													<textarea class="form-control" id="message" name="desc"placeholder="details" maxlength="140" rows="3"></textarea>
													<div class="form-text text-muted"><p id="characterLeft" class="help-block ">لا يحب ان يتجاوز 140 حرف</p></div>
												</div>
											</div>
										</div>
										<button type="submit" id="submit" name="submit" class="btn btn-primary float-right">ارسال الطلب </button>
									</div>
								</div>
							</form>
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


