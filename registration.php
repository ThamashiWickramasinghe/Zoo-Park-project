<?php

require 'db_conn.php';//db connect

if(isset($_POST['submit'])){
    $fullName=$_POST['fullName'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $phoneNumber=$_POST['phoneNumber'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $duplicate=mysqli_query($conn,"SELECT * FROM user_data WHERE name='$fullName' OR user_email='$email'");

    if(mysqli_num_rows($duplicate)>0){
        echo 
        "<script> alert('Name or Email has already taken'); </script>";//error message
    }else{
        if($password==$cpassword){
            $query="INSERT INTO user_data VALUES('','$fullName','$email','$address','$phoneNumber','$password')";
            mysqli_query($conn,$query);
            echo 
            "<script> alert('Registration Successfully'); </script>";//conncted
        }else{
            echo 
            "<script> alert('Password does not match'); </script>";//error message
        }
    }
}
?>


<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="sign.css">
        
        <title>User Registration</title>
        <script type="text/javascript">
            function formValidation()//form validation
            {
                var uname = document.login.fullName;
                var uemail = document.login.email;
                var uadd = document.login.address;
                var pwd = document.login.password;
                var pwd2 = document.login.cpassword;
                
                if(Emptyfield(uname, uemail,uadd, pwd,pwd2))
                {
                    if(allLetter(uname))
                    {
                    if(ValidateEmail(uemail))
                    {
                        if(alphanumeric(uadd))
                        {

                        
                            if(allnumeric())
                            {
                            
                                return true;
                            }
                        }
                    }
                    }
                    return false;
                }
            } //end of formValidation
            
            function Emptyfield(uname, uemail,uadd, pwd,pwd2)
            {
                var uname_len = uname.value.length;
                var uemail_len= uemail.value.length;
                var uadd_len = uadd.value.length;
                var pwd_len= pwd.value.length;
                var pwd2_len= pwd2.value.length;
                
                if (uname_len == 0 || uemail_len == 0 || uadd_len == 0|| pwd_len == 0 || pwd2_len == 0)
                {
                    alert("Fields should not be empty")
                    return false;
                }
                else
                {
                    return true;
                }
            }// end of Emptyfield
            
            function allLetter (uname)
            {
                var letters = /^[A-Za-z]+$/;
                if (uname.value.match (letters))
                {
                    return true;
                }
                else
                {
                    alert ("Username should only have alphabet characters");
                    uname.focus();
                    return false;
                }
            }//name validation
             function ValidateEmail(uemail)
             {
                 var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                 if(uemail.value.match(mailformat))
                 {
                     return true;
                 }
                 else
                 {
                     alert("you have entred invalid email address");
                     uemail.focus();
                     return false;
                 }
             }//email validation
             function alphanumeric(uadd)

            {

                var letters = /^[0-9a-zA-Z-\s]+$/;

                if(uadd.value.match(letters))
                {
                    return true;
                }
                else
                {
                    alert('User address must have alphanumeric characters only');
                    uadd.focus();
                    return false;
                }
            }//address validation
    
            
            
            function allnumeric(){
        var pwdone=document.login.password.value;
        var pwdtwo=document.login.cpassword.value;
        if(pwdone==pwdtwo){
            return true;
        }
        else
        alert("password must be the same");
        return false;
    }//password validation
            </script>

    </head>

    <body>
        <div class="container">
            <h2 class="title">Registration Form</h2>
            <form  name="login" method="post" onSubmit="return formValidation();"  autocomplete="off" >


                <div class="main-user-info">
                    <div class="user-input-box">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="fullName" placeholder="Enter Full Name"/>
                    </div>
                    <div class="user-input-box">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter Your Email"/>
                    </div>
                    <div class="user-input-box">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" placeholder="Enter Your Address"/>
                    </div>
                   
                    <div class="user-input-box">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Enter Your Phonenumber"/>
                    </div>
                    <div class="user-input-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Password"/>
                    </div>
                     <div class="user-input-box">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password"/>
                    </div>
                   
                </div>

               

                <div class="form-submit-btn">
                    <input type="submit" value="Register Now" name="submit">
                </div>
            </form>
        </div>
    </body>
</html>