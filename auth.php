<?php

session_start();
require 'include/config.php';
foreach ($bd_connect as $v => $value) {
	echo $v." ".$value;
}
echo $bd_connect['root'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 



</head>
<body>
<div class="home">
<form action="auth.php" method="POST">
<div class="auth">
<center><h1>Регистрация</h1></center>
<?php

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
		<input type="text" name="login" placeholder="Придумайте логин от 6 до 14 значений" value="<?php echo @$_POST[login]; ?>" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{6,14}$" required>
		<h7 style="color:rgb(255,0,0); margin-left: 30px;">Логин должен состоять только из цифр и латинских букв </h7>
	</tr>
	<tr>
		<input type="email" name="email" placeholder="Введите вашу электронную почту" value="<?php echo @$_POST[email]; ?>" required >
		<h7 style="color:rgb(255,0,0); margin-left: 30px;">Пример: example@example.com</h7>
	</tr>
	<tr>
		<input type="password" name="password" placeholder="Пароль от 6 до 16 значений  " required pattern="(?=^.{6,16}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
		<h7 style="color:rgb(255,0,0); margin-left: 30px;">Пример: eXample$12, объязательные условие заглавная буква, символ, цифр</h7>
	</tr>
	<tr>
		<input type="password" name="repassword" placeholder="Повторный пароль" required>
	</tr>
	<tr>
		<div class="g-recaptcha" data-callback="enableBtn" name="recaptcha" data-sitekey="6Ld5MD0UAAAAAE3TzpwhAn4U4Ig_9vr2ois33DLG"></div>
	</tr>
	<tr>
		<p id="sub">Please click the reCaptcha</p>
		<input id="submit" type="submit" name="auth" value="Регистрация">
	</tr>

</div>
</form>
</div>

<!--<script>
	document.getElementById("submit").disabled = true;
	
	
	function enableBtn() {
  	document.getElementById('submit').disabled = false;
  	document.getElementById("sub").innerHTML = "Now you can click it";
  	}
  </script>
-->
</body>
</html>