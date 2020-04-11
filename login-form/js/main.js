var validation = function() {

	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;

	var old_email = "username@mail.com";
	var old_pass = "123123";

	if (email != old_email) {
		document.getElementById('msg').classList.remove('is-visible');
		document.getElementById('email').style.borderBottom = "1px solid red";
	}
}


