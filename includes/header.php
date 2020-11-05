<?php
session_start();
if (empty($_SESSION["token"])) {
    $_SESSION["token"] = md5(uniqid(mt_rand(), true));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Xaltam Technologies is one of the fastest growing IT companies in India backed by professionals
and world-class offerings.">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta property="og:title" content="Xaltam Technologies" />
<meta property="og:description" content="Xaltam Technologies is one of the fastest growing IT companies in India backed by professionals
and world-class offerings." />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Xaltam Technologies</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/fav.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div class="wrapper">
        <div class="cssload-loader"></div>
    </div>
</div>

<!-- ***** Header Area Start ***** -->
<header class="header-area">
    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="uzaNav">

                <!-- Logo -->
                <a class="nav-brand" href="home"><img src="img/core-img/xal_logo1.png"  alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">
                    <!-- Menu Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul id="nav">
                            
                            <li><a href="about">About</a></li>
                            <li><a href="services">Services</a></li>
                            <li><a href="portfolio">Portfolio</a></li>
                            <li><a href="reach-us">Reach Us</a></li>
                        </ul>

                        <!-- Get A Quote -->
                        <div class="get-a-quote ml-4 mr-3">
                            <button class="btn uza-btn" data-toggle="modal" data-target="#form">Get A Quote</button>
                        </div>

                    </div>
                    <!-- Nav End -->

                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLabel">Get A Quote</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="mt-3" action="send_quote.php" method="post" id="quote_form">
                <input type="hidden" id="csrf" name="csrf" value="<?php echo $_SESSION["token"];?>" />
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control mb-30" name="full_name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="email" class="form-control mb-30" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" class="form-control mb-30" name="phone" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <select class="form-control" name="service_type">
                                    <option value="" selected disabled>Select your service</option>
                                    <option value="Enterprise Resource Planning">Enterprise Resource Planning</option>
                                    <option value="Website Designing & development">Website Designing & development</option>
                                    <option value="Online Reputation Management">Online Reputation Management</option>
                                    <option value="CRM">CRM</option>
                                    <option value="Mobile Application">Mobile Application</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                    <option value="Point of Sales (POS)">Point of Sales (POS)</option>
                                    <option value="School Transport management System">School Transport management System</option>
                                    <option value="Cloud Computing">Cloud Computing</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control mb-30" name="message" rows="8" cols="80" placeholder="Message"></textarea>
                            </div>
                            <p style="font-style: italic;color:#999;margin-top:-15px;font-size:11px;">* All fields are required.</p>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn uza-btn btn-3 mt-15" type="submit" id="formBt">Send Quote</button>
                            <div id="mssgBox" class="mt-2"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>