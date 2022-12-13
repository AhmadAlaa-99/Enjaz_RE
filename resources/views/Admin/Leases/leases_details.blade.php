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
                        <div class="modal" id="add_payment{{$lease->id}}" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="customModalTwoLabel">تعديل حالة الدفع</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
                                                <form action="{{ route('payment_lease_add',$lease->id) }}" method="post">
                                                         {{ csrf_field() }}
														<div class="form-group">



															<label for="recipient-name" class="col-form-label">تاريخ الاصدار</label>
															<input type="date" name="release_date" class="form-control" id="recipient-name"required>
														</div>
                                                        <div class="form-group">
															<label for="recipient-name" class="col-form-label">تاريخ الاستحقاق</label>
															<input type="date" name="due_date" class="form-control" id="recipient-name"required>
														</div>
                                                        <div class="form-group">
															<label for="recipient-name" class="col-form-label">المبلغ</label>
															<input type="number" name="total" class="form-control" id="recipient-name"required>
														</div>




												</div>
												<div class="modal-footer custom">
													<div class="left-side">
                                                    <button type="submit" class="btn btn-link success">حفظ</button>

													</div>
													<div class="divider"></div>
													<div class="right-side">
                                                    <button type="button" class="btn btn-link danger" data-dismiss="modal">اغلاق</button>
													</div>
                                                    </form>
												</div>
											</div>
										</div>
									</div>
      	<div class="row gutters">
												<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
													<div class="custom-actions-btns mb-5">
														<a data-toggle="modal" href="" data-target="#add_payment{{ $lease->id }}"href="#" class="btn btn-primary">
															<i class="icon-add"></i> اضاقة قسط جديد
														</a>
														<a href="{{route('down.file',$lease->id)}}" class="btn btn-dark">
															<i class="icon-printer"></i> تحميل مرفقات العقد
														</a>
													</div>
												</div>
											</div>
                        <!-- Row end -->
                        @if (session()->has('max_rent'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('max_rent') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('max_count'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('max_count') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

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

                        <!-- Row start -->
                    <div class="form-group">
         <h2 class="heading"> بيانات  العقد</h2>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-dark m-0">
                                    <thead>
                        <tr>
                          <th>رقم سجل العقد</th>
                          <th> حالة العقد</th>
                                                    <th> نوع العقد</th>

                          <th>تاريخ ابرام العقد</th>
                          <th> مكان ابرام العقد</th>
                          <th> تاريخ بداية مدة الايجار</th>
                          <th>تاريخ نهاية مدة الايجار</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>{{$lease->reco_number}}</td>
                          <td>{{$lease->type}}</td>
                                                                              <td>{{$lease->lease_type}}</td>

                          <td>{{$lease->le_date}}</td>
                          <td>{{$lease->place}}</td>
                          <td>{{$lease->st_rental_date}}</td>
                          <td>{{$lease->end_rental_date}}</td>
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
         <h2 class="heading"> بيانات المستأجر</h2>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-dark m-0">
            <thead>
            <tr>
                                                    <th> الاسم الكامل</th>
													<th> رقم الهوية </th>
													<th>  نوع الهوية </th>
													<th> رقم  الجوال</th>
													<th>  الجنسية</th>
                                                    <th>  رقم الهاتف </th>
                                                    <th>  البريد الالكتروني</th>


												</tr>
											</thead>
											<tbody>
												<tr>
													<td>{{$tenant->user->name}}</td>
                                                    <td>{{$tenant->user->ID_num}}</td>
                                                    <td>{{$tenant->user->ID_type}}</td>
                                                    <td>{{$tenant->user->phone}}</td>
                                                    <td>{{$tenant->user->Nationality->Name}}</td>
                                                    <td>{{$tenant->user->telephone}}</td>
                                                    <td>{{$tenant->user->email}}</td>

												</tr>

											</tbody>
            </table>
        </div>
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
													<th> الحي</th>
													<th> النوع</th>
													<th> عدد الوحدات السكنية  </th>
                                                    <th>  عدد الوحدات التجارية </th>

													<th>  عدد الأدوار </th>
													<th>   المساحة</th>
                                                    <th>   استخدام </th>
                                                    <th>    المميزات </th>
												</tr>
											</thead>
											<tbody>
												<tr>

													<td>{{$lease->realties->quarter}}</td>
													<td>{{$lease->realties->type}}</td>
                                                    <td>{{$lease->realties->units}}</td>
                                                    <td>{{$lease->realties->shopsNo}}</td>
                                                    <td>{{$lease->realties->roles}}</td>
                                                    <td>{{$lease->realties->size}}</td>

                                                    <td>{{$lease->realties->use}}</td>
                                                    <td>{{$lease->realties->advantages}}</td>

												</tr>

											</tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

 <div class="form-group">
         <h2 class="heading"> بيانات الوحدة الايجارية</h2>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-dark m-0">
            <thead>
												<tr>
													<th> رقم الوحدة</th>
                                                    <th> رقم الدور</th>
													<th>  النوع </th>
													<th> المساحة </th>
													<th> حالة الأثاث</th>
													<th> خزائن مطبخ مركبة  </th>
                                                    <th> نوع التكييف </th>
                                                    <th> عدد وحدات التكييف </th>
                                                    <th> عدد  دورات المياه </th>
                                                     <th> تفاصيل</th>

												</tr>
											</thead>
											<tbody>
												<tr>
													<td>{{$lease->units->number}}</td>
                                                    <td>{{$lease->units->role_number}}</td>
                                                    <td>{{$lease->units->type}}</td>
                                                    <td>{{$lease->units->size}}</td>
                                                    <td>{{$lease->units->furnished_mode}}</td>
                                                    <td>{{$lease->units->kitchen_Cabinets}}</td>
                                                    <td>{{$lease->units->condition_type}}</td>
                                                    <td>{{$lease->units->condition_units}}</td>
                                                    <td>{{$lease->units->bathrooms}}</td>
                                                    <td>{{$lease->units->details}}</td>


												</tr>

											</tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

 <div class="form-group">
         <h2 class="heading"> البيانات المالية </h2>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-dark m-0">
            <thead>
												<tr>
													<th>قيمة العقد</th>
                                                    <th>دورة سداد الايجار</th>
                                                    	<th>   عدد دفعات الايجار  </th>
                                                    <th>  دفعة الايجار الدورية </th>
                                                 <th> نسبة الضريبة </th>
                                                    <th>  مبلغ الضريبة </th>
                                                    <th>   اجمالي قيمة العقد </th>




												</tr>
											</thead>
											<tbody>
												<tr>
													<td>{{$lease->financial->ejar_cost}}</td>
                                                    <td>{{$lease->financial->payment_cycle}}</td>
                                                    <td>{{$lease->financial->num_rental_payments}}</td>
                                                    <td>{{$lease->financial->recurring_rent_payment}}</td>
                                                    <td>{{$lease->financial->tax}}</td>
                                                    <td>{{$lease->financial->tax_ammount}}</td>
                                                    <td>{{$lease->financial->rent_value}}</td>


												</tr>

											</tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
 <div class="form-group">
         <h2 class="heading">تفاصيل سداد الدفعات</h2>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-dark m-0">
            <thead>




            <tr>
													<th>الرقم التسلسلي</th>
													<th> تاريخ الاصدار </th>
													<th>تاريخ الاستحقاق</th>
													<th>اجمالي القيمة </th>
                                                    <th> الرصيد  المدفوع </th>
                                                    <th> الرصيد  المتبقي </th>



												</tr>
											</thead>
											<tbody>
                                            @php
                                $i = 0;
                                @endphp
                                @forelse ($payments as $payment)
                                    @php
                                    $i++
                                    @endphp
												<tr>
													<td>{{$i}}</td>
													<td>{{$payment->release_date}}</td>
													<td>{{$payment->due_date}}</td>
													<td>{{$payment->total}}</td>
                                                    <td>{{$payment->paid}}</td>
													<td>{{$payment->remain}}</td>



												</tr>
                                                @empty
                        @endforelse  </tbody>   </table>
								<div class="d-flex justify-content-center">
			                         {!!$payments->links()!!}
                        </div>
        </div>
    </div>
</div>
</div>
</div>

 <div class="form-group">
         <h2 class="heading"> بيانات المطور</h2>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-dark m-0">
            <thead>

            <tr>
                                                <th >الاسم </th>
                                                <th > البريد الالكتروني</th>
                                                <th >رقم الهوية </th>
                                                <th > نوع الهوية</th>
                                                <th>الجنسية</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{$broker->name}}</td>
                                            <td>{{$broker->email}}</td>
                                            <td>{{$broker->name}}</td>
                                            <td>{{$broker->name}}</td>
                                            <td>{{$broker->name}}</td>

                                        </tr>

											</tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
 <div class="form-group">
         <h2 class="heading">التزامات الأطراف</h2>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-dark m-0">
            <thead>

            <tr>

                                                <th>تفاصيل</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>


                                        </tr>

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
