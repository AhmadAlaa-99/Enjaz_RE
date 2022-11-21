@extends('layouts.master')
@section('css')
<!-- Steps Wizard CSS -->
<link href="{{URL::asset('assets/vendor/wizard/jquery.steps.css')}}" rel="stylesheet">
@endsection
@section('title')
اضافة مالك عقار
@stop

@section('content')
<div class="main-container">
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">ملاك العقارات</li>
        <li class="breadcrumb-item active">اضافة</li>
    </ol>

    <ul class="app-actions">
        <li>
            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="time">
                <span id="clock"></span>
            </a>
        </li>
    </ul>
</div>
<!-- Page header end -->


<!-- Content wrapper start -->
<div class="content-wrapper">



    <!-- Row start -->
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-header">
                <div class="card-title">اضافة  مالك عقاري</div>
            </div>
            <div class="card-body">
            <form action="{{ route('owners.store') }}" method="post" enctype="multipart/form-data"autocomplete="off">
            {{ csrf_field() }}
                <div class="row gutters">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <label for="fullName">الاسم</label>
                            <input type="text" class="form-control" name="name" placeholder="Full name"required>
                        </div>
                           <div class="form-group">
                            <label for="website"> نوع الهوية</label>
                            <div class="form-radio-item">
                                <input type="radio" name="ID_type" value="civilian" id="male" checked="checked" />
                                <label for="civilian">سجل مدني</label>

                                <input type="radio" name="ID_type" value="stay" id="female" />
                                <label for="stay">اقامة</label>
                            </div>
                        </div>






                        <div class="form-group">
                            <label for="website">البريد الاكتروني</label>
                            <input type="email" class="form-control" name="email" placeholder="email"required>
                        </div>
                        <div class="form-group">
                            <label for="addRess">تاريخ الاشتراك</label>
                            <input type="date" class="form-control" name="record_date" placeholder="record_date">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                            <label for="fullName">اسم الشركة</label>
                            <input type="text" class="form-control" name="company_name" placeholder="company_name">
                    </div>
                       <div class="form-group">
                            <label for="website"> الجنس</label>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" value="male" id="male" checked="checked" />
                                <label for="male">Male</label>

                                <input type="radio" name="gender" value="female" id="female" />
                                <label for="female">Female</label>
                            </div>
                        </div>


                         <div class="form-group">
                                <label for="inputName" class="control-label">الجنسية</label>
                                <select name="nationalitie_id" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد الجنسية</option>
                                    @foreach ($nationals as $national)
                                        <option value="{{$national->id }}"> {{ $national->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                            <label for="website">رقم الهوية</label>
                            <input type="text" class="form-control" name="ID_num" placeholder="ID_num"required>
                        </div>
                         <div class="form-group">
                            <label for="eMail">رقم الجوال</label>
                            <input type="tel" class="form-control" name="phone" placeholder="phone"required>
                        </div>
                        <div class="form-group">
                            <label for="ciTy">رقم الهاتف</label>
                            <input type="text" class="form-control" name="telephone" placeholder="telephone">
                        </div>

                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                            <button type="submit" name="" name="submit" class="btn btn-dark">حفظ</button>
                        </div>
                    </div>
                         </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Row end -->

</div>
<!-- Content wrapper end -->


</div>
@endsection
@section('js')

		<!-- Steps wizard JS -->
        <script src="{{URL::asset('assets/vendor/wizard/jquery.steps.min.js')}}"></script>
        <script src="{{URL::asset('assets/vendor/wizard/jquery.steps.custom.js')}}"></script>

@endsection
