<!DOCTYPE html>
<html lang="en" ng-app="omeApp">
<head><title>Sign In | OME</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <!--Loading bootstrap css-->
    <link type="text/css"
          href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="/templates/admin/vendors/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/templates/admin/vendors/bootstrap/css/bootstrap.min.css">
    <!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="/templates/admin/vendors/animate.css/animate.css">
    <link type="text/css" rel="stylesheet" href="/templates/admin/vendors/iCheck/skins/all.css">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="/templates/admin/css/themes/style1/pink-blue.css" class="default-style">
    <link type="text/css" rel="stylesheet" href="/templates/admin/css/style-responsive.css">
    <link rel="shortcut icon" href="/templates/admin/images/favicon.ico">
</head>
<body id="signin-page">
<div class="page-form" ng-controller="MainController">
    <form method="post" class="form">
        <div class="header-content"><h1>Log In {{\Session::get('test1')}}</h1></div>
        <div class="body-content"><p>Log in:</p>
            <div class="form-group username">
                <div class="input-icon right"><i class="fa fa-user"></i><input type="text" placeholder="Username" name="username" class="form-control">
                </div>
            </div>
            <div class="form-group password">
                <div class="input-icon right"><i class="fa fa-key"></i><input type="password" placeholder="Password" name="password" class="form-control">
                </div>
            </div>
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-success" ng-click="signIn()">Log In&nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            </div>
            <div class="clearfix"></div>
    </form>
</div>
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/angular/angular.min.js"></script>
<script src="/assets/js/global.js"></script>
<script src="/assets/admin/js/sign-in.js"></script>
</body>
</html>