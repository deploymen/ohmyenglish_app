<!DOCTYPE html>
<html lang="en" ng-app="omeApp">
<head><title>Admin | OME</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <link rel="shortcut icon" href="/templates/admin/images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="/templates/admin/images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/templates/admin/images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/templates/admin/images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet"
          href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet"
          href="/templates/admin/vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="/templates/admin/vendors/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/templates/admin/vendors/bootstrap/css/bootstrap.min.css">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="/templates/admin/css/themes/style1/orange-blue.css" class="default-style">
    <link type="text/css" rel="stylesheet" href="/templates/admin/css/style-responsive.css">
    @yield('css_include')
</head>
<body class=" " ng-controller="GlobalController">
<div ng-controller="MainController">
    <!--BEGIN BACK TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP-->
    <!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar">
        <nav id="topbar" role="navigation" style="margin-bottom: 0; z-index: 2;" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="/admin/" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">OME</span><span style="display: none" class="logo-text-icon">µ</span></a>
            </div>
            <div class="topbar-main">
                <a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <li class="dropdown topbar-user hidden-xs"><a data-hover="dropdown" href="#" class="dropdown-toggle">
                        <span class="hidden-xs">OME Admin</span>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li><a href="javascript:;"><i class="fa fa-user"></i>My Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:;"><i class="fa fa-lock"></i>Setting</a></li>
                            <li><a href="" ng-click="signout();"><i class="fa fa-key"></i>Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!--END TOPBAR-->
    <div id="wrapper"><!--BEGIN SIDEBAR MENU-->
        <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    <li></li>
                    <li><a href="/admin/weeks"><i class="fa fa-cog fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Classroom Exercise</span></a></li>
                    <li><a href="/admin/articles"><i class="fa fa-youtube-play fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Article</span></a></li>
                    <li><a href="/admin/pop-quiz"><i class="fa fa-list fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Pop Quiz</span></a></li>
                    <li><a href="/admin/ask-henry"><i class="fa fa-question-circle fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Ask Henry</span></a></li>
                    <li><a href="/admin/trailer-image"><i class="fa fa-film fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Trailer Image</span></a></li>
                    <li><a href="/admin/trailer-image/detail/en"><i class="fa fa-file-movie-o fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Trailer Image Detail (EN)</span></a></li>
                    <li><a href="/admin/trailer-image/detail/ms"><i class="fa fa-file-movie-o fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Trailer Image Detail (MS)</span></a></li>
                    <li><a href="/admin/home-banner"><i class="fa fa-image fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Home Banner</span></a></li>
                    <li><a href="/admin/home/meet-characters"><i class="fa fa-users fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Home Meet Characters</span></a></li>
                    <li><a href="/admin/about-characters"><i class="fa fa-list-alt fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">About Inner Character</span></a></li>
                </ul>
            </div>
        </nav>
        <!--END SIDEBAR MENU-->
        <!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper">
            <!--BEGIN TITLE & BREADCRUMB PAGE-->@yield('breadcrumb')<!--END TITLE & BREADCRUMB PAGE-->
            <!--BEGIN CONTENT-->
            <div class="page-content">
                <div id="tab-general">
                    @yield('content')
                </div>
            </div>
            <!--END CONTENT-->
        </div>
        <!--BEGIN FOOTER-->
        <div id="footer">
            <div class="copyright">2014 © &mu;Admin - Responsive Multi-Style Admin Template</div>
        </div>
        <!--END FOOTER--><!--END PAGE WRAPPER--></div>
</div>
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/angular/angular.min.js"></script>
<script src="/templates/admin/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/templates/admin/js/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="/templates/admin/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="/templates/admin/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="/templates/admin/js/html5shiv.js"></script>
<script src="/templates/admin/js/respond.min.js"></script>
<script src="/templates/admin/vendors/metisMenu/jquery.metisMenu.js"></script>
<script src="/templates/admin/vendors/slimScroll/jquery.slimscroll.js"></script>
<script src="/templates/admin/vendors/jquery-cookie/jquery.cookie.js"></script>
<script src="/templates/admin/js/jquery.menu.js"></script>
<script src="/templates/admin/vendors/holder/holder.js"></script>
<script src="/templates/admin/vendors/responsive-tabs/responsive-tabs.js"></script>
<script src="/templates/admin/vendors/moment/moment.js"></script>
<!--CORE JAVASCRIPT-->
<script src="/templates/admin/js/main.js"></script>
<script src="/assets/admin/js/global.js"></script>
@yield('javascript_include')
</body>
</html>