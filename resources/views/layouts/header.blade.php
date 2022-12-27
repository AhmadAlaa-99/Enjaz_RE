<div class="header header-one">

   <div class="header-left header-left-one">
        <a href="index.html" class="logo">

            <img src="{{asset('assets/img/logo.png')}}"
        alt="Logo">
        </a>
        <a href="index.html" class="white-logo">
            <img src="{{asset('assets/img/logo-white.png')}}"
            alt="Logo">
        </a>
        <a href="index.html" class="logo logo-small">
            <img src="{{asset('assets/img/logo-small.png')}}"
        alt="Logo" width="30" height="30">
        </a>
    </div>


<a href="javascript:void(0);" id="toggle_btn">
        <i class="fas fa-bars"></i>
    </a>

  <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <!--
            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="time">
                <span id="clock"></span>
            </a>
        -->


    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>


    <ul class="nav nav-tabs user-menu">
 <li class="nav-item dropdown has-arrow flag-nav">
                    <a class="nav-link " data-bs-toggle="dropdown" href="#" role="button">
                        <img src="assets/img/flags/us.png" alt="" height="20"> <span>Arabic</span>
                    </a>

                </li>



        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                 <span class="badge rounded-pill">5</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All</a>
                </div>


            </div>
        </li>


        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img src="{{asset('assets/img/profiles/avatar-01.jpg')}}"  alt="">
                    <span class="status online"></span>
                </span>
                <span>{{ Auth::user()->role_name }}</span>
            </a>
            <div class="dropdown-menu">
                <a  onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item" ><i data-feather="log-out" class="me-1"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
            </div>
        </li>

    </ul>

</div>
<script>
     $(document).on('click', '#toggle_btn', function() {
        if ($('body').hasClass('mini-sidebar')) {
            $('body').removeClass('mini-sidebar');
            $('.subdrop + ul').slideDown();
        } else {
            $('body').addClass('mini-sidebar');
            $('.subdrop + ul').slideUp();
        }
        setTimeout(function() {
            mA.redraw();
            mL.redraw();
        }, 300);
        return false;
    });
</script>
