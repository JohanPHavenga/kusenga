<!DOCTYPE html>
<html>
    <head>

        <!-- Basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">	

        <title>Kusenga - <?= $page_title; ?></title>	

        <meta name="keywords" content="Kusenga" />
        <meta name="description" content="Kusenga - Accessible Insights">
        <meta name="author" content="JPH">

        <!-- Favicon -->
        <!--<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />-->
        <!--<link rel="apple-touch-icon" href="img/apple-touch-icon.png">-->

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

        <!-- Web Fonts  -->
        <!--<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700%7CSintony:400,700" rel="stylesheet" type="text/css">-->        
        
        <!-- Favicons  -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>/assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>/assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>/assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?= base_url(); ?>/assets/favicon/site.webmanifest">
        <link rel="mask-icon" href="<?= base_url(); ?>/assets/favicon/safari-pinned-tab.svg" color="#333333">
        <link rel="shortcut icon" href="<?= base_url(); ?>/assets/favicon/favicon.ico">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-config" content="/assets/favicon/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">
        
        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?= base_url(); ?>/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/vendor/animate/animate.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/vendor/simple-line-icons/css/simple-line-icons.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/vendor/owl.carousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/vendor/owl.carousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/vendor/magnific-popup/magnific-popup.min.css">

        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/theme.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/theme-elements.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/theme-blog.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/theme-shop.css">

        <!-- Current Page CSS -->
        <link rel="stylesheet" href="<?= base_url(); ?>/vendor/rs-plugin/css/settings.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/vendor/rs-plugin/css/layers.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/vendor/rs-plugin/css/navigation.css">

        <!-- Demo CSS -->
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/demo-business-consulting.css">

        <!-- Skin CSS -->
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/skin-business-consulting.css"> 

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/custom.css">

        <!-- Head Libs -->
        <script src="<?= base_url(); ?>/vendor/modernizr/modernizr.min.js"></script>

    </head>
    <body>

        <div class="body">
            <header id="header" class="header-transparent header-transparent-dark-bottom-border header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
                <div class="header-body border-top-0 bg-dark box-shadow-none">
                    <div class="header-container container">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-row">
                                    <div class="header-logo">
                                        <a href="<?= base_url(); ?>/">
                                            <img alt="Porto" width="149" height="40" src="<?= base_url(); ?>/assets/img/logo-default-slim-dark.png">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="header-column justify-content-end">
                                <div class="header-row">
                                    <div class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-light-text order-2 order-lg-1">
                                        <div class="header-nav-main header-nav-main-mobile-dark header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                            <nav class="collapse">
                                                <ul class="nav nav-pills" id="mainNav">
                                                    <li>
                                                        <a class="nav-link <?php if ($section=="home") { echo "active"; } ?>" href="<?=base_url();?>">
                                                            Home
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="nav-link <?php if ($section=="about") { echo "active"; } ?>" href="<?=base_url("about");?>">
                                                            About Us
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="nav-link <?php if ($section=="expertise") { echo "active"; } ?>" href="<?=base_url("expertise");?>">
                                                            Expertise
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="nav-link <?php if ($section=="team") { echo "active"; } ?>" href="<?=base_url("team");?>">
                                                            Team
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="nav-link <?php if ($section=="news") { echo "active"; } ?>" href="<?=base_url("news");?>">
                                                            News
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="nav-link <?php if ($section=="contact") { echo "active"; } ?>" href="<?=base_url("contact");?>">
                                                            Contact Us
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div role="main" class="main">