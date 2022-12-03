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
                            <input type="number" class="form-control" id="rooms" name="rooms" value="{{old('rooms')}}"placeholder="rooms"required>
                        </div>

                        <div class="form-group">
                            <label for="eMail">رقم الدور</label>
                            <input type="number" class="form-control" name="role_number" value="{{old('role_number')}}"placeholder="role_number"required>
                        </div>
                        <div class="form-group">
                                <label for="inputName" class="control-label"> خزائن مطبخ مركبة </label>
                                <select name="kitchen_Cabinets"value="{{old('kitchen_Cabinets')}}" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>مركبة؟؟</option>
                                        <option value="yes"> نعم</option>
                                        <option value="no"> لا</option>
                                </select>
                            </div>



                         <div class="form-group">
                            <label for="fullName"> تفاصيل </label>
                            <textarea type="textarea" class="form-control" id="details" name="details"value="{{old('details')}}" placeholder="details"required></textarea>
                        </div>

                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                                <label for="inputName" class="control-label">نوع الوحدة</label>
                                <select name="type"value="{{old('type')}}" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد النوع</option>
                                        <option value="فيلا">فيلا</option>
                                        <option value="شقة">شقة</option>
                                        <option value="شقة ثنائية الدور">شقة ثنائية الدور</option>
                                        <option value="شقة صغيرة">شقة صغيرة</option>
                                        <option value="ملحق">ملحق</option>
                                        <option value="محل تجاري">محل تجاري</option>
                                      </select>
                     </div>
                        <div class="form-group">
                            <label for="ciTy">مساحة الوحدة</label>
                            <input type="name" class="form-control" name="size"value="{{old('size')}}" placeholder="size"required>
                        </div>
                        <div class="form-group">
                            <label for="sTate">عدد وحدات التكييف</label>
                            <input type="number" class="form-control" name="condition_units"value="{{old('condition_units')}}" placeholder="condition_units"required>

                        </div>



                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <label for="addRess">رقم الوحدة</label>
                            <input type="text" class="form-control" name="number" value="{{old('number')}}"placeholder="number"required>
                        </div>
                        <div class="form-group">
                                <label for="inputName" class="control-label">حالة الأثاث </label>
                                <select name="furnished_mode" value="{{old('furnished_mode')}}"class="form-control SlectBox" onclick="console.log($(this).val())"
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
                                <select name="condition_type" value="{{old('condition_type')}}"class="form-control SlectBox" onclick="console.log($(this).val())"
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
                            <input type="number" class="form-control"value="{{old('bathrooms')}}" name="bathrooms" placeholder="bathrooms"required>
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
