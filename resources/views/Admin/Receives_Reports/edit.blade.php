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
            <form action="{{ route('receives.update',$receive->id) }}" method="post" enctype="multipart/form-data"autocomplete="off">

                <div class="row gutters">

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                                <label for="inputName" class="control-label"> رقم العقد </label>
                                <select name="lease_id" value="{{$lease->number}}" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')">
                                    <!--value-->
                                    <option value="" selected disabled>حدد رقم العقد المسجل</option>
                                    @foreach ($leases as $lease)
                                        <option value="{{$lease->id }}"> {{ $lease->number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="ciTy">تاريخ التسليم</label>
                            <input type="name" class="form-control" name="receive_date" value="{{$receive->receive_date}}">
                        </div>
                        <div class="form-group">
                            <label for="ciTy">حالة الوحدة</label>
                            <input type="name" class="form-control" name="maint_status" value="{{$receive->maint_status}}">
                        </div>



                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                        <div class="form-group">
                            <label for="ciTy">تصفية الفواتير</label>
                            <input type="name" class="form-control" name="paymennts_status" value="{{$receive->paymennts_status}}">
                        </div>
                        <div class="form-group">
                            <label for="ciTy">ملاحظات</label>
                            <input type="name" class="form-control" name="notes" value="{{$receive->notes}}">
                        </div>



                    </div>


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">

                            <button type="button" name="submit" name="submit" class="btn btn-success">حفظ واضافة المزيد</button>
                            <button type="button" name="submit" name="submit" class="btn btn-dark">حفظ</button>
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
