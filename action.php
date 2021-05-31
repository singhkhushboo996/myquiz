<?php
//establishing connection to the database
  include 'config.php';
  


    // initialize errors variable
    $fnameErr = $lnameErr = $emailErr = $mobileErr = $dobErr = $genderErr = $usernameErr = $passErr = $confirmpassErr = "";
    // initialize field name variable
    $fname = $lname = $email =$mobile = $dob = $gender = $username = $pass = $confirmpass= "";


    if ($_SERVER['REQUEST_METHOD']=="POST") {
        

        $dob = $_POST["dob"];
        $gender= $_POST["gender"];

      // Validation for first name
            if (empty($_POST["fname"]))  {
                $fnameErr = "Empty field";
            }
            else {
                $fname = $_POST["fname"];

            }
          // Validation for Last name
            if (empty($_POST["lname"])) {
                $lnameErr = "Empty field";
            }
            else {
                $lname = $_POST["lname"];
                }
            // Validation for Email ID field and its link

            if (empty($_POST["email"]))  {
                $emailErr = "Missing";
            }
            else {
                $email = $_POST["email"];
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                }
            }
            
          // Validation for Phone Number field
            if (empty($_POST["mobile"])) {
                $mobileErr = "Phone Number Missing!!";
            }

            else {
                $mobile = $_POST["mobile"];
            }

         // validation for username field
         if(empty($_POST["username"])) {
             $usernameErr="username is missing!!";
         }else{
            $username = $_POST["username"];
             if (!preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) {
                $usernameErr = "alphanumeric allowed and username length minimum 5 characters";
               
            }
        }
        
        //validation on password
        if(empty($_POST["pass"])){
            $passErr="Password is missing !!";
        }else{
             $pass = $_POST["pass"];
             if (strlen($_POST["pass"]) <= '6') {
                $passErr = "Your Password Must Contain At Least 6 Characters!";
                }
                elseif(!preg_match("#[0-9]+#",$pass)) {
                $passErr = "Your Password Must Contain At Least 1 Number!";
                
                }
                elseif(!preg_match("#[A-Z]+#",$pass)) {
                $passErr = "Your Password Must Contain At Least 1 Capital Letter!";
                
                }
                elseif(!preg_match("#[a-z]+#",$pass)) {
                $passErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
                }
            }

         // validation for confirmpassword
         if(empty($_POST["confirmpass"]))
         {
             $confirmpassErr="confirmpass is missing!!";
         }   
         else{
                $confirmpass = $_POST["confirmpass"];
                if(!($_POST["pass"] == $_POST["confirmpass"]))
                {
                    $confirmpassErr="Please check confirmpassword must equal to password";
                }
         }
            

        // inserting field data into database
        $sql = "INSERT INTO `register` (`firstname`, `lastname`, `email`, `mobile`, `dob`, `gender`, `username`, `password`, `confirmpassword`) VALUES ('$fname', '$lname', '$email', '$mobile', '$dob', '$gender', '$username', '$pass', '$confirmpass')";
          if (mysqli_query($conn, $sql)) {
            echo "sucessfully added";
            header("Location:login.php");
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          
          mysqli_close($conn);



    }
    ?>
