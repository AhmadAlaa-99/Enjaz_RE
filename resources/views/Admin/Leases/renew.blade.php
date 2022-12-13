@extends('layouts.master')
@section('css')
    <!-- Steps Wizard CSS -->

    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/summernote/summernote-bs4.css') }}" />
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/wizard.css') }}">
@endsection
@section('title')
    تجديد عقد
@stop

@section('content')
    <div class="main-container">


        <!-- Page header start -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">عقود الايجار </li>
                <li class="breadcrumb-item active">تجديد عقد</li>
            </ol>
            <ul class="app-actions">
                <li>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="time">
                        <span id="clock"></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Content wrapper start -->
        <div class="content-wrapper">
            <form action="{{ route('leases.renew.store') }}" method="post" enctype="multipart/form-data"autocomplete="off">
                {{ csrf_field() }}
                <div class="form-group">
                    <h2 class="heading">بيانات العقد</h2>
                    <div class="grid">
                        <div class="col-1-2">
                            <div class="controls">
                                <input type="hidden" value="{{ $unit->id }}"name="unit_id">
                                <input type="hidden" value="{{ $realty->id }}"name="realty_id">
                                <input type="hidden" value="{{ $lease->id }}"name="lease_id">

                                <input type="text" id="reco_number" class="floatLabel"
                                    value="{{ old('reco_number') }}"name="reco_number"required>
                                <label class="active" for="street">رقم سجل العقد - ID</label>
                            </div>
                        </div>
                        <div class="col-1-2">
                            <div class="controls">
                                <input type="text" id="place" class="floatLabel"
                                    value="{{ old('place') }}"name="place"required>
                                <label class="active" for="eMail"> مكان ابرام العقد</label>
                            </div>
                        </div>


                    </div>

                    <div class="grid">
                        <div class="col-1-3">
                            <div class="controls">
                                <input type="date" id="le_date" class="floatLabel"value="{{ old('le_date') }}"
                                    name="le_date"required>
                                <label class="active" for="phone">تاريخ ابرام العقد</label>
                            </div>
                        </div>

                        <div class="col-1-3">

                            <div class="controls">
                                <input type="date" id="st_rental_date" class="floatLabel"
                                    value="{{ old('st_rental_date') }}"name="st_rental_date"required>
                                <label class="active" for="eMail">تاريخ بداية مدة الايجار</label>
                            </div>
                        </div>

                        <div class="col-1-3">
                            <div class="controls">
                                <input type="date" id="end_rental_date" class="floatLabel"
                                    value="{{ old('end_rental_date') }}"name="end_rental_date"required>
                                <label class="active" for="phone">تاريخ نهاية مدة الايجار</label>
                            </div>
                        </div>
                    </div>

                </div>
                <!--  بيانات المستأجر -->
                <div class="form-group">
                    <h2 class="heading"> بيانات المستأجر</h2>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-dark m-0">
                                        <thead>
                                            <tr>
                                                <th> الاسم الكامل :</br></br> {{ $tenant->user->name }}</th>
                                                <th> رقم الهوية : </br> </br>{{ $tenant->user->ID_num }}</th>
                                                <th> نوع الهوية :</br> </br>{{ $tenant->user->ID_type }}</th>
                                                <th> رقم الجوال : </br></br>{{ $tenant->user->phone }}</th>
                                                <th> الحنسية : </br></br>{{ $tenant->user->Nationality->Name }}</th>
                                                <th> رقم الهاتف : </br> </br>{{ $tenant->user->phone }}</th>
                                                <th> البريد الالكتروني :</br></br> {{ $tenant->user->email }}</th>
                                            </tr>
                                        </thead>


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
                                                <th> اسم المنشأة :</br></br> {{ $realty->realty_name }}</th>
                                                <th> الحي : </br></br> {{ $realty->quarter }}</th>
                                                <th> نوع العقار : </br> </br>{{ $realty->type }}</th>
                                                <th> الوحدات السكنية :</br> </br>{{ $realty->units }}</th>
                                                <th> الوحدات التجارية :</br> </br>{{ $realty->shopsNo }}</th>

                                                <th> الادوار : </br></br>{{ $realty->roles }}</th>
                                                <th> المساحة : </br></br>{{ $realty->size }}</th>
                                                <th> الاستخدام : </br> </br>{{ $realty->use }}</th>
                                                <th> المميزات :</br></br> {{ $realty->advantages }}</th>



                                            </tr>
                                        </thead>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--  بيانات الوحدة الايجارية -->

                <div class="form-group">
                    <h2 class="heading"> بيانات الوحدة الايجارية</h2>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-dark m-0">
                                        <thead>
                                            <tr>
                                                <th> رقم الوحدة :</br></br> {{ $unit->number }}</th>
                                                <th> رقم الدور : </br></br> {{ $unit->role_number }}</th>
                                                <th> نوع الوحدة : </br> </br>{{ $unit->type }}</th>
                                                <th> مساحة الوحدة :</br> </br>{{ $unit->size }}</th>
                                                <th> حالة الأثاث : </br></br>{{ $unit->furnished_mode }}</th>
                                                <th> خزائن مطبخ : </br></br>{{ $unit->kitchen_Cabinets }}</th>
                                                <th> نوع التكييف : </br> </br>{{ $unit->condition_type }}</th>
                                                <th> عدد وحدات التكييف : </br> </br>{{ $unit->condition_units }}</th>


                                                <th> عدد دورات المياه :</br></br> {{ $unit->bathrooms }}</th>

                                                <th> تفاصيل :</br></br> {{ $unit->details }}</th>




                                            </tr>
                                        </thead>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  البيانات المالية -->
                <div class="form-group">
                    <h2 class="heading">البيانات المالية</h2>
                    <div class="grid">
                        <div class="col-1-3">
                            <div class="controls">
                                <input type="text" name="ejar_cost"
                                    class="floatLabel"value="{{ old('ejar_cost') }}"required>
                                <label class="active" for="eMail"> قيمة العقد</label>
                            </div>
                        </div>
                        <div class="col-1-3">
                            <div class="controls">
                                <select name="payment_cycle"id="payment_cycle"class="floatLabel"
                                    onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--placeholder-->
                                    <option value="quarterly">ربع سنوي</option>
                                    <option value="midterm">نصف سنوي</option>
                                    <option value="monthly">شهري</option>
                                    <option value="annual">سنوي</option>

                                </select>
                                <label class="active" for="fruit">دورة سداد الايجارٍ</label>
                            </div>
                        </div>
                        <div class="col-1-3">
                            <div class="controls">
                                <input type="text" name="num_rental_payments"
                                    value="{{ old('num_rental_payments') }}"class="floatLabel"required>
                                <label class="active" for="eMail">عدد دفعات الايجار</label>
                            </div>
                        </div>




                        <div class="grid">


                            <div class="col-1-3">
                                <div class="controls">
                                    <select name="payment_channels"id="payment_channels"class="floatLabel"
                                        onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')"required>
                                        <!--placeholder-->
                                        <option value="كاش">كاش</option>
                                        <option value="فيزا ">فيزا</option>
                                        <option value="بنك">بنك</option>
                                    </select>
                                    <label class="active" for="eMail">طريقة دفع الرسوم</label>
                                </div>
                            </div>
                            <div class="col-1-3">
                                <div class="controls">
                                    <input type="text" name="recurring_rent_payment"
                                        value="{{ old('recurring_rent_payment') }}"class="floatLabel"required>
                                    <label class="active" for="eMail"> دفعة الايجار الدورية</label>
                                </div>
                            </div>
                            <div class="col-1-3">
                                <div class="controls">
                                    <input type="text" name="notes"
                                        value="{{ old('notes') }}"class="floatLabel"required>
                                    <label class="active" for="eMail"> ملاحظات </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    @if ($unit->type == 'محل تجاري')
                        <div class="grid">
                            <div class="col-1-3">
                                <div class="controls">
                                    <input type="text" name="tax"
                                        class="floatLabel"value="15%"name="tax"readonly>
                                    <label class="active" for="street">نسبة الضريبة </label>
                                </div>
                            </div>
                            <div class="col-1-3">
                                <div class="controls">
                                    <input type="text" name="tax_ammount"
                                        class="floatLabel"value="{{ old('tax_ammount') }}"required>
                                    <label class="active" for="eMail">مبلغ الضريبة</label>
                                </div>
                            </div>
                            <div class="col-1-3">
                                <div class="controls">
                                    <input type="text" name="rent_value"
                                        class="floatLabel"value="{{ old('rent_value') }}"required>
                                    <label class="active" for="eMail">اجمالي قيمة العقد</label>
                                </div>
                            </div>
                        </div>
                </div>
                @endif
                <!--   جدول سداد الدفعات -->
                <div class="form-group">
                    <h2 class="heading">جدول سداد الدفعات</h2>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-dark m-0" id="tableEstimate">
                                        <thead>
                                            <tr>
                                                <th>تاريخ الاصدار</th>
                                                <th>تاريخ الاستحقاق</th>
                                                <th>اجمالي القيمة</th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="add">
                                            <tr>

                                                <td><input class="form-control" type="date" id="release_date"
                                                        name="release_date[]"required></td>
                                                <td><input class="form-control" type="date" id="due_date"
                                                        name="due_date[]"required></td>
                                                <td><input class="form-control unit_price" type="text" id="total"
                                                        name="total[]"required></td>
                                                <td><button type="button" class="btn btn-primary" id="add_btn"> <i
                                                            class="icon-add"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--     الوسيط العقاري -->
                <div class="form-group">
                    <h2 class="heading"> بيانات المطور العقاري</h2>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-dark m-0">
                                        <thead>
                                            <tr>
                                                <th> الاسم :</br></br>{{ $broker->name }} </th>
                                                <th> البريد الالكتروني :</br></br> {{ $broker->email }}</th>


                                            </tr>
                                        </thead>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <h2 class="heading">التزامات الأطراف</h2>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card m-0">
                                <div class="card-header">
                                    <div class="card-title">التزامات الأطراف </div>
                                    <div class="card-sub-title">الالتزمات المتفق عليها من قبل الطرفين بموجب العقد</div>
                                </div>


                                <textarea
                                    class="ckeditor"id="editor1"name="desk"cols="30"rows="10"value="{{ old('desc') }}"required></textarea>
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>
                                <!--<div class="summernote"></div>-->


                            </div>
                        </div>
                    </div>

                </div>

                <!-- التزامات الأطراف -->
                <div class="form-group">
                    <h2 class="heading"> مرفقات العقد</h2>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="mb-3">
                                <input class="form-control"
                                    name="docFile"accept=".pdf,.jpg, .png, image/jpeg, image/png"type="file"
                                    id="formFileDisabled"required>
                            </div>



                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <button type="submit" value="Submit" class="col-1-4">حفظ البيانات</button>
                </div>

            </form>
            <!-- Content wrapper end -->
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#add_btn').on('click', function() {
                var html = '';
                html += '<tr>';
                html +=
                    '<td><input class="form-control"  type="date" id="release_date" name="release_date[]"></td>';
                html += '<td><input class="form-control"type="date" id="due_date" name="due_date[]"></td>';
                html +=
                    '<td><input class="form-control unit_price" type="text" id="total" name="total[]"></td>';
                html +=
                    '<td><button type="button" class="btn btn-primary" id="remove"><i class="icon-remove"></button></td>';
                html += '</tr>';
                $('tbody').append(html);
            });
        });
        $(document).on('click', '#remove', function() {
            $(this).closest('tr').remove();
        });
    </script>
    <script src="{{ URL::asset('assets/vendor/summernote/summernote-bs4.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 170,
                tabsize: 2
            });
        });
    </script>
    <script src="{{ URL::asset('assets/js/wizard.js') }}"></script>

@endsection
