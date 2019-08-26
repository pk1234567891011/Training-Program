
function validateform()
{  
	var fname=document.myform.firstname.value;   
	var lname=document.myform.lastname.value; 
	var pass=document.myform.password.value;
	var Phone=document.myform.phone.value;
	var Office=document.myform.office.value;
	var Email=document.myform.email.value;
	var confirm=document.myform.cpassword.value;
	var month=document.myform.month.value;
	var day=document.myform.day.value;
	var year=document.myform.year.value;
	var male=document.getElementById('residence1').checked;
	var female=document.getElementById('residence2').checked;
	var biking=document.getElementById('checkbox_sample18').checked;
    var reading=document.getElementById('checkbox_sample19').checked;
    var playing=document.getElementById('checkbox_sample20').checked;
    var ab=document.myform.about1.value;;
	var regex = /^[A-Za-z0-9]+$/;
    var em=/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
	if (fname==null || fname=="")
	{  
		alert("FirstName can't be blank"); 
		return false;
	} 
		
    else if(lname==null || lname=="")
	{  
 		 alert("LastName can't be blank");
 		 return false;
  	} 
  	
	else if(Phone=="")
	{
		alert("Please fill the phone number field");
		return false;
	}
	else if(isNaN(Phone))
	{
 		 alert("Enter only digit for Phone number");
 		 return false;
	}
	else if(Phone.length!=10)
	{
          alert("Enter 10 digit mobile number");
          return false;
	}
	else if(isNaN(Office))
	{
		alert("office numbers must be in digits");
		return false;
	}
	else if(Email=="")
	{
		alert("Email address cannot be blank");
		return false;
	}
	else if(!em.test(Email))
	{
		alert("Invalid email address");
   		return false;
	}
	/*else if(Email.indexOf('@')<=0)
	{
   		alert("Invalid email address");
   		return false;
	}
	else if((Email.charAt(Email.length-4)!='.')&&(Email.charAt(Email.length-3)!='.'))
	{
		alert("Invalid email address");
   		return false;
	} */
	else if(pass==null || pass=="")
	{  
 		 alert("Password can't be blank");
 		 return false;
  	}
	
	
	else if(!regex.test(pass))
	{
		alert("Password contains special characters");
		return false;
	}
	else if((pass.length<8)||(pass.length>12))
	{
		alert("Password should be between 8 to 12 characters");
		return false;
	}
	else if(confirm==null || confirm=="")
	{
		alert("confirm password must be filled");
		return false;
	}
	else if((pass!=confirm))

	{
		alert("Password not matching");
		return false;
	}
 	else if(month == "month") 
 	{
   		 alert("Please select month");
    	 return false;
	 }
	 else if(day == "day") 
 	{
   		 alert("Please select day");
    	 return false;
	 }
	 else if(year == "year") 
 	{
   		 alert("Please select year");
    	 return false;
	}


	 else if((male=="")&&(female==""))
	{
        
          alert("Please select your gender");
          return false;

	}
	else if((playing=="")&&(biking=="")&&(reading==""))
	{
          alert("Please select atleast 1 Interest");
          return false;
	}
	else if(ab==null || ab=="")
	{
		alert("write something in about ");
		return false;
	}

	else
	{     
	    var months=document.myform.month.value;
	    var years=document.myform.year.value;
	 	var today = new Date();
		var dd = today.getDate();
		var yyyy = today.getFullYear();
		var mm = today.getMonth()+1;
		var yd;
		yd=yyyy-years-1;
	
		var md;
		if(months>=mm)
		{ 
		  md=12+mm-months;
		
	    }
	    else
	    {
	    	md=mm-months;
	    	yd=yd+1;
	    }
         var age=yd+md/12;
         age=age.toFixed(1);
         document.getElementById('age').value =age;
         alert("Successful");
         return true;
     }

}
