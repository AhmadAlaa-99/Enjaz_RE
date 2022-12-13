@extends('layouts.master')
@section('css')
    <!-- Data Tables -->
    <link href="{{ URL::asset('assets/vendor/datatables/dataTables.bs4.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/datatables/buttons.bs.css') }}" rel="stylesheet">

@endsection
@section('title')
    بيانات سداد دفعات الايجار
@stop
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> ادارة العقود </li>
            <li class="breadcrumb-item active">بيانات سداد دفعات الايجار</li>
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

        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card">
                    <div class="card-body">
                        </br>
                        @if (session()->has('max'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('max') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered table-dark m-0">
                                <thead>
                                    <tr>
                                        <th>الرقم التسلسلي</th>
                                        <th> تاريخ الاصدار </th>
                                        <th>تاريخ الاستحقاق</th>
                                        <th>اجمالي القيمة </th>
                                        <th> الرصيد المدفوع </th>
                                        <th> الرصيد المتبقي </th>
                                        <th> وصل استلام </th>
                                        <th> اضافة رصيد </th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @forelse ($payments as $payment)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $payment->release_date }}</td>
                                            <td>{{ $payment->due_date }}</td>
                                            <td>{{ $payment->total }}</td>
                                            <td>{{ $payment->paid }}</td>
                                            <td>{{ $payment->remain }}</td>
                                            <td><span class="badge badge-danger"><a
                                                        href="{{ route('payment.details', $payment->id) }}"> print </a></td>
                                            <td><span class="badge badge-danger"> <a data-toggle="modal" href=""
                                                        data-target="#edit_payment{{ $payment->id }}"> Add</a></td>
                                        </tr>
                                        <div class="modal" id="edit_payment{{ $payment->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="customModalTwoLabel">تعديل حالة الدفع
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('payment.edit', $payment->id) }}"
                                                            method="post">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <label class="active" for="recipient-name"
                                                                    class="col-form-label">الرصيد المدفوع - يتم تعديل قيمة
                                                                    الرصيد المتبقي بشكل تلقائي </label>
                                                                <input type="number" name="paid" class="form-control"
                                                                    id="recipient-name">
                                                            </div>


                                                    </div>
                                                    <div class="modal-footer custom">
                                                        <div class="left-side">
                                                            <button type="submit" class="btn btn-link success">حفظ</button>

                                                        </div>
                                                        <div class="divider"></div>
                                                        <div class="right-side">
                                                            <button type="button" class="btn btn-link danger"
                                                                data-dismiss="modal">اغلاق</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {!! $payments->links() !!}
                            </div>


                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>



    <!-- End Basic modal -->
    <!-- Content wrapper end -->
@endsection
@section('js')
    <!-- Data Tables -->
    <script src="{{ URL::asset('assets/vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>



    <!-- Custom Data tables -->
    <script src="{{ URL::asset('assets/vendor/datatables/custom/custom-datatables.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/datatables/custom/fixedHeader.js') }}"></script>


    <!-- Download / CSV / Copy / Print -->
    <script src="{{ URL::asset('assets/vendor/datatables/buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/datatables/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/datatables/html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/datatables/buttons.print.min.js') }}"></script>
@endsection
