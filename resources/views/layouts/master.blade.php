@inject('settings','App\Models\Setting')
<?php
    $setting = $settings->get()->first();
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

        <!--google fonts css-->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

        <!--font awesome css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <link rel="icon" href="{{asset('Front/imgs/Icon.png')}}">

        <!--owl-carousel css-->
        <link rel="stylesheet" href="{{asset('Front/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('Front/css/owl.theme.default.min.css')}}">

        <!--style css-->
        <link rel="stylesheet" href="{{asset('Front/css/style.css')}}">

        <title>Blood Bank</title>
    </head>
    <body>
        <!--upper-bar-->
        <div class="upper-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="language">
                            <a href="index.html" class="ar active">عربى</a>
                            <a href="index-ltr.html" class="en inactive">EN</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="social">
                            <div class="icons">
                                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- not a member-->
                    <div class="col-md-4">
                        @if(!\Illuminate\Support\Facades\Auth::guard('client')->check())
                        <div class="info" dir="ltr">
                            <div class="phone">
                                <i class="fas fa-phone-alt"></i>
                                <p>+966506954964</p>
                            </div>
                            <div class="e-mail">
                                <i class="far fa-envelope"></i>
                                <p>name@name.com</p>
                            </div>
                        </div>
                        @else
                            <div class="member">
                                <p class="welcome">مرحباً بك</p>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{auth()->guard('client')->user()->name}}
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{url(route('profile.edit',auth()->guard('client')->user()->id))}}">
                                            <i class="far fa-user"></i>
                                            معلوماتى
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="far fa-bell"></i>
                                            اعدادات الاشعارات
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="far fa-heart"></i>
                                            المفضلة
                                        </a>
                                        <a class="dropdown-item" href="{{url(route('contact_us'))}}">
                                            <i class="fas fa-phone-alt"></i>
                                            تواصل معنا
                                        </a>
                                        <a class="dropdown-item" href="{{url(route('sign_out'))}}">
                                            <i class="fas fa-sign-out-alt"></i>
                                            تسجيل الخروج
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <!--nav-->
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="{{url(route('home_page'))}}">
                        <img src="{{asset('Front/imgs/logo.png')}}" class="d-inline-block align-top" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url(route('home_page'))}}">الرئيسية <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">المقالات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url(route('donation_requests'))}}">طلبات التبرع</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url(route('about_us'))}}">عن بنك الدم</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url(route('contact_us'))}}">اتصل بنا</a>
                            </li>
                        </ul>

                        @if(!\Illuminate\Support\Facades\Auth::guard('client')->check())
                        <div class="accounts">
                            <a href="{{url(route('sign_up'))}}" class="create">إنشاء حساب جديد</a>
                            <a href="{{url(route('sign_in'))}}" class="signin">الدخول</a>
                        </div>
                        @else
                        <a href="{{url(route('make_donation_request'))}}" class="donate">
                            <img src="{{asset('Front/imgs/transfusion.svg')}}">
                            <p>طلب تبرع</p>
                        </a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>

       @yield('content')

        <!--footer-->
        <div class="footer">
            <div class="inside-footer">
                <div class="container">
                    <div class="row">
                        <div class="details col-md-4">
                            <img src="{{asset('Front/imgs/logo.png')}}">
                            <h4>بنك الدم</h4>
                            <p>
                                {{$setting->footer}}
                            </p>
                        </div>
                        <div class="pages col-md-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-home-list" href="{{url(route('home_page'))}}" role="tab" aria-controls="home">الرئيسية</a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list" href="{{url(route('about_us'))}}" role="tab" aria-controls="profile">عن بنك الدم</a>
                                <a class="list-group-item list-group-item-action" id="list-messages-list" href="{{url(route('donation_requests'))}}" role="tab" aria-controls="messages">المقالات</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{url(route('donation_requests'))}}" role="tab" aria-controls="settings">طلبات التبرع</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{url(route('contact_us'))}}" role="tab" aria-controls="settings">اتصل بنا</a>
                            </div>
                        </div>
                        <div class="stores col-md-4">
                            <div class="availabe">
                                <p>متوفر على</p>
                                <a href="#">
                                    <img src="{{asset('Front/imgs/google1.png')}}">
                                </a>
                                <a href="#">
                                    <img src="{{asset('Front/imgs/ios1.png')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="container">
                    <div class="row">
                        <div class="social col-md-4">
                            <div class="icons">
                                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                        <div class="rights col-md-8">
                            <p>جميع الحقوق محفوظة لـ <span>بنك الدم</span> &copy; 2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script src="{{asset('Front/js/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('Front/js/bootstrap.bundle.min.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

        <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>

        <script src="{{asset('Front/js/owl.carousel.min.js')}}"></script>

        <script src="{{asset('Front/js/main.js')}}"></script>
    @stack('script')
    </body>
</html>
