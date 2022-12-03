@extends('layouts.master')
@section('css')
<!-- Steps Wizard CSS -->

<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="{{URL::asset('assets/vendor/summernote/summernote-bs4.css')}}" />
<link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'><link rel="stylesheet" href="{{URL::asset('assets/css/wizard.css')}}" >
@endsection
@section('title')
اضافة عقد استئجار
@stop

@section('content')
<div class="main-container">


<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">عقود الاستئجار </li>
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
	<!-- Content wrapper start -->
<div class="content-wrapper">
<form action="{{ route('rent_contract_store') }}" method="post" enctype="multipart/form-data"autocomplete="off">
            {{ csrf_field() }}
  <!--  بيانات العقد -->
<div class="form-group">
    <h2 class="heading">بيانات المالك</h2>
      <div class="grid">
        <div class="col-1-2">
          <div class="controls">
           <input type="text" id="name" class="floatLabel" value="{{old('name')}}"name="name"required>
           <label for="street">الاسم</label>
          </div>
        </div>
         <div class="col-1-2">
          <div class="controls">
            <input type="text" id="mobile" class="floatLabel" value="{{old('mobile')}}"name="mobile"required>
            <label for="eMail">الهاتف</label>
          </div>
        </div>
     </div>

             <div class="grid">
        <div class="col-1-2">
          <div class="controls">
           <input type="email" id="email" class="floatLabel" value="{{old('email')}}"name="email"required>
           <label for="street">البريد</label>
          </div>
        </div>
         <div class="col-1-2">
          <div class="controls">
            <input type="text" id="attribute_name" class="floatLabel" value="{{old('attribute_name')}}"name="attribute_name"required>
            <label for="eMail">اسم الوسيط</label>
          </div>
        </div>
</div>
</div>

  <div class="form-group">
  <h2 class="heading">بيانات العقد</h2>
<input type="hidden" id="type" class="floatLabel" value="{{$type}}"name="type_sc"required>
   <div class="grid">
        <div class="col-1-4">
          <div class="controls">
           <input type="text" id="contactNo" class="floatLabel" value="{{old('contactNo')}}"name="contactNo"required>
           <label for="street">رقم سجل العقد - ID</label>
          </div>
        </div>
         <div class="col-1-4">
          <div class="controls">
            <input type="date" id="start_date" class="floatLabel" value="{{old('start_date')}}"name="start_date"required>
            <label for="eMail">تاريخ بداية مدة الاستئجار</label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
            <input type="date" id="end_date" class="floatLabel" value="{{old('end_date')}}"name="end_date"required>
            <label for="phone">تاريخ نهاية مدة الاستئجار</label>
          </div>
        </div>
           <div class="col-1-4">
          <div class="controls">
           <input type="text" id="ejar_cost" class="floatLabel" value="{{old('ejar_cost')}}"name="ejar_cost"required>
           <label for="street"> كلفة  الاستئجار</label>
          </div>
        </div>
</div>
@if($type=="تجاري")
<div class="grid">
        <div class="col-1-3">
          <div class="controls">
            <input type="text" id="tax" class="floatLabel" value="15%"name="tax"readonly>
            <label for="phone">نسبة الضريبة</label>
          </div>
        </div>
         <div class="col-1-3">
          <div class="controls">
            <input type="text" id="tax_amount" class="floatLabel" value="{{old('tax_amount')}}"name="tax_amount"required>
            <label for="phone">مبلغ الضريبة</label>
          </div>
        </div>
         <div class="col-1-3">
          <div class="controls">
            <input type="text" id="rent_value" class="floatLabel" value="{{old('rent_value')}}"name="rent_value"required>
            <label for="phone">الكلفة الاجمالية للاستئجار</label>
          </div>
        </div>
</div>
@endif
<div class="grid">

        <div class="col-2-3">
          <div class="controls">
            <input type="text" id="note" class="floatLabel" value="{{old('note')}}"name="note"required>
            <label for="phone">ملاحظات</label>
          </div>
        </div>
</div>
</div>
  <!--  بيانات العقد -->
  <div class="form-group">
    <h2 class="heading">بيانات المنشأة العقارية</h2>
      <div class="grid">
        <div class="col-1-4">
          <div class="controls">

           <input type="text" value="" name="quarter" class="floatLabel"placeholder=""required>
           <label for="street">المنطقة</label>
          </div>
        </div>
         <div class="col-1-4">
          <div class="controls">
            <input type="text" id="realty_name" class="floatLabel"value="{{old('realty_name')}}"name="realty_name" placeholder=""required>
            <label for="eMail">اسم المنشأة</label>
          </div>
        </div>
         <div class="col-1-4">
          <div class="controls">
            <input type="text" class="floatLabel"name="agency_name" value="{{old('agency_name')}}"placeholder=""required>
            <label for="eMail">اسم الوكيل</label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
            <input type="text" class="floatLabel"name="agency_mobile"value="{{old('agency_mobile')}}" placeholder=""required>
            <label for="phone">رقم الوكيل</label>
          </div>
        </div>

