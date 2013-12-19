<?php 	
header ('Content-type: text/html; charset=utf-8');
session_start();
$path =  'images/portfolio/';
$iPath = 'info/Portfolio/';
$tPath = 'images/portfolio/thumbs/';
$height = 188;
$width = 250;
$fileTypes = array('jpg','jpeg','gif','png');
$f = join(',*.', $fileTypes);
$f = '*.'.$f;
	foreach (glob("images/portfolio/{".$f."}", GLOB_BRACE) as $fileName) {
		$files[] = basename(strtolower($fileName));
	}
?>


<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<title>Brad Brothers | Web Development and Design</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="The best part of being a web developer is coming up with creative solutions to interesting problems." />
		<meta name="keywords" content="Web, Design, Development, CSS3, HTML5, jQuery, PHP, mySQL" />
		<meta name="author" content="Brad Brothers" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
	
	<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
		<!-- Home -->
		<section id="home" class="content group">
			<h2>Hello,</h2>
			<p>My name is Brad and I develop websites.</p>
			<p>Like most guys, I enjoy working with the latest and greatest technology has to offer. My prefered tools of choice at the moment are Laravel, Sass, Foundation and AngularJS.</p>
		</section>
		<!-- /Home -->
		
		<!-- Portfolio -->
		<section id="portfolio" class="panel group">
			<div class="content group">
				<h2>Portfolio</h2>
				<p>Some of my recent work:</p>
				<ul id="works" class="group">
					<?php foreach ($files as $file) :
						if ($file != "." && $file != "..") : ?>
    						<li >
        						<a class="lightbox" href="<?php echo $path . $file; ?>" title="<?php echo $file ?>">
        							<img src="<?php echo $tPath . $file; ?>" alt="<?php echo $file ?>" width="250" height="188"/>
        								<?php $info = explode(".", $file);
        										$regex_pattern = "/<a href=\"(.*)\">(.*)<\/a>/";
        										echo ('<div id="'.$info[0].'" class="info">');
        										$info[0] .= '.txt';
        										include $iPath . strtolower($info[0]);
        										echo ('</div>');
        										?>
        						</a>
    						</li>
					   <?php endif;
                    endforeach; ?>
				</ul>
				<p class="footnote">All sites managed by <a href="http://www.citymedia.ca">CityMedia</a>.</p>
			</div>
		</section>
		<!-- /Portfolio -->
		
		<!-- About -->
		<section id="about" class="panel group">
			<div class="content group">
				<h2>About</h2>
				<p>I'm currently living in London, Ontario and working at CityMedia. I build clean, functional interfaces with easy to use content management and responsive layouts.<p> 
				<p>I'm constantly striving to grow and evolve as a developer, I have a genuine passion for coding and coming up with creative solutions to complex problems.</p>
				<div id="imgWrap">
					<img src="images/html5.png" alt="HTML5" title="HTML5" />
					<img src="images/css3.png" alt="css3" title="css3" />
					<img src="images/php.png" alt="PHP" title="PHP" />
					<img src="images/mysql.png" alt="mySQL" title="mySQL" />
					<img src="images/codeigniter.png" alt="Codeigniter" title="Codeigniter" />
					<img src="images/wordpress.png" alt="Wordpress" title="Wordpress" />
				</div>
			</div>
		</section>
		<!-- /About -->
		
		<!-- Contact -->
		<section id="contact" class="panel group">
			<div class="content group">
				<h2>Contact</h2>
				<?php require_once('inc/contact.php'); ?>
			</div>
		</section>
		<!-- /Contact -->
		
		<!-- Header with Navigation -->
		<header id="header">
			<hgroup>
				<h1>Brad Brothers</h1>
				<h2>Web Development and Design</h2>
			</hgroup>

			<nav>
				<ul id="navigation">
					<li><a id="link-home" class="active" href="#home">Home</a></li>
					<li><a id="link-portfolio" href="#portfolio">Portfolio</a></li>
					<li><a id="link-about" href="#about">About</a></li>
					<li><a id="link-contact" href="#contact">Contact</a></li>
				</ul>
			</nav>
		</header>
		<!-- /Header with Navigation -->
		
		<div id="preload">
			<?php foreach ($files as $file){
				if ($file != "." && $file != "..") {?>
					<img src="<?php echo $path . $file; ?>" alt="<?php echo $file ?>" width="1" height="1"/>
			<?php }		}?>
		</div>

	</body>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-19410916-2']);
        _gaq.push(['_trackPageview']);

        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery.min.js"><\/script>')</script>

	<script src="js/scripts.js" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>
	<script>
	$('#navigation').spasticNav();
	
	$('.lightbox').lightbox();
	
	$('#navigation').on('click', 'li a', function(e){
		e.preventDefault();
        var $this = $(this),
            $target = $($this.attr('href')),
            $active = $($('.active').attr('href')+'.panel');
            x = Math.round(Math.random()*3),
            $dir = {};

        $('#navigation a').removeClass('active');
		switch(x) {
			case 0:
				$dir = {'marginTop': '-150%'};
				break;
			case 1:
				$dir = {'marginLeft': '-150%'};
				break;
			case 2:
				$dir = {'marginTop': '150%'};
				break;
			default:
				$dir = {'marginLeft': '150%'};
				break;
		}
		$active.stop().animate($dir);
		$this.addClass('active');
		$target
            .stop()
            .animate({margin : 0},
                {
                    easing : 'easeOutExpo',
                    queue : false
                }
            );
		
	});
	
	</script>
</html>