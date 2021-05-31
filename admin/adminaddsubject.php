<?php
require_once "adminconfig.php";

$error="";

if($_SERVER['REQUEST_METHOD']=="POST")
{
    
    $category=$_POST["category"];
    if(empty($category))
    {
        $error="You must fill the category first";
    
    }else{
        $sql="INSERT INTO `category` ( `categoryname`) VALUES ('$category')";
        mysqli_query($conn,$sql);
        header('location: adminaddsubject.php');
    }  
}

$sql1="SELECT * FROM category";
$result = mysqli_query($conn,$sql1);

if (isset($_GET['del_task'])) {    
$id = $_GET['del_task'];
$sql2="DELETE FROM `category` WHERE `category`.`cid`= '$id'";
mysqli_query($conn, $sql2);
header('location: adminaddsubject.php');
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin category</title>
    <link rel="stylesheet" href="astyle1.css">
    <script src="https://kit.fontawesome.com/a2029513e1.js" crossorigin="anonymous"></script>
</head>
<body>

<ul class="topnav">
  <li><a  href="adminpannel.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
  <li><a href="adminresult.php"><i class="fa  fa-fw fa-poll-h"></i> Result</a></li>
  <li><a   href="adminuser.php"><i class="fas fa-users"></i> Users</a></li>
  <li><a class="active" href="adminsubject.php"><i class="fas fa-plus"></i> Add Category</a></li>
  <li> <a href="adminaddquiz.php"><i class="fas fa-plus"></i> Add Quiz</a></li>
  <li><a href="adminaddquestions.php"><i class="fas fa-plus"></i>Add Questions</a></li>
  <li><a href="adminlogout.php"><i class="fas fa-sign-out-alt"></i>logout</a></li>
</ul>

<form action="adminaddsubject.php" method="post">
    <?php if (isset($error)) { ?>
	    <p><?php echo $error; ?></p>
    <?php } ?>
Category:<input type="text" name="category" id="category" size=50 class="task_input"><br>
<button type="submit" class="add_btn" name="submit">Add Category</button>
    </form>

    <table>
<thead>
    <tr>
        <th>Sno.</th>
        <th>Category</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
    <?php  $i=1; while ($row =mysqli_fetch_array($result)) { ?>
    <tr>
        <td class="sno"><?php echo $i; ?></td>
        <td class="category" ><?php echo $row['categoryname']; ?></td>
        <td class="edit">
         <a href="admineditsubject.php?edit_task=<?php echo $row['cid'] ?>"><i class="fas fa-edit"></i></a>
        </td>
        <td class="delete">
         <a href="adminaddsubject.php?del_task=<?php echo $row['cid'] ?>"><i class="fas fa-trash-alt"></i></a>
        </td>

           
    </tr>
    <?php $i++; } ?>

</tbody>
</table>





</div>


</body>
</html>