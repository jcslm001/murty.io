<?php
snippet('header');
$post_date = $page->date('j M y');
$post_tags = post_tags($page,'inline');
$post_read_time = readingtime($page->text(),array('format'=>'{minutesCount}'));
if($post_read_time < 2){
	$post_read_time = 'About 2 minutes to read.';
}else{
	if($post_read_time < 6) $post_read_time=$post_read_time*2;
	$post_read_time = 'About '.$post_read_time.' minutes to read.';
}
?>
<article class="item item-post">
	<ul class="about">
		<li class="date">Saved <?= $post_date ?></li>
		<li class="tags"><?= $post_tags ?></li>
		<li class="reading-time"><?= $post_read_time ?></li>
	</ul>
	<?php echo markdown($page->text()) ?>
</article>
<?php snippet('footer') ?>