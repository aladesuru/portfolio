//create helper function to use _$ to select element

 // const _$ = (element) => {
 // 	return(document.querySelector(element));
 // }

 // const _bytagName = (tag) => {
 // 	return (document.getElementsByTagName(tag));
 // }

/***********************************************************************************/
/*		Smoothly scroll to different sections of the page 
/************************************************************************************/
let smoothScroll = (element) => {

	$("body , html").animate({
		scrollTop: $(element).offset().top - 100
	} , 1000)
	
	$("#scrollTohome , #scrollToresume , #scrollToproject , #scrollTocontact").css("background-color" , "transparent");
	$("#scrollTohome , #scrollToresume , #scrollToproject , #scrollTocontact").css("color" , "#999");
	$("#hamburger").prop("checked" ,false);
}

let active_link = (element) => {
		$(element).css("background-color" , "#fff");
		$(element).css("color" , "#272b64");
};


$("#main-nav").on("click" , "li a[href^='#']" , function(event){
	event.preventDefault();
	if (event.target.id === "scrollTohome") {
			smoothScroll("#heroArea");
			active_link(this);

	} else if(event.target.id === "scrollToresume"){
			smoothScroll("#resume");
			active_link(this);

	}else if(event.target.id === "scrollToproject"){
			smoothScroll("#project");
			active_link(this);

	}else if(event.target.id === "scrollTocontact"){
			smoothScroll("#contact");
			active_link(this);
	}
		
});


/***********************************************************************************/
/*		Changing header styling when the page is scroll 
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


/***********************************************************************************/
/*	Form validation when field lose focus
/************************************************************************************/
	let $field_validation_text = "<p class='invalid-email'></p>";

	$("#email-row").append($field_validation_text);
	$("#name-row").append($field_validation_text);
	$(".invalid-email").hide();
	
	let field_validation = (e) => {
		let pattern = /[\w.]+[@][\w.]/;
			if (e.target.id === "email") {

				if (!pattern.test($("#email").val())){
					$("#email-row .invalid-email").text(" Please provide a valid email. ").slideDown("1000");
					
				} else if(pattern.test($("#email").val())){
					$("#email-row .invalid-email").slideUp("1000");
				}	

			} else if(e.target.id === "name"){
					if ($("#name").val().trim() === "") {
						$("#name-row .invalid-email").text(" Please key in your name. ").slideDown("1000");
					
				} else if($("#name").val().trim() !== ""){
					$("#name-row .invalid-email").slideUp("1000");
				}
			}
	};

	$("#email").blur(field_validation);
	$("#name").blur(field_validation);


/***********************************************************************************/
/*		Send email using Ajax and PHP
/************************************************************************************/
// const send_email = () => {
// 	$Ajax(url , )
//  /[\w.]+[@][\w.]/;
// }

let $thank_u_msg = "<div><p class='thank-you-msg'></p></div>";

$("#message-container").append($thank_u_msg);
$(".thank-you-msg").hide();

$("#email-form").submit( (event) => {
	event.preventDefault();

	if (($("#email").val() !== "") && ($("#message").val() !== "") ) {
		$("#form-message").slideUp("1000");
		$(".thank-you-msg").text("Message sent and thank you for getting in touch").slideDown();
	}else {
		$(".thank-you-msg").text("Please fill in the required fields: Name and Email.").slideDown();
	}
	
});