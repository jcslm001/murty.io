<?

function __autoload($class_name){
	// Automatically load object-oriented classes
	// Example: '$testing = new \Testing\Begin();' would load '/html/site/classes/Testing/Begin.php'
	
	$class_path = './site/classes/'.str_replace('\\', '/', $class_name).'.php';
	if(file_exists($class_path)) require_once $class_path;
}

function blurb($content, $length){
	// Shorten a string to a fixed width
	$content_length = mb_strlen($content);
	if($content_length >= $length){
		return mb_substr($content, 0, $length-3).'...';
	}else{
		return $content;
	}
}

function is_dev(){
	// Check for developer mode
	if((isset($_GET['dev']) && $_GET['dev']==1)){
		return true;
	}else{
		return false;
	}
}

function date_human($item_date){
	// Create a human friendly date from the "1 Sep 14" format - like "today", "yesterday" or "10 days ago"
	$interval = date_diff(date_create(date('j M y')), date_create($item_date));
	$date_diff = $interval->format('%a');
	$date_data = str_replace('+', '', $interval->format('%R%a'));
	if($date_date == 0){
		$date = 'today';
	}elseif($date_data == -1){
		$date = 'yesterday';
	}elseif($date_data < -1 && $date_data > -15){
		$date = $interval->format('%a').' day';
		if($date_diff != 1){
			$date .= 's';
		}
		$date .= ' ago';
	}else{
		$date .= 'on '.$item_date;
	}
	return $date;
}

?>