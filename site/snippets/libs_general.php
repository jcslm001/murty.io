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

?>