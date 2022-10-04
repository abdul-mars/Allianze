// const links=document.querySelector('.links');
// const menuBar=document.querySelector('.menu');

// menuBar.addEventListener('click', ()=>{
// 	links.classList.toggle('active-links')
// });


// to toggle show password
var state = false;
function toggle() {
    if(state) {
        document.getElementById("password").setAttribute("type", "password");
        document.getElementById("lock").className="fa fa-lock";
        // document.getElementById("show").innerHTML='Show';
        state = false;
    } else {
        document.getElementById("password").setAttribute("type", "text");
        document.getElementById("lock").className="fas fa-lock-open";
        // document.getElementById("show").innerHTML='Hide';
        state = true;
    }
}
// to toggle show password on confirm password field
var state = false;
function toggle2() {
    if(state) {
        document.getElementById("confirmPassword").setAttribute("type", "password");
        document.getElementById("lock2").className="fa fa-lock";
        state = false;
    } else {
        document.getElementById("confirmPassword").setAttribute("type", "text");
        document.getElementById("lock2").className="fas fa-lock-open";
        state = true;
    }
}


$(document).ready(function() {
	// sign up ajax handler
	$('.signupSubmit').click(function(){
		// alert('debug');
		// var email = $('#email').val();
		// alert (email);
		var data = {
			'email': $('#email').val(),
			'firstname': $('#firstname').val(),
			'lastname': $('#lastname').val(),
			'phone': $('#phone').val(),
			'gender': $('#gender').val(),
			'type': $('#type').val(),
			'password': $('#password').val(),
			'confirmPassword': $('#confirmPassword').val(),
			'signupSubmit': true,
		}
			// console.log(data);
		$.ajax({
			url: 'handlers/logins_handler.php?operation=signup',
			type: 'post',
			data: data,
			success: function(response){
				// alert(response);
				if (response == 1) {
					window.location.replace('details.php');
				} else {
					$('.errorModal').html(response + '<button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>');
					$('#errorModal').modal('show');
				}
			}
		})
	});

	// user sign in ajax handler
	$('.signinSubmit').click(function(){
		// alert('debug');
		// var email = $('#email').val();
		// alert (email);
		var data = {
			'email': $('#email').val(),
			'password': $('#password').val(),
			'signinSubmit': true,
		}
			// console.log(data);
		$.ajax({
			url: 'handlers/logins_handler.php?operation=signin',
			type: 'post',
			data: data,
			success: function(response){
				// alert(response);
				if (response == 1) {
					window.location.replace('index.php');
				} else {
					$('.errorModal').html(response + '<button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>');
					$('#errorModal').modal('show');
				}
			}
		})
	});

	// admin sign in ajax handler
	$('.adminSigninSubmit').click(function(){
		// alert('debug');
		// var email = $('#email').val();
		// alert (email);
		var data = {
			'email': $('#email').val(),
			'password': $('#password').val(),
			'adminSigninSubmit': true,
		}
			// console.log(data);
		$.ajax({
			url: '../handlers/logins_handler.php?operation=admin_signin',
			type: 'post',
			data: data,
			success: function(response){
				// alert(response);
				if (response == 1) {
					window.location.replace('index.php');
				} else if(response == 2) {
					var msg = 'You have to set your password for the fisrt time login in as admin';
					var cssClass = 'alert-success';
					window.location.replace('new_admin.php?msg=$msg&cssClass=$cssClass');
				} else {
					$('.errorModal').html(response + '<button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>');
					$('#errorModal').modal('show');
				}
			} 
		})
	});
});