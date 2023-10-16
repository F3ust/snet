<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
</head>
<body>
<?php
    if (isset($_GET['ok'])) {
        echo "Đăng ký thành công " . "<a href='login.php'>Nhấn vào đây để đăng nhập</a>";
    } else {
?>
    <form action="#" method="get">
        Username:
        <input type="text" name="tk"> <br>
        Password:
        <input type="password" name="mk">
        <br>
        Repeat password:
        <input type="password" name="mk1">
        <br>
        Full Name:
        <input type="text" name="fn">
        <br>
        <input type="submit" value="Sign Up" name="dk">
    </form>
<?php
    }
?>
<?php
    if (isset($_GET['dk'])) {
        $tk = $_GET["tk"];
		$mk = $_GET["mk"];
		$fn = $_GET["fn"];
        $mk1 = $_GET['mk1'];
        include("connect.php");
        $sql = "SELECT * FROM users where username ='$tk' and password ='$mk'";
        $res = $connect->query($sql);
        $nrows = $res->num_rows;
        if ($nrows == 0) {
            if ($mk == $mk1) {
                $sql = "INSERT INTO users VALUES('$tk', '$mk', '$fn')";
                $res = $connect->query($sql);
                $connect->close();
	            header("Location: register.php?ok=1");
            } else echo "Mật khẩu không khớp, vui lòng kiểm tra lại";
            
        } else {
            echo "Thông tin bị trùng, vui lòng đăng kí tên khác";
        }
        
    }
?>

</body>
</html>