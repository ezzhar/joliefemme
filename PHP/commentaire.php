
<?php 
    require_once("DAO.PHP");
    class commentaire {
        private $NOM_c;
        private $DESC_c;
        private $IMG_c;

        function __construct($NOM,$DESC,$IMG){
                
                $this->NOM_c = $NOM ;
                $this->DESC_c = $DESC ;
                $this->IMG_c = $IMG ;
            
        }

        function AjouterCommentaire(){
            $DOA= new DAO();
            $DOA->AjouterCommentaire($this->NOM_c,$this->DESC_c,$this->IMG_c);
        }
        static function AfficherCommentaire(){
            $DOA= new DAO();
        return $DOA->AfficherCommentaire();  

        }
        static function getCommentaire($id){		
            $dao= new DAO();
            return $dao->getCommentaire($id);
        }
        static function SupprimerCommentaire($id){
            $DOA= new DAO();
            $DOA->SupprimerCommentaire($id);
        }
    }

?>
