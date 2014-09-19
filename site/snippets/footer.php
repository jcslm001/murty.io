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
			$nav_actions .= '<a href="/resume">View my resumé</a>';
			$nav_actions .= '<a href="/feed.xml">Subscribe to RSS feed</a>';
		}elseif($page_name=='contact'){
			$nav_actions  = '<a href="mailto:brendan@brendanmurty.com">Send me an email</a>';
			$nav_actions .= '<a href="http://twitter.com/brendanmurty">Chat with me on Twitter</a>';
			$nav_actions .= '<a href="/resume">View my resumé</a>';
		}
		if($nav_actions!='') echo '<nav class="actions">'.$nav_actions.'</nav>';

		// Show another main navigation bar here if relevant
		if($page_name!='link' && $page_name!='search' && $page_name!='contact') echo '<nav>'.list_pages($pages,$site).'</nav>';
		?>
		<footer>
			<div class="half about">
				<?php echo kirbytext($site->about()) ?>
			</div>
			<div class="half statistics">
				<ul class="stats">
					<li><a href="https://twitter.com/brendanmurty"><span class="number"><?php echo twitter_follower_count('brendanmurty', '') ?></span><span class="title">Followers</span></a></li>
					<li><a href="/links"><span class="number"><?php echo page_count($pages, 'link') ?></span><span class="title">Links</span></a></li>
					<li><a href="/posts"><span class="number"><?php echo page_count($pages, 'post') ?></span><span class="title">Posts</span></a></li>
				</ul>
			</div>
			<div class="social">
				<ul>
					<li><a href="https://twitter.com/brendanmurty" title="View my Twitter profile"><i class="fa fa-twitter"></i></a></li>
					<li><a href="http://instagram.com/highhorser" title="View my Instagram posts"><i class="fa fa-instagram"></i></a></li>
					<li><a href="https://github.com/brendanmurty" title="View my code on GitHub"><i class="fa fa-github"></i></a></li>
					<li><a href="http://www.rdio.com/people/brendanmurty" title="See my music library on Rdio"><i class="fa fa-music"></i></a></li>
					<li><a href="http://steamcommunity.com/id/brendanmurty" title="Join me in a game on Steam"><i class="fa fa-gamepad"></i></a></li>
					<li class="last"><a href="https://pinboard.in/u:brendanmurty" title="View my bookmarks on Pinboard"><i class="fa fa-link"></i></a></li>
				</ul>
			</div>
			<div class="credits">
				<?php echo kirbytext($site->copyright()) ?>
			</div>
		</footer>
	</section>
</body>
</html>
