<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
  <!-- site metas -->
  <title>TUGAS</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!-- bootstrap css -->
  <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/bootstrap.min.css')}}" />
  <!-- style css -->
  <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/style.css')}}" />
  <!-- Responsive-->
  <link rel="stylesheet" href="{{asset('user/assets/css/responsive.css')}}" />
  <!-- fevicon -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="{{asset('user/assets/css/jquery.mCustomScrollbar.min.css')}}" />
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Righteous&display=swap" rel="stylesheet" />
  <!-- owl stylesheets -->
  <link rel="stylesheet" href="{{asset('user/assets/css/owl.carousel.min.css')}}" />
  <link rel="stylesheet" href="{{asset('user/assets/css/owl.theme.default.min.css')}}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen" />

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
</head>

<body>
  <!-- header section start -->
  <div class="header_section">
    <div class="header_main">
      <div class="mobile_menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{Route('index')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{Route('about')}}">Tentang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{Route('service')}}">Layanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{Route('blog')}}">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{Route('contact')}}">Kontak</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="container-fluid">
        <div class="logo">
          <!-- <a href="index.html"><img src="images/logo.png" /></a> -->
        </div>
        <div class="menu_main" style="margin-top: -40px">
          <ul>
            <li class="active"><a href="{{Route('index')}}">Home</a></li>
            <li><a href="{{Route('about')}}">Tentang</a></li>
            <li><a href="{{Route('service')}}">Layanan</a></li>
            <li><a href="{{Route('blog')}}">Blog</a></li>
            <li><a href="{{Route('contact')}}">Kontak Kami</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- banner section start -->
    @if (request()->is('/'))
    <div class="banner_section layout_padding">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <h1 class="banner_taital">Peluang Karir</h1>
              <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority have sufferedThere are ma available, but the majority have suffered</p>
              <div class="read_bt"><a href="#">Hubungi Kami</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- banner section end -->
    @endif
  </div>

  @yield('content')

  <div class="footer_section layout_padding">
    <div class="container">
      <div class="input_btn_main">
        <input type="text" class="mail_text" placeholder="Enter your email" name="Enter your email" />
        <div class="subscribe_bt"><a href="#">Subscribe</a></div>
      </div>
      <div class="location_main">
        <div class="call_text"><img src="images/call-icon.png" /></div>
        <div class="call_text"><a href="#">Call +625158480093</a></div>
        <div class="call_text"><img src="images/mail-icon.png" /></div>
        <div class="call_text"><a href="#">rakamuhammad644@gmail.com</a></div>
      </div>
      <div class="social_icon">
        <ul>
          <li>
            <a href="https://www.linkedin.com/in/mhd-raka-aulia-amanda-445b17291/"><img src="images/linkedin-icon.png" /></a>
          </li>
          <li>
            <a href="https://www.instagram.com/mhrakauliamnd/"><img src="images/instagram-icon.png" /></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- footer section end -->
  <!-- copyright section start -->
  <div class="copyright_section">
    <div class="container">
      <p class="copyright_text">Created by <a href="https://www.instagram.com/mhrakauliamnd/">Mhd Raka Aulia Amanda</a></p>
    </div>
  </div>
  <!-- copyright section end -->
  <!-- Javascript files-->
  <script src="{{asset('user/assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('user/assets/js/popper.min.js')}}"></script>
  <script src="{{asset('user/assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('user/assets/js/jquery-3.0.0.min.js')}}"></script>
  <script src="{{asset('user/assets/js/plugin.js')}}"></script>
  <!-- sidebar -->
  <script src="{{asset('user/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
  <script src="{{asset('user/assets/js/custom.js')}}"></script>
  <!-- javascript -->
  <script src="{{asset('user/assets/js/owl.carousel.js')}}"></script>
  <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script>
    $(function() {
      $('#daterange').daterangepicker({
        locale: {
          format: 'YYYY-MM-DD'
        },
        startDate: moment().startOf('month'),
        endDate: moment().endOf('month')
      });
    });
  </script>

</body>

</html>