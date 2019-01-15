function validate(email) {
	if(!validateEmail(email.value)) {
		email.style.color = "red";
	}
	else {
		email.style.color = "black";
	}
}

function verif(f) {
	if(validateEmail(f.user_email.value)) {
		if(validatePassword(f.cpassword.value,f.password.value)) {
			submitForm(f);
			return false;
		}
		else {
			document.getElementById("error").innerHTML = "Mots de passe ne correspondent pas";
			return false;
		}
	}
	else {
		document.getElementById("error").innerHTML = "Adresse mail incorrecte";
		return false;
	}
	return false;
}

function validateEmail(email) {
    var re = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{1,4}$/;
    return re.test(String(email).toLowerCase());
}

function validatePassword(cp, p) {
	if(cp != p) {
		return false;
	}
	else {
		return true;
	}
}

function passwordColor(cp,p) {
	if(!validatePassword(cp,p)) {
		document.getElementById("cpassword").style.color = "red";
	}
	else {
		document.getElementById("cpassword").style.color = "black";
	}
}

function submitForm(f)
{ 
	var req = null; 
 
	if (window.XMLHttpRequest)
	{
 		req = new XMLHttpRequest();

	} 
	else if (window.ActiveXObject) 
	{
		try {
			req = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e)
		{
			try {
				req = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
       	}


	req.onreadystatechange = function()
	{ 
		if(req.readyState == 4)
		{
			if(req.responseText == "false") {
				document.getElementById("error").innerHTML = "Adresse mail déjà utilisée";
				return false;
			}
			else {
				document.getElementById("formu").removeAttribute('onsubmit');
				document.getElementById("formu").submit();
			}	
		} 
	}; 
	req.open("GET", "inscription.php?mail=" + f.user_email.value, true); 
	req.send(null); 
} 

function verifConnect(f) {
	submitFormConnect(f);
	return false;
}

function submitFormConnect(f)
{ 
	var req = null; 
 
	if (window.XMLHttpRequest)
	{
 		req = new XMLHttpRequest();

	} 
	else if (window.ActiveXObject) 
	{
		try {
			req = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e)
		{
			try {
				req = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
       	}


	req.onreadystatechange = function()
	{ 
		if(req.readyState == 4)
		{
			if(req.responseText == "false") {
				document.getElementById("error").innerHTML = "Utilisateur non existant";
				return false;
			}
			else {
				document.getElementById("formlogin").removeAttribute('onsubmit');
				document.getElementById("formlogin").submit();
			}
		}
	}; 
	req.open("GET", "connect.php?mail=" + f.user_mail.value + "&pass=" + f.user_pass.value, true); 
	req.send(null); 
} 