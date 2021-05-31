<?php
require_once "adminconfig.php";

$error="";

if($_SERVER['REQUEST_METHOD']=="POST")
{
  $quizname=$_POST['quizname'];
  $quesname=$_POST['quesname'];
  $option1=$_POST['option1'];
  $option2=$_POST['option2'];
  $option3=$_POST['option3'];
  $option4=$_POST['option4'];
  $answer=$_POST['answer'];

  if(empty($quizname) && empty($quesname))
    {
        $error="You must fill all the fields";
    
    }
    else{
      // inserting question with cid
      $sql="INSERT INTO `questions` ( `question`,`qid`,`opt1`,`opt2`,`opt3`,`opt4`,`ans`) VALUES ('$quesname','$quizname','$option1','$option2','$option3','$option4','$answer')";
      mysqli_query($conn,$sql);
      header('location: adminaddquestions.php');

    }




}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Add Questions</title>
    <link rel="stylesheet" href="astyle1.css">
    <script src="https://kit.fontawesome.com/a2029513e1.js" crossorigin="anonymous"></script>
</head>
<body>

<ul class="topnav">
  <li><a  href="adminpannel.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
  <li><a href="adminresult.php"><i class="fa  fa-fw fa-poll-h"></i> Result</a></li>
  <li><a   href="adminuser.php"><i class="fas fa-users"></i> Users</a></li>
  <li><a href="adminaddsubject.php"><i class="fas fa-plus"></i> Add Category</a></li>
  <li><a  href="adminaddquiz.php"><i class="fas fa-plus"></i> Add Quiz</a></li>
  <li><a  class="active" href="adminaddquestions.php"><i class="fas fa-plus"></i>Add Questions</a></li>
  <li><a href="adminlogout.php"><i class="fas fa-sign-out-alt"></i>logout</a></li>
</ul>

<form action="adminaddquestions.php" method="post">
    <?php if (isset($error)) { ?>
	    <p><?php echo $error; ?></p>
    <?php } ?>
Quiz Name: <select name="quizname">
        <option disabled selected>-- Select Quiz --</option>
        <?php
        
        $records = mysqli_query($conn, "SELECT `quizname`,`qid` From quizname");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['qid'] ."'>" .$data['quizname'] ."</option>";  // displaying data in option menu
        }	
     ?>  
      </select>
        <br><br>
Question:<input type="text" name="quesname" id="quesname" size=80 class="task_input"><br>
option 1:<input type="text" name="option1" id="option1" size=80 class="task_input"><br>
option 2:<input type="text" name="option2" id="option2" size=80 class="task_input"><br>
option 3:<input type="text" name="option3" id="option3" size=80 class="task_input"><br>
option 4:<input type="text" name="option4" id="option4" size=80 class="task_input"><br>
Correct Answer: <select name="answer">
                    <option disabled selected>--Select options--</option>
                    <option value="1">option 1</option>
                    <option value="2">option 2</option>
                    <option value="3">option 3</option>
                    <option value="4">option 4</option>
                </select>

<button type="submit" class="add_btn" name="submit">Add Question</button>
 </form>






</div>


</body>
</html>