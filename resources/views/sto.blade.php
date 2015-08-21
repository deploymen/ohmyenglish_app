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
		<meta name="robots" content="noindex,nofollow">
		<meta name="googlebot" content="NOODP">
	    <!-- Open Graph data -->
	    @yield('meta_include')
	    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
		<style type="text/css">
		.btn-close{
	    width: 30px;
	    height: 30px;
	    display: inline-block;
	    border-radius: 50%;
	    border: 5px solid #FFFFFF;
	    color: #FFFFFF;
	    position: absolute;
	    right: -20px;
	    top: -20px;
	    background: #000000;
		font-size: 20px;
		text-align: center;
		z-index: 10
		}
		.btn-close:hover{color: #999999; border-color: #999999}
		</style>
		@yield('css_include')

		



		<script type='text/javascript'>
			(function() {
           	var useSSL = 'https:' == document.location.protocol;
           	var src = (useSSL ? 'https:' : 'http:') + '//www.googletagservices.com/tag/js/gpt.js';
           	document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
           	})();
		</script>
		
		<!-- banner 750x550 -->
		<script type='text/javascript'>
		  googletag.cmd.push(function() {
		    googletag.defineSlot('/4271715/ACM_OhMyEnglish_STOCreative_750x550', [750, 550], 'div-gpt-ad-1428392769486-0').addService(googletag.pubads());
		    googletag.pubads().enableSingleRequest();
		    googletag.pubads().enableSyncRendering();
		    googletag.enableServices();
		  });
		</script>




	</head>
	<body class="{{$page or ''}} {{$subPage or ''}}" style="background:url({{ asset('assets/images/bg_sto.jpg') }});" >
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

		<!-- Begin main content -->

		<!-- banner -->
		<div class="sto">
		<!-- insert STO banner here -->
			<div class="adplacement"><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.home'))}}" class="btn-close"><i class="fa fa-close"></i></a>
				<div id='div-gpt-ad-1428392769486-0' style='height:550px; width:750px;'>
					<script type='text/javascript'>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1428392769486-0'); });
					</script>
				</div>
			</div>
		</div>



	</body>
</html>