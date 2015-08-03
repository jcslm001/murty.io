<?php
$css_update_date = "20150722";
$js_update_date = "20140906";

snippet('auth');
snippet('libs_general');
snippet('libs_tags');
snippet('libs_page');
snippet('libs_list');
snippet('libs_twitter');

$page_title = page_title(html($page->title()).' - '.html($site->title()), $page, $site);
$page_description = page_description($page);
$page_image = page_first_image('http://brendanmurty.com/assets/images/common/brendan_murty.jpg', $page);
$page_type = page_type($page);
$page_name = $site->uri()->path()->first();
if (!$page_name) {
	$page_name = 'home';
}

$body_extra = '';
if($page->title() == 'Find' && !isset($_GET['term'])){
	// Focus the search field on the search page
	$body_extra.=' onload="document.forms.searchform.term.focus();"';
}
$body_extra .= ' class="type_' . $page_type . ' name_' . $page_name . '"';

// Redirect "/post" to "/posts" when a certain post isn't requested
if ($page_name == "post" && $page->title() == "Post") {
	go("posts");
}

// Setup about text for the header and customise page titles
$header_about_content = '<h2>'.html($page->title()).'</h2>';
if ($page_type == 'home' || $page_name == 'resume') {
	$header_about_content = '';
} elseif (param('tag')) {
	$header_about_content='<h2 class="lighter">Tagged <em>' . tag_title(param('tag')) . '</em></h2>';
} elseif ($page_name == 'about' || $page_name == 'contact') {
	$header_about_content = '<h2>' . ucfirst($page_name) . ' Brendan</h2>';
} elseif ($page_name == 'link') {
	$header_about_content = '<h2 class="lighter">Link: <em>' . html($page->title()) . '</em></h2>';
} elseif ($page_name == 'post') {
	$header_about_content='<h2 class="lighter">Post: <em>' . html($page->title()) . '</em></h2>';
} elseif (isset ($_GET['term']) && $_GET['term'] != '') {
	$header_about_content = '<h2 class="lighter">Search for <em>' . $_GET['term'] . '</em></h2>';
}

// Only index page content for visible and main pages
$page_meta_robots = "noindex,follow";
if($page->isVisible() || $page_name == "home"){
	$page_meta_robots = "index,follow";
}
?><!DOCTYPE html>
<html lang="en">
<head>
<title><?= $page_title ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="<?= $site->author() ?>">
<meta name="description" property="og:description" content="<?= $page_description ?>">
<meta name="robots" content="<?= $page_meta_robots ?>">
<meta name="handheldfriendly" content="true">
<meta name="mobileoptimized" content="480">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
<meta name="theme-color" content="#2B9CB2">
<meta name="google-site-verification" content="PDu5txmerBIQFL25egiXIxNeijFAFkVAH88blb0nGcU">
<meta name="p:domain_verify" content="bc7a37f5bb3bd7ed682192fab9cecd32">
<meta property="og:locale" content="en_gb">
<meta property="og:type" content="article">
<meta property="og:title" content="<?= $page_title ?>">
<meta property="og:url" content="<?= html($page->url()) ?>">
<meta property="og:image" content="<?= $page_image ?>">
<link href="http://fonts.googleapis.com/css?family=Merriweather:400,700|Merriweather+Sans:400,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/assets/styles/brendanmurty.css?v=<?= $css_update_date ?>">
<link rel="stylesheet" href="/assets/styles/font-awesome.min.css">
<link rel="shortcut icon" href="/assets/images/common/favicon.png">
<link rel="apple-touch-icon-precomposed" href="/assets/images/common/apple-touch-icon-precomposed.png">
<link rel="alternate" type="application/rss+xml" href="<?= url('/feed.xml') ?>" title="Brendan Murty">
<!--[if lt IE 9]>
<script>
document.createElement('header');
document.createElement('nav');
document.createElement('section');
document.createElement('article');
document.createElement('aside');
document.createElement('footer');
document.createElement('hgroup');
</script>
<![endif]-->
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-710527-4']);
_gaq.push(['_trackPageview']);
(function(){
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
<? echo js('assets/scripts/brendanmurty.js?v='.$js_update_date); ?>
</head>
<body<?php echo $body_extra ?>>
	<section id="container">
		<nav class="pages">
			<?php echo list_pages($pages,$site) ?>
		</nav>

		<?php if ($page_type == 'home' || $page_name == 'resume') { ?>
		<header>
			<a class="profile" href="/about" title="Learn more about me">
				<img src="/assets/images/common/brendan_murty.jpg" height="200" width="200" />
			</a>

			<h2>Web Developer</h2>

			<?php if ($page_name == 'resume') { ?>
			<h3>Over five years of commercial experience.<h3>
			<?php } else { ?>
			<h3>Over five years of commercial <a href="/about" title="Learn more about me">experience</a>.<h3>
			<ul class="social">
				<li>
					<a href="mailto:brendan@brendanmurty.com" title="Send me an email"><span class="fa fa-envelope"></span></a>
				</li>
				<li>
					<a href="https://github.com/brendanmurty" title="View my code on GitHub"><span class="fa fa-github"></span></a>
				</li>
				<li>
					<a href="https://twitter.com/brendanmurty" title="View my Twitter profile"><span class="fa fa-twitter"></span></a>
				</li>
				<li>
					<a href="https://instagram.com/brendan.murty" title="View my Instagram posts"><span class="fa fa-instagram"></span></a>
				</li>
				<li>
					<a href="http://www.last.fm/user/brendanmurty" title="See my music statistics on Last.fm"><span class="fa fa-music"></span></a>
				</li>
				<li>
					<a href="http://steamcommunity.com/id/brendanmurty" title="Join me in a game on Steam"><span class="fa fa-gamepad"></span></a>
				</li>
			</ul>
			<?php } ?>
		</header>
		<? } ?>

		<?php if($header_about_content != '') { echo '<section id="about">' . $header_about_content . '</section>'; } ?>

		<section id="content">
