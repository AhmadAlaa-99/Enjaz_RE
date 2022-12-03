@extends('layouts.master')
@section('css')
	<!-- Data Tables -->
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet">

@endsection
@section('title')
تفاصيل العقد
@stop
@section('content')
	<!-- Content wrapper start -->
    <div class="content-wrapper">


<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="invoice-container">
                    <div class="invoice-header">

                        <!-- Row start -->
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                            </div>
                        </div>
                        <!-- Row end -->

                        <!-- Row start -->
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <a href="index.html" class="invoice-logo">
                                <img src="{{asset('assets/img/fav.png')}}" alt="Enjaz" />
                                </a>
                            </div>

                        </div>
                        <!-- Row end -->


                        <!-- Row end -->

                    </div>

                    <div class="invoice-body">



          <div class="controls">
        <div class="form-group">
         <h2 class="heading"> بيانات العقد</h2>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-dark m-0">
                                    <thead>
                        <tr>
                          <th>رقم سجل العقد</th>
                          <th> نوع العقد</th>
                          <th> صلاحية العقد</th>
                          <th>  الحالة</th>
                          <th> تاريخ بداية مدة الايجار</th>
                          <th>تاريخ نهاية مدة الايجار</th>
                          <th> كلفة الايجار</th>
                          <th>نسبة الضريبة</th>
                          <th>مبلغ الضريبة</th>
                          <th>الكلفة الاجمالية</th>
                          <th>ملاحظات</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>{{$contract->contactNo}}</td>
                          <td>{{$contract->type}}</td>
                          <td>{{$contract->type_s}}</td>
                          <td>{{$contract->status}}</td>
                          <td>{{$contract->start_date}}</td>
                          <td>{{$contract->end_date}}</td>
                          <td>{{$contract->ejar_cost}}</td>
                          <td>{{$contract->tax}}</td>
                          <td>{{$contract->tax_amount}}</td>
                          <td>{{$contract->rent_value}}</td>
                          <td>{{$contract->note}}</td>

                        </tr>

                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->

                    </div>
                    </div>
                    <div class="invoice-body">

<!-- Row start -->

<div class="form-group">
         <h2 class="heading"> بيانات المالك</h2>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-dark m-0">
            <thead>
            <tr>
                                                    <th> الاسم الكامل</th>
													<th>  البريد الالكتروني </th>
													<th> رقم  الجوال</th>
													<th>  اسم الوسيط</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>{{$owner->name}}</td>
                                                    <td>{{$owner->email}}</td>
                                                    <td>{{$owner->mobile}}</td>
                                                    <td>{{$owner->attribute_name}}</td>
												</tr>
											</tbody>
            </table>

        </div>
    </div>
</div>
   </div>
       <div class="form-group">
         <h2 class="heading"> بيانات المنشأة العقارية</h2>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-dark m-0">
            <thead>









												<tr>
                                                    <th> اسم المنشأة</th>
                                                    <th> اسم الوكيل</th>
                                                    <th> رقم الوكيل</th>
													<th> المنطقة</th>
													<th> النوع</th>
													<th>   عدد الوحدات السكنية </th>
                                                    <th>   عدد الوحدات التجارية </th>
													<th>  عدد الأدوار </th>
                                                    <th>   elevator </th>
                                                    <th>  parking  </th>
													<th>   المساحة</th>
                                                    <th>   استخدام </th>
                                                    <th>    المميزات </th>
												</tr>
											</thead>
											<tbody>
												<tr>
                                                     <td>{{$realty->realty_name}}</td>
                                                     <td>{{$realty->agency_name}}</td>
                                                     <td>{{$realty->agency_mobile}}</td>
													<td>{{$realty->quarter}}</td>
													<td>{{$realty->type}}</td>
                                                    <td>{{$realty->units}}</td>
                                                    <td>{{$realty->elevator}}</td>
                                                    <td>{{$realty->parking}}</td>
                                                    <td>{{$realty->shopsNo}}</td>
                                                    <td>{{$realty->roles}}</td>
                                                    <td>{{$realty->size}}</td>
                                                    <td>{{$realty->use}}</td>
                                                    <td>{{$realty->advantages}}</td>

												</tr>

											</tbody>
            </table>
        </div>
    </div>
</div>
    </div>
</div>

   <div class="form-group">
         <h2 class="heading">الاستمارات المالية</h2>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-dark m-0">
            <thead>

												<tr>
													<th>رقم الاستمارة</th>
                                                    <th>  تاريخ  الاستمارة</th>
													<th>  المبلغ الاجمالي </th>
                                                    <th>  تاريخ الدقع </th>
													<th>  طريقة الدفع </th>
													<th>   رقم المرجع</th>
												</tr>
											</thead>
											<tbody>
                                                  @forelse ($mentos as $mento)
												<tr>
													<td>{{$mento->installmentNo}}</td>
                                                    <td>{{$mento->installment_date}}</td>
                                                    <td>{{$mento->amount}}</td>
                                                    <td>{{$mento->payment_date}}</td>
                                                    <td>{{$mento->payment_type}}</td>
                                                    <td>{{$mento->refrenceNo}}</td>
												</tr>
  @empty
                        @endforelse
											</tbody>
            </table>
        </div>
    </div>
</div>
   </div>
</div>
<!-- Row end -->
</div>

                    <div class="invoice-footer">
                      COMPANY ENJAZ
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- Row end -->


</div>
<!-- Content wrapper end -->
@endsection
@section('js')
	<!-- Data Tables -->
    <script src="{{URL::asset('assets/vendor/datatables/dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>



		<!-- Custom Data tables -->
        <script src="{{URL::asset('assets/vendor/datatables/custom/custom-datatables.js')}}"></script>
        <script src="{{URL::asset('assets/vendor/datatables/custom/fixedHeader.js')}}"></script>


		<!-- Download / CSV / Copy / Print -->
        <script src="{{URL::asset('assets/vendor/datatables/buttons.min.js')}}"></script>
        <script src="{{URL::asset('assets/vendor/datatables/jszip.min.js')}}"></script>
        <script src="{{URL::asset('assets/vendor/datatables/pdfmake.min.js')}}"></script>
        <script src="{{URL::asset('assets/vendor/datatables/vfs_fonts.js')}}"></script>
        <script src="{{URL::asset('assets/vendor/datatables/html5.min.js')}}"></script>
        <script src="{{URL::asset('assets/vendor/datatables/buttons.print.min.js')}}"></script>
@endsection
