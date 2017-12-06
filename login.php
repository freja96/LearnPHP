<?php
session_start();
//Подключаемся к mysql
$connect = mysqli_connect("localhost", "root", "root", "neww");
//Проверка на то что мы правильно подключились или нет
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 
if($_POST)
{
$query = "SELECT * FROM users WHERE login='$_POST[ulogin]' and password='$_POST[upass]' ";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) == 1)
{
	session_start();
	$_SESSION['auth']='true';
	header('Location:menu.php');
}else { echo "Something wrong password or login";}



}



$connect->close();
?>

<form action="login.php" method="POST" mult>
<input type="text" name="ulogin" placeholder="Write your login" value="<?php echo @$_POST[login]; ?>">
<input type="password" name="upass" placeholder="password">

<input type="submit" name="submitLog">
</form>
<a href="signup.php">Sign Up</a>