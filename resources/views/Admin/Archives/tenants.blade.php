@extends('layouts.master')
@section('css')
	<!-- Data Tables -->
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet">

@endsection
@section('title')
ارشيف بيانات المستأجرين
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">ادارة المستأجرين </li>
        <li class="breadcrumb-item active">ارشيف بيانات المستأجرين </li>
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
            <div class="t-header">بيانات المستأجرين (عقود منتهية) </div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                        <tr>


                         <th>الرقم التسلسلي </th>
                          <th>الاسم </th>
                                                    <th>الجنس </th>

                          <th>الجنسية</th>
                          <th>المواليد</th>
                          <th>نوع الهوية</th>
                          <th> رقم الهوية </th>
                          <th> رقم الجوال </th>
                          <th>البريد الالكتروني</th>
                          <th> رقم الوحدة</th>

                        </tr>
                    </thead>
                    @php
                                $i = 0;
                                @endphp
                                @forelse ($tenants as $tenant)
                                    @php
                                    $i++
                                    @endphp
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$tenant->user->name}}</td>
                          <td>{{$tenant->user->gender}}</td>
                          <td>{{$tenant->user->Nationality->Name}}</td>
                          <td>{{$tenant->user->name}}</td>
                           <td>{{$tenant->user->name}}</td>
                            <td>{{$tenant->user->name}}</td>
                          <td>{{$tenant->user->phone}}</td>
                          <td>{{$tenant->user->email}}</td>
                          <td>{{$tenant->units->number}}</td>



                        </tr>
                        @empty
                        @endforelse  </tbody>   </table>
								<div class="d-flex justify-content-center">
			                         {!!$tenants->links()!!}
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
