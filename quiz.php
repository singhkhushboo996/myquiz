<?php 

require_once "config.php";

    $categoryid= $_GET['id'];
    

    $sql1="SELECT * FROM quizname WHERE cid = '$categoryid'";
    $result = mysqli_query($conn,$sql1);

    // if (isset($_GET['del_task'])) {    
    // $id = $_GET['del_task'];
    // $sql2="DELETE FROM `register` WHERE `register`.`email`= '$id'";
    // mysqli_query($conn, $sql2);
    // header('location: adminuser.php');
  //}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizes</title>
    <link rel="stylesheet" href="css/style4.css">
    <script src="https://kit.fontawesome.com/a2029513e1.js" crossorigin="anonymous"></script>
</head>
<body>

<ul class="topnav">
  <li><a  href="quizpannel.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
  <li><a  class="active" href="quiz.php"><i class="fas fa-vial"></i>Quiz</a></li>
  <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>logout</a></li>
</ul>

<table>
<thead>
    <tr>
        <th>Sno.</th>
        <th>Quiz Name</th>
        <th>Play</th>
    </tr>
</thead>
<tbody>
    <?php  $i=1; while ($row =mysqli_fetch_array($result)) { ?>
    <tr>
        <td class="sno"><?php echo $i; ?></td>
        <td class="quizname" ><?php echo $row['quizname']; ?></td>
        <td class="delete">
         <a href="play.php?quizid=<?php echo $row['qid'] ;?>" target=_blank>Start <i class="fas fa-play"></i></a>
        </td>
           
    </tr>
    <?php $i++; } ?>

</tbody>
</table>











</div>


</body>
</html>