<?

function page_description($default,$page_object){
	$item_type=explode('/',$page_object->uri());
	$item_type=$item_type['0'];
	if($item_type=='post'){
		$d=preg_replace('/\[(.*)\]/','$1',$page_object->content()->text());
		$d=preg_replace('/\(\/assets\/images\/(.*)\)/i','',$d);
		$d=preg_replace('/\((.*)\)/i','',$d);
		$d=preg_replace('/\*(.*)\*/i','',$d);
		$d=mb_substr($d,0,97).'...';
	}elseif($item_type=='link'){
		$d=$page_object->content()->text();
		$d=mb_substr($d,0,97).'...';
	}
	if(!isset($d)){ $d = $default; }
	return $d;
}

function page_thumbnail($page){
	if($page){
		if($page->thumbnail()){
	    	return '<span class="image"><img src="/assets/images/thumbnails/'.$page->thumbnail().'" height="100" width="100" /></span>';
	    }else{
	   		return '<span class="image default"><img src="/assets/images/common/brendan-murty.jpg" height="100" width="100" /></span>';
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
