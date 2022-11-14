@extends('layouts.master')
@section('css')
	<!-- Data Tables -->
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet">

@endsection
@section('title')
الطلبات المعلقة
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> طلبات الصيانة </li>
        <li class="breadcrumb-item active">  الطلبات المعلقة </li>
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
            <div class="t-header">الطلبات المعلقة</div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                        <tr>
                        <th>الرقم التسلسلي </th>

                          <th>رقم الوحدة</th>
                          <th>الصيانة</th>
                          <th>الكلفة</th>
                          <th>تاريخ الطلب</th>
                          <th>تاريخ الاستجابة</th>
                          <th>ملاحظات </th>
                        <th>العمليات</th>

                        </tr>
                    </thead>
                    <tbody>
                    @php
                                $i = 0;
                                @endphp
                                @forelse ($maints as $maint)
                                    @php
                                    $i++
                                    @endphp
                        <tr>
                            <td>{{$i}}</td>
                          <td>{{$maint->units->number}}</td>
                          <td>{{$maint->desc}}</td>
                          <td>{{$maint->cost}}</td>
                          <td>{{$maint->request_date}}</td>
                          <td>{{$maint->response_date}}</td>
                          <td>{{$maint->notes}}</td>



                           <td><span class="badge badge-success"> <a
                                                    data-toggle="modal" href=""data-target="#accept_maint{{$maint->id}}"> قبول طلب الصيانة</a></td>

                            <td>

                        </tr>
                        <div class="modal fade" id="accept_maint{{$maint->id}} tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="customModalTwoLabel">انجاز طلب الصيانة</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">

                                                <form action="{{ route('maint_response',$maint->id) }}" method="post">
                                                         {{ csrf_field() }}
														<div class="form-group">
															<label for="recipient-name" class="col-form-label">كلفة الصيانة</label>
															<input type="number" name="cost" class="form-control" id="recipient-name">
														</div>
                                                        <div class="form-group">
															<label for="recipient-name" class="col-form-label">ملاحظات</label>
															<input type="textarea" name="notes" class="form-control" id="recipient-name">
														</div>

												</div>
												<div class="modal-footer custom">
													<div class="left-side">
                                                    <button type="submit" class="btn btn-link success">حفظ</button>

													</div>
													<div class="divider"></div>
													<div class="right-side">
                                                    <button type="button" class="btn btn-link danger" data-dismiss="modal">اغلاق</button>
													</div>
                                                    </form>
												</div>
											</div>
										</div>
									</div>
                        @empty
                        @endforelse
								<div class="d-flex justify-content-center">
			                         {!!$maints->links()!!}
                        </div>

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
