<?php
    $quizid= $_GET['quizid'];
    echo $quizid;

    require_once "config.php";
    session_start();

?>
<!DOCTYPE>
<html>
<head>
<title>Quiz Play</title>
<style>
body {
    background: url("bg.jpg");
	background-size:100%;
	background-repeat: no-repeat;
	position: relative;
	background-attachment: fixed;
}
/* button */
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 500px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
 
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
 
.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
 
.button:hover span {
  padding-right: 25px;
}
 
.button:hover span:after {
  opacity: 1;
  right: 0;
}
.title{
	background-color: #ccc11e;
	font-size: 28px;
  padding: 20px;
  text-align:center;
	
}
.button3 {
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.button3 {
    background-color: white; 
    color: black; 
    border: 2px solid #f4e542;
}
 
.button3:hover {
    background-color: #f4e542;
    color: Black;
}
</style>
</head>
<body>
<div class="title">Quiz</div>
<?php
if (($_SERVER['REQUEST_METHOD']=="POST") || isset($_GET['start'])) {

  
  $_SESSION['clicks'] += 1 ;
  $c = $_SESSION['clicks'];
   

  if(isset($_POST['userans'])) { 
    
  $userselected = $_POST['userans'];                    
  $fetchqry2 = "UPDATE `questions` SET `userans`='$userselected' WHERE `quesid`=$c-1"; 
  $result2 = mysqli_query($conn,$fetchqry2);

  }
               
   } else {
    $_SESSION['clicks'] = 0;
    }
              
      //echo($_SESSION['clicks']);

?>
<div class="bump"><br><form><?php if($_SESSION['clicks']== 0){ ?>
 <?php echo "<button name='start' class='button'><a style='text-decoration:none;' href='play.php?start=1&quizid=" . $quizid . "'> start Quiz</a> </button>";

// $qry3 = "SELECT * FROM `questions` WHERE `qid`= " . $_GET['quizid'] ."";
// $result3 = mysqli_query($conn,$qry3);
// $storeArray = Array();
// $row3 = mysqli_fetch_all($result3);
// echo "<pre>";
//    echo print_r($row3);
//    echo "</pre>";
 }?></form></div>
    
<form action="" method="post">  				
<table> 
<?php
if(isset($c)){
   $fetchqry = "SELECT * FROM `questions` where `qid`='$quizid'"; 
				$result=mysqli_query($conn,$fetchqry);
				$num=mysqli_num_rows($result);
				
        // echo "<pre>";
        // echo print_r($row);
        // echo "</pre>";
        // die();
      
          while($row = mysqli_fetch_array($result)){
 ?>

      
<tr><td><h3><br><?php echo $row['question'];?></h3></td></tr> <?php if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < 6){ 
   ?>
  <tr><td><input required type="radio" name="userans" value="1">&nbsp;<?php echo $row["opt1"] ; ?><br>
  <tr><td><input required type="radio" name="userans" value="2">&nbsp;<?php echo $row["opt2"] ;?></td></tr>
  <tr><td><input required type="radio" name="userans" value="3">&nbsp;<?php echo $row["opt3"] ; ?></td></tr>
  <tr><td><input required type="radio" name="userans" value="4">&nbsp;<?php echo $row["opt4"] ; ?><br><br><br></td></tr>
  <tr><td><button class="button3" name="click" >Next</button></td></tr> <?php }}} ?> 
  </form>

 <?php if($_SESSION['clicks'] > 5){ 
	$qry3 = "SELECT * FROM `questions` WHERE `qid`= " . $_GET['quizid'] ."";
	$result3 = mysqli_query($conn,$qry3);
	//$storeArray = Array();
	while ($row3 = mysqli_fetch_array($result3)) {
     if($row3['ans'] == $row3['userans']){
		 @$_SESSION['score'] += 1 ;
	 }
}
 ?> 
 
 <h2>Result</h2>
 <span>No. of Correct Answer:&nbsp;<?php echo $no = @$_SESSION['score'];
 session_unset(); ?></span><br>
 <span>Your Score:&nbsp<?php echo $no*2; ?></span>
<?php } ?>
</body>
</html>