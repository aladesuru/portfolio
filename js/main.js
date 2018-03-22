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

/***********************************************************************************/
/*	Form validation when field lose focus
/************************************************************************************/
	let $invalid_email = "<p class='invalid-email'></p>";

	$("#email-row").append($invalid_email);
	$("#name-row").append($invalid_email);
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
		$(".thank-you-msg").text("Please fill in all required fields.").slideDown();
	}
	
});