@extends('layouts.master')
@section('css')
	<!-- Data Tables -->
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet">

@endsection
@section('title')
العقود الجارية
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">ادارة العقود </li>
        <li class="breadcrumb-item active"> العقود الجارية  </li>
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



        <div class="table-container">
            <div class="t-header"> العقود الجارية</div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                        <tr>
                        <th>الرقم التسلسلي</th>
                          <th>رقم العقد </th>
                          <th>اسم المستأجر</th>
                          <th>اسم المنشأة</th>
                          <th>رقم الوحدة</th>
                          <th>نوع العقد</th>
                         <th>نوع العقد</th>

                          <th>تاريخ بداية العقد</th>
                          <th>تاريخ نهاية العقد</th>
                          <th> الكلفة الاجمالية للعقد</th>
                          <th> دورة الدفع</th>
                          <th>عدد دورات الدفع</th>
                                                    <th>  العمليات</th>



                        </tr>
                    </thead>

                     <tbody>
                    @php
                                $i = 0;
                                @endphp
                                @forelse ($leases as $lease)
                                    @php
                                    $i++
                                    @endphp
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$lease->reco_number}}</td>
                          <td>{{$lease->tenants->user->name}}</td>
                          <td>{{$lease->realties->realty_name}}</td>
                          <td>{{$lease->units->number}}</td>
                          <td>{{$lease->type}}</td>
                          <td>{{$lease->lease_type}}</td>

                          <td>{{$lease->st_rental_date}}</td>
                          <td>{{$lease->end_rental_date}}</td>
                          <td>{{$lease->financial->Total}}</td>
                          <td>{{$lease->financial->payment_cycle}}</td>
                          <td>{{$lease->financial->num_rental_payments}}</td>
                          <!--
    <input class="btn btn-primary" type="button" value="Input">
-->
<td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route('payments.details',$lease->id)}}"><i style="color:green" class="icon-details"></i>&nbsp;سداد الدفعات</a>
                                                            <a class="dropdown-item" href="{{route('lease.details',$lease->id)}}"><i style="color:green" class="icon-details"></i>&nbsp;تفاصيل العقد</a>
                                                            <a class="dropdown-item" href="{{route('leases.renew.show',$lease->id)}}"><i style="color:green" class="icon-details"></i>&nbsp; تجديد العقد</a>
                                                            <a class="dropdown-item" href="{{route('down.file',$lease->id)}}"><i style="color:green" class="icon-download"></i>&nbsp;  تحميل المرفقات&nbsp;</a>
                                                            <a class="dropdown-item" href="{{route('move_le.archive',$lease->id)}}"><i style="color:green" class="icon-delete"></i>&nbsp; &nbsp; انهاء العقد</a>
                                                        </div>
                                                    </div>
                                                </td>




</tr>
@empty
                        @endforelse  </tbody>   </table>
								<div class="d-flex justify-content-center">
			                         {!!$leases->links()!!}
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
