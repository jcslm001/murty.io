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
    $h='<ul class="item-listing item-listing-tags grid">';
    foreach($tags as $tag){
        $tag_name=$tag->name();
        $tag_title=tag_title($tag_name);
        $h.='<li><a href="/tag:'.$tag_name.'" title="View all items tagged '.$tag_title.'"><span>'.$tag_title.'</span>';
        $h.='<em><i class="icon icon-tag""></i>Tag</em></a></li>';
    }
    $h.='</ul>';
    echo $h;
}
?>
</article>
<?php snippet('footer') ?>