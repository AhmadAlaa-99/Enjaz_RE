<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Main</span></li>
                <li>
                    <a href="{{ url('/' . ($page = 'enjaz')) }}"><i data-feather="home"></i> <span>واجهة الموقع</span></a>
                </li>
                @can('صلاحيات المستأجر')
                    <li>

                        <a href="{{ url('/' . ($page = 'Tenant/leases')) }}"><i data-feather="users"></i>
                            <span>بيانات العقد</span></a>
                    </li>


                    <li class="submenu">
                        <a href="#"><i data-feather="box"></i> <span>طلبات الصيانة </span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('/' . ($page = 'Tenant/request_form')) }}">ارسال الطلب</a></li>
                            <li><a href="{{ url('/' . ($page = 'Tenant/maints_requests')) }}">طلباتي</a></li>

                        </ul>
                    </li>
                @endcan
                @can('الاحصائيات')
                    <li>
                        <a href="{{ url('/' . ($page = 'statistics')) }}"><i data-feather="users"></i>
                            <span>الاحصائيات</span></a>
                    </li>
                @endcan
                @can('اضافة عقد استئجار')
                    <li>
                        <a href="{{ route('contract_residential') }}"><i data-feather="users"></i> <span>اضافة عقد
                                استئجار</span></a>
                    </li>
                @endcan
                @can('حركة الاستئجار')
                    <li>
                        <a href="{{ route('contract_effictive') }}"><i data-feather="users"></i> <span>حركة
                                الاستئجار</span></a>
                    </li>
                @endcan
                @can('ادارة العقارات')
                    <li>
                        <a href="{{ url('/' . ($page = 'Admin/realties')) }}"><i data-feather="users"></i> <span>ادارة
                                العقارات</span></a>
                    </li>
                @endcan
                @can('ادارة المستأجرين')
                    <li>
                        <a href="{{ url('/' . ($page = 'Admin/tenants')) }}"><i data-feather="users"></i> <span>ادارة
                                المستأجرين</span></a>
                    </li>
                @endcan
                @can('حركة التأجير')
                    <li>
                        <a href="{{ url('/' . ($page = 'Admin/effictive')) }}"><i data-feather="users"></i> <span>حركة
                                التأجير</span></a>
                    </li>
                @endcan
                @can('طلبات الصيانة')
                    <li>
                        <a href="{{ url('/' . ($page = 'Admin/wait_request')) }}"><i data-feather="users"></i> <span>طلبات
                                الصيانة</span></a>
                    </li>
                @endcan
                @can('السجل المالي')
                    <li>
                        <a href="{{ url('/' . ($page = 'Admin/proceeds')) }}"><i data-feather="users"></i> <span>السجل
                                المالي</span></a>
                    </li>
                @endcan
                @can('اعدادات الحساب')
                    <li>

                        <a href="{{ url('/' . ($page = 'User/settings')) }}"><i data-feather="users"></i>
                            <span>اعدادات الحساب</span></a>
                    </li>
                @endcan
                @can('اعدادات الادمن')
                    <li class="submenu">
                        <a href="#"><i data-feather="award"></i> <span> الاعدادات </span> <span
                                class="menu-arrow"></span></a>
                        <ul>

                            <li><a href="{{ url('/' . ($page = 'Admin/roles')) }}">ادارة الصلاحيات</a></li>
                            <li><a href="{{ url('/' . ($page = 'Admin/users')) }}">ادارة المستخدمين</a></li>
                            <li><a href="{{ url('/' . ($page = 'Admin/Account_settings')) }}">اعدادات الموقع</a></li>



                        </ul>
                    </li>
                @endcan


            </ul>
        </div>
    </div>
</div>
