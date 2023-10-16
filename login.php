<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
<?php
    if (isset($_POST['tk'])) {
        $tk = $_POST['tk'];
        $mk = $_POST['mk'];
        include("connect.php");
        $sql = "SELECT * FROM users where username ='$tk' and password ='$mk'";
        $res = $connect->query($sql);
        $nrows = $res->num_rows;
        $row = $res->fetch_assoc();
        if ($nrows == 1) {
            $_SESSION['username'] = $tk;
            $connect->close();
            header("Location: index.php");
        } else header("Location: login.php?err=1");
    } else {
?>
    <form action="login.php" method="post">
        Username:
        <input type="text" name="tk" id="tk">
        <br>
        Password:
        <input type="password" name="mk" id="mk">
        <br>
        <input type="submit" name="dn" id="dn" value="Login">
<?php
        if (isset($_GET['err'])) {
            echo "<br>";
            echo "Invalid Information. Please login again.";
        }
    }
?>
    </form>
<?php
    
?>
</body>
</html>