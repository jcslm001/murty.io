		</section>
		<?

		// Configure the item actions elements
		$page_name=$site->uri()->path()->first();
		$nav_actions = '';
		if($page_name=='link'){
			$nav_actions  = '<a class="visit-link" href="'.$page->link().'">Visit link</a>';
			$nav_actions .= '<a class="twitter" href="http://twitter.com/share?url='.$page->url().'&amp;text=Link%3A+'.urlencode($page->title()).'">Share on Twitter</a></li>';
			$nav_actions .= '<a class="facebook" href="http://www.facebook.com/sharer.php?u='.$page->url().'&amp;t=Link%3A+'.urlencode($page->title()).'">Post to Facebook</a>';
		}elseif($page_name=='post'){
			$nav_actions  = '<a class="twitter" href="http://twitter.com/share?url='.$page->url().'&amp;text='.urlencode($page->title()).'+by+%40brendanmurty">Share on Twitter</a>';
			$nav_actions .= '<a class="facebook" href="http://www.facebook.com/sharer.php?u='.$page->url().'&amp;t='.urlencode($page->title()).'+by+Brendan+Murty">Post to Facebook</a></li>';
		}elseif($page_name=='about'){
			$nav_actions  = '<a href="/contact">Contact me</a>';
			$nav_actions .= '<a href="/resume" target="_blank">View my resumé</a>';
		}elseif($page_name=='contact'){
			$nav_actions  = '<a href="mailto:brendan@brendanmurty.com">Send me an email</a>';
			$nav_actions .= '<a href="http://twitter.com/brendanmurty">Chat with me on Twitter</a>';
			$nav_actions .= '<a href="/resume" target="_blank">View my resumé</a>';
			$nav_actions .= '<a href="/about">More about me</a>';
		}
		if($nav_actions!='') echo '<nav class="actions">'.$nav_actions.'</nav>';

		if ($page_name != 'resume') {
		?>
		<footer>
			<div class="about">
				<?php echo kirbytext($site->about()) ?>
			</div>
			<div class="credits">
				<?php echo kirbytext($site->copyright()) ?>
			</div>
		</footer>
		<?php } ?>
	</section>
</body>
</html>
