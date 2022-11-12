@extends('layouts.master')
@section('css')
	<!-- Data Tables -->
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet">

@endsection
@section('title')
المنشأت العقارية
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">ادارة العقارات</li>
        <li class="breadcrumb-item active">  المنشأت العقارية </li>
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
            <div class="t-header">المنشأت العقارية</div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                        <tr>
                        <th><a href="">الرقم التسلسلي </a></th>
                          <th><a href="">مالك المنشأة </a></th>
                          <th> <a href=""> اسم المنشأة</a> </th>
                          <th>تاريخ الاضافة</th>
                          <th> المنطقة  </th>
                           <th> <a href="">نوع  العقار</a></th>
                          <th>  <a href=""> نوع استخدام العقار</a></th>
                          <th> المساحة  </th>
                          <th> المميزات  </th>
                          <th>عدد الأدوار </th>
                          <th>عدد الوحدات الكلية</th>
                          <th>عدد الوحدات المستأجرة</th>
                          <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                                $i = 0;
                                @endphp
                                @forelse ($realties as $realty)
                                    @php
                                    $i++
                                    @endphp

                        <tr>
                            <td>{{$i}}</td>
                        <td><span class="badge badge-warning">{{$realty->organization->user->name}}</td>
                          <td>{{$realty->realty_name}}</td>
                          <td><span class="badge badge-danger">{{$realty->created_at}}</td>
                          <td>{{$realty->address}}</td>
                          <td>{{$realty->type}}</td>
                          <td>{{$realty->use}}</td>
                          <td>{{$realty->size}}</td>
                          <td>{{$realty->advantages}}</td>
                          <td><span class="badge badge-success">{{$realty->roles}}</td>
                          <td><span class="badge badge-success">{{$realty->units}}</td>
                          <td><span class="badge badge-success">{{$units_tn}}</td>
                          <td>
													<div class="td-actions">
                                                        <!--
														<a href="{{route('realty_units_show',$realty->id)}}"   class="icon red" data-toggle="tooltip" data-placement="top" title="show units">
															<i class="icon-cloud"></i>
														</a>
-->
                                                        <a href="{{route('realty_units_add',$realty->id)}}"   class="icon red" data-toggle="tooltip" data-placement="top" title="Add units">
															<i class="icon-add"></i>

														</a>
														<a href="{{route('realties.edit',$realty->id)}}"  class="icon green" data-toggle="tooltip" data-placement="top" title="edit Row">
															<i class="icon-edit"></i>
														</a>
														<a href="{{route('realty.destroy',$realty->id)}}"  class="icon blue" data-toggle="tooltip" data-placement="top" title="Delete Row">
															<i class="icon-cancel"></i>
														</a>
													</div>
												</td>
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