<?

// Site settings and general variables
$css_update_date = "20141212a";
$js_update_date = "20140906a";
$nl = "\r\n";
$page_type = "";
$page_name = "";

// Add common files
snippet('auth');
snippet('libs_general');
snippet('libs_tags');
snippet('libs_page');
snippet('libs_list');
snippet('libs_twitter');

// Extract the details of this page
$page_title=page_title(html($page->title()).' - '.html($site->title()),$page,$site);
$page_description=page_description(html($site->description()),$page);
$page_image=page_first_image('http://brendanmurty.com/assets/images/common/brendan-murty.jpg',$page);
$page_image=page_first_image('http://brendanmurty.com/assets/images/common/brendan-and-isla.jpg',$page);
$page_type=page_type($page);
$page_name=$site->uri()->path()->first();
if($page_name=='') $page_name = 'home';

// Tweaks to the body tag
$body_extra='';
if($page_type!='legal'){
	if($page->title()=='Find'&&!isset($_GET['term'])){
		$body_extra.=' onload="document.forms.searchform.term.focus();"';
	}
}

// Add a type class to the body
$body_extra.=' class="type_'.$page_type.' name_'.$page_name;
if(is_dev()) $body_extra.=' dev';
$body_extra.='"';

// Redirect post and link empty item pages
if($page->title()=='Post'){ go('/posts'); }
if($page->title()=='Link'){ go('/links'); }

// Setup about text for the header and customise page titles
$header_about_content = '<h2>'.html($page->title()).'</h2>';
if($page_type=='home'){
	$header_about_content='';
}elseif(param('tag')){
	$header_about_content='<h2 class="lighter">Tagged <em>'.tag_title(param('tag')).'</em></h2>';
}elseif($page_name=='about' || $page_name=='contact'){
	$header_about_content = '<h2>'.ucfirst($page_name).' Brendan</h2>';
}elseif($page_name=='link'){
	$header_about_content='<h2 class="lighter">Link: <em>'.html($page->title()).'</em></h2>';
}elseif($page_name=='post'){
	$header_about_content='<h2 class="lighter">Post: <em>'.html($page->title()).'</em></h2>';
}elseif(isset($_GET['term'])&&$_GET['term']!=''){
	$header_about_content = '<h2 class="lighter">Search for <em>'.$_GET['term'].'</em></h2>';
}

// Setup the site subheading
$header_subheader_content = '<span>'.html($site->description()).'</span>';
if($page_type=='legal'){
	$header_subheader_content = '';
}

// Setup the robots Meta Tag content
$page_meta_robots = "noindex,follow";
if($page->isVisible() || $page_name=="home" || $page_name=="links"){
	$page_meta_robots = "index,follow";
}

?><!DOCTYPE html>
<html lang="en">
<head>
<title><?= $page_title ?></title>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="author" content="<?php echo $site->author() ?>">
<meta name="description" content="<?= $page_description ?>" />
<meta name="robots" content="<?= $page_meta_robots ?>" />
<meta name="handheldfriendly" content="true">
<meta name="mobileoptimized" content="480">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
<meta name="google-site-verification" content="PDu5txmerBIQFL25egiXIxNeijFAFkVAH88blb0nGcU" />
<meta name="p:domain_verify" content="bc7a37f5bb3bd7ed682192fab9cecd32"/>
<meta property="og:locale" content="en_GB" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?= $page_title ?>" />
<meta property="og:description" content="<?= $page_description ?>" />
<meta property="og:url" content="<?php echo html($page->url()) ?>" />
<meta property="og:image" content="<?= $page_image ?>" />
<link href="http://fonts.googleapis.com/css?family=Merriweather:400,700|Merriweather+Sans:400,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" media="only screen" href="/assets/styles/screen.css?v=<?= $css_update_date ?>" />
<link rel="stylesheet" media="only print" href="/assets/styles/print.css?v=<?= $css_update_date ?>" />
<link rel="stylesheet" href="/assets/styles/font-awesome.min.css" />
<link rel="shortcut icon" href="/assets/images/common/favicon.png">
<link rel="apple-touch-icon-precomposed" href="/assets/images/common/apple-touch-icon-precomposed.png">
<link rel="alternate" type="application/rss+xml" href="<?php echo url('/feed.xml') ?>" title="Brendan Murty" />
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
(function(){
	if("-ms-user-select" in document.documentElement.style && navigator.userAgent.match(/IEMobile\/10\.0/)){
		var msViewportStyle = document.createElement("style");
		msViewportStyle.appendChild(
			document.createTextNode("@-ms-viewport{width:auto !important;height:auto !important}")
		);
		document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
	}
})();
</script>
<? echo js('assets/scripts/brendanmurty.js?v='.$js_update_date); ?>
</head>
<body<?php echo $body_extra ?>>
	<section id="container">
		<header>
			<h1>
				<a href="http://brendanmurty.com/" title="Go to the home page"><?php echo html($site->title()) ?></a>
				<?php if($header_subheader_content!='') echo $header_subheader_content; ?>
			</h1>
			<a class="profile" href="/about" title="Learn more about Brendan"><img src="/assets/images/common/brendan-and-isla.jpg" alt="Image of Brendan Murty"></a>
		</header>
		<nav><?php echo list_pages($pages,$site) ?></nav>
		<?php if($header_about_content!='') echo '<section id="about">'.$header_about_content.'</section>'; ?>
		<section id="content">
