<?php 
require_once("DAO.php");
class Commande {

    private $ID_PROD;
	private $NOM_CLIENT;
	private $TELE_CLIENT;
	private $VILLE_CLIENT;
	private $ADD_CLIENT;
	private $QTE_PROD_COMM;
	private $TAILLE;
	private $PRIX_TOTAL;

 

	function __construct($ID_P,$NOM,$TELE,$VILLE,$ADD,$QTE,$t,$p){
        
        $this->ID_PROD=$ID_P;
        $this->NOM_CLIENT=$NOM;
        $this->TELE_CLIENT=$TELE;
        $this->VILLE_CLIENT=$VILLE;
        $this->ADD_CLIENT=$ADD;
        $this->QTE_PROD_COMM=$QTE;
        $this->TAILLE=$t;
        $this->PRIX_TOTAL=$p;
    }
    function AjouterCommande(){
        $DOA= new DAO();
        $DOA->AjouterCommande( $this->ID_PROD ,$this->NOM_CLIENT,$this->TELE_CLIENT,$this->VILLE_CLIENT,$this->ADD_CLIENT,$this->QTE_PROD_COMM,$this->TAILLE,$this->PRIX_TOTAL);
    }
    static function AfficherCommande(){
        $DOA= new DAO();
        return $DOA->AfficherCommande();
        
    }
    static function TOTALPRIX(){
        $DOA= new DAO();
        return $DOA->TOTALPRIX();
        
    }
    static function ModifierCommande($id,$etat){
        $DOA= new DAO();
        $DOA->ModifierCommande($id,$etat);
    }

    
    static function getCommandeqte(){		
        $dao= new DAO();
        return $dao->getCommandeqte();
    }

    static function getCommande($id){		
        $dao= new DAO();
        return $dao->getCommande($id);
    }
    
    static function getprixProduit($id){		
        $dao= new DAO();
        return $dao->getprixProduit($id);
    }

    static function SupprimerCommande($id){

        $DOA= new DAO();
        $DOA->SupprimerCommande($id);
    }
    

}


?>