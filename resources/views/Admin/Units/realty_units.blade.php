@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
    وحدات المنشأة العقارية
@stop
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">الوحدات الايجارية الخاصة ب المنشأة العقارية - {{ $realty->realty_name }}
                        </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">الوحدات الايجارية</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <div class="col-lg-4 col-md-4">
                            <div class="invoices-settings-btn">
                                <a href="invoices-settings.html" class="invoices-settings-icon">
                                </a>
                                <a href="{{ route('realty_units_add', $realty->id) }}" class="btn">
                                    <i data-feather="plus-circle"></i> اضافة وحدة ايجارية
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="card invoices-tabs-card">
                <div class="card-body card-body pt-0 pb-0">
                    <div class="invoices-main-tabs">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-8">
                                <div class="invoices-tabs">
                                    <ul>
                                        <li><a href="invoices.html" class="active"></a></li>
                                        <li><a href="invoices-paid.html"></a></li>
                                        <li><a href="invoices-overdue.html"></a></li>
                                        <li><a href="invoices-draft.html"></a></li>
                                        <li><a href="invoices-recurring.html"></a></li>
                                        <li><a href="invoices-cancelled.html"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="invoices-settings-btn">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="copy-print-csv" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>الرقم التسلسلي </th>
                                            <th> اسم المنشأة </th>
                                            <th>نوع الوحدة</th>
                                            <th>رقم الوحدة</th>
                                            <th>رقم الدور</th>
                                            <th> المساحة </th>
                                            <th> مؤثثة </a></th>
                                            <th> عدد دورات المياه </a></th>
                                            <th>خزائن مطبخ مركبة</th>
                                            <th> عدد وحدات التكييف</th>
                                            <th> نوع التكييف</th>
                                            <th> الحالة </th>
                                            <th> العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @forelse ($units as $unit)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td><a href=""><span
                                                            class="badge badge-danger">{{ $unit->realties->realty_name }}</a>
                                                </td>
                                                <td><span class="badge badge-danger">{{ $unit->type }}</td>
                                                <td><span class="badge badge-success">{{ $unit->number }}</td>
                                                <td><span class="badge badge-success">{{ $unit->role_number }}</td>
                                                <td><span class="badge badge-success">{{ $unit->size }}</td>
                                                <td><span class="badge badge-success">{{ $unit->furnished_mode }}</td>
                                                <td><span class="badge badge-success">{{ $unit->bathrooms }}</td>
                                                <td><span class="badge badge-info">{{ $unit->kitchen_Cabinets }}</td>
                                                <td><span class="badge badge-info">{{ $unit->condition_units }}</td>
                                                <td><span class="badge badge-info">{{ $unit->condition_type }}</td>
                                                <td><span class="badge badge-danger">{{ $unit->status }}</td>



                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="fas fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-end">

                                                            <a class="dropdown-item"
                                                                title=" تعديل بيانات الوحدة "href="{{ route('units.edit', $unit->id) }}"><i
                                                                    class="far fa-edit me-1"></i>تعديل بيانات الوحدة</a>

                                                            @if ($unit->status=='rented')
                                                                <a class="dropdown-item"title="تفاصيل العقد"
                                                                    href="{{ route('lease_un.details', $unit->id) }}"><i
                                                                        class="far fa-eye me-1"></i>تفاصيل العقد </a>
                                                            @else
                                                                <a class="dropdown-item"title="تأجير الوحدة"
                                                                    href="{{ route('unit.rent', $unit->id) }}"><i
                                                                        class="far fa-paper-plane me-1"></i>تأجير الوحدة</a>
                                                                <a class="dropdown-item"title="حذف الوحدة "
                                                                    href="{{ route('unit.destroy', $unit->id) }}"><i
                                                                        class="far fa-trash-alt me-1"></i>حذف الوحدة</a>
                                                            @endif

                                                        </div>
                                                    </div>

                                                </td>



                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $units->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>







@endsection
