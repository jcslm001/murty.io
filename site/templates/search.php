<?php snippet('header') ?>
<article class="search">
	<?php
	$field_value = '';
	if(get('term')){
	    $results = $site->search(get('term'))->visible();
		$field_value = get('term');
	}
	?>
	<form action="<?php echo str_replace('http://brendan.murty.id.au', '', thisURL()) ?>" name="searchform" id="searchform">
		<input type="text" class="text" value="<?= $field_value ?>" name="term" onclick="this.select();" />
		<a class="button" href="#" onclick="searchform.submit();return false;"><span class="fa fa-search"></span></a>
	</form>
	<?php
	if($results){
	?>
	<ul class="item-listing item-listing-search grid">
	  <?php
	  $s = '';
	  foreach($results as $item){
	  	$item_type=explode('/',$item->uri());
		$item_type=$item_type['0'];
		$item_date=$item->date('j M y');
		$link_description='Read the full length post';
		$icon='file-text';
		$item_footer='Posted '.$item_date;
		if($item_type=='link'){
			$link_description='View this link\'s details';
			$icon='link';
		}else{
			if($item_type!='post'){
				$item_type='page';
				$item_footer='Page';
			}
		}
		$s.='<li class="'.$item_type.'"><a href="'.$item->url().'" title="'.$link_description.'"><span class="summary">'.html($item->title());
		if($item_type=='link'){
			$s.=': '.excerpt(html($item->text()),50);
		}else{
			$s.=': '.excerpt($item->text(),50);
		}
		$s.='</span><span class="label"><span class="fa fa-'.$icon.'"></span>'.$item_footer.'</span></a></li>';
	  }
	  echo $s;
	  ?>
	</ul>
	<?php
	} else {
		if ($field_value) {
		    echo '<p class="item-listing-search-empty">No results found.</p>';
		}
	}
	?>
</article>
<?php snippet('footer') ?>
