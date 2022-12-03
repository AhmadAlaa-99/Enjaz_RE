@extends('layouts.master')
@section('css')
	<!-- Data Tables -->
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet">

@endsection
@section('title')
عقود الاستئجار الجارية
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">ادارة العقود </li>
        <li class="breadcrumb-item active">  عقود الاستئجار الجارية </li>
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
            <div class="t-header">عقود الاستئجار</div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                        <tr>
                        <th>الرقم التسلسلي</th>
                          <th>رقم العقد </th>

                          <th>اسم المنشأة</th>
                          <th>تاريخ بداية العقد</th>
                          <th>تاريخ نهاية العقد</th>
                          <th>قيمة الايجار</th>
                          <th>القيمة الكلية ' بعد احتساب الضريبة' </th>
                          <th> النوع</th>
                          <th>ملاحظات</th>
                          <th>العمليات</th>

                        </tr>
                    </thead>

                     <tbody>
                    @php
                                $i = 0;
                                @endphp
                                @forelse ($contracts as $contract)
                                    @php
                                    $i++
                                    @endphp
                        <tr>
                          <td>{{$i}}</td>
                          <td><span class="badge badge-success">{{$contract->contactNo}}</td>
                          <td>{{$contract->realty->realty_name}}</td>
                          <td>{{$contract->start_date}}</td>
                          <td>{{$contract->end_date}}</td>

                          <td><span class="badge badge-danger">{{$contract->ejar_cost}}</td>
                          <td><span class="badge badge-warning">{{$contract->rent_value}}</td>
                          <td><span class="badge badge-danger">{{$contract->type}}</td>
                          <td>{{$contract->note}}</td>

                          <!--
    <input class="btn btn-primary" type="button" value="Input">
-->
<td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route('contract_details',$contract->id)}}"><i style="color:green" class="icon-details"></i>&nbsp;تفاصيل العقد</a>
                                                            <a class="dropdown-item" href="{{route('down.contract_file',$contract->id)}}"><i style="color:green" class="icon-download"></i>&nbsp; تحميل المرفقات&nbsp;</a>
                                                            <a class="dropdown-item" href="{{route('renew.contract',$contract->id)}}"><i style="color:green" class="icon-details"></i>&nbsp;تجديدالعقد&nbsp;</a>
                                                            <a class="dropdown-item" href="{{route('finish.contract',$contract->id)}}"><i style="color:green" class="icon-details"></i>&nbsp; انهاء العقد&nbsp;</a>


                                                        </div>
                                                    </div>
                                                </td>




</tr>
@empty
                        @endforelse  </tbody>   </table>
								<div class="d-flex justify-content-center">
			                         {!!$contracts->links()!!}
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
