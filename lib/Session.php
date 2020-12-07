<?php
/**
*Session class 
*/

class Session{
	public static function init(){
		session_start();
	}
	
	public static function set($key, $val){
		$_SESSION[$key] = $val;
	}
	
	public static function get($key){
		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		}else{
			return false;
		}
	}
	
	public static function checkSession(){
		self::init();
		if(self::get("attuserlogin")==false){
			self::destroy();
		}
	}
	
	public static function checkSessionAdmin(){
		self::init();
		if(self::get("attadminlogin")==false){
			self::admindestroy();
		}
	}

	public static function checkLogin(){
		if(self::get("attuserlogin")==true){
			header("Location:index.php");
		}
	}

	public static function checkLoginAdmin(){
		if(self::get("attadminlogin")==true){
			header("Location:index.php");
		}
	}

	public static function checkLoginresetpass(){
		if(self::get("attuserlogin")==true){
			header("Location:./../index.php");
		}
	}

	public static function checkLoginresetpassAdmin(){
		if(self::get("attadminlogin")==true){
			header("Location:./../index.php");
		}
	}
	
	public static function admindestroy(){
		//session_destroy();
		unset($_SESSION['attadminlogin']);
		unset($_SESSION['attadminemail']);
		unset($_SESSION['attadminuserId']);
		header("Location:login.php");
		exit();
	}

	public static function destroy(){
		//session_destroy();
		unset($_SESSION['attuserlogin']);
		unset($_SESSION['attuserauth']);
		unset($_SESSION['attuseremployeid']);
		unset($_SESSION['attuserId']);
		header("Location:login.php");
		exit();
	}

	
}


?>