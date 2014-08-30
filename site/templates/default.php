<?php snippet('header') ?>
<article>
<?

echo markdown($page->text());

if($site->uri()->path()->first()=='tweets'){ // Tweets list page

    echo twitter_tweets_list('brendanmurty', '25', '');

}elseif($site->uri()->path()->first()=='github'){ // GitHub activity page

    echo github_user_activity_public('brendanmurty', '');

}elseif($site->uri()->path()->first()=='instagram'){ // Instagram activity page

    echo instagram_user_activity_public('highhorser', '');

}elseif($site->uri()->path()->first()=='resume'){ // Resume page

    echo '<a class="email" href="mailto:?subject=Resumé - Brendan Murty&body=Link to resumé: http://brendanmurty.com/resume" title="Email a link to this resumé">Email</a>';
    echo '<a class="print" href="javascript:window.print();" title="Print this resumé">Print</a>';

}elseif($site->uri()->path()=='tags'){ // All Tags

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