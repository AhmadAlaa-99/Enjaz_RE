@extends('layouts.master')
@section('css')
	<!-- Data Tables -->
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet">

@endsection
@section('title')
طلبات الصيانة
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> طلبات الصيانة </li>
        <li class="breadcrumb-item active">  طلباتي </li>
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
            <div class="t-header"> طلبات الصيانة</div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                        <tr>
                        <th>الرقم التسلسلي </th>
                          <th>رقم الوحدة</th>
                          <th>الصيانة</th>
                          <th>تاريخ الطلب</th>
                        <th>الحالة</th>


                        </tr>
                    </thead>
                    <tbody>
                    @php
                                $i = 0;
                                @endphp
                                @forelse ($maintenances as $maint)
                                    @php
                                    $i++
                                    @endphp
                        <tr>
                            <td>{{$i}}</td>
                          <td>{{$maint->units->number}}</td>
                          <td>{{$maint->desc}}</td>
                          <td>{{$maint->request_date}}</td>
                     <td><span class="badge badge-success">{{$maint->status}}</td>

                        </tr>
                        @empty
                        @endforelse  </tbody>   </table>
								<div class="d-flex justify-content-center">
			                         {!!$maintenances->links()!!}
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
