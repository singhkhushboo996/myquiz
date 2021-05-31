<?php
    require_once "config.php";

    session_start();
    $message="";
    if(count($_POST)>0) {
        // $sql= "SELECT * FROM register WHERE username ='" . $_POST["username"] . "' password = '". $_POST["pass"]."'";
        $sql= "SELECT * FROM register WHERE username ='" . $_POST["username"] . "'  and password = '" . $_POST["pass"] . "'" ;
       
        $result = mysqli_query($conn,$sql);
        $row  = mysqli_fetch_assoc($result);
        if(is_array($row)) {
        $_SESSION["username"] = $row["username"];

        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["username"])) {
    header("Location:quizpannel.php");
    }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
         function myFunction() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
                }
            }

            </script>
</head>
<body>
    <div class="container">
        <div class="loginfrom">
            <h1 style="color:green;">Login</h1>
            <p style="color:blue">Please fill in your username and password.</p>
            <div class="message"><?php if($message!="") { echo $message; } ?></div>
            <fieldset class="fieldsetclass">
            <legend>Login form</legend>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="username">Username</label><br>
            <input type="text" name="username" id="username"  placeholder="Enter you email/username" size="50" required><br>
            <br><br>
            <label for="pass">Password</label><br>
            <input type="password" name="pass" id="pass"  size="50" placeholder="Enter password" required>
            <input type="checkbox" onclick="myFunction()">Show Password <br>
            <br><br>

            <input type="submit" value="Submit" class="submit-btn"><br><br>
            <p>Do not have an account? <a href="register.php">Signup Here!</a></p>

            
            </fieldset>
        </form>

        </div>
    </div>
    
        
            
</body>
</html>