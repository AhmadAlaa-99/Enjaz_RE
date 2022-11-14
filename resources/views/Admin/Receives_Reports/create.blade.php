@extends('layouts.master')
@section('css')

    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.date.css')}}" rel="stylesheet">


@endsection
@section('title')
اضافة تقرير تسليم
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> السجل المالي </li>
        <li class="breadcrumb-item active"> تقارير التسليم</li>
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
                <div class="card-title">اضافة تقرير تسليم</div>
            </div>
            <div class="card-body">
            <form action="{{ route('receives_reports.store') }}" method="post" enctype="multipart/form-data"autocomplete="off">
            {{ csrf_field() }}
                <div class="row gutters">



                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                              <label for="inputName" class="control-label"> رقم العقد </label>
                                <select name="lease_id"class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                               <option selected disabled>حدد رقم العقد المسجل</option>
                                @foreach ($leases as $lease)
                             <option value="{{ $lease->id }}">{{ $lease->reco_number }}</option>
                                @endforeach
                                 </select>
                     </div>
                        <div class="form-group">
                            <label for="ciTy">تاريخ التسليم</label>
                            <input type="date" class="form-control" name="receive_date" >
                        </div>
                        <div class="form-group">
                            <label for="ciTy">حالة الوحدة</label>
                            <input type="text" class="form-control" name="maint_status" >
                        </div>

                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                        <div class="form-group">
                            <label for="ciTy">تصفية الفواتير</label>
                            <input type="textarea" class="form-control" name="paymennts_status">
                        </div>
                        <div class="form-group">
                            <label for="ciTy">ملاحظات</label>

                            <input type="textarea" class="form-control" name="notes">
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
