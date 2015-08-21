<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="{{App::getLocale()}}" ng-app="omeApp" class="ie6 ie"> <![endif]-->
<!--[if IE 7 ]>    <html lang="{{App::getLocale()}}" ng-app="omeApp" class="ie7 ie"> <![endif]-->
<!--[if IE 8 ]>    <html lang="{{App::getLocale()}}" ng-app="omeApp" class="ie8 ie"> <![endif]-->
<!--[if IE 9 ]>    <html lang="{{App::getLocale()}}" ng-app="omeApp" class="ie9 ie"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="{{App::getLocale()}}" ng-app="omeApp"> <!--<![endif]-->

	<head>
		<title>{!!$title or 'Oh My English! Class of 2015 - Astro'!!}</title>
		<meta charset="UTF-8">

		<link rel="shortcut icon" href="/favicon.ico">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
		<meta name="robots" content="index,follow">
		<meta name="googlebot" content="NOODP">
	    <!-- Open Graph data -->
	    @yield('meta_include')
		<link rel="stylesheet" href="/templates/seasons/nav/css/navigation/main.css" media="all" />
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
		@yield('css_include')

		<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

		<!--modernizr-->
		<script src="/templates/seasons/nav/js/modernizr/modernizr.custom.54506.js"></script>
		<!--strip interactions-->
		<script type="text/javascript" src="/templates/seasons/nav/js/menu/networkstrip2014_jquery.js"></script>
        <script type='text/javascript' src="https://astrocontent.s3.amazonaws.com/AstroContent/Astro_Mini_Nav/js/jquery-1.11.1.min.js"></script><!-- Jquery needed -->
        <script type='text/javascript' src="https://astrocontent.s3.amazonaws.com/AstroContent/Astro_Mini_Nav/js/amn_jquery.js"></script><!-- Astro Mini Bar script -->



		<script type='text/javascript'>
			(function() {
           	var useSSL = 'https:' == document.location.protocol;
           	var src = (useSSL ? 'https:' : 'http:') + '//www.googletagservices.com/tag/js/gpt.js';
           	document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
           	})();
		</script>
		<!-- banner 300x250 -->
		<script type='text/javascript'>
			googletag.cmd.push(function() {
			googletag.defineSlot('/4271715/ACM_OhMyEnglish_300x250', [300, 250], 'div-gpt-ad-1399458227946-0').addService(googletag.pubads());
			googletag.pubads().enableSingleRequest();
			googletag.enableServices();
			});
		</script>

		<!-- banner 728x90 -->
		<script type='text/javascript'>
		  googletag.cmd.push(function() {
		    googletag.defineSlot('/4271715/ACM_OhMyEnglish_728x90', [728, 90], 'div-gpt-ad-1428392658884-0').addService(googletag.pubads());
		    googletag.pubads().enableSingleRequest();
		    googletag.pubads().enableSyncRendering();
		    googletag.enableServices();
		  });
		</script>

		<!-- banner 468x60 -->
		<script type='text/javascript'>
		  googletag.cmd.push(function() {
		    googletag.defineSlot('/4271715/ACM_OhMyEnglish_468x60', [468, 60], 'div-gpt-ad-1428392544777-0').addService(googletag.pubads());
		    googletag.pubads().enableSingleRequest();
		    googletag.enableServices();
		  });
		</script>
		<!-- banner 320x50 -->
		<script type='text/javascript'>
		  googletag.cmd.push(function() {
		    googletag.defineSlot('/4271715/ACM_OhMyEnglish_320x50', [320, 50], 'div-gpt-ad-1428392414442-0').addService(googletag.pubads());
		    googletag.pubads().enableSingleRequest();
		    googletag.pubads().enableSyncRendering();
		    googletag.enableServices();
		  });
		</script>
		<!-- banner 750x550 -->
		<script type='text/javascript'>
		  googletag.cmd.push(function() {
		    googletag.defineSlot('/4271715/ACM_OhMyEnglish_STORedirect_750x550', [750, 550], 'div-gpt-ad-1428395422463-0').addService(googletag.pubads());
		    googletag.pubads().enableSingleRequest();
		    googletag.pubads().enableSyncRendering();
		    googletag.enableServices();
		  });
		</script>




	</head>
	<body class="{{$page or ''}} {{$subPage or ''}}" >
		<!-- <h1 class="hide">Oh My English! Class of 2015</h1> -->
		<!-- Google Tag Manager TAG0269/Astro/Izura/Astro Digital/Google/17122013 -->
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id={{Config::get('app.gtm')}}"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','{{Config::get('app.gtm')}}');</script>
        <!-- End Google Tag Manager TAG0269/Astro/Izura/Astro Digital/Google/17122013 -->

		<!-- code is as follows: acmMiniNav(<insert maximum page width in pixels>); -->
		<script>acmMiniNav(1000);</script>

		<!-- Begin main content -->
		<div class="master {{$withSkinner or ''}}">
			<!-- header -->
			<header class="ome">
	            <div class="container">
	                <img class="logo" src="{{ asset('assets/images/ome_logo.png') }}" alt="Oh My English!" />
	            </div>
	        </header>
	        <section id="menu-title" class="menu-title">
	            <a href="#" id="btn-menu-drop-down" class="drop-down-trigger"><i class="fa fa-arrow-down"></i></a>
	            <span>{{$pageTitle or 'Oh My English!'}}</span>
	        </section>
	        <nav id="nav" class="ome">
	            <div class="container">
	                <ul class="menu">
	                    <li class="home"><a class="home" href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.home'))}}">{{trans('global.home_menu')}}</a></li>
	                    <li class="dropdown-menu"><a class="about" href="javascript:;" >{{trans('global.about_menu')}}</a>
                            <ul class="sub-navi">
                                <li><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.about_show'))}}" class="show">{{trans('global.show_menu')}}</a></li>
                               <li><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.about_characters'))}}" class="characters">{{trans('global.character_menu')}}</a></li>
                               <li><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.about_trailers'))}}" class="trailers">{{trans('global.trailer_menu')}}</a></li>
                            </ul>
                        </li>
	                    <li class="dropdown-menu"><a class="learn" href="javascript:;" >{{trans('global.learn_menu')}}</a>
	                    	<ul class="sub-navi">
	                    		<li><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.learn_exercise'))}}" class="classroom-exercises">{{trans('global.exercise_menu')}}</a></li>
                                <li><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.learn_ask_henry'))}}" class="ask-henry">{{trans('global.ask_henry_menu')}}</a></li>
                               <li><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.learn_pop_quiz'))}}" class="pop-quiz">{{trans('global.pop_quiz_menu')}}</a></li>
                               <li><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.learn_article'))}}" class="article">{{trans('global.learn_article')}}</a></li>
                               <li><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.learn_generic_quiz'))}}" class="generic-quiz">{{trans('global.learn_generic_quiz')}}</a></li>
                            </ul>
	                    </li>
	                    <li class="dropdown-menu"><a class="play" href="javascript:;" >{{trans('global.play_menu')}}</a>
	                    	<ul class="sub-navi">
	                    		<li><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.play_dash_coin'))}}" class="dash-coin">{{trans('global.play_dash_coin')}}</a></li>
	                    		<li><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.play_feed_henry'))}}" class="feed-henry">{{trans('global.feed_henry_menu')}}</a></li>
	                    		<li><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.play_spy_leader'))}}" class="spy-leader">{{trans('global.spy_leader_menu')}}</a></li>
	                    		<li><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.play_football_fever'))}}" class="football-fever">{{trans('global.football_fever_menu')}}</a></li>
	                    		<li><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.play_super_typer'))}}" class="super-typer">{{trans('global.super_typer_menu')}}</a></li>
	                    		<li><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.play_protect_princess'))}}" class="protect-princess">{{trans('global.protect_princess_menu')}}</a></li>
                            </ul>
	                    </li>
	                    <li><a class="social" href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.social_buzz'))}}" >{{trans('global.social_buzz_menu')}}</a></li>
	                </ul>
	                <div class="sub-menu">
		                <ul class="social-bookmark">
		                    <li><a class="ico twitter" target="_blank" href="https://twitter.com/oh_my_english">
		                        <i class="fa fa-twitter"></i></a></li>
		                    <li><a class="ico facebook" target="_blank" href="https://www.facebook.com/OhMyEnglish"><i class="fa fa-facebook"></i></a></li>
		                    <li><a class="ico youtube" target="_blank" href="https://www.youtube.com/user/OhMyEnglishTV"><i class="fa fa-youtube-play"></i></a></li>
		                    <li><a class="ico instagram" target="_blank" href="https://instagram.com/ohmyenglish"><i class="fa fa-instagram"></i></a></li>
		                </ul>
		                <ul class="lang-sel">
		                    <li><a href="{{$switch_en}}" class="en">EN</a></li>
		                    <li><a href="{{$switch_ms}}" class="ms">BM</a></li>
		                </ul>
		            </div>
	                <div class="clear"></div>
	            </div>
	        </nav>
			<!-- header -->



			<!-- Begin content -->
			<div class="content">
				<!-- /4271715/ACM_OhMyEnglish_STORedirect_750x550 -->
				<div class="sto-redirect">
					<div id='div-gpt-ad-1428395422463-0' style='height:550px; width:750px;'>
					<script type='text/javascript'>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1428395422463-0'); });
					</script>
					</div>
				</div>
                @if ($displayLbBanner or 0)
                	<!-- 728x90 -->
					<div class="lbBanner">
						<div id='div-gpt-ad-1428392658884-0' style='height:90px; width:100%;'><!-- 728px -->
							<script type='text/javascript'>
							googletag.cmd.push(function() { googletag.display('div-gpt-ad-1428392658884-0'); });
							</script>
						</div>
					</div>
					<!-- 468x60 -->
					<div class="mhBanner">
		                <div id='div-gpt-ad-1428392544777-0' style='height:60px; width:468px;'>
							<script type='text/javascript'>
							googletag.cmd.push(function() { googletag.display('div-gpt-ad-1428392544777-0'); });
							</script>
						</div>
					</div>
					<!-- 320x50 -->
					<div class="mvBanner">
		                <div id='div-gpt-ad-1428392414442-0' style='height:50px; width:320px;'>
							<script type='text/javascript'>
							googletag.cmd.push(function() { googletag.display('div-gpt-ad-1428392414442-0'); });
							</script>
						</div>
					</div>
                @endif

                @if ($displayLeftSkinner or 0)
					<div class="leftSkinner">
						<!-- insert left skinner banner here -->
						<div id='div-gpt-ad-1428392658884-0' style='height:650px; width:200px;'>
							<script type='text/javascript'>
							googletag.cmd.push(function() { googletag.display('div-gpt-ad-1428392658884-0'); });
							</script>
						</div>
					</div>
                @endif

                @if ($displayRightSkinner or 0)
					<div class="rightSkinner">
						<!-- insert right skinner banner here -->
						<div id='div-gpt-ad-1428392658884-0' style='height:650px; width:200px;'>
							<script type='text/javascript'>
							googletag.cmd.push(function() { googletag.display('div-gpt-ad-1428392658884-0'); });
							</script>
						</div>
					</div>
                @endif



				<!-- banner -->
				<div class="innerContent">
				@yield('content')
				</div>
			</div>
			<!-- End content -->

		</div>
		<!-- End main content -->

		<!--Begin Footer-->
	    <div class="responsive-footer-holder">
	        <div class="footer-shadow-holder"></div>
	        <!--Begin Responsive Footer Link Holder-->
	        <div class="responsive-footer-link-holder">
	            <div class="responsive-footer-link">

	                <div class="quicklinks">
	                    <h5>QUICKLINKS</h5>
	                    <a href="http://www.astro.com.my/onthego/index.html"><h5><span>Astro on the Go</span></h5></a>
	                    <a href="http://www.astro.com.my/whats-on/mobiletvguide/index.html#/"><h5><span>TV Guide</span></h5></a>
	                    <a href="http://www.astro.com.my/shop.aspx"><h5><span>Shop</span></h5></a>
	                    <a href="http://www.astro.com.my/byond"><h5><span>Astro Products and Services</span></h5></a>
	                    <a href="http://www.astro.com.my/whats-on/channels"><h5><span>Channels</span></h5></a>
	                    <a href="http://www.astro.com.my/astrocircle"><h5><span>Astro Circle</span></h5></a>
	                </div>

	                <div class="support">
	                    <h5>SUPPORT</h5>
	                    <a href="http://support.astro.com.my/LocateBranches.aspx"><h5><span>Locate Branches</span></h5></a>
	                    <a href="http://support.astro.com.my/HelpCenter.aspx"><h5><span>Help Center</span></h5></a>
	                    <a href="https://support.astro.com.my/MyProfileAccount/MyAccount.aspx"><h5><span>My Account</span></h5></a>
	                    <a href="http://support.astro.com.my/FeedbackForm.aspx"><h5><span>Feedback Form</span></h5></a>
	                </div>

	                <div class="about">
	                    <h5>ABOUT US</h5>
	                    <a href="http://www.astro.com.my/portal/about-astro/index.html"><h5><span>About Us</span></h5></a>
	                    <a href="http://www.astro.com.my/careers"><h5><span>Careers @ Astro</span></h5></a>
	                    <a href="http://www.astro.com.my/mediaroom"><h5><span>Media Room</span></h5></a>
	                    <a href="http://www.astromalaysia.com.my/"><h5><span>AMH Investor Relations</span></h5></a>
	                </div>

	                <div class="assist-holder">
	                    <div class="assist">
	                        <h5>NEED ASSISTANCE?</h5>
	                        <p>Please contact Astro Via<p>
	                        <a href="http://support.astro.com.my/FeedbackForm.aspx">FEEDBACK FORM</a>
	                        <a href="http://support.astro.com.my/HelpCenter/ContactUs.aspx">MORE OPTIONS</a>
	                    </div>
	                </div>

	                <div class="mcmc-holder">
	                    <a href="http://www.consumerinfo.my/" target="_blank"><img src="http://www.astro.com.my/networkstrip/img/mcmc.png" border="0" alt="mcmc banner"></a>
	                </div>

	                <div class="copyright-holder">
	                    Copyright &copy; 2015. Measat Broadcast Network Systems Sdn Bhd (240064-A). All Rights Reserved.<br/>
	                    Contact us at: Measat Broadcast Network Systems,
	                    All Asia Broadcast Centre, Technology Park Malaysia ,
	                    Lebuhraya Puchong-Sg. Besi, Bukit Jalil, 57000 Kuala Lumpur.
	                    Tel: 03 - 9543 3838
	                </div>

	                <div class="footer-social-holder">
	                    <a href="http://twitter.com/#!/astroonline">
	                        <div class="footer-twitter">
	                        </div>
	                    </a>
	                    <a href="http://www.facebook.com/Astro">
	                        <div class="footer-fb">
	                        </div>
	                    </a>
	                </div>

	            </div>

	            <!-- Begin responsive header strip holder -->
	            <div class="responsive-footer-strip-holder">
	                <div class="responsive-footer-strip">

	                    <div class="nav">
	                        <ul>
	                            <li><a href="http://www.astro.com.my/portal/sitemap-3/index.html"><h5>Sitemap</h5></a></li>
	                            <li><a href="http://www.astro.com.my/portal/privacy-policy-2/index.html"><h5>Privacy Policy</h5></a></li>
	                            <li><a href="http://www.astro.com.my/portal/privacy-notice/index.html"><h5>Privacy Notice</h5></a></li>
	                            <li><a href="http://www.astro.com.my/portal/terms-conditions/index.html"><h5>Astro Website Terms of Use</h5></a></li>
	                            <li><a href="http://www.astro.com.my/portal/subscriber-terms-conditions-2/index.html"><h5>Subscriber Terms &amp; Conditions</h5></a></li>
	                            <li><a href=""><h5>Copyright &copy; 2015. All Rights Reserved.</h5></a></li>
	                        </ul>
	                    </div>

	                </div>
	            </div>
	            <!-- End responsive header strip holder -->

	        </div>
	        <!--End Responsive Footer Link Holder-->

	    </div>
         <!-- Add Back to Top Button !-->
        <a href="#0" class="cd-top">Top</a>
        <!-- End Back to Top Button !-->

	    <!--End Footer-->
		<script type="text/javascript">
			var OME = OME || {};
			OME.language = "{{App::getLocale()}}";
			OME.fbAppId = "{{\Config::get('app.facebook_app_id')}}";
			OME.isIe = "{{trans('global.isIe')}}"

		</script>
		<!-- <script src="/templates/seasons/nav/js/menu/loginwidget2014_2.js"></script> -->
		<script type="text/javascript" src="/templates/seasons/nav/js/jquery.bbq.js"></script>
		<script type="text/javascript" src="/templates/seasons/nav/js/jquery.cookies.js"></script>
		<script type="text/javascript" src="/templates/seasons/nav/js/underscore-min.js"></script>
		<script type="text/javascript" src="/templates/seasons/nav/js/backbone-min.js"></script>
		<script type="text/javascript" src="/templates/seasons/nav/js/ssocontroller.js"></script>


		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script><!-- CSS prefix -->

    	<script type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>
    	<script type="text/javascript" src="{{ asset('assets/js/global.js') }}"></script>
		@yield('javascript_include')


	</body>
</html>