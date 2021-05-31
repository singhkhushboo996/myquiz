<?php 

    require_once "adminconfig.php";
    $quizid=$_GET['view_ques'];
    echo $quizid;  
    
    $sql="SELECT * FROM questions";
    $result=mysqli_query($conn,$sql);

    if (isset($_GET['del_task'])) {    
        $id = $_GET['del_task'];
        $sql2="DELETE FROM `qustions` WHERE `question`.`quesid`= '$id'";
        mysqli_query($conn, $sql2);
        header('location: adminviewques.php');
        }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Question</title>
    <link rel="stylesheet" href="astyle1.css">
    <script src="https://kit.fontawesome.com/a2029513e1.js" crossorigin="anonymous"></script>
</head>
<body>
<table>
<thead>
    <tr>
        <th>Sno.</th>
        <th>Questions</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
</thead>
<tbody>
    <?php  $i=1; while (($row =mysqli_fetch_array($result))) { ?>
    <tr>
        <td class="sno"><?php echo $i; ?></td>
        <td class="question" ><?php echo $row['question']; ?></td>
        <td class="delete">
         <a href="adminviewques.php?del_task=<?php echo $row['quesid'] ?>"><i class="fas fa-trash-alt"></i></a>
        </td>
        <td class="edit">
         <a href="admineditques.php?edit_ques=<?php echo $row['quesid'] ?>">Edit</a>
        </td>
 
    </tr>
    <?php $i++; } ?>

</tbody>
</table>
</body>
</html>