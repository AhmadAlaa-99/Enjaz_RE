@extends('layouts.master')
@section('css')
	<!-- Data Tables -->
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet">
       
@endsection
@section('title')
الطلبات المنجزة
@stop
@section('content')
	<!-- Content wrapper start -->
    <div class="content-wrapper">

<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        
    

        <div class="table-container">
            <div class="t-header">مدفوعات العقود</div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                <thead>
                        <tr>
                            <th>اسم المستأجر</th>
                            <th>اسم المؤجر</th>
                            <th>اسم المنشأة</th>
                            <th>رقم الوحدة</th>
                            <th>رقم الدورة</th>
                            <th> تاريخ الاصدار </th>
                            <th>تاريخ الاستحقاق </th>
                            <th>اجمالي القيمة </th>
                            <th>الحالة</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>Accountant</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>33</td>
                          <td>2008/11/28</td>
                          <td>$162,700</td>
                          <td>2008/11/28</td>
                          <td>$162,700</td>
                          <td>$162,700</td>
                        </tr>
                     
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