@extends('layouts.master')
@section('css')

    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.date.css')}}" rel="stylesheet">


@endsection
@section('title')
تعديل بيانات الوحدة الايجارية
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">الوحدات الايجارية </li>
        <li class="breadcrumb-item active"> تعديل</li>
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
                <div class="card-title">تعديل بيانات الوحدة الايجارية</div>
            </div>
            <div class="card-body">
            <form action="{{ route('units.update',$unit->id) }}" method="post" enctype="multipart/form-data"autocomplete="off">
            {{ method_field('patch') }}
            {{ csrf_field() }}

                <div class="row gutters">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                         <div class="form-group">
                            <label for="fullName">عدد الغرف</label>
                            <input type="text" class="form-control" id="rooms" name="rooms" value="{{$unit->rooms}}"required>
                         </div>

                        <div class="form-group">
                            <label for="eMail">رقم الدور</label>
                            <input type="number" class="form-control" name="role_number" value="{{$unit->role_number}}"required>
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
                            <input type="text" class="form-control" name="water_number" value="{{$unit->water_number}}"required>
                        </div>
                         <div class="form-group">
                            <label for="fullName"> تفاصيل </label>
                            <input type="text" class="form-control" id="details" name="details" value="{{$unit->details}}"required>
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
                            <input type="text" class="form-control" name="size" value="{{$unit->size}}"required>
                        </div>
                        <div class="form-group">
                            <label for="sTate">عدد وحدات التكييف</label>
                            <input type="number" class="form-control" name="condition_units" value="{{$unit->condition_units}}"required>

                        </div>
                        <div class="form-group">
                            <label for="zIp">رقم عداد الكهرباء</label>
                            <input type="text" class="form-control" name="electricity_number" value="{{$unit->Elecrtricity_number}}"required>
                        </div>


                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <label for="addRess">رقم الوحدة</label>
                            <input type="text" class="form-control" name="number" value="{{$unit->number}}"required>
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
                            <input type="number" class="form-control" name="bathrooms" value="{{$unit->bathrooms}}"required>
                        </div>


                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">

                            <button type="submit" name="submit" name="submit" class="btn btn-dark">حفظ</button>
                        </div>
                    </div>
                </div>
</form>
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
