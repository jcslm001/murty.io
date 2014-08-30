<?php 
$items = $pages->find('link/','post/')->children()->visible()->sortBy($sort='date',$dir='desc')->slice('0','25');
snippet('feed', array(
  'link'  => url(),
  'items' => $items,
  'descriptionField'  => 'text', 
  'descriptionLength' => 300
));
?>