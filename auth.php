<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<div class="home">
<form action="auth.php" method="POST">
<div class="auth">
<h1>Регистрация</h1>
<?php
$connect = mysqli_connect("localhost", "q77671s8_rem","rem%root","q77671s8_rem");
mysqli_set_charset($connect, 'utf8');
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 
if (isset($_POST['auth'])) {
	$errors = array();

	if (trim($_POST['login']) == '') 
	{

		$errors[] = "Введите логин";
	}
	if (trim($_POST['email']) == '') 
	{
		$errors[] = "Пустой email";
	}
	if($_POST['password'] == '')
	{
		$errors[] = "Пустой пароль";
	}
	if ($_POST['repassword'] != $_POST['password'])
	{
		$errors[] = "Введенные пароли не идентичный";
	}

	if (empty($errors)) 
	{
		$query = "INSERT INTO users (login, email, password) VALUES ('$_POST[login]','$_POST[email]', md5('$_POST[password]'))";
		if  ($connect->query($query) ===TRUE)
		{
			echo "Регистрация прошла успешно    ";
			echo "Теперь можете <a href='login.php'>авторизоватся</a>";
		}

	}else{echo array_shift($errors);}
}
?>
	<tr>
		<input type="text" name="login" placeholder="Введите ваш логин" value="<?php echo @$_POST[login]; ?>">
	</tr>
	<tr>
		<input type="text" name="email" placeholder="Введите вашу электронную почту" value="<?php echo @$_POST[email]; ?>">
	</tr>
	<tr>
		<input type="password" name="password" placeholder="Пароль" >
	</tr>
	<tr>
		<input type="password" name="repassword" placeholder="Повторный пароль">
	</tr>
	<tr>
		<input type="submit" name="auth" value="Регистрация">
	</tr>

</div>
</form>
</div>


</body>
</html>