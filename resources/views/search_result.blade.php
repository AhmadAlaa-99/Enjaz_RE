<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>نتائج البحث</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" href="{{ URL::asset('home/img/favicon.ico') }}">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{ URL::asset('home/scss\bootstrap\scss\_images.scss') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/scss\bootstrap\scss\mixins\_image.scss') }}">

    <link rel="stylesheet" href="{{ URL::asset('home/lib/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/lib/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/css/style.css') }}">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->

        <!-- Spinner End -->

        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="{{ asset('home/img/icon-deal.png') }}" alt="Icon"
                            style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-2 text-primary">روعة انجاز</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">



                    </div>
                    <a href="#contact" class="btn btn-primary px-3 d-none d-lg-flex">اتصل بنا</a>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">نتائج البحث</h1>
                    <!--
                    <h5 class="display-5 animated fadeIn mb-4">تكلفة الايجار :{{ $s1 }}-النوع:{{ $s3 }}-المنطقة : {{ $s4 }}</h5>
                    -->
                    <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid" src="{{ asset('home/img/header.jpg') }}"  alt="">
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <form action="{{ route('property_search') }}" method="post">
                    {{ csrf_field() }}

                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input value="" name="cost"type="text"
                                        class="form-control border-0 py-3" placeholder="تكلفة الايجار">
                                </div>
                                <div class="col-md-4">
                                    <select value="" name="type" class="form-select border-0 py-3">
                                        <option selected>نوع العقار</option>
                                        <option value="محل تجاري">محل تجاري</option>
                                        <option value="ملحق">ملحق</option>
                                        <option value="شقة صغيرة">شقة صغيرة</option>
                                        <option value="شقة ثنائية الدور">شقة ثنائية الدور</option>
                                        <option value="شقة">شقة</option>
                                        <option value="فيلا">فيلا</option>

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select value="" name="location" class="form-select border-0 py-3">
                                        <option selected>المنطقة </option>
                                        @foreach ($quarters as $quarter)
                                            <option value="{{ $quarter->name }}">{{ $quarter->name }}</option>
                                        @endforeach



                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-dark border-0 w-100 py-3">بحث</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Search End -->




        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3"> العقارات الايجارية</h1>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            @forelse ($units as $unit)
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href=""><img class="img-fluid"
                                                    src="{{ asset('units/' . $unit->img) }}" alt=""></a>
                                            <div
                                                class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                For Rent</div>
                                            <div
                                                class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                                {{ $unit->unit_type }}</div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">{{ $unit->rent_cost }} شهريا</h5>
                                            <a class="d-block h5 mb-2" href="">{{ $unit->main_show }}</a>
                                            <p><i
                                                    class="fa fa-map-marker-alt text-primary me-2"></i>{{ $unit->address }}
                                            </p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-ruler-combined text-primary me-2"></i>
                                                {{ $unit->unit_size }} cm</small>
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-bed text-primary me-2"></i> {{ $unit->rooms }} عدد
                                                الغرف</small>
                                            <small class="flex-fill text-center py-2"><i
                                                    class="fa fa-bath text-primary me-2"></i>
                                                {{ $unit->bathrooms }}دورات المياه</small>
                                        </div>
                                    </div>
                                </div>
                            @empty
                             <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <a class="btn btn-primary py-3 px-5" href="{{route('enjaz')}}">عودة الى الصفحة الرئيسية </a>
                            </div>
                            @endforelse
                        </div>
                    </div>
                       </br>
                      <div class="d-flex justify-content-center">
                                        {!! $units->links() !!}
                                    </div>
                </div>
                </div>
            </div>
            <!-- Property List End -->


            <!-- Contact Start -->
            <div id="contact" class="container-xxl py-5">
                <div class="container">
                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="max-width: 600px;">
                        <h1 class="mb-3">Contact Us</h1>
                        <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum
                            sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                    </div>
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="row gy-4">
                                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="bg-light rounded p-3">
                                        <div class="d-flex align-items-center bg-white rounded p-3"
                                            style="border: 1px dashed rgba(0, 185, 142, .3)">
                                            <div class="icon me-3" style="width: 45px; height: 45px;">
                                                <i class="fa fa-map-marker-alt text-primary"></i>
                                            </div>
                                            <span>123 Street, New York, USA</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="bg-light rounded p-3">
                                        <div class="d-flex align-items-center bg-white rounded p-3"
                                            style="border: 1px dashed rgba(0, 185, 142, .3)">
                                            <div class="icon me-3" style="width: 45px; height: 45px;">
                                                <i class="fa fa-envelope-open text-primary"></i>
                                            </div>
                                            <span>info@example.com</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="bg-light rounded p-3">
                                        <div class="d-flex align-items-center bg-white rounded p-3"
                                            style="border: 1px dashed rgba(0, 185, 142, .3)">
                                            <div class="icon me-3" style="width: 45px; height: 45px;">
                                                <i class="fa fa-phone-alt text-primary"></i>
                                            </div>
                                            <span>+012 345 6789</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <iframe class="position-relative rounded w-100 h-100"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                                frameborder="0" style="min-height: 400px; border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <div class="col-md-6">
                            <div class="wow fadeInUp" data-wow-delay="0.5s">
                                <p class="mb-4">The contact form is currently inactive. Get a functional and working
                                    contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a
                                    little code and you're done. <a href="https://htmlcodex.com/contact-form">Download
                                        Now</a>.</p>
                                <form>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="Your Name">
                                                <label for="name">Your Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Your Email">
                                                <label for="email">Your Email</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="subject"
                                                    placeholder="Subject">
                                                <label for="subject">Subject</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                                <label for="message">Message</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" type="submit">Send
                                                Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->


            <!-- Footer Start -->
            <!-- Remove the container if you want to extend the Footer to full width. -->
            <div class="container my-5">

                <footer class="bg-dark text-center text-white">


                    <!-- Copyright -->
                    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                        © 2023 Copyright:
                        <a class="text-white" href="">Enjaz Raoaa</a>
                    </div>
                    <!-- Copyright -->
                </footer>

            </div>
            <!-- End of .
            <!-- Footer End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
                    class="bi bi-arrow-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

        <script type="text/javascript">
            var path = "{{ route('autocomplete') }}";

            $('#search').typeahead({
                source: function(query, process) {
                    return $.get(path, {
                        query: query
                    }, function(data) {
                        return process(data);
                    });
                }
            });
        </script>
        <script src="{{ URL::asset('home/lib/wow/wow.min.js') }}"></script>
        <script src="{{ URL::asset('home/lib/easing/easing.min.js') }}"></script>

        <script src="{{ URL::asset('home/lib/waypoints/waypoints.min.js') }}"></script>

        <script src="{{ URL::asset('home/lib/owlcarousel/owl.carousel.min.j') }}"></script>

        <script src="{{ URL::asset('home/js/main.js') }}"></script>
</body>

</html>
