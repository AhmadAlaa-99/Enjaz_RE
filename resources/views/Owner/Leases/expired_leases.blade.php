@extends('layouts.master')
@section('css')
	<!-- Data Tables -->
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet">

@endsection
@section('title')
العقود المنتهية
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">ادارة العقود </li>
        <li class="breadcrumb-item active">  العقود المنتهية </li>
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
            <div class="t-header"> العقود المنتهية</div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                        <tr>
                        <th>الرقم التسلسلي</th>
                          <th>رقم العقد</th>
                          <th>اسم المستأجر</th>
                          <th>اسم المؤجر</th>
                          <th>اسم المنشأة</th>
                          <th>رقم الوحدة</th>
                          <th>نوع العقد</th>
                          <th>تاريخ بداية العقد</th>
                          <th>تاريخ نهاية العقد</th>
                          <th> الكلفة الاجمالية للعقد</th>
                          <th> دورة الدفع</th>
                          <th>عدد دورات الدفع</th>
                          <th>تفاصيل العقد </th>


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
                          <td>{{$lease->organization->user->name}}</td>
                          <td>{{$lease->realties->realty_name}}</td>
                          <td>{{$lease->units->number}}</td>
                          <td>{{$lease->type}}</td>
                          <td>{{$lease->st_rental_date}}</td>
                          <td>{{$lease->end_rental_date}}</td>
                          <td>{{$lease->financial->Total}}</td>
                          <td>{{$lease->financial->payment_cycle}}</td>
                          <td>{{$lease->financial->num_rental_payments}}</td>
                          <td><span class="badge badge-success"><a href="{{route('lease.details',$lease->id) }}">معاينة</a></td>

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
