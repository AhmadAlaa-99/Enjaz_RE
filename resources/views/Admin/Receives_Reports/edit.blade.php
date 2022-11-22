@extends('layouts.master')
@section('css')

    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.date.css')}}" rel="stylesheet">


@endsection
@section('title')
تعديل بيانات تقرير التسليم
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
                <div class="card-title">تعديل بيانات تقرير التسليم</div>
            </div>
            <div class="card-body">
            <form action="{{ route('receives_reports.update',$receive->id) }}" method="post" enctype="multipart/form-data"autocomplete="off">
             {{ method_field('patch') }}
              {{ csrf_field() }}

                <div class="row gutters">

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
              <div class="form-group">
                            <label for="ciTy">تاريخ التسليم</label>
                            <input type="date" class="form-control" name="receive_date" value="{{$receive->receive_date}}"required>
                            <input type="hidden"  name="lease_id" value="{{$receive->lease_id}}"required>

                        </div>



                        <div class="form-group">
                            <label for="ciTy">حالة الوحدة</label>
                            <textarea type="name" class="form-control" name="maint_status" value="{{$receive->maint_status}}"required></textarea>
                        </div>



                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                     <div class="form-group">
                            <label for="ciTy">تصفية الفواتير</label>
                            <textarea type="name" class="form-control" name="paymennts_status" value="{{$receive->paymennts_status}}"required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="ciTy">ملاحظات</label>
                            <textarea type="name" class="form-control" name="notes" value="{{$receive->notes}}"required></textarea>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">

                            <button type="submit"  name="submit" class="btn btn-dark">حفظ</button>
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
