	<!-- Header start -->
    <header class="header">
			<div class="logo-wrapper">
				<a href="index.html" class="logo">

					<img src="{{asset('assets/img/fav.png')}}" alt="Enjaz" />
				</a>

			</div>
			<div class="header-items">
				<!-- Custom search start -->

				<!-- Custom search end -->

				<!-- Header actions start -->
				<ul class="header-actions">
				<li class="dropdown">
						<a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
							<i class="icon-bell"></i>
							<span class="count-label">8</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
							<div class="dropdown-menu-header">
								Notifications (40)
							</div>
							<ul class="header-notifications">
								<li>
									<a href="#">
										<div class="user-img away">
											<img src="img/user21.png" alt="User" />
										</div>
										<div class="details">
											<div class="user-title">Abbott</div>
											<div class="noti-details">Membership has been ended.</div>
											<div class="noti-date">Oct 20, 07:30 pm</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="user-img busy">
											<img src="img/user10.png" alt="User" />
										</div>
										<div class="details">
											<div class="user-title">Braxten</div>
											<div class="noti-details">Approved new design.</div>
											<div class="noti-date">Oct 10, 12:00 am</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="user-img online">
											<img src="img/user6.png" alt="User" />
										</div>
										<div class="details">
											<div class="user-title">Larkyn</div>
											<div class="noti-details">Check out every table in detail.</div>
											<div class="noti-date">Oct 15, 04:00 pm</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</li>

					<li class="dropdown">
						<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
							<span class="user-name">{{Auth::user()->name}} </span>
							<span class="avatar">EJ<span class="status busy"></span></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
							<div class="header-profile-actions">

								<div class="header-user-profile">
                                <div class="header-user">
										<img src="{{URL::asset('assets/img/profile.png')}}" alt="" />
									</div>

									<h5>{{Auth::user()->email}} </h5>
									<p>{{Auth::user()->role_name}} </p>
								</div>
								<a href="{{ url('/' . $page='profile') }}"><i class="icon-user1"></i> My Profile</a>
                                <a
                                 onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="icon-log-out1"></i>تسجيل خروج</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

							</div>
						</div>
					</li>

				</ul>
				<!-- Header actions end -->
			</div>
		</header>
		<!-- Header end -->
