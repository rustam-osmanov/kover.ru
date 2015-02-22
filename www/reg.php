<?php 
	require_once "lib/user_class.php";	
	if (isset($_POST["reg"])) {
		$login=$_POST["login"];
		$password=$_POST["password"];
		$user=User::getObject();
		$reg_succes=$user->regUser($login,$password);
		if ($reg_succes==false) {
			echo "Регистрация не выполнена";
		}
		else {header("Location:http://kover.ru/index.php");
		}
	}
	else {
		echo "IDI OTSYUDA";
	}
?>
<html>
	<title> Регистрация</title>
	<link type="text/css" rel="stylesheet" href="style.php"/>
	<body>
		<div class="levaya"> 
			<form name="reg" action="reg.php" method="POST">
				<div>Логин</div>
				<input type="text" name="login" value="Login"/>
				<div>Пароль</div>
				<input type="password" name="password" value=""/>
				<div class="subauth">
				<input type="submit" name="reg" value="Зарегистрироваться"/>
				</div>
			</form>
		</div>
	</body>

</html>