<?php

function post_tags($page, $mode){
	if($page){
		if($page->tags()){
			$tags=str_replace(' ','',$page->tags());
			$tags=explode(',',$tags);
			$tags_count=count($tags)-1;
			$pt='';
			if($tags_count>-1){
				$i=0;
				foreach($tags as $name){
					if($name!=''){
						$title=tag_title($name);
						if($mode=='inline'){
							$pt.='<a href="/tag?name='.$name.'" title="View all items tagged '.$title.'">'.$title.'</a>';
							if($i==$tags_count-1){
								$pt.='<span class="separator second-last">&amp;</span>';
								$i++;
							}elseif($i==$tags_count){
								$pt.='<span class="separator last">.</span>';
								break;
							}else{
								$pt.='<span class="separator">,</span>';
								$i++;
							}
						}else{
							$pt.='<li><a href="/tag?name='.$name.'" title="View all items tagged '.$title.'">'.$title.'</a></li>';
							$i++;
						}
					}
		    	}
		    }
		    if($pt!=''){
			    if($mode!='inline'){
					$pt='<ul class="tags">'.$pt.'</ul>';
				}else{
					$pt='<span class="separator">in</span>'.$pt;
				}
			}else{
				if($mode=='inline'){
					$pt='<span class="separator last empty">.</span>';
				}
			}
	    	return $pt;
	    }
	}
}

function tag_title($name) {
	if (strlen($name) <= 3 && $name != 'art' && $name != 'mac') {
		$title = strtoupper($name);
	} else {
		if ($name == 'upcomingtasks') {
			$title = 'UpcomingTasks';
		} elseif ($name == 'javascript') {
			$title = 'JavaScript';
		} elseif ($name == 'windowsphone') {
			$title = 'Windows Phone';
		} else {
			$title = ucfirst($name);
		}
	}
	return $title;
}

?>
