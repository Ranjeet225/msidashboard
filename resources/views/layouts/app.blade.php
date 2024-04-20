<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MSIL</title>
    <link href="{{asset('frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/slick.css')}}" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/assets/css/testimonial.css')}}" rel="stylesheet" />

    <style>
        /* .herosection {
            background-image: url({{asset('frontend/assets/images/background.png')}});
            background-size: cover;
        } */

        .banner {
            margin: 200px 0px;
        }

        .custombody {
            background: #fdbe33;
            text-align: center;
            font-size: 20px;
            color: black;
            font-weight: 500;
        }

        .testipara {
            color: white;
        }

        .dot {
            background: white;
        }

        #left-arrow {
            color: white;
        }

        #right-arrow {
            color: white;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- first header -->
        <div class="container tym">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="{{asset('frontend/assets/images/logo msil 1.png')}}" alt="images" />
                    </a>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <div class="d-flex flex-row gap-3">
                            <div>
                                <img src="{{asset('frontend/assets/images/img3.png')}}" alt="user" style="width: 70px; height: 70px" />
                            </div>

                            <div>
                                <div>
                                    <h5>Opening Hour</h5>
                                </div>
                                <div>
                                    <p class="mb-0 ">Mon - Fri, 8:00 - 9:00</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row gap-3">
                            <div>
                                <img src="{{asset('frontend/assets/images/img2.png')}}" alt="user" style="width: 70px; height: 70px" />
                            </div>
                            <div>
                                <div>
                                    <h5>Call Us</h5>
                                </div>
                                <div>
                                    <p class="mb-0">+91-671-2344761/62/63</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row gap-2">
                            <div>
                                <img src="{{asset('frontend/assets/images/img1.png')}}" alt="user" style="width: 70px; height: 70px" />
                            </div>
                            <div>
                                <div>
                                    <h5>Email Us</h5>
                                </div>
                                <div>
                                    <p class="mb-0">info@msil.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- second header -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">

                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

                <div class="dropdown mt-3">

                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                        <li class="nav-item px-3  ">
                            <a class="nav-link " href="{{url('/')}}">HOME</a>
                        </li>

                        <li class="nav-item px-3 active">
                            <a class="nav-link" href="about.html">ABOUT</a>
                        </li>
                        <li class="nav-item px-3 ">
                            <a class="nav-link" href="#">SERVICE</a>
                        </li>
                        <li class="nav-item px-3 ">
                            <a class="nav-link" aria-current="page" href="#">TEAM</a>
                        </li>
                        <li class="nav-item px-3 ">
                            <a class="nav-link" href="#">PROJECT</a>
                        </li>

                        <li class="nav-item px-3 ">
                            <a class="nav-link" href="ourclients.html">CLIENTS</a>
                        </li>

                        <div class="ps-0">
                            <button class="btn loginbtn" type="submit">Login</button>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="secondnav py-3 tym">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="fa-solid fa-bars text-white"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item px-3 @if (request()->routeIs('index')) active @endif me-2">
                                <a class="nav-link " href="{{url('/')}}">HOME</a>
                            </li>
                            <li class="nav-item px-3 me-2  @if (request()->routeIs('about')) active @endif">
                                <a class="nav-link" href="{{url('/about')}}">ABOUT</a>
                            </li>
                            <li class="nav-item px-3 me-2 @if (request()->routeIs('service')) active @endif">
                                <a class="nav-link" href="{{route('service')}}">SERVICE</a>
                            </li>
                            <li class="nav-item px-3 me-2 @if (request()->routeIs('team')) active @endif">
                                <a class="nav-link" aria-current="page" href="{{route('teams')}}">TEAM</a>
                            </li>
                            <li class="nav-item px-3 me-2">
                                <a class="nav-link" href="#">PROJECT</a>
                            </li>
                            <li class="nav-item px-3 me-2 @if (request()->routeIs('clients')) active @endif">
                                <a class="nav-link" href="{{route('clients')}}">CLIENTS</a>
                            </li>

                            <div class="px-5">
                                <a href="{{route('admin')}}">
                                <button class="btn loginbtn" type="submit">Login</button>
                                </a>
                            </div>
                        </ul>
                        <!-- <form class="d-flex" role="search"> -->
                        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                        <!-- </form> -->
                    </div>
                </div>
            </nav>
        </div>
        @yield('content')
        <!-- Customer Feedback -->
        <div class="coustomerFeedback position-relative" style="background-image: url({{asset('frontend/assets/images/testi.png')}})">
            <!-- <img src="{{asset('frontend/assets/images/Component.png')}}" class="w-100" /> -->
            <div id="testim" class="testim">
                <!--         <div class="testim-cover"> -->

                    <div class="wrap">
                        <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
                        <span id="left-arrow" class="arrow left fa fa-chevron-left"></span>
                        <ul id="testim-dots" class="dots">
                            @foreach ($testimonialData as $data)
                            <li class="dot active"></li>
                            @endforeach
                        </ul>
                        <div id="testim-content" class="cont">
                            @foreach ($testimonialData as $data)
                            <div>
                                <div class="img">
                                    <img src="{{asset('admin/assets/testimonials/'.$data->profile_picture)}}" alt="" />
                                </div>
                                <h2>{{$data->name}}</h2>
                                 <div class="text-white">{!! $data->testimonial_desc !!}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                <!--         </div> -->
            </div>

            <!-- <div class="bg-black py-4">
        <h4 class="text-white text-center mb-0">CUSTOMER NAME</h4>
    </div> -->
        </div>
        <!-- footer -->
        <div class="footer bg-black py-4 mt-5">
            <div class="container">
                <div class="row text-white mt-5">
                    <div class="col-md-3">
                        <h2>Important links</h2>
                        <ul class="mt-2">
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="#">Projects</a>
                            </li>
                            <li>
                                <a href="#">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h2>Services</h2>
                        <p class="mt-2">
                            Highways, Roads & Bridges Road Construction Building
                            Construction Smart Cities & TOwnships
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h2>Ideology</h2>
                        <ul>
                            <li>
                                <a href="#">Quality</a>
                            </li>
                            <li>
                                <a href="#">Safety</a>
                            </li>
                            <li>
                                <a href="#">Sustainbility</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h2>Contact Us</h2>
                        <address class="mt-2">
                            Address: Khapuria, Madhupatna, Cuttack-753010 Odisha, India
                            <br />
                            Telephone: + 91-671-2344761/62/63 <br />
                            FAX: +91-671-2347259<br />
                            E-Mail: info@msil.com
                        </address>
                    </div>
                </div>
                <div>
                    <img src="{{asset('frontend/assets/images/logo msil 1.png')}}" alt="" class="" />
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <!-- <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
    <script>
        $(".your-class").slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 6,
            autoplay: true,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true,
                    },
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    </script>
    <script src="{{asset('frontend/assets/js/testimonial.js')}}"></script>
</body>

</html>
