<!-- Required jQuery first, then Bootstrap Bundle JS -->

<script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL::asset('assets/vendor/slimscroll/slimscroll.min.js')}}"></script>
<script src="{{URL::asset('assets/vendor/slimscroll/custom-scrollbar.js')}}"></script>
<script src="{{URL::asset('assets/js/moment.js')}}"></script>
<script src="{{URL::asset('assets/vendor/daterange/daterange.js')}}"></script>
<script src="{{URL::asset('assets/vendor/daterange/custom-daterange.js')}}"></script>
<script src="{{URL::asset('assets/vendor/chartist/js/chartist.min.js')}}"></script>
<script src="{{URL::asset('assets/vendor/chartist/js/chartist-tooltip.js')}}"></script>
<script src="{{URL::asset('assets/vendor/chartist/js/custom/threshold/threshold.js')}}"></script>
<script src="{{URL::asset('assets/vendor/chartist/js/custom/bar/bar-chart-orders.js')}}"></script>
<script src="{{URL::asset('assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
<script src="{{URL::asset('assets/vendor/jvectormap/world-mill-en.js')}}"></script>
@yield('js')
<script src="{{URL::asset('assets/vendor/jvectormap/gdp-data.js')}}"></script>
<script src="{{URL::asset('assets/vendor/jvectormap/custom/world-map-markers2.js')}}"></script>
<script src="{{URL::asset('assets/vendor/rating/raty.js')}}"></script>
<script src="{{URL::asset('assets/vendor/rating/raty-custom.js')}}"></script>
<script src="{{URL::asset('assets/js/main.js')}}"></script>
<script type="text/javascript">
    var clockElement = document.getElementById('clock');

    function clock() {
        var date = new Date();

        // Replace '400px' below with where you want the format to change.
        if (window.matchMedia('(max-width: 400px)').matches) {
            // Use this format for windows with a width up to the value above.
            clockElement.textContent = date.toLocaleString();
        } else {
            // While this format will be used for larger windows.
            clockElement.textContent = date.toString();
        }
    }

    setInterval(clock, 1000);
</script>
