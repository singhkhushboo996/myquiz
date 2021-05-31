<?php
    require_once "adminconfig.php";

    $sql1="SELECT * FROM register";
    $result = mysqli_query($conn,$sql1);

    if (isset($_GET['del_task'])) {    
    $id = $_GET['del_task'];
    $sql2="DELETE FROM `register` WHERE `register`.`email`= '$id'";
    mysqli_query($conn, $sql2);
    header('location: adminuser.php');
  }

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
  <li><a  href="adminpannel.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
  <li><a href="adminresult.php"><i class="fa  fa-fw fa-poll-h"></i> Result</a></li>
  <li><a  class="active" href="adminuser.php"><i class="fas fa-users"></i> Users</a></li>
  <li><a href="adminaddsubject.php"><i class="fas fa-plus"></i> Add Category</a></li>
  <li><a href="adminaddquiz.php"><i class="fas fa-plus"></i> Add Quiz</a></li>
  <li><a href="adminaddquestions.php"><i class="fas fa-plus"></i>Add Questions</a></li>
  <li><a href="adminlogout.php"><i class="fas fa-sign-out-alt"></i>logout</a></li>
</ul>

<table>
<thead>
    <tr>
        <th>Sno.</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php  $i=1; while ($row =mysqli_fetch_array($result)) { ?>
    <tr>
        <td class="sno"><?php echo $i; ?></td>
        <td class="username" ><?php echo $row['username']; ?></td>
        <td class="email" ><?php echo $row['email']; ?></td>
        <td class="delete">
         <a href="adminuser.php?del_task=<?php echo $row['email'] ?>"><i class="fas fa-trash-alt"></i></a>
        </td>
           
    </tr>
    <?php $i++; } ?>

</tbody>
</table>







</div>


</body>
</html>