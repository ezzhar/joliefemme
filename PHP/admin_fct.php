<?php  
require_once("DAO.php");
class Administrateur{
	private $login;
	private $password;
	function __get($prop){
		switch ($prop) {
			case 'EMAIL_ADMIN': return $this->login;  break;
			case 'PASSWORD': return $this->password;  break;
		}
	}
	function __construct($l,$p){
			$this->login=$l;
			$this->password=$p;
	}
	function estUnAdmin(){
		$dao=new DAO();
		return $dao->authentification($this->login,$this->password);
	}

}
?>