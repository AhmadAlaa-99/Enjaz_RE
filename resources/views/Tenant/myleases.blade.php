@extends('layouts.master')
@section('css')
	<!-- Data Tables -->
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet">

@endsection
@section('title')
بيانات العقد
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">ادارة العقود </li>
        <li class="breadcrumb-item active">  بيانات العقد  </li>
    </ol>

    <ul class="app-actions">
        <li>
            <a href="#" id="reportrange">
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
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">



        <div class="table-container">
            <div class="t-header"> العقود الجارية</div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                        <tr>
                                                      <th>الرقم النسلسلي </th>

                          <th>رقم العقد </th>
                          <th>اسم المستأجر</th>
                          <th>اسم المؤجر</th>
                          <th>اسم المنشأة</th>
                          <th>رقم الوحدة</th>
                          <th>نوع العقد</th>
                          <th>تاريخ بداية العقد</th>
                          <th>تاريخ نهاية العقد</th>
                          <th> الكلفة الاجمالية للعقد</th>
                          <th>تفاصيل العقد </th>
                          <th> الحالة</th>

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
                          <td>{{$lease->financial->total}}</td>
                          <td><span class="badge badge-success"><a href="{{route('tn_lease.details',$lease->id) }}">معاينة</a></td>
                          <td>{{$lease->status}}</td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
            </table>
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
