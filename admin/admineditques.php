<?php 
        require_once "adminconfig.php";
    $id = $_GET['edit_ques'];
    $sql="SELECT `question` FROM `questions` WHERE `quesid`='$id'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $edited=$_POST['editques'];
        $editedquesid=$_POST['editquesid'];
        $sql2="UPDATE `questions` SET `question` = '$edited' WHERE `quesid` = '$editedquesid'";
        $result=mysqli_query($conn,$sql2);
        header('location: adminviewques.php');


    }
    



    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit category</title>
    <link rel="stylesheet" href="astyle1.css">
</head>
<body>
    <div class="updation">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        category: <input type="text" name="editques" value="<?php echo $row['question'];?>" size=50>
        <br><br>
        <input type="hidden" name="editquesid" value="<?php echo $id;?>" size=50>
        <button type="submit" name="submit">Update</button>
    

    </form>
    </div>
</body>
</html>