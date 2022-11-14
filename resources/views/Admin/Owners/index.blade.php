@extends('layouts.master')
@section('css')
	<!-- Data Tables -->
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet">

@endsection
@section('title')
بيانات الملاك
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> ملاك العقارات </li>
        <li class="breadcrumb-item active">بيانات الملاك</li>
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
            <div class="t-header">بيانات الملاك</div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                        <tr>
                        <th> الرقم التسلسلي </th>
                          <th> الاسم </th>
                          <th>  اسم المدير  </th>
                          <th>رقم الهوية</th>
                          <th>نوع الهوية </th>
                          <th>   رقم الجوال</a></th>
                          <th>رقم الهاتف</th>
                          <th> البريد الاكتروني</th>
                          <th> الجنسية </th>
                          <th> تاريخ التأسيس</th>
                          <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                                $i = 0;
                                @endphp
                                @forelse ($owners as $owner)
                                    @php
                                    $i++
                                    @endphp
                          <tr>
                          <td>{{$i}}</td>
                          <td><span class="badge badge-danger">{{$owner->name}}</td>
                          <td>{{$owner->organization->company_name}}</td>
                          <td>{{$owner->ID_num}}</td>
                          <td>{{$owner->ID_type}}</td>
                          <td>{{$owner->phone}}</td>
                          <td>{{$owner->telephone}}</td>
                          <td><span class="badge badge-warning">{{$owner->email}}</td>
                          <td><span class="badge badge-success">{{$owner->Nationality->Name}}</td>
                          <td>{{$owner->organization->record_date}}</td>

                          <td>
									<div class="td-actions">
										<a href="{{route('owners.edit',$owner->id)}}" class="icon red" data-toggle="tooltip" data-placement="top" title="edit">
															<i class="icon-edit"></i>
														</a>


														<a href="{{route('owner.destroy',$owner->id)}}" class="icon blue" data-toggle="tooltip" data-placement="top" title="Delete">
															<i class="icon-delete"></i>
														</a>
													</div>
												</td>
                        </tr>
                        @empty
                        @endforelse

                    </tbody>
            </table>
            	<div class="d-flex justify-content-center">
			                         {!!$owners->links()!!}
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
