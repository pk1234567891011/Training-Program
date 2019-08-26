<script>
		$(document).ready(function () {
			$('#submit').on('click input', function () {
				var name = $('#fname').val();
				var last = $('#lname').val();
				var Phone = $('#ph').val();
				var Office = $('#of').val();
				var Email = $('#em').val();
				var Password = $('#ps').val();
				var Confirm = $('#cps').val();
				var month = $('#month').val();
				var day = $('#day').val();
				var year = $('#year').val();
				var regex = /^[A-Za-z0-9]+$/;
				var gen = $("input[name='radios']:checked").val();
				var Interest = $("input[type='checkbox']:checked").val();
				var ab = $('#about1').val();
				var em = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
				if (name == null || name == "") {
					alert("firstname can't be blank");

				}
				else if (last == null || last == "") {
					alert("LastName can't be blank");
					return false;
				}

				else if (Phone == "") {
					alert("Please fill the phone number field");
					return false;
				}
				else if (isNaN(Phone)) {
					alert("Enter only digit for Phone number");
					return false;
				}
				else if (Phone.length != 10) {
					alert("Enter 10 digit mobile number");
					return false;
				}
				else if (isNaN(Office)) {
					alert("office numbers must be in digits");
					return false;
				}
				else if (Email == "") {
					alert("Email address cannot be blank");
					return false;
				}
				else if (!em.test(Email)) {
					alert("Invalid email address");
					return false;
				}
				else if (Password == null || Password == "") {
					alert("Password can't be blank");
					return false;
				}


				else if (!regex.test(Password)) {
					alert("Password contains special characters");
					return false;
				}
				else if ((Password.length < 8) || (Password.length > 12)) {
					alert("Password should be between 8 to 12 characters");
					return false;
				}
				else if (Confirm == null || Confirm == "") {
					alert("confirm password must be filled");
					return false;
				}
				else if ((Password != Confirm)) {
					alert("Password not matching");
					return false;
				}
				else if (month == "month") {
					alert("Please select month");
					return false;
				}

				else if (day == "day") {
					alert("Please select day");
					return false;
				}
				else if (year == "year") {
					alert("Please select year");
					return false;
				}


				else if (!gen) {
					alert("Please select your gender");
					return false;
				}

				else if (!Interest) {
					alert("Please select atleast 1 Interest");
					return false;
				}

				else if (ab == null || ab == "") {
					alert("write something in about ");
					return false;
				}

				else {
					var months = $('#month').val();

					var years = $('#year').val();
					var today = new Date();
					var dd = today.getDate();
					var yyyy = today.getFullYear();
					var mm = today.getMonth() + 1;
					var yd;
					yd = yyyy - years - 1;

					var md;
					if (months >= mm) {
						md = 12 + mm - months;

					}
					else {
						md = mm - months;
						yd = yd + 1;
					}
					var age = yd + md / 12;
					age = age.toFixed(1);
					$('#age').val(age);
					alert("successfull");
					return true;
				}






			});
		});

	</script>