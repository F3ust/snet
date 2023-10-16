<?php
    session_start();
    include("connect.php");
    $id = $_GET['id'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    
</head>
<body>
<?php 
    if (!isset($_SESSION['username'])) {
        echo "Sai thông tin ";
        echo "<a href='index.php'>Nhấn vào đây để về trang chủ</a>";
    } else {
?>

    <form method="post">
       
        Nội dung: <br>
        <input type="text" name="nd" size="100">
        <br>
        <input type="submit" name="dk" value="Post">
    </form>
    
<?php 
    }
?>
<?php
    if (isset($_POST['dk'])) {
        $ab = $_POST["nd"];
        $tk = $_SESSION["username"];
        include("connect.php");
        $sql = "INSERT INTO news VALUES(NULL,'$id', '$tk', '$ab')";

        $res = $connect->query($sql);
		
        $connect->close();
	    header("Location: index.php");
    }
?>
</body>
</html>
