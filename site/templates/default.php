<?php snippet('header') ?>
<article>
<?
echo markdown($page->text());
if($site->uri()->path()=='tags'){
    // All tags list
    $items=$pages->find('link/','post/');
    $tags=tagcloud($items,array('field'=>'tags','sort'=>'name','sortdir'=>'asc'));
    $h='<ul class="item-listing item-listing-tags grid">';
    foreach($tags as $tag){
        $tag_name=$tag->name();
        $tag_title=tag_title($tag_name);
        $tag_count=$tag->results().' item';
        if($tag_count!=1){
            $tag_count.='s';
        }
        $h.='<li><a href="/tag:'.$tag_name.'" title="View all items tagged '.$tag_title.'"><span class="summary">'.$tag_title.'</span>';
        $h.='<span class="label"><span class="fa fa-tag""></span>'.$tag_count.'</span></a></li>';
    }
    $h.='</ul>';
    echo $h;
}
?>
</article>
<?php snippet('footer') ?>
