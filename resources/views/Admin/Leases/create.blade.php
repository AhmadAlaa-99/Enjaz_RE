@extends('layouts.master')
@section('css')
<!-- Steps Wizard CSS -->

<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="{{URL::asset('assets/vendor/summernote/summernote-bs4.css')}}" />
<link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'><link rel="stylesheet" href="{{URL::asset('assets/css/wizard.css')}}" >
@endsection
@section('title')
اضافة عقد
@stop

@section('content')
<div class="main-container">


<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">عقود الايجار </li>
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

<form action="{{ route('leases.store') }}" method="post" enctype="multipart/form-data"autocomplete="off">
            {{ csrf_field() }}
  <!--  بيانات العقد -->
  <div class="form-group">
    <h2 class="heading">بيانات العقد</h2>
      <div class="grid">
        <div class="col-1-4">
          <div class="controls">
           <input type="text" id="reco_number" class="floatLabel" name="reco_number"required>
           <label for="street">رقم سجل العقد - ID</label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
           <input type="text" id="place" class="floatLabel" name="place"required>
           <label for="eMail"> مكان ابرام العقد</label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
           <input type="text" id="payment_channels" class="floatLabel" name="payment_channels"required>
           <label for="eMail"> طريقة دفع رسوم العقد</label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
           <select name="type_le"id="type_le"class="floatLabel" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--placeholder-->
                                        <option value="new" >جديد</option>
                                        <option value="renew" >مجدد</option>

                        </select>
           <label for="fruit">نوع العقد</label>
          </div>
        </div>
      </div>

      <div class="grid">
      <div class="col-1-3">
          <div class="controls">
            <input type="date" id="le_date" class="floatLabel" name="le_date"required>
            <label for="phone">تاريخ ابرام العقد</label>
          </div>
        </div>

        <div class="col-1-3">

          <div class="controls">
            <input type="date" id="st_rental_date" class="floatLabel" name="st_rental_date"required>
            <label for="eMail">تاريخ بداية مدة الايجار</label>
          </div>
        </div>

        <div class="col-1-3">
          <div class="controls">
            <input type="date" id="end_rental_date" class="floatLabel" name="end_rental_date"required>
            <label for="phone">تاريخ نهاية مدة الايجار</label>
          </div>
        </div>
      </div>

  </div>



 <!--  بيانات المؤجر -->
  <div class="form-group">
    <h2 class="heading">بيانات المؤجر</h2>
      <div class="grid">
        <div class="col-1-2">
          <div class="controls">
           <input type="hidden"name="ownerId" id="ownerId" value="{{$owner->id}}">
           <input type="text" value="{{$owner->name}}" id=ID_type  name="ID_type" class="floatLabel"readonly>
           <label for="street">الاسم الكامل</label>
          </div>
        </div>
        <div class="col-1-2">
          <div class="controls">
           <input type="text" id="company_name" name="company_name"value="{{$owner->organization->company_name}}" class="floatLabel"readonly>
           <label for="eMail"> اسم الشركة</label>
          </div>
        </div>

      </div>
      <div class="grid">
      <div class="col-1-3">
          <div class="controls">
           <input type="text" id="ID_num" name="ID_num" value="{{$owner->ID_num}}" class="floatLabel"readonly>
           <label for="eMail">رقم الهوية</label>
          </div>
        </div>
        <div class="col-1-3">
          <div class="controls">
           <input type="text" value="{{$owner->name}}}" id=ID_type  name="ID_type" class="floatLabel"readonly >
           <label for="street">  نوع الهوية </label>
          </div>
        </div>
        <div class="col-1-3">
          <div class="controls">
           <input type="text"  id="phone" name="phone" value="{{$owner->phone}}" class="floatLabel"readonly>
           <label for="eMail"> رقم الجوال</label>
          </div>
        </div>

       </div>
      <div class="grid">

      <div class="col-1-2">
          <div class="controls">
           <input type="text" id="nationality" name="nationality"value="{{$owner->Nationality->Name}}" class="floatLabel"readonly>
           <label for="eMail">الجنسية</label>
          </div>
        </div>
        <div class="col-1-2">
          <div class="controls">
           <input type="text" id="telephone" name="telephone" value="{{$owner->telephone}}" class="floatLabel"readonly>
           <label for="eMail">رقم الهاتف</label>
          </div>
        </div>
      </div>
      <div class="grid">
        <div class="col-1-2">
          <div class="controls">
           <input type="text" id="email" name="email"value="{{$owner->email}}" class="floatLabel"readonly>
           <label for="street">البريد الالكتروني</label>
          </div>
        </div>

        <div class="col-1-2">
          <div class="controls">
           <input type="text" id="record_date" name="record_date" value="{{$owner->organization->record_date}}" class="floatLabel"readonly>
           <label for="eMail">تاريخ التسجيل</label>
          </div>
        </div>
      </div>
  </div>
 <!--  بيانات المستأجر -->
  <div class="form-group">
    <h2 class="heading">بيانات المستأجر</h2>
      <div class="grid">
        <div class="col-1-3">
          <div class="controls">

           <input type="text" name="t_name" class="floatLabel"required>
           <label for="street">الاسم الكامل</label>

          </div>
        </div>
        <div class="col-1-3">
           <div class="controls">
                                <select name="nationalitie_id" class="floatLabel" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--placeholder-->
                                    @foreach ($nationals as $national)
                                        <option value="{{$national->id }}"> {{ $national->Name }}</option>
                                    @endforeach
                                </select>
                                           <label for="street">حدد الجنسية</label>

                            </div>
        </div>
        <div class="col-1-3">
          <div class="controls">
           <input type="text" name="t_ID_num" class="floatLabel"required>
           <label for="eMail">رقم الهوية</label>
          </div>
        </div>
      </div>
      <div class="grid">
        <div class="col-1-4">
          <div class="controls">
           <input type="text" name="t_ID_type" class="floatLabel"required>
           <label for="street">  نوع الهوية </label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
           <input type="email"  name="t_email" class="floatLabel"required>
           <label for="eMail"> البريد الالكتروني</label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
           <input type="text" name="t_phone" class="floatLabel"required>
           <label for="eMail">رقم الجوال</label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
           <input type="text" name="t_telephone" class="floatLabel"required>
           <label for="eMail">رقم الهاتف</label>
          </div>
        </div>

  </div>


   <!--  بيانات المنشأة العقارية -->
  <div class="form-group">
    <h2 class="heading">بيانات المنشأة العقارية  </h2>
      <div class="grid">
        <div class="col-1-3">
          <div class="controls">
           <input type="text" id="owner_name" name="owner_name" value="{{$owner->name}}" class="floatLabel"readonly >
           <input type="hidden" value="{{$realty->id}}"name="realty_id">
           <label for="street">اسم المنشأة</label>
          </div>
        </div>
        <div class="col-1-3">
          <div class="controls">
           <input type="text" id="address" name="address" value="{{$realty->address}}" class="floatLabel"readonly>
           <label for="eMail"> المنطقة</label>
          </div>
        </div>
        <div class="col-1-3">
          <div class="controls">
           <input type="text"  id="type" name="type" value="{{$realty->type}}" class="floatLabel"readonly>
           <label for="eMail"> نوع بناء العقار</label>
          </div>
        </div>


      </div>
      <div class="grid">
      <div class="col-1-4">
          <div class="controls">
           <input type="text" id="units" name="units" value="{{$realty->units}}" class="floatLabel"readonly>
           <label for="eMail">  الوحدات</label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
           <input type="text" id="roles" name="roles" value="{{$realty->roles}}" class="floatLabel"readonly>
           <label for="eMail"> الأدوار</label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
           <input type="text" value="{{$owner->name}}}" id="size" name="size" value="{{$realty->size}}"readonly>
           <label for="street">  المساحة</label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
           <input type="text" id="use" name="use" value="{{$realty->use}}" class="floatLabel"readonly>
           <label for="eMail">الاستخدام</label>
          </div>
        </div>
      </div>
      <div class="grid">
      <div class="col-3-3">
          <div class="controls">
           <input type="text" id="advantages"  name="advantages" value="{{$realty->advantages}}" class="floatLabel"readonly>
           <label for="street"> المميزات</label>
          </div>
        </div>
      </div>

  </div>

   <!--  بيانات الوحدة الايجارية -->
   <div class="form-group">
    <h2 class="heading">بيانات الوحدة الايجارية</h2>
      <div class="grid">
      <div class="col-1-4">
          <div class="controls">
           <input type="text" id="number" name="number" value="{{$unit->number}}" class="floatLabel"readonly>
           <label for="eMail">رقم الوحدة</label>
          </div>
        </div>

        <div class="col-1-4">
          <div class="controls">
           <input type="text" id="role_number" name="role_number" value="{{$unit->role_number}}" class="floatLabel"readonly>
           <label for="eMail"> رقم الدور</label>
          </div>
        </div>

        <div class="col-1-4">
          <div class="controls">
           <input type="text" id="type" name="type" value="{{$unit->type}}" class="floatLabel"readonly>
           <label for="eMail"> نوع الوحدة</label>
          </div>
        </div>

        <div class="col-1-4">
          <div class="controls">
           <input type="text" id="size" name="size" value="{{$unit->size}}" class="floatLabel"readonly>
           <label for="street">مساحة الوحدة</label>
          </div>
        </div>






      </div>
      <div class="grid">
      <div class="col-1-4">
          <div class="controls">
           <input type="text" id="furnished_mode" name="furnished_mode" value="{{$unit->furnished_mode}}"readonly>
           <label for="street">حالة الأثاث</label>
          </div>
        </div>

        <div class="col-1-4">
          <div class="controls">
           <input type="text" id="kitchen_Cabinets" name="kitchen_Cabinets" value="{{$unit->kitchen_Cabinets}}" class="floatLabel"readonly>
           <label for="eMail"> خزائن مطبخ مركبة</label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
           <input type="text" id="condition_type" name="condition_type" value="{{$unit->condition_type}}" class="floatLabel"readonly>
           <label for="eMail">نوع التكييف</label>
          </div>
        </div>

        <div class="col-1-4">
          <div class="controls">
           <input type="text" id="condition_units" name="condition_units" value="{{$unit->condition_units}}" class="floatLabel"readonly>
           <label for="eMail">عدد وحدات التكييف</label>
          </div>
        </div>
      </div>
      <div class="grid">
      <div class="col-1-3">
          <div class="controls">
           <input type="text" id="water_number" name="water_number" value="{{$unit->eater_number}}" class="floatLabel" readonly>
           <label for="street"> رقم عداد المياه</label>
          </div>
        </div>
        <div class="col-1-3">
          <div class="controls">
           <input type="text"  id="Elecrtricity_number" name="Elecrtricity_number" value="{{$unit->Elecrtricity_number}}" class="floatLabel"readonly>
           <label for="eMail"> رقم عداد الكهرباء</label>
          </div>
        </div>
        <div class="col-1-3">
          <div class="controls">
           <input type="date" id="bathrooms"  name="bathrooms" value="{{$unit->bathrooms}}" class="floatLabel"readonly>
           <label for="eMail"> عدد دورات المياه</label>
          </div>
        </div>

      </div>
      <div class="grid">
      <div class="col-1-1">
          <div class="controls">
           <input type="text" id="details" name="details" value="{{$unit->details}}" class="floatLabel"readonly >
           <input type="hidden" value="{{$unit->id}}"name="unit_id">
           <label for="street"> تفاصيل </label>
          </div>
        </div>
      </div>
  </div>
    <!--  البيانات المالية -->
    <div class="form-group">
         <h2 class="heading">البيانات المالية</h2>
      <div class="grid">
        <div class="col-1-4">
          <div class="controls">
           <input type="date" name="st_rental_date" class="floatLabel"required>
           <label for="street">تاريخ بداية العقد </label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
           <input type="date" name="end_rental_date" class="floatLabel"required>
           <label for="eMail"> تاريخ نهاية العقد </label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
           <input type="text" name="annual_rent" class="floatLabel"required>
           <label for="street"> القيمة السنوية للايجار </label>
          </div>
        </div>
        <div class="col-1-4">
          <div class="controls">
           <input type="text" name="Total" class="floatLabel"required>
           <label for="eMail">اجمالي قيمة العقد</label>
          </div>
        </div>



      </div>
      <div class="grid">

      <div class="col-1-3">
          <div class="controls">
           <select name="payment_cycle"id="payment_cycle"class="floatLabel" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')"required>
                                    <!--placeholder-->
                                    <option value="quarterly" >ربع سنوي</option>
                                        <option value="midterm" >نصف سنوي</option>
                                        <option value="monthly" >شهري</option>
                                        <option value="annual" >سنوي</option>

                        </select>
           <label for="fruit">دورة سداد الايجارٍ</label>
          </div>
        </div>
        <div class="col-1-3">
          <div class="controls">
           <input type="text" name="last_rent_payment" class="floatLabel"required>
           <label for="eMail">دفعة الايجار الأخيرة</label>
          </div>
        </div>
        <div class="col-1-3">
          <div class="controls">
           <input type="text" name="recurring_rent_payment" class="floatLabel"required>
           <label for="eMail">  دفعة الايجار الدورية</label>
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
                                                <th >تاريخ الاصدار</th>
                                                <th >تاريخ الاستحقاق</th>
                                                <th >اجمالي القيمة</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="add">
                                        <tr>

                                            <td><input class="form-control" type="date" id="release_date" name="release_date[]"required></td>
                                            <td><input class="form-control" type="date" id="due_date" name="due_date[]"required></td>
                                            <td><input class="form-control unit_price"  type="text" id="total" name="total[]"required></td>
                                            <td><button type="button" class="btn btn-primary" id="add_btn">	<i class="icon-add"></i></button></td>
                                        </tr>
                                        </tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
    </div>

        <!--     الوسيط العقاري -->
        <div class="form-group">
         <h2 class="heading"> بيانات الوسيط العقاري</h2>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-dark m-0">
                                                 <thead>
                                            <tr>
                                                <th >{{$broker->name}} </th>
                                                <th > {{$broker->email}}</th>
                                                <th >{{$broker->name}}</th>

                                            </tr>
                                        </thead>

										</table>
									</div>
								</div>
							</div>
						</div>
    </div>


    <!-- التزامات الأطراف -->
    <div class="form-group">
         <h2 class="heading">التزامات الأطراف</h2>
         <div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card m-0">
								<div class="card-header">
									<div class="card-title">التزامات الأطراف </div>
									<div class="card-sub-title">الالتزمات المتفق عليها من قبل الطرفين بموجب العقد</div>
								</div>


                                       <textarea name="desc"cols="30"rows="10"required></textarea>
									<!--<div class="summernote"></div>-->

							</div>
						</div>
					</div>

    </div>
  <!-- التزامات الأطراف -->
    <div class="form-group">
         <h2 class="heading"> مرفقات العقد</h2>
         <div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

<div class="mb-3">
  <input class="form-control" name="docFile"accept=".pdf,.jpg, .png, image/jpeg, image/png"type="file" id="formFileDisabled"required>
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
        html+='<td><input class="form-control"  type="date" id="release_date" name="release_date[]"></td>';
        html+='<td><input class="form-control"type="date" id="due_date" name="due_date[]"></td>';
        html+='<td><input class="form-control unit_price" type="text" id="total" name="total[]"></td>';
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

@endsection
