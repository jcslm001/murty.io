<?php snippet('header') ?>
<article>
<?
echo markdown($page->text());
if($site->uri()->path()->first()=='resume'){
    // Resumé page
    echo '<a class="email" href="mailto:?subject=Resumé - Brendan Murty&body=Link to resumé: http://brendanmurty.com/resume" title="Email a link to this resumé">Email</a>';
    echo '<a class="print" href="javascript:window.print();" title="Print this resumé">Print</a>';
}elseif($site->uri()->path()=='tags'){
    // All tags list
    $items=$pages->find('link/','post/');
    $tags=tagcloud($items,array('field'=>'tags','sort'=>'name','sortdir'=>'asc'));
    $h='<ul class="tags item-listing item-listing-tags">';
    foreach($tags as $tag){
        $name=$tag->name();
        $link='/tag:'.$name;
        $title=tag_title($name);
        $link_description='View all items tagged '.$title;
        $h.='<li><div class="type"><a href="'.$link.'" title="'.$link_description.'"><i class="icon icon-tag""></i></a></div>';
        $h.='<div class="info"><a href="'.$link.'" title="'.$link_description.'" class="title">'.$title.'</a></div></li>';
    }
    $h.='</ul>';
    echo $h;
}
?>
</article>
<?php snippet('footer') ?>