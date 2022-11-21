@extends('layouts.master')
@section('css')

    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.date.css')}}" rel="stylesheet">


@endsection
@section('title')
اضافة وحدة ايجارية
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">الوحدات الايجارية </li>
        <li class="breadcrumb-item active"> اضافة</li>
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

<!-- Row start -->
<div class="row gutters">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-header">
                <div class="card-title">اضافة وحدة ايجارية</div>
            </div>
            <div class="card-body">
            <form action="{{ route('realty_units_store',$realty->id) }}" method="post" enctype="multipart/form-data"autocomplete="off">
            {{ csrf_field() }}
                <div class="row gutters">

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                            <label for="fullName"> عدد الغرف </label>
                            <input type="number" class="form-control" id="rooms" name="rooms" placeholder="rooms"required>
                        </div>

                        <div class="form-group">
                            <label for="eMail">رقم الدور</label>
                            <input type="number" class="form-control" name="role_number" placeholder="role_number"required>
                        </div>
                        <div class="form-group">
                                <label for="inputName" class="control-label"> خزائن مطبخ مركبة </label>
                                <select name="kitchen_Cabinets" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>مركبة؟؟</option>
                                        <option value="yes"> نعم</option>
                                        <option value="no"> لا</option>
                                </select>
                            </div>

                        <div class="form-group">
                            <label for="website">رقم عداد المياه</label>
                            <input type="text" class="form-control" name="water_number" placeholder="water_number"required>
                        </div>

                         <div class="form-group">
                            <label for="fullName"> تفاصيل </label>
                            <input type="text" class="form-control" id="details" name="details" placeholder="details"required>
                        </div>

                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                                <label for="inputName" class="control-label">نوع الوحدة</label>
                                <select name="type" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد النوع</option>





                                        <option value="villa">فيلا</option>
                                        <option value="apartment">شقة</option>
                                        <option value="two-floor">شقة ثنائية الدور</option>
                                        <option value="small">شقة صغيرة</option>
                                        <option value="annexe">ملحق</option>

                                </select>
                     </div>
                        <div class="form-group">
                            <label for="ciTy">مساحة الوحدة</label>
                            <input type="name" class="form-control" name="size" placeholder="size"required>
                        </div>
                        <div class="form-group">
                            <label for="sTate">عدد وحدات التكييف</label>
                            <input type="number" class="form-control" name="condition_units" placeholder="condition_units"required>

                        </div>
                        <div class="form-group">
                            <label for="zIp">رقم عداد الكهرباء</label>
                            <input type="text" class="form-control" name="electricity_number" placeholder="electricity_number"required>
                        </div>


                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <label for="addRess">رقم الوحدة</label>
                            <input type="text" class="form-control" name="number" placeholder="number"required>
                        </div>
                        <div class="form-group">
                                <label for="inputName" class="control-label">حالة الأثاث </label>
                                <select name="furnished_mode" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد الحالة</option>
                                        <option value="unfurnished"> غير مؤثثة</option>
                                        <option value="newfn"> مؤثثة جديد</option>
                                        <option value="usedfn"> مؤثثة مستعمل</option>
                                </select>
                            </div>
                              <div class="form-group">
                                <label for="inputName" class="control-label">نوع التكييف</label>
                                <select name="condition_type" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد النوع</option>
                                        <option value="سبليت">سبليت</option>
                                        <option value="شباك">شباك</option>
                                        <option value="مركزي"> مركزي</option>
                                </select>
                     </div>


                        <div class="form-group">
                            <label for="sTate"> عدد دورات المياه</label>
                            <input type="number" class="form-control" name="bathrooms" placeholder="bathrooms"required>
                        </div>


                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">

                            <button type="submit" name="submit" name="submit" class="btn btn-dark">حفظ واضافة المزيد</button>
                        </div>
                    </div>

                </div>
</form>

<!--
                      <div class="d-flex justify-content-center">
	            <button  type="submit" class="btn btn-success"><a href="{{route('realty_units_add',$realty->id)}}"> حفظ واضافة المزيد </a></button>
                     </div>
-->


            </div>
        </div>
    </div>
</div>
<!-- Row end -->

</div>
<!-- Content wrapper end -->
@endsection
@section('js')

    <script src="{{URL::asset('assets/vendor/datepicker/js/picker.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/datepicker/js/picker.date.js')}}"></script>
    <script src="{{URL::asset('assets/datepicker/js/custom-picker.js')}}"></script>
@endsection
