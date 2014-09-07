<?

// Instagram features provided by https://github.com/cosenary/Instagram-PHP-API

function instagram_user_activity_public($username='highhorser', $options=''){

	$instagram = new \Instagram($GLOBALS['auth_instagram_client'], $GLOBALS['auth_instagram_secret'], '');
	$post_items = '';

	if($username == 'highhorser'){
		$userid = '990505523';
	}else{
		$userid = instagram_user_id($username, '');
	}

	$posts = $instagram->getUserMedia($userid, '10');

	if($posts){
		
		foreach($posts->data as $post){

			if($post){

				$post_items .= '<li class="instagram instagram-post"><a href="'.$post->link.'" title="View this post on Instagram">';
				$post_items .= '<img src="'.$post->images->standard_resolution->url.'" /><span>';
				if($post->caption && array_key_exists('text', $post->caption)){
					$post_items .= blurb($post->caption->text, 90);
				}else{
					$post_items .= 'Post by @'.$username;
				}
				$post_items .= '</span><em><i class="icon icon-instagram"></i>Posted '.date_human(date('j M y', $post->created_time)).'</em></a></li>';

			}

		}

	}

	// Show liked posts - Limited to "highhorser" as user authentication is required
	if($username == 'highhorser'){

		$instagram->setAccessToken($GLOBALS['auth_instagram_user']);
		$liked = $instagram->getUserLikes('10');
		
		if($liked){
	
			foreach($liked->data as $like){

				if($like){

					$post_items .= '<li class="instagram instagram-liked"><a href="'.$like->link.'" title="View this post on Instagram">';
					$post_items .= '<img src="'.$like->images->standard_resolution->url.'" /><span>';
					if($like->caption && array_key_exists('text', $like->caption)){
						$post_items .= blurb($like->caption->text, 90);
					}else{
						$post_items .= 'Post by @'.$like->user->username;
					}
					$post_items .= '</span><em><i class="icon icon-instagram"></i>Liked '.date_human(date('j M y', $like->created_time)).'</em></a></li>';

				}

			}
		}
	}

	if($post_items != ''){
	
		return '<ul class="item-listing item-listing-instagram grid">'.$post_items.'</ul>';

	}

}

function instagram_user_id($username='highhorser', $options=''){

	$client = new \Instagram($GLOBALS['auth_instagram_client']);
	$result = $client->searchUser($username, 1);

	if($result){
		return $result->data['0']->id;
	}

}

?>