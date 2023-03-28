<?php
include 'inc/function.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mega Leasing PLC</title>

    <link rel="shortcut icon" type="image/jpg" href="assets/images/megaleasing-icon.png" />

    <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@100;300;400;700;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/fonts/font-awesome-pro-master/css/all.min.css" rel="stylesheet">
    <link href="assets/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">


    <script src="assets/js/jquery.js"></script>


</head>

<body>

    <header class="ad-main-navbar" id="ad-main-navbar">

        <div class="ad-h-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="ad-h-top-left">
                            <ul class="ad-h-top-nav">
                                <li><a href="promotion.php">Promotion</a></li>
                                <li><a href="#">Online Application</a></li>
                                <li><a href="news.php">News & Events</a></li>
                                <li><a href="annual-report.php">Report</a></li>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="col-md-7">
                        <div class="ad-h-top-right">
                            <ul class="ad-h-top-nav">
                                <li>
                                    <a href="#" class="ad-social-item"><i class="fab fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="ad-social-item"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="ad-social-item"><i class="fab fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="ad-social-item"><i class="fab fa-telegram-plane"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="ad-social-item"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="ad-social-item"><i class="fab fa-twitter"></i></a>
                                </li>
                           
                                <li>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                            <i class="far fa-language"></i> English
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">ភាសាខ្មែរ</a></li>
                                            <li><a class="dropdown-item" href="#">English</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ad-h-center">
            <div class="container">

                <div class="ad-h-center-row">

                    <?php /* mobile navbar */ ?>
                    <div class="ad-navbar-button">
                        <a class="" data-bs-toggle="offcanvas" href="#offcanvasnvbar" role="button">
                            <i class="fal fa-bars"></i>
                        </a>
                    </div>

                    <div class="ad-logo">
                        <a href="index.php">
                            <img src="assets/images/megaleasing-logo-landscape.png" alt="Home | Mega Leasing PLC" title="Home | Mega Leasing PLC">
                        </a>
                    </div>

                    <div class="ad-h-center-right">
                        <ul>
                            <li>
                                <div class="ad-d-search">
                                    <form class="d-flex ad-h-search" action="" method="get">
                                        <input class="form-control me-2 t-search" type="search" name="t-search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit"><i class="far fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="ad-mb-search">
                                    <a class="btn-search" data-bs-toggle="offcanvas" href="#offcanvassearch" role="button"><i class="far fa-search"></i></a>
                                </div>

                                <div class="offcanvas offcanvas-end offcanvas-search" tabindex="-1" id="offcanvassearch" aria-labelledby="offcanvassearch">
                                    <div class="offcanvas-header">
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <form class="d-flex ad-h-search" action="" method="get">
                                            <input class="form-control me-2 t-search" type="search" name="t-search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-outline-success" type="submit"><i class="far fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#" class="btn-primary"><i class="far fa-comment-alt"></i> <span>Online Application</span></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="ad-h-bottom">
            <div class="container">
                <nav class="ad-navbar">
                    <ul>
                        <li>
                            <a href="index.php" class="active">Home</a>
                        </li>
                        <li class="has-submenu">
                            <a href="about.php">About Comapny</a>
                            <span class="arrow"><i class="far fa-chevron-down"></i></span>
                            <ul class="ad-sub-menu">
                                <li><a href="company-profile.php">Company Profile</a></li>
                                <li><a href="#">Vision and Mission</a></li>
                                <li><a href="#">Core Value</a></li>
                                <li><a href="#">Board of Directors</a></li>
                                <li><a href="#">Management Team</a></li>
                                <li><a href="#">Chairman Message</a></li>
                                <li><a href="#">CEO Manager</a></li>
                                <li><a href="#">Organisational Structure</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="branch-network.php">Branch Network </a>
                            <span class="arrow"><i class="far fa-chevron-down"></i></span>
                            <ul class="ad-sub-menu">
                                <li><a href="head-office.php">Head Office</a></li>
                                <li><a href="head-office.php">Phnom Penh Branch</a></li>
                                <li><a href="head-office.php">Krong Ta Khmao Branch</a></li>
                                <li><a href="head-office.php">Angsnoul District Branch</a></li>
                                <li><a href="head-office.php">Khsach Kandal District Branch</a></li>
                                <li><a href="head-office.php">Siem Reap Province Branch</a></li>
                                <li><a href="head-office.php">Battambang Province Branch</a></li>
                                <li><a href="head-office.php">Banteay Meanchey Province Branch</a></li>
                                <li><a href="head-office.php">Sihanouk Ville Province Branch </a></li>
                                <li><a href="head-office.php">Tbong Khmom Province Branch</a></li>
                                <li><a href="head-office.php">Kampong Cham Province Branch</a></li>
                                <li><a href="head-office.php">Pailin Province Branch</a></li>
                                <li><a href="head-office.php">Prey Veng Province Branch</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="products.php">Products & Services</a>
                            <span class="arrow"><i class="far fa-chevron-down"></i></span>
                            <ul class="ad-sub-menu">
                                <li><a href="products.php">Motorbike</a></li>
                                <li><a href="products.php">Electronic Device</a></li>
                                <li><a href="products.php">Car</a></li>
                                <li><a href="products.php">Furniture</a></li>
                                <li><a href="products.php">Truck</a></li>
                                <li><a href="products.php">Heavy Machinery</a></li>
                                <li><a href="products.php">Agriculture Machinery</a></li>
                            </ul>
                        </li>
                        <li><a href="promotion.php">Promotion</a></li>
                        <li class="has-submenu">
                            <a href="news.php">News & events</a>
                            <span class="arrow"><i class="far fa-chevron-down"></i></span>
                            <ul class="ad-sub-menu">
                                <li><a href="news.php">News</a></li>
                                <li><a href="holiday.php">Holiday</a></li>
                                <li><a href="photo-video.php">Photos and Videos</a></li>
                                <li><a href="corporate-partner.php">Corporate Partner</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="annual-report.php">Report</a>
                            <span class="arrow"><i class="far fa-chevron-down"></i></span>
                            <ul class="ad-sub-menu">
                                <li><a href="annual-report.php">Annual Report</a></li>
                                <li><a href="audited-report.php">Audited Report</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="job-opportunity.php">Careers</a>
                            <span class="arrow"><i class="far fa-chevron-down"></i></span>
                            <ul class="ad-sub-menu">
                                <li><a href="job-opportunity.php">Job Opportunity</a></li>
                                <li><a href="how-to-apply.php">How to apply</a></li>
                                <li><a href="why-mega-leasing.php">Why Mega Leasing?</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <?php /* mobile navbar panel */ ?>
        <div class="ad-mb-offcanvas offcanvas offcanvas-start" tabindex="-1" id="offcanvasnvbar">
            <div class="offcanvas-header">
                <a href="javascript:" class="ad-btn-close text-reset" data-bs-dismiss="offcanvas" ><i class="fal fa-times"></i></a>
            </div>
            <div class="offcanvas-body">
                <nav class="ad-mb-navbar" id="ad-mb-navbar">
                <ul>
                        <li>
                            <a href="index.php" class="active">Home</a>
                        </li>
                        <li class="has-submenu">
                            <a href="about.php">About Comapny</a>
                            <span class="arrow"><i class="far fa-chevron-down"></i></span>
                            <ul class="ad-sub-menu">
                                <li><a href="company-profile.php">Company Profile</a></li>
                                <li><a href="#">Vision and Mission</a></li>
                                <li><a href="#">Core Value</a></li>
                                <li><a href="#">Board of Directors</a></li>
                                <li><a href="#">Management Team</a></li>
                                <li><a href="#">Chairman Message</a></li>
                                <li><a href="#">CEO Manager</a></li>
                                <li><a href="#">Organisational Structure</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="branch-network.php">Branch Network </a>
                            <span class="arrow"><i class="far fa-chevron-down"></i></span>
                            <ul class="ad-sub-menu">
                                <li><a href="head-office.php">Head Office</a></li>
                                <li><a href="head-office.php">Phnom Penh Branch</a></li>
                                <li><a href="head-office.php">Krong Ta Khmao Branch</a></li>
                                <li><a href="head-office.php">Angsnoul District Branch</a></li>
                                <li><a href="head-office.php">Khsach Kandal District Branch</a></li>
                                <li><a href="head-office.php">Siem Reap Province Branch</a></li>
                                <li><a href="head-office.php">Battambang Province Branch</a></li>
                                <li><a href="head-office.php">Banteay Meanchey Province Branch</a></li>
                                <li><a href="head-office.php">Sihanouk Ville Province Branch </a></li>
                                <li><a href="head-office.php">Tbong Khmom Province Branch</a></li>
                                <li><a href="head-office.php">Kampong Cham Province Branch</a></li>
                                <li><a href="head-office.php">Pailin Province Branch</a></li>
                                <li><a href="head-office.php">Prey Veng Province Branch</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="products.php">Products & Services</a>
                            <span class="arrow"><i class="far fa-chevron-down"></i></span>
                            <ul class="ad-sub-menu">
                                <li><a href="products.php">Motorbike</a></li>
                                <li><a href="products.php">Electronic Device</a></li>
                                <li><a href="products.php">Car</a></li>
                                <li><a href="products.php">Furniture</a></li>
                                <li><a href="products.php">Truck</a></li>
                                <li><a href="products.php">Heavy Machinery</a></li>
                                <li><a href="products.php">Agriculture Machinery</a></li>
                            </ul>
                        </li>
                        <li><a href="promotion.php">Promotion</a></li>
                        <li class="has-submenu">
                            <a href="news.php">News & events</a>
                            <span class="arrow"><i class="far fa-chevron-down"></i></span>
                            <ul class="ad-sub-menu">
                                <li><a href="news.php">News</a></li>
                                <li><a href="holiday.php">Holiday</a></li>
                                <li><a href="photo-video.php">Photos and Videos</a></li>
                                <li><a href="corporate-partner.php">Corporate Partner</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="annual-report.php">Report</a>
                            <span class="arrow"><i class="far fa-chevron-down"></i></span>
                            <ul class="ad-sub-menu">
                                <li><a href="annual-report.php">Annual Report</a></li>
                                <li><a href="audited-report.php">Audited Report</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="job-opportunity.php">Careers</a>
                            <span class="arrow"><i class="far fa-chevron-down"></i></span>
                            <ul class="ad-sub-menu">
                                <li><a href="job-opportunity.php">Job Opportunity</a></li>
                                <li><a href="how-to-apply.php">How to apply</a></li>
                                <li><a href="why-mega-leasing.php">Why Mega Leasing?</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>

    </header>