<?php
require_once "adminconfig.php";

$error="";

if($_SERVER['REQUEST_METHOD']=="POST")
{

    $categoryname= $_POST["categoryname"];
    $quizname=$_POST["quizname"];
    if(empty($quizname) && empty($categoryname))
    {
        $error="You must fill the category and Quiz Name first";
    
    }else{
        $sql="INSERT INTO `quizname` ( `quizname`,`cid`) VALUES ('$quizname','$categoryname')";
        mysqli_query($conn,$sql);
        header('location: adminaddquiz.php');
    }  
}

$sql1="SELECT * FROM quizname";
$result = mysqli_query($conn,$sql1);

$records = mysqli_query($conn, "SELECT `categoryname` From category");





if (isset($_GET['del_task'])) {    
$id = $_GET['del_task'];
$sql2="DELETE FROM `quizname` WHERE `quizname`.`qid`= '$id'";
mysqli_query($conn, $sql2);
header('location: adminaddquiz.php');
}
if (isset($_GET['add_ques'])) {    
    $id = $_GET['add_ques'];
    
    header('location: adminaddquestions.php');
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin quiz</title>
    <link rel="stylesheet" href="astyle1.css">
    <script src="https://kit.fontawesome.com/a2029513e1.js" crossorigin="anonymous"></script>
</head>
<body>

<ul class="topnav">
  <li><a  href="adminpannel.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
  <li><a href="adminresult.php"><i class="fa  fa-fw fa-poll-h"></i> Result</a></li>
  <li><a   href="adminuser.php"><i class="fas fa-users"></i> Users</a></li>
  <li><a href="adminaddsubject.php"><i class="fas fa-plus"></i> Add Category</a></li>
  <li><a class="active" href="adminaddquiz.php"><i class="fas fa-plus"></i> Add Quiz</a></li>
  <li><a href="adminaddquestions.php"><i class="fas fa-plus"></i>Add Questions</a></li>
  <li><a href="adminlogout.php"><i class="fas fa-sign-out-alt"></i>logout</a></li>
</ul>

<form action="adminaddquiz.php" method="post">
    <?php if (isset($error)) { ?>
	    <p><?php echo $error; ?></p>
    <?php } ?>
Category: <select name="categoryname">
        <option disabled selected>-- Select Category --</option>
        <?php
        
        $records = mysqli_query($conn, "SELECT `categoryname`,`cid` From category");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['cid'] ."'>" .$data['categoryname'] ."</option>";  // displaying data in option menu
        }	
     ?>  
      </select>
        <br><br>
Quiz Name:<input type="text" name="quizname" id="quizname" size=50 class="task_input"><br>
<button type="submit" class="add_btn" name="submit">Add Quiz</button>
    </form>


    <table>
<thead>
    <tr>
        <th>Sno.</th>
        <th>Quiz Name</th>
        <th>Action</th>
        <th>View</th>
        <th>Add Questions</th>

    </tr>
</thead>
<tbody>
    <?php  $i=1; while (($row =mysqli_fetch_array($result))) { ?>
    <tr>
        <td class="sno"><?php echo $i; ?></td>
        <td class="quizname" ><?php echo $row['quizname']; ?></td>
        <td class="delete">
         <a href="adminaddquiz.php?del_task=<?php echo $row['qid'] ?>"><i class="fas fa-trash-alt"></i></a>
        </td>
        <td class="viewques">
         <a href="adminviewques.php?view_ques=<?php echo $row['qid'] ?>">View Questions</a>
        </td>
        <td class="addques">
         <a href="adminaddquestions.php?add_ques=<?php echo $row['qid'] ?>"><i class="fas fa-plus"></i>Add Questions</a>
        </td>
           
    </tr>
    <?php $i++; } ?>

</tbody>
</table>








</div>


</body>
</html>