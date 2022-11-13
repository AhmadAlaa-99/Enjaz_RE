<!-- Navigation start -->
<nav class="navbar navbar-expand-lg custom-navbar">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ENJAZAdminNavbar" aria-controls="ENJAZAdminNavbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i></i>
						<i></i>
						<i></i>
					</span>
				</button>
				<div class="collapse navbar-collapse" id="ENJAZAdminNavbar">
					<ul class="navbar-nav">

                    @can(' المستأجر -   البيانات الايجارية')
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-person nav-icon"></i>
								 البيانات الايجارية
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
									<a class="dropdown-item" href="{{ url('/' . $page='Admin/owners/create') }}" > بيانات الوحدة</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{ url('/' . $page='Admin/owners') }}">بيانات العقد</a>
								</li>
							</ul>
						</li>
                        @endcan
@can('الوسيط العقاري -  ملاك العقارات')
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-person nav-icon"></i>
								ملاك العقارات
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
									<a class="dropdown-item" href="{{ url('/' . $page='Admin/owners/create') }}" >اضافة مالك عقار</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{ url('/' . $page='Admin/owners') }}">بيانات الملاك</a>
								</li>
							</ul>
						</li>
                        @endcan
@can( 'الوسيط العقاري -  ادارة المستأجرين'))

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-people nav-icon"></i>
								 ادارة المستأجرين
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
									<a class="dropdown-item" href="{{ url('/' . $page='Admin/tenants') }}">بيانات  المستأجرين</a>
								</li>
                                <li>
									<a class="dropdown-item" href="{{ url('/' . $page='Admin/archive_tenants') }}">بيانات الارشيف</a>
								</li>

							</ul>
						</li>
                        @endcan

@can('ادارة المستأجرين - المالك')

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-people nav-icon"></i>
								 ادارة المستأجرين
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
									<a class="dropdown-item" href="{{ url('/' . $page='Owner/actived_tenants') }}">بيانات  المستأجرين</a>
								</li>
                                <li>
									<a class="dropdown-item" href="{{ url('/' . $page='Owner/archive_tenants') }}">بيانات الارشيف</a>
								</li>

							</ul>
						</li>

@endcan




                            @can('طلبات الصيانة - الوسيط- المالك')
                            	<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-refresh nav-icon"></i>
								  طلبات الصيانة
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
									<a class="dropdown-item"  href="{{ url('/' . $page='Admin/accept_requests') }}">الطلبات المنجزة </a>
								</li>

								<li>
									<a class="dropdown-item" href="{{ url('/' . $page='Admin/wait_request') }}">  الطلبات المعلقة</a>
								</li>

                                <li>
                                <a class="dropdown-item" href="{{ url('/' . $page='Admin/maintenance_payments') }}">مدفوعات الصيانة</a>
								</li>
                                       	</ul>
						</li>
                                @endcan


                               @can('الصيانة - المستأجر')
                               	<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-refresh nav-icon"></i>
								  طلبات الصيانة
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">

                                <li>
									<a class="dropdown-item" href="{{ url('/' . $page='Tenant/request_form') }}">ارسال الطلب</a>
								</li>
                                <li>
									<a class="dropdown-item" href="{{ url('/' . $page='Tenant/maints_requests') }}">طلباتي</a>
								</li>

							</ul>
						</li>
                              @endcan



@can('ادارة العقارات - الوسيط')
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-home nav-icon"></i>
								 ادارة العقارات
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
							<li>
									<a class="dropdown-item" href="{{ url('/' . $page='Admin/realties/create') }}" >اضافة منشأة عقارية</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{ url('/' . $page='Admin/realties') }}">المنشات العقارية</a>
								</li>
								<li>
									<a class="dropdown-toggle sub-nav-link" href="#" id="layoutsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										 الوحدات الايجارية
									</a>
									<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="layoutsDropdown">
										<li>


											<a class="dropdown-item" href="{{ url('/' . $page='Admin/empty_units') }}">الشاغرة</a>
										</li>
										<li>
											<a class="dropdown-item" href="{{ url('/' . $page='Admin/rented_units') }}">الممتلئة</a>
										</li>
                                    </ul>
								</li>
							</ul>
						</li>
                        @endcan
                        @can('عقاراتي - المالك')
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-home nav-icon"></i>
								  عقاراتي
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">

								<li>
									<a class="dropdown-item" href="{{ url('/' . $page='Owner/realties') }}">المنشات العقارية</a>
								</li>
								<li>
									<a class="dropdown-toggle sub-nav-link" href="#" id="layoutsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										 الوحدات الايجارية
									</a>
									<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="layoutsDropdown">
										<li>
											<a class="dropdown-item" href="{{ url('/' . $page='Owner/empty_units') }}">الشاغرة</a>
										</li>
										<li>
											<a class="dropdown-item" href="{{ url('/' . $page='Owner/rented_units') }}">الممتلئة</a>
										</li>
                                    </ul>
								</li>
							</ul>
						</li>
                        @endcan

                        @can('حركة التأجير - الوسيط العقاري')

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-pencil nav-icon"></i>
								   حركة التأجير
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
                                          <li>
										<a class="dropdown-item" href="{{ url('/' . $page='Admin/effictive') }}">العقود الجارية</a>
										</li>
										<li>
											<a class="dropdown-item" href="{{ url('/' . $page='Admin/finished') }}">العقود المنتهية</a>
										</li>
                                        <li>
                                        <a class="dropdown-item" href="{{ url('/' . $page='Admin/receives_reports') }}">تقارير التسليم</a>										</li>
                                        <li>
                                        <a class="dropdown-item" href="{{ url('/' . $page='Admin/receives_reports/create') }}">انشاء طلب تسليم</a>
										</li>
							</ul>
						</li>
                        @endcan

                        @can('حركة التأجير- المالك')
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-pencil nav-icon"></i>
								   حركة التأجير
							</a>


							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
                                          <li>
										<a class="dropdown-item" href="{{ url('/' . $page='Owner/actived_leases') }}">العقود الجارية</a>
										</li>
										<li>
											<a class="dropdown-item" href="{{ url('/' . $page='Owner/expired_leases') }}">العقود المنتهية</a>
										</li>
                                        <li>
							</ul>
						</li>
                        @endcan
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-sync nav-icon"></i>
								     الاعدادات
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
                                    <!--
								<a class="dropdown-item" href="{{ url('/' . $page='Admin/tasks') }}">ادارة المهام</a>
-->                             @can('الاعدادات  - الوسيط')
                                <a class="dropdown-item" href="{{ url('/' . $page='Admin/roles') }}">ادارة الصلاحيات</a>
								<a class="dropdown-item" href="{{ url('/' . $page='Admin/users') }}">ادارة المستخدمين</a>
                                <a class="dropdown-item" href="{{ url('/' . $page='Admin/statistics') }}">الاحصائيات</a>
                                <a class="dropdown-item" href="{{ url('/' . $page='Admin/Account_settings') }}">اعدادات الحساب</a>
                                @endcan
                                @can('الاعدادات المالك')
								<a class="dropdown-item" href="{{ url('/' . $page='Owner/statistics') }}">الاحصائيات</a>
                                @endcan
                                @can('الاعدادات المستأجر')
                                <a class="dropdown-item" href="{{ url('/' . $page='Tenant/leases') }}">بيانات العقد</a>
                                @endcan
                                <a class="dropdown-item" href="{{ url('/' . $page='profile') }}">الملف الشخصي</a>
								</li>
							</ul>
						</li>

					</ul>
				</div>
			</nav>
			<!-- Navigation end -->
