function doAjax(ajaxMethod, ajaxType, containerElementID){
	if(ajaxMethod && containerElementID){
		var theAjax;
		try{
			theAjax = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			try{
				theAjax = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(oc){
				theAjax = null;
			}
		}
		if(!theAjax && typeof XMLHttpRequest != "undefined"){
			theAjax = new XMLHttpRequest();
		}
		if(theAjax){
			containerElement = document.getElementById(containerElementID);
			containerElement.className += " loading";
			containerElement.innerHTML = '<div id="circleG"><div id="circleG_1" class="circleG"></div><div id="circleG_2" class="circleG"></div><div id="circleG_3" class="circleG"></div></div>';
			var ajaxUrl = "/ajax?method=" + ajaxMethod;
			if(ajaxType){
				ajaxUrl += "&type=" + ajaxType;
			}
			theAjax.onreadystatechange = function(){
				if(theAjax.readyState == 4){
					if(theAjax.status == 200){
						containerElement.innerHTML = theAjax.responseText;
						containerElement.className = containerElement.className.replace(" loading", " loaded");
					}
				}
			};
			theAjax.open("GET", ajaxUrl, true);
			theAjax.send(null);
		}
	}
}