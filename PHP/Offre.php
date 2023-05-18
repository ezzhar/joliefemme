<?php 
require_once("DAO.php");
class Offre {

    private $ID_OFFER;
	private $ENTETE;
	private $TITRE1;
	private $TITRE2;

 

	function __construct($ID,$ENTET,$T1,$T2){
        
        $this->ID_OFFER=$ID;
        $this->ENTETE=$ENTET;
        $this->TITRE1=$T1;
        $this->TITRE2=$T2;
    }
    static function AfficherOffre(){
        $DOA= new DAO();
        return $DOA->AfficherOffre();
        
    }
    static function ModifierOffre($id,$en,$t1,$t2){
        $DOA= new DAO();
        $DOA->ModifierOffre($id,$en,$t1,$t2);
    }

    static function getOffre($id){		
        $dao= new DAO();
        return $dao->getOffre($id);
    }


}


?>