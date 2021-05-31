
<?php
require_once "adminconfig.php";

    session_start();
    $message="";
    if(count($_POST)>0) {
        
        $sql= "SELECT * FROM adminlogin WHERE adminuser ='" . $_POST["adminuser"] . "'  and adminpass = '" . $_POST["adminpass"] . "'" ;
       
        $result = mysqli_query($conn,$sql);
        $row  = mysqli_fetch_assoc($result);
        if(is_array($row)) {
        $_SESSION["adminuser"] = $row["adminuser"];

        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["adminuser"])) {
    header("Location:adminpannel.php");
    }

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link rel="stylesheet" href="astyle.css">

</head>
<body>
<div class="container">
        <div class="adminfrom">
            <h1 style="color:green;"> Admin Login</h1>
            <p style="color:blue">Please fill in your username and password.</p>

            <div class="message"><?php if($message!="") { echo $message; } ?></div>
            
            <fieldset class="fieldsetclass">
            <legend> Admin Login form</legend>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <br>
            &nbsp;&nbsp;<label for="adminuser">Username</label><br>
            &nbsp;&nbsp;<input type="text" name="adminuser" id="adminuser"  placeholder="Enter Username" size="50" required><br>
            <br><br>
            &nbsp;&nbsp;<label for="adminpass">Password</label><br>
            &nbsp;&nbsp;<input type="password" name="adminpass" id="adminpass" placeholder="Enter Password"  size="50" required>
            <br><br>

            &nbsp;&nbsp;<input type="submit" value="Submit" class="submit-btn"><br><br>
            
            </fieldset>
        </form>

        </div>
    </div>
    
</body>
</html>