//create helper function to use _$ to select element

 const _$ = (element) => {
 	return(document.querySelector(element));
 }

 const _bytagName = (tag) => {
 	return (document.getElementsByTagName(tag));
 }

/***********************************************************************************/
/*		Smoothly scroll to different sections of the page 
/************************************************************************************/
let smoothScroll = (element) => {

	$("body , html").animate({
		scrollTop: $(element).offset().top - 100
	} , 1000)
	$("#hamburger").prop("checked" ,false);
}

$("#scrollTohome").click(() => {
		smoothScroll("#heroArea");
});

$("#scrollToresume").click(() => {
		smoothScroll("#resume");
});

$("#scrollToproject").click(() => {
		smoothScroll("#project");
		
});

$("#scrollTocontact").click(() => {
		smoothScroll("#contact");
});

/***********************************************************************************/
/*		Changing header styling
/************************************************************************************/
let transparentHeader = () => {
	if ($("body , html").scrollTop()) {
			if ($("body , html").scrollTop() > 400) {
				$("#fixed-header").css("background-color" , "rgba(0,0,0,.8)");
				$("#fixed-header").css("border-bottom" , "5px solid #000");
			} 
			else if ($("body , html").scrollTop() < 400){
					$("#fixed-header").css("background-color" , "transparent");
					$("#fixed-header").css("border-bottom" , "none");
			}
	} 
	else if($("body").scrollTop()){
		if ($("body").scrollTop() > 400) {
				$("#fixed-header").css("background-color" , "rgba(0,0,0,.8)");
				$("#fixed-header").css("border-bottom" , "5px solid #000");
		} 
		else if ($("body").scrollTop() < 400){
				$("#fixed-header").css("background-color" , "transparent");
				$("#fixed-header").css("border-bottom" , "none");
		}

	}
		
}

if ($( document ).scroll()) {
			$( document ).scroll(() => {
			transparentHeader();
		});
	} 
	else if($( window ).scroll()){
			$( window ).scroll(() => {
			transparentHeader();
		});
	}