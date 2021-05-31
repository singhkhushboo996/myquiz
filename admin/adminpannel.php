<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin pannel</title>
    <link rel="stylesheet" href="astyle1.css">
    <script src="https://kit.fontawesome.com/a2029513e1.js" crossorigin="anonymous"></script>
</head>
<body>

<ul class="topnav">
  <li><a class="active" href="adminpannel.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
  <li><a href="adminresult.php"><i class="fa  fa-fw fa-poll-h"></i> Result</a></li>
  <li><a href="adminuser.php"><i class="fas fa-users"></i> Users</a></li>
  <li><a href="adminaddsubject.php"><i class="fas fa-plus"></i> Add Category</a></li>
  <li><a href="adminaddquiz.php"><i class="fas fa-plus"></i> Add Quiz</a></li>
  <li><a href="adminaddquestions.php"><i class="fas fa-plus"></i>Add Questions</a></li>
  <li><a href="adminlogout.php"><i class="fas fa-sign-out-alt"></i>logout</a></li>
</ul>

<div class="heading">
 <?php
if($_SESSION["adminuser"]) {
?>
 <h1> Welcome <?php echo $_SESSION["adminuser"]; ?></h1>  
<?php
}else echo "<h1>.Please login first .</h1>";
?></div>





</div>


</body>
</html>