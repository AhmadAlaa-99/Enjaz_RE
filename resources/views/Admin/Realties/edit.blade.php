
@extends('layouts.master')
@section('css')

    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.date.css')}}" rel="stylesheet">


@endsection
@section('title')
تعديل بيانات المنشأة العقارية
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">المنشأت العقارية</li>
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
                <div class="card-title">تعديل بيانات المنشأة العقارية</div>
            </div>
            <div class="card-body">
            <form action="{{ route('realties.update',$realty->id) }}" method="post" enctype="multipart/form-data"autocomplete="off">
            {{ method_field('patch') }}
            {{ csrf_field() }}
            <div class="row gutters">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                                <label for="inputName" class="control-label">مالك المنشأة العقارية </label>
                                <select name="owner_id" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--value-->
                                    @foreach ($owners as $owner)

                                    @if("{{old('owner_id')}}"==$owner->id)
                                    <option value="{{$owner->id }}"selected>{{  $owner->company_name }}</option>
                                    @else
                                        <option value="{{$owner->id }}"> {{  $owner->company_name}}</option>
                                        @endif
                                    @endforeach


                                    
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="eMail">المنطقة</label>
                                <input type="text" class="form-control" name="address" value="{{$realty->address}}"required>
                            </div>
                            <div class="form-group">
                                <label for="phone"> عدد الوحدات</label>
                                <input type="number" class="form-control" name="units" value="{{$realty->units}}"required>
                            </div>


                         </div>


                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label for="eMail">اسم المنشأة</label>
                                <input type="text" class="form-control" name="realty_name" value="{{$realty->realty_name}}"required>
                            </div>



                            <div class="form-group">
                                <label for="inputName" class="control-label">  نوع بناء العقار </label>
                                <select name="type" value="{{$realty->type}}"id="type" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--value-->
                                    <option value="building"{{($realty->type) == 'building' ? 'selected' : '' }}>بناء</option>
                                    <option value="villa"{{($realty->type) == 'villa' ? 'selected' : '' }}> فيلا</option>

                                </select>
                            </div>



                            <div class="form-group">
                                <label for="phone"> عدد الأدوار</label>
                                <input type="number" class="form-control" name="roles" value="{{$realty->roles}}"required>
                            </div>


                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                                <label for="phone"> المساحة </label>
                                <input type="text" class="form-control" name="size" value="{{$realty->size}}"required>
                            </div>

                            <div class="form-group">
                                <label for="inputName" class="control-label">  نوع استخدام العقار </label>
                                <select name="use" value="{{$realty->use}}"id="use" class="form-control SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--value-->
                                        <option value="family" {{($realty->use) == 'family' ? 'selected' : '' }}  > عائلي</option>
                                        <option value="individually" {{($realty->use) == 'individually' ? 'selected' : '' }}> افراد</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="phone"> المميزات </label>
                                <input type="text" class="form-control" name="advantages" value="{{$realty->advantages}}"required>
                            </div>






                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                            <button type="submit" name="submit" class="btn btn-success">حفظ</button>
                        </div>

                    </div>
</form>
                </section>


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


