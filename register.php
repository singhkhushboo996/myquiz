<?php 
include "action.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<div class="fromclass">
<h1 style="color:green">Sign Up</h1>
<p style="color:blue">Please fill this from to create new account.</p>
<p><span class="error">* required field</span></p>

<form action="action.php" method="post" >
<fieldset class="fieldsetclass"><legend ><b>Register</b></legend>

<label for="fname">First Name:</label>
<input type="text" name="fname" id="fname" required>
<span class="error">* <?php echo $fnameErr;?></span><br><br>

<label for="lname">Last Name:</label>
<input type="text" name="lname" id="lname">
<span class="error">* <?php echo $lnameErr;?></span><br><br>

<label for="email">Email:</label>
<input type="email" name="email" id="email" required>
<span class="error">* <?php echo $emailErr;?></span><br><br>

<label for="mobile">Mobile Number:</label>
<input type="tel" name="mobile" id="mobile" required>
<span class="error">*<?php echo $mobileErr;?></span><br><br>

<label for="dob">Date of Birth:</label>
<input type="date" name="dob" id="dob" required>
<span class="error">* <?php echo $dobErr;?></span><br><br>


<label for="gender">Gender:</label>
<input type="radio" name="gender" value="female"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
><label>Female</label>
<input type="radio" name="gender" value="male"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
><label>male</label>
<input type="radio" name="gender" value="other"
<?php if (isset($gender) && $gender=="other") echo "checked";?>
><label>Others</label>
<span class="error">* <?php echo $genderErr;?></span><br><br>

<label for="username">Username:</label>
<input type="text" name="username" id="username" required >
<span class="error">* <?php echo $usernameErr;?></span><br><br>
<label for="pass">Password:</label>
<input type="password" name="pass" id="pass" required>
<span class="error">* <?php echo $passErr;?></span><br><br>

<label for="confirmpass">Confirm Password:</label>
<input type="password" name="confirmpass" id="confirmpass" required>
<span class="error">* <?php echo $confirmpassErr;?></span><br><br>

<input type="submit" value="SUBMIT"><br><br>
<p>If you are already registered <a href="login.php">Login here!</a></p>



</fieldset>

</form>




</div>
</div>
    
</body>
</html>