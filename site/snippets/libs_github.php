<?

// GitHub features provided by https://github.com/KnpLabs/php-github-api

function github_user_activity_public($username='brendanmurty', $options=''){

	$github = new \Github\Client();
	$event_list = '';

	try{
		$events = $github->api('user')->publicEvents('brendanmurty');
	}catch(Exception $e){
		$events = '';
	}

	if($events){

		foreach($events as $event){

			if($event['type'] == 'PushEvent' && isset($event['payload']['commits'])){

				$event_date = date_human(date('j M y', strtotime($event['created_at'])));
				$event_message = $event['payload']['commits']['0']['message'];
				$event_url = $event['payload']['commits']['0']['url'];
				$event_url = str_replace('api.github.com/repos', 'github.com', $event_url);
				$event_url = str_replace('/commits', '/commit', $event_url);

				$event_list .= '<li class="github github-commit"><a href="'.$event_url.'" title="View this commit on GitHub">';
				$event_list .= '<span>'.$event['repo']['name'];
				if($event_message){
					$event_list .= ': '.blurb($event_message, 120);
				}
				$event_list .= '</span><em><i class="icon icon-github"></i>Authored '.$event_date.'</em></a></li>';

			}elseif($event['type'] == 'WatchEvent'){

				$event_date = date_human(date('j M y', strtotime($event['created_at'])));
				$event_url = $event['repo']['url'];
				$event_url = str_replace('api.github.com/repos', 'github.com', $event_url);

				$event_list .= '<li class="github github-star"><a href="'.$event_url.'" title="View this repository on GitHub">';
				$event_list .= '<span>'.$event['repo']['name'];
				$repo_parts = explode('/', $event['repo']['name']);
				try{
					$repo = $github->api('repo')->show($repo_parts[0], $repo_parts[1]);
				}catch(Exception $e){
					$repo = '';
				}
				if($repo){
					if(array_key_exists('description', $repo)){
						if($repo['description'] != '') $event_list .= ': '.blurb($repo['description'], 120);
					}
				}
				$event_list .= '</span><em><i class="icon icon-github"></i>Starred '.$event_date.'</em></a></li>';

			}

		}

		return '<ul class="item-listing item-listing-github grid">'.$event_list.'</ul>';

	}

}

function github_user_followers($username='brendanmurty', $options=''){
	$client = new \Github\Client();
	$followers = $client->api('user')->followers($username);

	if($options == 'link'){
		$result = '<a href="https://github.com/'.$username.'/followers" class="github-user-followers">'.count($followers).' followers</a>';
	}else{
		$result = count($followers);
	}

    return $result;
}

?>