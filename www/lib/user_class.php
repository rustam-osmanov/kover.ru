<?php
	class User {
		private $db;
		private static $user=null;
	private function __construct() {
		$this->db=new mysqli("localhost","root","","rustam009_user");
		$this->db->query("SET NAMES 'utf-8'");
	}
	public static function getObject() {
		if(self::$user===null) self::$user=new User();
		return self::$user;
	}
	public function regUser($login,$password) {
		if($login=="") 	return false;
		if ($password=="") return false;
		$password=md5($password);
		return $this->db->query("INSERT INTO `users`(`login`,`password`,`data_reg`) VALUES('$login','$password','".time()."')");
	}
		private function checkUser($login,$password) {
		if ($login!="" && $password!="") {
			$resul_set=$this->db->query("SELECT `password` FROM `users` WHERE `login`='$login'");
			$user=$resul_set->fetch_assoc();
			$resul_set->close();
			if(!user) return false;
			return $user["password"]===$password;
			
		}
	}
	public function login($login,$password){
		$password=md5($password);
		if($this->checkUser($login,$password)) {
			session_start();
			$_SESSION["login"]=$login;
			$_SESSION["password"]=$password;
			return true;
			}
		else return false;
		}
	public function isAuth(){
		session_start();
		$login=$_SESSION["login"];
		$password=$_SESSION["password"];
		return $this->checkUser($login,$password);
	}	
	public function __destruct() {
		if ($this->db) $this->db->close();
	}
	
	}
?>