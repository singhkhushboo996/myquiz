<?php
    session_start();

    require_once "config.php";
    $sql = "SELECT categoryname , cid FROM category";
    $result = mysqli_query($conn,$sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quiz</title>
    <link rel="stylesheet" href="css/style3.css">
    <script src="https://kit.fontawesome.com/a2029513e1.js" crossorigin="anonymous"></script>
</head>
<body>

<ul class="topnav">
  <li><a class="active" href="quizpannel.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
  <li><a href="result.php"><i class="fa  fa-fw fa-poll-h"></i> Result</a></li>
  <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>logout</a></li>
</ul>

<div class="heading">
 <?php
if($_SESSION["username"]) {
?>
 <h1> Welcome <?php echo $_SESSION["username"]; ?></h1>  
<?php
}else echo "<h1>.Please login first .</h1>";
?>
</div>

<div class="categorybtn">
  <?php 
   while($row = mysqli_fetch_array($result)) { ?>
   <div class="button">
  <?php echo "<a  class='button' href='quiz.php?id=" . $row['cid'] . "' target='_blank'>" . $row['categoryname'] . " </a>";?>
   <?php } ?>   
   </div>
   </div>



</body>
</html>