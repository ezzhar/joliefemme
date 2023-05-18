<?php 
require_once("DAO.php");
class Admin {

    private $ID_ADMIN;
	private $EMAIL_ADMIN;
	private $PASSWORD;
	private $NOM_ADMIN;
	private $LOCAL;
	private $TELE_ADMIN;

 

	function __construct($ID_A,$EMAIL,$PASS,$NOM,$LOCAL,$TELE){
        
        $this->ID_ADMIN=$ID_A;
        $this->EMAIL_ADMIN=$EMAIL;
        $this->PASSWORD=$PASS;
        $this->NOM_ADMIN=$NOM;
        $this->LOCAL=$LOCAL;
        $this->TELE_ADMIN=$TELE;
    }
    static function AfficherAdmin(){
        $DOA= new DAO();
        return $DOA->AfficherAdmin();
        
    }
    static function ModifierAdmin($ID_ADMIN,$EMAIL_ADMIN,$PASSWORD,$NOM_ADMIN,$LOCAL,$TELE_ADMIN){
        $DOA= new DAO();
        $DOA->ModifierAdmin($ID_ADMIN,$EMAIL_ADMIN,$PASSWORD,$NOM_ADMIN,$LOCAL,$TELE_ADMIN);
    }

    static function getAdmin($id){		
        $dao= new DAO();
        return $dao->getAdmin($id);
    }


}


?>