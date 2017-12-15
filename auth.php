<?php

$connect = mysqli_connect("localhost", "q77671s8_rem","rootrem%","q77671s8_rem");

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
			echo "Регистрация прошла успешно";
			echo "Теперь можете <a href='login.php'>авторизоватся</a>";
		}

	}else{echo array_shift($error);}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
</head>
<body>

<form action="auth.php" method="POST">
<table>
	<tr>
	<td><input type="text" name="login" placeholder="Введите ваш логин"></td>
	<td><input type="text" name="email" placeholder="Введите вашу электронную почту"></td>
	<td><input type="password" name="password" placeholder="Пароль"></td>
	<td><input type="password" name="repassword" placeholder="Повторный пароль"></td>
	<td><input type="submit" name="auth"></td>
	</tr>
</table>
</form>



</body>
</html>