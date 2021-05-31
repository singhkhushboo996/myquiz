<?php 
        require_once "adminconfig.php";
    $id = $_GET['edit_task'];
    $sql="SELECT `categoryname` FROM `category` WHERE `cid`='$id'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $edited=$_POST['editcategory'];
        $editid=$_POST['categoryid'];
        //echo "<pre>"; print_r($); die;
        $sql2="UPDATE `category` SET `categoryname`='$edited' WHERE `cid`= '$editid'";
        $result=mysqli_query($conn,$sql2);
        header('location: adminaddsubject.php');
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
        category: <input type="text" name="editcategory" value="<?php echo $row['categoryname'];?>">
        <br><br>
        <input  type="hidden" name="categoryid" value="<?php echo $id;?>" >
        <button type="submit" name="submit">Update</button>
    

    </form>
    </div>
</body>
</html>