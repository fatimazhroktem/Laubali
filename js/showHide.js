let input = document.querySelector(".field input");
let show_hide = document.querySelector(".field div i");
let a = document.querySelector(".fieldset input");
let showhide = document.querySelector(".fieldset div i");

function showHide(){
	if(input.type == "password"){
		show_hide.className = "far fa-eye-slash";
		input.type = "text";
	}
	else{
		show_hide.className = "far fa-eye";
		input.type = "password";
	}

}
function hideshow(){
	if(a.type == "password"){
		showhide.className = "far fa-eye-slash";
		a.type = "text";
	}
	else{
		showhide.className = "far fa-eye";
		a.type = "password";
	}
}