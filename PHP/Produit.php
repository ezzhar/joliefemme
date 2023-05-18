<?php 
require_once("DAO.php");
class Produit {

   
	private $NOM_PROD;
	private $ID_CAT;
	private $PRIX;
	private $OLD_PRIX;
	private $COLOR_PROD;
    private $ETAT_PROD;
    private $QTE_PROD;
    private $DESC_PROD;
    private $IMGS_PROD1;
    private $IMGS_PROD2;
    private $IMGS_PROD3;
    private $IMGS_PROD4;
    private $IMGS_PROD5;

 

	function __construct($NOM,$id_c,$P,$OP,$COLOR,$ETAT_PROD,$QTE,$DESC,$IMGS1,$IMGS2,$IMGS3,$IMGS4,$IMGS5){
        
        $this->NOM_PROD=$NOM;
        $this->ID_CAT=$id_c;
        $this->PRIX=$P;
        $this->OLD_PRIX=$OP;
        $this->COLOR_PROD=$COLOR;
        $this->ETAT_PROD=$ETAT_PROD;
        $this->QTE_PROD=$QTE;
        $this->DESC_PROD=$DESC;
        $this->IMGS_PROD1=$IMGS1;
        $this->IMGS_PROD2=$IMGS2;
        $this->IMGS_PROD3=$IMGS3;
        $this->IMGS_PROD4=$IMGS4;
        $this->IMGS_PROD5=$IMGS5;
    }
    function AjouterProduit(){
        $DOA= new DAO();
        $DOA->AjouterProduit( $this->NOM_PROD,$this->ID_CAT,$this->PRIX,$this->OLD_PRIX,$this->COLOR_PROD,$this->ETAT_PROD,$this->QTE_PROD,$this->DESC_PROD,$this->IMGS_PROD1,$this->IMGS_PROD2,$this->IMGS_PROD3,$this->IMGS_PROD4,$this->IMGS_PROD5);
    }
    static function AfficherProduit(){
        $DOA= new DAO();
        return $DOA->AfficherProduit();
        
    }
    static function ModifierProduit($id,$id_c,$NOM_PROD,$PRIX,$OLD_PRIX,$COLOR_PROD,$ETAT_PROD,$QTE_PROD,$DESC_PROD){
        $DOA= new DAO();
        $DOA->ModifierProduit($id,$id_c,$NOM_PROD,$PRIX,$OLD_PRIX,$COLOR_PROD,$ETAT_PROD,$QTE_PROD,$DESC_PROD);
    }

    static function getProduitCAT($id){		
        $dao= new DAO();
        return $dao->getProduitCAT($id);
    }
    static function getProduit($id){		
        $dao= new DAO();
        return $dao->getProduit($id);
    }
    static function getProduitqte(){		
        $dao= new DAO();
        return $dao->getProduitqte();
    }
    static function getProduitcontex($id){		
        $dao= new DAO();
        return $dao->getProduitcontex($id);
    }

    static function SupprimerProduit($id){

        $DOA= new DAO();
        $DOA->SupprimerProduit($id);
    }

    static function getAllProduit (){
    
        $DOA= new DAO();
        return $DOA->getAllProduit();
    }
    static function getLastProduit (){
    
        $DOA= new DAO();
        return $DOA->getLastProduit();
    }


    

}





?>