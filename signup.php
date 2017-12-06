<?php
//Подключаемся к mysql
$connect = mysqli_connect("localhost", "root", "root", "neww");
//Проверка на то что мы правильно подключились или нет
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 

if( isset($_POST['submit']))
{
	//Проверка инпутов, если пустые то выводить ошибку
	$error = array();
	if(trim($_POST['login']) == '')

		{$error[] = 'login is empty';}

	if( trim($_POST['email']) == '')

		{$error[] = 'email is empty';}

	if(($_POST['pass1']) == '')

		{$error[] = 'password is empty';}
	//Если значеие инпутов(password) разные то выводит ошибку
	if($_POST['pass2'] != $_POST['pass1'])

		{$error[] = 'Ne sotvetstvuet rePass';}

	//Если все правильно то делается запрос если нет то вывод ошибки на экран
	if(empty($error))
	{
		//SQL запрос в таблицу users		
		$qu = "INSERT INTO users (login, email, password) VALUES ('$_POST[login]', '$_POST[email]', md5('$_POST[pass1]'))";
		// Если в $connect -> query($qu)  нету ошибок то выводится сообщение о том что все прошло успешно
		if ($connect->query($qu) === TRUE) {
    			echo "New record created successfully";
			} else {
    			echo "Error: " . $qu . "<br>" . $connect->error;
			}
		
	}else{echo array_shift($error);}
}

$connect->close();
?>

<form action="signup.php" method="POST" mult>
<input type="text" name="login" placeholder="Write your login" value="<?php echo @$_POST[login]; ?>">
<input type="text" name="email" placeholder="Write your email" value="<?php echo @$_POST[email]; ?>">
<input type="password" name="pass1" placeholder="password">
<input type="password" name="pass2" placeholder="ReWrite your password">
<input type="submit" name="submit">
</form>
