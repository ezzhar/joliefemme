
<?php 
    require_once("DAO.PHP");
    class categorie {
        private $NOM_CAT;
        private $IMG_CAT;

        function __construct($NOM_CAT,$IMG_C){
                
                $this->NOM_CAT = $NOM_CAT ;
                $this->IMG_CAT = $IMG_C ;
            
        }

        function AjouterCategorie(){
            $DOA= new DAO();
            $DOA->AjouterCategorie($this->NOM_CAT,$this->IMG_CAT);
        }
        static function AfficherCategorie(){
            $DOA= new DAO();
        return $DOA->AfficherCategorie();  

        }
        static function ModifierCategorie($id,$n,$qte,$img){
            $DOA= new DAO();
            $DOA->ModifierCategorie($id,$n,$qte,$img);

        }
        static function getCategorie($id){		
            $dao= new DAO();
            return $dao->getCategorie($id);
        }
        static function SupprimerCategorie($id){
            $DOA= new DAO();
            $DOA->SupprimerCategorie($id);
        }
        static function getAllCategorie(){
            $DOA= new DAO();
            return $DOA->getAllCategorie();
        }
        static function getqte($id){
            $DOA= new DAO();
            return $DOA->getqte($id);
        }
        static function majQteProdInCat(){
            $DOA= new DAO();
            return $DOA->majQteProdInCat();
        }

    }

?>
