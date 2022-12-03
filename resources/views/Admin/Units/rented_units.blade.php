@extends('layouts.master')
@section('css')
	<!-- Data Tables -->
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet">

@endsection
@section('title')
الوحدات الايجارية
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">ادارة العقارات </li>
        <li class="breadcrumb-item active">  الوحدات الايجارية </li>
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
            <div class="t-header">الوحدات الايجارية </div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                        <tr>
                        <th><a href="">الرقم التسلسلي </a></th>
                          <th><a href=""> اسم المنشأة </a></th>
                          <th>نوع الوحدة</th>
                          <th>رقم الوحدة</th>
                          <th> <a href="">رقم الدور</a></th>
                          <th> <a href="">المساحة </a></th>
                          <th>  <a href=""> مؤثثة </a></th>
                          <th>  <a href=""> عدد دورات المياه </a></th>
                          <th>خزائن مطبخ مركبة</th>
                          <th> عدد وحدات التكييف</th>

                          <th> العمليات</th>
                        </tr>
                    </thead>
                          <tbody>
                           @php
                                $i = 0;
                                @endphp
                                @forelse ($units as $unit)
                                    @php
                                    $i++
                                    @endphp
                                    <tr>
                        <td>{{$i}}</td>
                          <td><a href=""><span class="badge badge-danger">{{$unit->realties->realty_name}}</a></td>
                          <td>{{$unit->type}}</td>
                          <td>{{$unit->number}}</td>
                          <td>{{$unit->role_number}}</td>
                          <td>{{$unit->size}}</td>
                          <td>{{$unit->furnished_mode}}</td>
                          <td>{{$unit->bathrooms}}</td>
                          <td>{{$unit->kitchen_Cabinets}}</td>
                          <td>{{$unit->condition_units}}</td>
                          <td>{{$unit->condition_type}}</td>

                          <!--
                          <td>
                            <a class="btn btn-secondary" href="{{route('lease_un.details',$unit->id) }}" role="button">تفاصيل العقد</a>

                          </td>
-->

                                                    <td>
													<div class="td-actions">
														<a href="{{route('units.edit',$unit->id)}}"   class="icon red" data-toggle="tooltip" data-placement="top" title="Edit">
															<i class="icon-edit"></i>
														</a>
                                                        <a href="{{route('lease_un.details',$unit->id)}}"   class="icon red" data-toggle="tooltip" data-placement="top" title="Details">
															<i class="icon-home"></i>
														</a>



													</div>
												</td>
                        </tr>
                        @empty
                        @endforelse  </tbody>   </table>
								<div class="d-flex justify-content-center">
			                         {!!$units->links()!!}
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
