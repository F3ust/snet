<?php
    session_start();
    include("connect.php");
    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mạng Xã Hội 12A2</title>
    <style>
        table {
            width: 100%;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">MẠNG XÃ HỘI 12A2</h1>
    <table>
        <tr>
            <td style="text-align: right;">
<?php
    if (!isset($_SESSION['username'])) {

?>
    <a href="register.php">Đăng ký|</a> <a href="login.php">Đăng nhập</a> 
<?php
    } else {
        $tk = $_SESSION['username'];
        echo "Xin chào $tk "
?>
    <a href="logout.php">(thoát)</a>
    <a href="post.php?id=0">Đăng bài</a>
<?php
    }
?>
            </td>
        </tr>
    </table>
    <ul>
        
<?php
    $sql = "SELECT * From news where pid = 0";
    $res = $connect->query($sql);
    while ($row = $res->fetch_assoc()) {
        $nd = $row['content'];
        $pid = $row['id'];
        $us = $row['user'];
        echo "<li>";
        echo "$nd " . "- <i>$us</i> | ";
        echo "[<a href='post.php?id=$pid'>Phản hồi</a>]";
        echo "<br>";
        echo "<a href='index.php?id=$pid'><i>Xem các phản hồi</i></a>";
        
        
        if (isset($_GET['id'])) {

?>
        <ul>
<?php
    $id = $_GET['id'];
    $sql1 = "SELECT * From news where pid = $id";
    $res1 = $connect->query($sql1);
    while ($row1 = $res1->fetch_assoc()) {
        $nd1 = $row1['content'];
        $us1 = $row1['user'];
        $pid1 = $row1['pid'];
        if ($pid == $pid1) {
            echo "<li>";
            echo "$nd1 " . "- <i>$us1</i>";
            echo "<br>";
            echo "</li>";
        }
        
    }
?>
        </ul>
<?php
        }
        echo "<hr>";
        echo "</li>";
    }
?>
    </ul>

<?php
    $connect->close()
?>

</body>
</html>