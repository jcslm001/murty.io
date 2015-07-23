<?

function page_description($page_object) {
	// Extract the page type from the URL
	$item_type = explode('/', $page_object->uri())['0'];

	if ($item_type == 'posts') {
		$description = 'Blog posts by written by Brendan';
	} elseif ($item_type == 'search') {
		$description = 'Search posts and pages';
	} elseif ($item_type == 'home') {
		$description = 'A passionate Sydney based web developer';
	} else {
		// Extract and remove links and image embeds from the page content
		$description = preg_replace('/\[(.*)\]/', '$1', $page_object->content()->text());
		$description = preg_replace('/\(\/assets\/images\/(.*)\)/i', '', $description);
		$description = preg_replace('/\((.*)\)/i', '', $description);
		$description = preg_replace('/\*(.*)\*/i', '', $description);

		// Trim the content to 100 characters
		$description = mb_substr($description, 0, 97) . '...';
	}

	// Only include alphanumeric and some symbols
	$description = preg_replace("/[^a-zA-Z0-9\.\,\?\s]/", "", $description);

	return $description;
}

function page_thumbnail($page){
	if($page){
		if($page->thumbnail()){
	    	return '<span class="image"><img src="/assets/images/thumbnails/'.$page->thumbnail().'" height="100" width="100" /></span>';
	    }else{
	   		return '<span class="image default"><img src="/assets/images/common/brendan_murty.jpg" height="100" width="100" /></span>';
	   	}
	}
}

function page_first_image($default,$page_object){
	if($page_object->parent()){
		if($page_object->parent()->title()=='Post'){
			$o=preg_match_all('/\(\/assets\/images\/(.*)\)/i',$page_object->content()->text(),$matches);
			if($matches[0]){
				if($matches[0][0]!=''){
					$p='http://brendanmurty.com'.preg_replace('/\((.*)\)/','$1',$matches[0][0]);
				}
			}
		}
	}
	if(!isset($p)){ $p = $default; }
	return $p;
}

function page_title($default_title, $page_object, $site_object ){
	if(param('tag')){
		$t='Tagged '.tag_title(param('tag')).' - '.html($site_object->title());
	}elseif(html($page_object->title())=='Home'){
		$t=html($site_object->title());
	}elseif(isset($_GET['term'])&&$_GET['term']!=''){
		$t='Search for '.$_GET['term'].' - '.html($site_object->title());
	}elseif($site_object->uri()->path()->first()=='link'){
		$t='Link: '.html($page_object->title()).' - '.html($site_object->title());
	}elseif($site_object->uri()->path()->first()=='post'){
		$t='Post: '.html($page_object->title()).' - '.html($site_object->title());
	}
	if(!isset($t)) $t = $default_title;
	return $t;
}

function page_type($page_object){
	$type = 'default';
	if($page_object->parent()){
		if($page_object->parent()->title()=='Posts'){
			$type = 'post';
		}
	}elseif($page_object->uri()=='resume' || $page_object->uri()=='terms'){
		$type = 'formal';
	}else{
		if(param('tag')){
			$type = 'tag-list';
		}elseif($page_object->title()=='Home'){
			$type = 'home';
		}
	}
	return $type;
}

function page_count($pages_object, $type='post'){
	$c='';
	if($type=='post'){
		$c=$pages_object->find('post/')->children()->countVisible();
	}elseif($type=='link'){
		$c=$pages_object->find('link/')->children()->countVisible();
	}
	return $c;
}

?>
