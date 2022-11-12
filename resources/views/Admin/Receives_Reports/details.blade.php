@extends('layouts.master')
@section('css')
	<!-- Data Tables -->
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet">

@endsection
@section('title')
وصل استلام دفعة ايجار
@stop
@section('content')
	<!-- Content wrapper start -->
    <div class="content-wrapper">

<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">



        <div class="table-container">
            <div class="t-header">تقارير التسليم</div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                        <tr>
                          <th><a href="">رقم الوحدة </a></th>
                          <th> <a href="">رقم العقد</a> </th>
                          <th>تاريخ الاستلام</th>
                          <th> تصفية الفواتير </th>


                          <th>حالة الوحدة ( الصيانة)</th>
                          <th>ملاحظات</th>

                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                          <td><span class="badge badge-danger">{{$receive->lease->reco_number}}</td>
                          <td>{{$receive->unit->number}}</td>
                          <td>{{$receive->receive_date}}</td>
                          <td>{{$receive->paymennts_status}}</td>
                          <td>{{$receive->maint_status}}</td>
                          <td>{{$receive->notes}}</td>

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




<!-- Row end -->
</div>

                    <div class="invoice-footer">
                        Thank you for your Business.
                    </div>

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


