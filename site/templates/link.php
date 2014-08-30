<?php
snippet('header');
$link_date = $page->date('jS F Y');
$link_tags = post_tags($page,'inline');
?>
<article class="item item-link">
	<ul class="about">
		<li class="date">Saved <?= $link_date ?><span class="separator">in</span></li>
		<li class="tags"><?= $link_tags ?></li>
	</ul>
	<?php echo markdown($page->text()) ?>
</article>
<?php snippet('footer') ?>