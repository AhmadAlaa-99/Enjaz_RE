@extends('layouts.master')
@section('css')
<!-- Steps Wizard CSS -->
<link href="{{URL::asset('assets/vendor/wizard/jquery.steps.css')}}" rel="stylesheet">
@endsection
@section('title')
تعديل بيانات مالك عقاري
@stop

@section('content')
<div class="main-container">


<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">ملاك العقارات</li>
        <li class="breadcrumb-item active">تعديل</li>
    </ol>

    <ul class="app-actions">
        <li>
            <a href="#" name="reportrange">
                <span class="range-text"></span>
                <i class="icon-chevron-down"></i>
            </a>
        </li>
        <li>
            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print">
                <i class="icon-print"></i>
            </a>
        </li>
        <li>
            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download CSV">
                <i class="icon-cloud_download"></i>
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
                <div class="card-title">تعديل بيانات  مالك عقاري</div>
            </div>
            <div class="card-body">
            <form action="{{ route('owners.update',$owner->id) }}" method="post" enctype="multipart/form-data"autocomplete="off">
            {{ method_field('patch') }}
            {{ csrf_field() }}

                <div class="row gutters">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <label for="fullName">الاسم</label>
                            <input type="text" class="form-control" name="name" value="{{$owner->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="addRess">نوع الهوية</label>
                            <input type="text" class="form-control" name="ID_type" value="{{$owner->ID_type}}"required>
                        </div>

                        <div class="form-group">
                            <label for="website">البريد الاكتروني</label>
                            <input type="email" class="form-control" name="email" value="{{$owner->email}}"required>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                            <label for="fullName">اسم الشركة</label>
                            <input type="text" class="form-control" name="company_name" value="{{$owner->company_name}}"required>
                    </div>
                    <div class="form-group">
                            <label for="eMail">رقم الجوال</label>
                            <input type="text" class="form-control" name="phone" value="{{$owner->phone}}"required>
                        </div>
                        <div class="form-group">
                            <label for="phone">الجنسية</label>
                            <input type="text" class="form-control" name="nationality" value="{{$owner->nationality}}"required>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                            <label for="website">رقم الهوية</label>
                            <input type="text" class="form-control" name="ID_num" value="{{$owner->ID_num}}"required>
                        </div>
                        <div class="form-group">
                            <label for="ciTy">رقم الهاتف</label>
                            <input type="text" class="form-control" name="telephone" value="{{$owner->telephone}}"required>
                        </div>
                        <div class="form-group">
                            <label for="addRess">تاريخ الاشتراك</label>
                            <input type="date" class="form-control" name="company_name" value="{{$owner->company_name}}"required>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                            <button type="submit" name=""  class="btn btn-dark">حفظ</button>
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
