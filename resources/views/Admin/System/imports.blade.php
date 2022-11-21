@extends('layouts.master')
@section('css')
	<!-- Data Tables -->
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet">

@endsection
@section('title')
 الواردات المالية
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> الاعدادات </li>
        <li class="breadcrumb-item active">الواردات المالية</li>
    </ol>

    <ul class="app-actions">

    </ul>
</div>
<div class="content-wrapper">
<div class="row">
<div class="col-lg-12">
<form action="{{route('proceeds_date')}}" method="post">
    {{ csrf_field() }}
<div class="row formtype">
<div class="col-md-3">
<div class="form-group">
<label>البحث وفق الدفعات المسددة بشكل</label>
<select name="type" class="form-control" id="sel1" name="sellist1"required>
<option value="part">جزئي</option>
<option value="total">كلي</option>
<option value="all">جزئي وكلي</option>
</select>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>من</label>
<div class="cal-icon">
<input name="fromDate"type="date" class="form-control datetimepicker"required>
</div>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>الى</label>
<div class="cal-icon">
<input name="toDate" type="date" class="form-control datetimepicker"required>
</div>
</div>
</div>
<div class="col-md-1">
<div class="form-group">

<button type="submit" class="btn btn-primary" name="search"title="بحث">بحث</button>
</div>
</div>
<div class="col-md-2">
												<h6>اجمالي العوائد المالية خلال الفترة المحددة</h6>
												<h2>{{isset($all_procced) ? $all_procced:'---'}}</h2>
											</div>
</div>
</form>
</div>
</div>

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">



							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-primary m-0">
											<thead>
												<tr>
                                                    <th>الرقم التسلسلي</th>
                                                    <th> رقم سجل العقد </th>
												   <th>تاريخ الاصدار </th>
													<th>تاريخ الاستحقاق</th>
													<th>اجمالي القيمة </th>
                                                    <th> الرصيد  المدفوع </th>
                                                    <th> الرصيد  المتبقي </th>
                                                                                                    <th>تفاصيل</th>




												</tr>
											</thead>
											<tbody>

												   @php
                                $i = 0;
                                @endphp
                                @forelse ($proceeds as $proceed)
                                    @php
                                    $i++
                                    @endphp
												    <tr>
													<td>{{$i}}</td>
                                                    <td>{{$proceed->reco_number}}</td>
													<td>{{$proceed->release_date}}</td>
													<td>{{$proceed->due_date}}</td>
													<td>{{$proceed->total}}</td>
                                                    <td>{{$proceed->paid}}</td>
													<td>{{$proceed->remain}}</td>
                                                <td><span class="badge badge-danger"><a href="{{route('payment.details',$proceed->id)}}" > تفاصيل </a></td>

												</tr>

                                                @empty
                        @endforelse  </tbody>

										</table>
</br>
                                        <div class="d-flex justify-content-center">
			                         {!!$proceeds->links()!!}
                        </div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<!-- Row end -->

				</div>

@endsection
@section('js')
	<!-- Data Tables -->
    <script src="{{URL::asset('assets/vendor/datatables/dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>



		<!-- Custom Data tables -->
        <script src="{{URL::asset('assets/vendor/datatables/custom/custom-datatables.js')}}"></script>
        <script src="{{URL::asset('assets/vendor/datatables/custom/fixedHeader.js')}}"></script>


		<!-- Download / CSV / Copy / Print -->
        <script src="{{URL::asset('assets/vendor/datatables/buttons.min.js')}}"></script>
        <script src="{{URL::asset('assets/vendor/datatables/jszip.min.js')}}"></script>
        <script src="{{URL::asset('assets/vendor/datatables/pdfmake.min.js')}}"></script>
        <script src="{{URL::asset('assets/vendor/datatables/vfs_fonts.js')}}"></script>
        <script src="{{URL::asset('assets/vendor/datatables/html5.min.js')}}"></script>
        <script src="{{URL::asset('assets/vendor/datatables/buttons.print.min.js')}}"></script>
@endsection


