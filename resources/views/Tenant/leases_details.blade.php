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
                                <div class="custom-actions-btns mb-5">
                                    <a href="#" class="btn btn-primary">
                                        <i class="icon-export"></i> Export
                                    </a>
                                    <a href="#" class="btn btn-dark">
                                        <i class="icon-printer"></i> Print
                                    </a>
                                </div>
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
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <address class="text-right">
                                    Enjaz company saudia Arabia <br />
                                    Riyadh, Kingdom Street.<br />
                                    00966484374
                                </address>
                            </div>
                        </div>
                        <!-- Row end -->

                        <!-- Row start -->
                        <div class="row gutters">
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-12">
                                <div class="invoice-details">
                                    <address>
                                         Receipt of monthly rent payment<br />
                                         Tenant name : Ali Mohammed
                                         Lessor's name : ALaa Ahmad

                                    </address>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                                <div class="invoice-details">
                                    <div class="invoice-num">
                                        <div>Invoice - #009</div>
                                        <div>January 10th 2020</div>
                                    </div>
                                </div>
                            </div>
                         </div>
                        <!-- Row end -->

                    </div>

                    <div class="invoice-body">

                        <!-- Row start -->
                        <h3>بيانات العقد </h3>
                        <div class="row gutters">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                    <thead>
                        <tr>
                          <th>رقم سجل العقد</th>
                          <th> نوع العقد</th>
                          <th>تاريخ ابرام العقد</th>
                          <th> مكان ابرام العقد</th>
                          <th> تاريخ بداية مدة الايجار</th>
                          <th>تاريخ نهاية مدة الايجار</th>
                          <th> طريقة دفع رسوم العقد</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>{{$lease->reco_number}}</td>
                          <td>{{$lease->type}}</td>
                          <td>{{$lease->le_date}}</td>
                          <td>{{$lease->place}}</td>
                          <td>{{$lease->st_rental_date}}</td>
                          <td>{{$lease->end_rental_date}}</td>
                          <td>{{$lease->payment_channels}}</td>
                        </tr>

                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->

                    </div>
                    <div class="invoice-body">

<!-- Row start -->

<div class="row gutters">
    <h3>بيانات المؤجر </h3>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered">
            <thead>
												<tr>
                                                    <th> الاسم الكامل</th>
                                                    <th>اسم الشركة</th>
													<th> رقم الهوية </th>
													<th>  نوع الهوية </th>
													<th> رقم  الجوال</th>
													<th>  الجنسية</th>
                                                    <th>  رقم الهاتف </th>
                                                    <th>  البريد الالكتروني</th>
                                                    <th>   تاريخ التسجيل</th>


												</tr>
											</thead>
											<tbody>
												<tr>
													<td>{{$lease->organization->user->name}}</td>
													<td>{{$lease->organization->company_name}}</td>
                                                    <td>{{$lease->organization->user->ID_num}}</td>
                                                    <td>{{$lease->organization->user->ID_type}}</td>
                                                    <td>{{$lease->organization->user->phone}}</td>
                                                    <td>{{$lease->organization->user->nationality}}</td>
                                                    <td>{{$lease->organization->user->telephone}}</td>
                                                    <td>{{$lease->organization->email}}</td>
                                                    <td>{{$lease->organization->record_date}}</td>


												</tr>

											</tbody>
            </table>
        </div>
    </div>
</div>

<div class="row gutters">
    <h3>بيانات  المستأجر </h3>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                                    <td>{{$tenant->user->nationality}}</td>
                                                    <td>{{$tenant->user->telephone}}</td>
                                                    <td>{{$tenant->user->email}}</td>

												</tr>

											</tbody>
            </table>
        </div>
    </div>
</div>
<div class="row gutters">
    <h3>بيانات المنشأة العقارية </h3>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered">
            <thead>
												<tr>
													<th> المنطقة</th>
													<th> النوع</th>
													<th>  عدد الوحدات </th>
													<th>  عدد الأدوار </th>
													<th>   المساحة</th>
													<th>  رقم سند التمثيل </th>
                                                    <th>   استخدام </th>
                                                    <th>    المميزات </th>
												</tr>
											</thead>
											<tbody>
												<tr>

													<td>{{$lease->realties->address}}</td>
													<td>{{$lease->realties->type}}</td>
                                                    <td>{{$lease->realties->units}}</td>
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


<div class="row gutters">
    <h3>بيانات  الوحدة الايجارية </h3>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                                    <th>رقم عداد الكهرباء </th>
                                                    <th>رقم عداد المياه  </th>
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
                                                    <td>{{$lease->units->water_number}}</td>
                                                    <td>{{$lease->units->Elecrtricity_number}}</td>
                                                    <td>{{$lease->units->bathrooms}}</td>
                                                    <td>{{$lease->units->details}}</td>


												</tr>

											</tbody>
            </table>
        </div>
    </div>
</div>

<div class="row gutters">
    <h3> البيانات المالية </h3>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered">
            <thead>








												<tr>
													<th> تاريخ بداية العقد</th>
                                                    <th>  تاريخ نهاية العقد</th>
													<th>  الكلفة السنوية للايجار </th>
													<th> اجمالي قيمة العقد </th>
													<th>  دورة سداد الايجار</th>
													<th>   دفعة الايجار الأخيرة  </th>
                                                    <th>  دفعة الايجار الدورية </th>
                                                    <th> عدد دفعات الايجار </th>

												</tr>
											</thead>
											<tbody>
												<tr>

													<td>{{$lease->financial->st_rental_date}}</td>
                                                    <td>{{$lease->financial->end_rental_date}}</td>
                                                    <td>{{$lease->financial->annual_rent}}</td>
                                                    <td>{{$lease->financial->Total}}</td>
                                                    <td>{{$lease->financial->payment_cycle}}</td>
                                                    <td>{{$lease->financial->last_rent_payment}}</td>
                                                    <td>{{$lease->financial->recurring_rent_payment}}</td>
                                                    <td>{{$lease->financial->num_rental_payments}}</td>


												</tr>

											</tbody>
            </table>
        </div>
    </div>
</div>

<div class="row gutters">
    <h3>  تفاصيل سداد الدفعات </h3>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered">
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
                        @endforelse

											</tbody>
            </table>
        </div>
    </div>
</div>

<div class="row gutters">
    <h3> بيانات الوسيط العقاري </h3>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered">
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
<div class="row gutters">
    <h3>  التزامات الأطراف </h3>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="table-responsive">
            <table class="table table-bordered">
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


<!-- Row end -->
</div>

                    <div class="invoice-footer">
                        Thank you for your Business.
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
