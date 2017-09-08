<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php the_title(); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_get_archives('type=monthly&format=link'); ?>
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>"/>
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>"/>
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>
    <style>
        .loader-wrap {
            position: fixed;
            z-index: 99999;
            background: rgba(25, 25, 25, 1);
            width: 100%;
            height: 100%;
            display: table;
        }

        .loader-wrap > .middle {
            display: table-cell;
            vertical-align: middle;
        }

        .loader-wrap > .middle > .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            margin: 0 auto;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        <?php if (get_option('background')): ?>
            .content-wrapper {
                background-image: url("<?php echo get_option('background') ?>");
                background-attachment: fixed;
                background-position: center;
                background-size: cover;
            }
        <?php endif ?>
    </style>
    <!-- jQuery 2.2.3 -->
    <script src="<?php bloginfo('template_url'); ?>/vendor/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script>
        $(window).load(function () {
            // PAGE IS FULLY LOADED
            // FADE OUT YOUR OVERLAYING DIV
            $('#loader').fadeOut(1000);
        });
    </script>
    <?php wp_head(); ?>
</head>
<body class="hold-transition skin-<?php echo get_option('theme_color') ? get_option('theme_color') : 'blue' ?> <?php echo get_option('theme_layout') ? get_option('theme_layout') : 'fixed' ?> <?php echo get_option('left_menu_check') == 'true' ? 'sidebar-collapse' : '' ?>">
<div id="loader" class="loader-wrap">
    <div class="middle">
        <div class="loader"></div>
    </div>
</div>
<div class="wrapper">

    <header class="main-header">
        <?php if (get_option('theme_layout') == 'layout-top-nav' || get_option('theme_layout') == 'layout-top-nav fixed') : ?>
            <nav class="navbar navbar-static-top">
                <div class="navbar-header">
                    <a href="<?php bloginfo('url'); ?>" class="navbar-brand"><b><?php bloginfo('name'); ?></b></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <?php wp_nav_menu_no_ul() ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <?php if (get_option('panel') == 'true') : ?>
                        <?php endif; ?>
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="<?php echo get_option('logo'); ?>" class="user-image" alt="<?php bloginfo('name'); ?>">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?php bloginfo('name'); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="<?php echo get_option('logo'); ?>" class="img-circle" alt="<?php bloginfo('name'); ?>">

                                    <p>
                                        <?php bloginfo('name'); ?> - <?php echo get_option('info'); ?>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <ul class="list-unstyled list-inline text-center">
                                        <?php if (get_option('facebook') != '') : ?>
                                            <li><a href="<?php echo get_option('facebook'); ?>" target="_blank">
                                                    <i class="fa fa-facebook fa-2x"></i></a></li>
                                        <?php endif; ?>
                                        <?php if (get_option('twitter') != '') : ?>
                                            <li><a href="<?php echo get_option('twitter'); ?>" target="_blank">
                                                    <i class="fa fa-twitter fa-2x"></i></a></li>
                                        <?php endif; ?>
                                        <?php if (get_option('google-plus') != '') : ?>
                                            <li><a href="<?php echo get_option('google-plus'); ?>" target="_blank">
                                                    <i class="fa fa-google-plus fa-2x"></i></a></li>
                                        <?php endif; ?>
                                        <?php if (get_option('pinterest') != '') : ?>
                                            <li><a href="<?php echo get_option('pinterest'); ?>" target="_blank">
                                                    <i class="fa fa-pinterest fa-2x"></i></a></li>
                                        <?php endif; ?>
                                        <?php if (get_option('instagram') != '') : ?>
                                            <li><a href="<?php echo get_option('instagram'); ?>" target="_blank">
                                                    <i class="fa fa-instagram fa-2x"></i></a></li>
                                        <?php endif; ?>
                                        <?php if (get_option('linkedin') != '') : ?>
                                            <li><a href="<?php echo get_option('linkedin'); ?>" target="_blank">
                                                    <i class="fa fa-linkedin fa-2x"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <!-- search form -->
                                    <form action="<?php bloginfo('url'); ?>" method="get" class="sidebar-form">
                                        <div class="input-group">
                                            <input type="text" name="s" class="form-control" placeholder="Search...">
                                            <span class="input-group-btn">
                                                    <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                                                </span>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i> Bar</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-custom-menu -->
            </nav>
        <?php else: ?>
            <!-- Logo -->
            <a href="<?php bloginfo('url'); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b><?php bloginfo('name'); ?></b></span>
                <!-- logo for regular state and mobile devices -->
                <h1 class="logo-lg"><b><?php bloginfo('name'); ?></b></h1>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <?php wp_nav_menu_no_ul() ?>
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i> Bar</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav header-mobile-menu">
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i> Bar</a>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php endif ?>
    </header>
    <?php if (get_option('theme_layout') != 'layout-top-nav' && get_option('theme_layout') != 'layout-top-nav fixed') : ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <?php if (get_option('panel') == 'true') : ?>
                    <div class="pull-left image">
                        <img src="<?php echo get_option('logo'); ?>" class="img-circle"
                             alt="<?php bloginfo('name'); ?>">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo get_option('info'); ?></p>
                        <ul class="list-unstyled list-inline">
                            <?php if (get_option('facebook') != '') : ?>
                                <li><a href="<?php echo get_option('facebook'); ?>" target="_blank"><i
                                                class="fa fa-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if (get_option('twitter') != '') : ?>
                                <li><a href="<?php echo get_option('twitter'); ?>" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if (get_option('google-plus') != '') : ?>
                                <li><a href="<?php echo get_option('google-plus'); ?>" target="_blank"><i
                                                class="fa fa-google-plus"></i></a></li>
                            <?php endif; ?>
                            <?php if (get_option('pinterest') != '') : ?>
                                <li><a href="<?php echo get_option('pinterest'); ?>" target="_blank"><i
                                                class="fa fa-pinterest"></i></a></li>
                            <?php endif; ?>
                            <?php if (get_option('instagram') != '') : ?>
                                <li><a href="<?php echo get_option('instagram'); ?>" target="_blank"><i
                                                class="fa fa-instagram"></i></a></li>
                            <?php endif; ?>
                            <?php if (get_option('linkedin') != '') : ?>
                                <li><a href="<?php echo get_option('linkedin'); ?>" target="_blank"><i
                                                class="fa fa-linkedin"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <!-- search form -->
            <form action="<?php bloginfo('url'); ?>" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="s" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php wp_nav_menu(array('theme_location' => 'sidebar', 'menu_class' => 'sidebar-menu', 'walker' => new Sidebar_Nav_Menu())); ?>
            <div class="ad">
                <?php if (get_option('ad_menu') != '') {
                    echo stripslashes(get_option('ad_menu'));
                } ?>
            </div>
        </section>
        <!-- /.sidebar -->
    </aside>
<?php endif ?>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- row -->
            <?php if (get_option('theme_layout') == 'layout-top-nav' || get_option('theme_layout') == 'layout-top-nav fixed') : ?>
                <div class="container">
            <?php endif ?>
