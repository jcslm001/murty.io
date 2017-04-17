# Mobile device detection

*Posted 20121105*

If you need to customise the output of a webpage before the browser gets to it, you can use PHP to do so. Check out my minimal *is_mobile* function:

	<?
	// is_mobile - Check if this device is a mobile
	function is_mobile(){
		$mobiles = array("mobile","android","blackberry","iemobile","kindle","midp","opera m","palm","wap","xda","symbian","windows ce","windows phone");
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		$i = 0;
		foreach($mobiles as $mobile){
			if(strpos($agent,$mobile)!==false){ $i++; }
		}
		return (($i >= 1) ? true:false);
	}
	?>
