@extends('layouts.master')
@section('css')
    <!-- Data Tables -->
    <link href="{{ URL::asset('assets/vendor/datatables/dataTables.bs4.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/datatables/buttons.bs.css') }}" rel="stylesheet">

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


                                <div class="modal" id="add_payment{{ $contract->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="customModalTwoLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="customModalTwoLabel">تعديل حالة الدفع</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('payment_contract.add', $contract->id) }}"
                                                    method="post">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label class="active" for="recipient-name"
                                                            class="col-form-label">رقم القسط</label>
                                                        <input type="number" name="installmentNo" class="form-control"
                                                            id="recipient-name"required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="active" for="recipient-name"
                                                            class="col-form-label">تاريخ القسط</label>
                                                        <input type="date" name="installment_date" class="form-control"
                                                            id="recipient-name"required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="active" for="recipient-name"
                                                            class="col-form-label">المبلغ</label>
                                                        <input type="number" name="amount" class="form-control"
                                                            id="recipient-name"required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="active" for="recipient-name"
                                                            class="col-form-label">تاريخ الدفع</label>
                                                        <input type="date" name="payment_date" class="form-control"
                                                            id="recipient-name"required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="active" for="recipient-name"
                                                            class="col-form-label">طريقة الدفع</label>
                                                        <input type="text" name="payment_type" class="form-control"
                                                            id="recipient-name"required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="active" for="recipient-name"
                                                            class="col-form-label">الرقم المرجعي</label>
                                                        <input type="number" name="refrenceNo" class="form-control"
                                                            id="recipient-name"required>
                                                    </div>


                                            </div>
                                            <div class="modal-footer custom">
                                                <div class="left-side">
                                                    <button type="submit" class="btn btn-link success">حفظ</button>

                                                </div>
                                                <div class="divider"></div>
                                                <div class="right-side">
                                                    <button type="button" class="btn btn-link danger"
                                                        data-dismiss="modal">اغلاق</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="custom-actions-btns mb-5">
                                            <a data-toggle="modal" href=""
                                                data-target="#add_payment{{ $contract->id }}"href="#"
                                                class="btn btn-primary">
                                                <i class="icon-add"></i> اضاقة قسط جديد
                                            </a>
                                            <a href="{{ route('down.contract_file', $contract->id) }}" class="btn btn-dark">
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
                                            <img src="{{ asset('assets/img/fav.png') }}" alt="Enjaz" />
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
                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>رقم سجل العقد</th>
                                                                    <th> نوع العقد</th>
                                                                    <th> صلاحية العقد</th>
                                                                    <th> الحالة</th>
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
                                                                    <td>{{ $contract->contactNo }}</td>
                                                                    <td>{{ $contract->type }}</td>
                                                                    <td>{{ $contract->type_s }}</td>
                                                                    <td>{{ $contract->status }}</td>
                                                                    <td>{{ $contract->start_date }}</td>
                                                                    <td>{{ $contract->end_date }}</td>
                                                                    <td>{{ $contract->ejar_cost }}</td>
                                                                    <td>{{ $contract->tax }}</td>
                                                                    <td>{{ $contract->tax_amount }}</td>
                                                                    <td>{{ $contract->rent_value }}</td>
                                                                    <td>{{ $contract->note }}</td>

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
                                                            <table class="table table-bordered table-striped m-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th> الاسم الكامل</th>
                                                                        <th> البريد الالكتروني </th>
                                                                        <th> رقم الجوال</th>
                                                                        <th> اسم الوسيط</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>{{ $owner->name }}</td>
                                                                        <td>{{ $owner->email }}</td>
                                                                        <td>{{ $owner->mobile }}</td>
                                                                        <td>{{ $owner->attribute_name }}</td>
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
                                                                <table class="table table-bordered table-striped m-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> اسم المنشأة</th>
                                                                            <th> اسم الوكيل</th>
                                                                            <th> رقم الوكيل</th>
                                                                            <th> الحي</th>
                                                                            <th> النوع</th>
                                                                            <th> عدد الوحدات السكنية </th>
                                                                            <th> عدد الوحدات التجارية </th>
                                                                            <th> عدد الأدوار </th>
                                                                            <th> elevator </th>
                                                                            <th> parking </th>
                                                                            <th> المساحة</th>
                                                                            <th> استخدام </th>
                                                                            <th> المميزات </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>{{ $realty->realty_name }}</td>
                                                                            <td>{{ $realty->agency_name }}</td>
                                                                            <td>{{ $realty->agency_mobile }}</td>
                                                                            <td>{{ $realty->quarter }}</td>
                                                                            <td>{{ $realty->type }}</td>
                                                                            <td>{{ $realty->units }}</td>
                                                                            <td>{{ $realty->elevator }}</td>
                                                                            <td>{{ $realty->parking }}</td>
                                                                            <td>{{ $realty->shopsNo }}</td>
                                                                            <td>{{ $realty->roles }}</td>
                                                                            <td>{{ $realty->size }}</td>
                                                                            <td>{{ $realty->use }}</td>
                                                                            <td>{{ $realty->advantages }}</td>

                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h2 class="heading">الأقساط المدفوعة</h2>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered table-striped m-0">
                                                                    <thead>

                                                                        <tr>
                                                                            <th>رقم القسط</th>
                                                                            <th> تاريخ الاصدار</th>
                                                                            <th> المبلغ الاجمالي </th>
                                                                            <th> تاريخ الدقع </th>
                                                                            <th> طريقة الدفع </th>
                                                                            <th> رقم المرجع</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @forelse ($mentos as $mento)
                                                                            <tr>
                                                                                <td>{{ $mento->installmentNo }}</td>
                                                                                <td>{{ $mento->installment_date }}</td>
                                                                                <td>{{ $mento->amount }}</td>
                                                                                <td>{{ $mento->payment_date }}</td>
                                                                                <td>{{ $mento->payment_type }}</td>
                                                                                <td>{{ $mento->refrenceNo }}</td>
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
                                            <div class="form-group">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered table-striped m-0">
                                                                    <thead>

                                                                        <tr>
                                                                            <th>القيمة الاجمالية </th>
                                                                            <th>القيمة المدفوعة حتى الان </th>
                                                                            <th>القيمة المتبقية </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>{{ $contract->rent_value }}</td>
                                                                            <td>{{ $contract->paid }}</td>
                                                                            <td>{{ $contract->remain }}</td>
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
                <script src="{{ URL::asset('assets/vendor/datatables/dataTables.min.js') }}"></script>
                <script src="{{ URL::asset('assets/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>



                <!-- Custom Data tables -->
                <script src="{{ URL::asset('assets/vendor/datatables/custom/custom-datatables.js') }}"></script>
                <script src="{{ URL::asset('assets/vendor/datatables/custom/fixedHeader.js') }}"></script>


                <!-- Download / CSV / Copy / Print -->
                <script src="{{ URL::asset('assets/vendor/datatables/buttons.min.js') }}"></script>
                <script src="{{ URL::asset('assets/vendor/datatables/jszip.min.js') }}"></script>
                <script src="{{ URL::asset('assets/vendor/datatables/pdfmake.min.js') }}"></script>
                <script src="{{ URL::asset('assets/vendor/datatables/vfs_fonts.js') }}"></script>
                <script src="{{ URL::asset('assets/vendor/datatables/html5.min.js') }}"></script>
                <script src="{{ URL::asset('assets/vendor/datatables/buttons.print.min.js') }}"></script>
            @endsection
