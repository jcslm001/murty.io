<?php

// AJAX processes
// Sample URL: /ajax?method=[method]&type=[type]

if ( get("method") ) {

	// Get the items from the URL

	$method = get("method");
	$type = "";
	if ( get("type") ) {
		$type = get("type");
	}

	// Include common files

	snippet('auth');
	snippet('libs_general');
	snippet('libs_tags');
	snippet('libs_page');
	snippet('libs_list');
	snippet('libs_twitter');

	// Output the relevant content

	$return = "";
	if ( $method == "items" ) {

		// Item listing

		if ( $type == "" || $type == "featured") {

			$return = "<article class=\"posts\">".list_items($pages, "all", "featured")."</article>";

		}

	}
	echo $return;

}

?>
