@extends('layouts.master')
@section('css')

    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.date.css')}}" rel="stylesheet">


@endsection
@section('title')
اعدادات الحساب
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> الاعدادات </li>
        <li class="breadcrumb-item active">اعدادات الحساب</li>
    </ol>

    <ul class="app-actions">
        <li>
            <a href="#" value="reportrange">
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
<!-- Content wrapper start -->
<div class="content-wrapper">

<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="account-settings">
                    <div class="user-profile">

                        <h5 class="user-name">{{Auth::user()->name}} </h5>
                        <h6 class="user-email">{{Auth::user()->email}}</h6>
                        <h6 class="user-email">{{Auth::user()->role_name}}</h6>
                    </div>
                    <div class="setting-links">




                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-header">
                <div class="card-title">Update Profile</div>
            </div>
            <div class="card-body">
            <form action="{{ route('Account_edit') }}" method="post" enctype="multipart/form-data"autocomplete="off">
               @csrf

                <div class="row gutters">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" class="form-control"name="name" value="{{$user->name}}" placeholder="Enter full name">
                        </div>
                        <div class="form-group">
                            <label for="eMail">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Enter email ID">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone"value="{{$user->phone}}" placeholder="Enter phone number">
                        </div>
                          <div class="form-group">
                            <label for="phone">Telephone</label>
                            <input type="text" class="form-control" name="telephone"value="{{$user->telephone}}" placeholder="Enter phone number">
                        </div>

                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="addRess">nationality</label>
                            <input type="text" class="form-control" name="nationality" value="{{$user->nationality}}" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label for="ciTy">ID_type</label>
                            <input type="name" class="form-control" name="ID_type"value="{{$user->ID_type}}" placeholder="Enter City">
                        </div>
                        <div class="form-group">
                            <label for="sTate">ID_num</label>
                            <input type="text" class="form-control" name="ID_num" value="{{$user->ID_num}}" placeholder="Enter State">
                        </div>

                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">

                            <button type="submit" value="submit" name="submit" class="btn btn-success">حفظ البيانات</button>
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
@endsection
@section('js')

    <script src="{{URL::asset('assets/vendor/datepicker/js/picker.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/datepicker/js/picker.date.js')}}"></script>
    <script src="{{URL::asset('assets/datepicker/js/custom-picker.js')}}"></script>
@endsection
