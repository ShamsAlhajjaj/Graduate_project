function LoginCheak()
{
    let em = document.getElementById('Email').value;
    let ps = document.getElementById('Password').value;
    if (em == '' && ps == '')
        alert("Please Enter your Email & your Password");
    else if (em == '' && ps != '')
        alert("Please Enter your Email");
    else if (em != '' && ps == '')
        alert("Please Enter The Password");
    else
        alert("Your Email is: "+ em + "\n" + "Your Password is: " + ps);
}

function SignUpCheak(){
    let fN = document.getElementById('NewUserFN').value;
    let lN = document.getElementById('NewUserLN').value;
    let nEm = document.getElementById('NewEmail').value;
    let nPs = document.getElementById('NewPassword').value;
    let cNPs = document.getElementById('ReNewPassword').value;

    if (fN == '')
        alert("Please Enter your First Name");
    else if (lN == '')
        alert("Please Enter your Last Name");
    else if (nEm == '')
        alert("Please Enter your Valid Email");
    else if (nPs == '')
        alert("Please Enter your Password");
    else if (cNPs == '')
        alert("Please Confirm your Password");
    else if(nPs != cNPs)
        alert("Your Password didn't Match.. Please Enter your password again!")
    else
        alert("Your First Name is: " + fN + "\nYour Last Name is: " + lN + "\nYour Email is: " + nEm + "\nYour Password is : " + nPs)  
}