</div>
   <div class="grid">


        <div class="col-1-4">
          <div class="controls">
           <select name="use" id="use" class="floatLabel" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد النوع</option>
                                        <option value="family"> عائلي</option>
                                        <option value="individually"> افراد</option>
                                </select>
           <label for="street"> نوع استخدام العقار</label>
          </div>
        </div>
 <div class="col-1-4">
          <div class="controls">
             <select name="type" id="type" class="floatLabel" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد النوع</option>
                                    <option value="villa"selected> فيلا</option>
                                    <option value="building">بناء</option>
                                </select>
            <label for="phone">نوع العقار</label>
          </div>
        </div>
         <div class="col-1-4">
          <div class="controls">
           <input type="number" id="units" class="floatLabel" value="{{old('units')}}"name="units"required>
           <label for="street">عدد الوحدات السكنية</label>
          </div>
        </div>
         <div class="col-1-4">
          <div class="controls">
           <input type="number" id="shopsNo" class="floatLabel" value="{{old('shopsNo')}}"name="shopsNo"required>
           <label for="street">عدد الوحدات التجارية</label>
          </div>
        </div>
</div>
   <div class="grid">

         <div class="col-1-4">
          <div class="controls">
            <input type="number" class="floatLabel"name="roles" value="{{old('roles')}}"placeholder=""required>
            <label for="eMail">عدد الأدوار</label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
            <input type="text" class="floatLabel"name="size"value="{{old('size')}}" placeholder=""required>
            <label for="phone">المساحة</label>
          </div>
        </div>

         <div class="col-1-4">
          <div class="controls">
            <select name="elevator"value="{{old('elevator')}}" id="type" class="floatLabel" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>توفر مصاعد</option>
                                    <option value="yes"selected> نعم</option>
                                    <option value="no">لا</option>
                                </select>
            <label for="eMail">مصاعد</label>
          </div>
        </div>
         <div class="col-1-4">
          <div class="controls">
            <select name="parking"value="{{old('parking')}}" id="type" class="floatLabel" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>توفر مواقف</option>
                                    <option value="yes"selected> نعم</option>
                                    <option value="no">لا</option>
                                </select>
            <label for="eMail">مواقف</label>
          </div>
        </div>
</div>
<div class="grid">
   <div class="col-2-3">
          <div class="controls">
            <input type="text" width="100px"height="100px"id="st_rental_date" class="floatLabel" value="{{old('advantages')}}"name="advantages" placeholder=""required>
            <label for="eMail">المميزات</label>
          </div>
        </div>
</div>
  </div>

     <!--   جدول سداد الدفعات -->
    <div class="form-group">
         <h2 class="heading">جدول سداد الدفعات</h2>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-dark m-0" id="tableEstimate">
                                                 <thead>
                                            <tr>
                                                <th>رقم الاستمارة</th>
                                                <th>تاريخ الاستمارة</th>
                                                <th>رقم المرجع</th>
                                                <th>تاريخ الدفع</th>
                                                <th> المبلغ</th>
                                                <th> طريقة الدفع</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="add">
                                        <tr>
                                            <td><input class="form-control" type="text" id="installmentNo" name="installmentNo[]"required></td>
                                            <td><input class="form-control" type="date" id="installment_date" name="installment_date[]"required></td>
                                            <td><input class="form-control unit_price"  type="text" id="refrenceNo" name="refrenceNo[]"required></td>
                                            <td><input class="form-control unit_price"  type="date" id="payment_date" name="payment_date[]"required></td>
                                            <td><input class="form-control unit_price"  type="text" id="amount" name="amount[]"required></td>
                                           <td><input class="form-control unit_price"  type="text" id="payment_type" name="payment_type[]"required></td>
                                           <td><button type="button" class="btn btn-primary" id="add_btn">	<i class="icon-add"></i></button></td>
                                        </tr>
                                        </tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
    </div>



     <div class="form-group">
         <h2 class="heading"> مرفقات العقد</h2>
         <div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

<div class="mb-3">
  <input class="form-control" name="contract_file"accept=".pdf,.jpg, .png, image/jpeg, image/png"type="file" id="formFileDisabled"required>
</div>


						</div>
					</div>

    </div>

    <div class="form-group" >
    <button type="submit" value="Submit" class="col-1-4">حفظ البيانات</button>
    </div>

</form>
<!-- Content wrapper end -->
</div>
</div>
@endsection
@section('js')
<script type="text/javascript">

    $(document).ready(function()
    {
        $('#add_btn').on('click',function()
        {
        var html='';
        html+='<tr>';
        html+='<td><input class="form-control" type="text" id="installmentNo" name="installmentNo[]"required></td>';
        html+='<td><input class="form-control" type="date" id="installment_date" name="installment_date[]"required></td>';
        html+='<td><input class="form-control unit_price"  type="text" id="refrenceNo" name="refrenceNo[]"required></td>';
         html+='<td><input class="form-control unit_price"  type="date" id="payment_date" name="payment_date[]"required></td>';
        html+='<td><input class="form-control unit_price"  type="text" id="amount" name="amount[]"required></td>';
        html+='<td><input class="form-control unit_price"  type="text" id="payment_type" name="payment_type[]"required></td>';
        html+='<td><button type="button" class="btn btn-primary" id="remove"><i class="icon-remove"></button></td>';
        html+='</tr>';
        $('tbody').append(html);
    });
});
$(document).on('click','#remove',function(){
    $(this).closest('tr').remove();
});

    </script>
			<script src="{{URL::asset('assets/vendor/summernote/summernote-bs4.js')}}"></script>
		<script>
			$(document).ready(function() {
				$('.summernote').summernote({
					height: 170,
					tabsize: 2
				});
			});
		</script>
        <script  src="{{URL::asset('assets/js/wizard.js')}}"></script>
			<script src="{{URL::asset('assets/vendor/summernote/summernote-bs4.js')}}"></script>

        <script  src="{{URL::asset('assets/js/wizard.js')}}"></script>

@endsection
