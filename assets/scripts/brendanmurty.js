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
			containerElement.innerHTML = '<div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div>';
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