<?php
	require_once "lib/user_class.php";
	$user=User::getObject();
	$auth=$user->isAuth();
	print_r ($_FILES);
	if (isset($_POST["reg"])) {
		header("Location:http://kover.ru/reg.php");
	}
	if (isset($_POST["auth"])) {
		$login=$_POST["login"];
		$password=$_POST["password"];
		$auth_succes=$user->login($login,$password);
		
		if ($auth_succes)  {
		header("Location:http://kover.ru/index.php");
		exit;
		}
		else {
			echo "Неверный логин или пароль";
		}
	}
	if ($auth) {
		$displayauth ="none";
		echo "Вы авторизованы ".$_SESSION["login"]."(<a href='logout.php'>Выход</a>)"."</br>";
		echo "Ваш пароль ".md5($_SESSION["password"]);
	}
	else $displayauth ="display";
	$poiskurl="/.*reg\.php/";
		if  (preg_match($poiskurl,$_SERVER["HTTP_REFERER"])) {
		$display="none";
	}
		else $display="display";
?>
<html>
	<title> Главная страница </title>
	<link type="text/css" rel="stylesheet" href="style.php"/>
	<body bgcolor=<?php echo "$col" ?>>
		<div class="levaya" style='display:<?php echo $displayauth ?>'> 
			<form name="auth" action="index.php" enctype="multipart/form-data" method="POST">
				<div>Логин</div>
				<input type="text" name="login" value="Login"/>
				<div>Пароль</div>
				<input type="password" name="password" value=""/>
				<table id="adres">
				<p>kjhkjhk</p>

	<tr>
		<td> Фоновое Изображение </td>
		<td> <input type="file" name="img" /></td>
	</tr>

	</table>
				<div class="subauth">
				<input type="submit" name="auth" value="Войти"/>
				</div>
				
			</form>
			<div class="reg" style='display:<?php echo $display ?>'>
 			<form name="reg" action="index.php" method="POST">
			<div>Регистрация</div>
				<input type="submit" name="reg" value="Зарегистрироваться"/>
			</form>
			</div>
		</div>
	</body>

</html>