<!DOCTYPE html>
<html>
<head>
	<title>Автоизация</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<div class="home">
<div class="auth">
<?php
session_start();
//Подключаемся к mysql
$connect = mysqli_connect("localhost", "q77671s8_rem","rem%root","q77671s8_rem");
mysqli_set_charset($connect, 'utf8');
if($_POST)
{
$query = "SELECT * FROM users WHERE login='$_POST[ulogin]' and password=md5('$_POST[upass]') ";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) == 1)
{
	session_start();
	$_SESSION['auth']='true';
	header('Location:index.php');
}else { echo "Something wrong password or login";}
}
$connect->close();
?>
	<form action="login.php" method="POST">
		<h1>Авторизация</h1>
		<input type="text" name="ulogin" placeholder="Логин" value="<?php echo @$_POST[login]; ?>">
		<input type="password" name="upass" placeholder="Пароль">

		<input type="submit" name="submitLog">
	</form>
	<a href="signup.php">Sign Up</a>
</div>
</div>

</body>
</html>
