<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerZone</title>

    <link rel="shortcut icon" href="ftco-32x32.png">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">

    <!-- icone -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/creative-studio.css">

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" style="font-size:0.55cm">
    <div class="site-wrap">
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo"><a href="/">power zone<span>.</span> </a></div>
          <div class="ml-auto">
            @yield("nav")
          </div>
        </div>
      </div>
    </header>

    @yield("section")

    <footer class="footer-section" id="contact">
        <div class="container">
            <div class="contact-card">
                <div class="infos">
                    <h5 class="section-title mb-4"><b>Contact PowerZone</b></h5>
                </div>
                <div class="infos">
                <div class="item">
                        <i class="ti-location-pin"></i>
                        <div class="">
                            <h5>Localisation</h5>
                            <p><a href="https://maps.app.goo.gl/c6MaQRbKSfjTmuXx6?g_st=ii">Témara</a></p>
                        </div>                          
                    </div>
                    <div class="item">
                        <i class="ti-mobile"></i>
                        <div>
                            <h5>Tel</h5>
                            <p>0616558065</p>
                        </div>                          
                    </div>
                     
                    <div class="item">
                        <i class="ti-email"></i>
                        <div class="mb-0">
                            <h5>Email</h5>
                            <p>pOwer.zOne@gmail.com</p>
                        </div>
                    </div>

                    <div class="item">
                        <i class="ti-instagram"></i>
                        <div class="mb-0">
                            <h5>Instagram</h5>
                            <p>pOwer.zOne</p>
                        </div>
                    </div>
                    
                </div>  
            </div>
        </div>
    </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.mb.YTPlayer.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>