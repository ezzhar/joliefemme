<?php
class DAO{

    function getPDO(){
		return new PDO("mysql:host=localhost;dbname=ecom_database","root","");
	}

    
    function authentification($login, $password)
	{
		$pdo = $this->getPDO();
		$res = $pdo->prepare("SELECT * FROM administratrice where EMAIL_ADMIN=? and PASSWORD =? ;");
		$res->execute(array($login, $password));
		if ($res->fetch()) return True;
		return False;
	}
    

  //produits
    function AjouterProduit($NOM_PROD,$ID_CAT,$PRIX,$OLD_PRIX,$COLOR_PROD,$ETAT_PROD,$QTE_PROD,$DESC_PROD,$IMG_PROD1,$IMG_PROD2,$IMG_PROD3,$IMG_PROD4,$IMG_PROD5){
        $pdo = $this->getPDO();
        $add=$pdo->prepare("INSERT into produits (NOM_PROD,ID_CAT,PRIX,OLD_PRIX,COLOR_PROD,ETAT_PROD,QTE_PROD,DESC_PROD,IMG_PROD1,IMG_PROD2,IMG_PROD3,IMG_PROD4,IMG_PROD5) values (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $add->execute(array($NOM_PROD,$ID_CAT,$PRIX,$OLD_PRIX,$COLOR_PROD,$ETAT_PROD,$QTE_PROD,$DESC_PROD,$IMG_PROD1,$IMG_PROD2,$IMG_PROD3,$IMG_PROD4,$IMG_PROD5));
    }
    function AfficherProduit(){
        $pdo = $this->getPDO();
        $show=$pdo->prepare("SELECT produits.*, categories.NOM_CAT FROM produits JOIN categories ON produits.ID_CAT = categories.ID_CAT  ORDER BY ID_PROD DESC");
        $show->execute();
        return   $show->fetchAll();
    }
    function ModifierProduit($id,$id_cat,$NOM_PROD,$PRIX,$OLD_PRIX,$COLOR_PROD,$ETAT_PROD,$QTE_PROD,$DESC_PROD){
        $pdo = $this->getPDO() ;
        $res=$pdo->prepare("UPDATE produits SET ID_CAT=?,NOM_PROD=?,PRIX=?,OLD_PRIX=?,COLOR_PROD=?,ETAT_PROD=?,QTE_PROD=?,DESC_PROD=? where ID_PROD=?; ");
        $res->execute(array($id_cat,$NOM_PROD,$PRIX,$OLD_PRIX,$COLOR_PROD,$ETAT_PROD,$QTE_PROD,$DESC_PROD,$id));
    }

     function SupprimerProduit($id){
        $pdo = $this->getPDO() ;    
        $del = $pdo->prepare("DELETE FROM produits WHERE ID_PROD = '$id' ");
        $del->execute();
  
    }
    function getProduitCAT($id){		
        $pdo = $this->getPDO() ;  
       $get = $pdo->prepare("SELECT * FROM produits where ID_CAT ='$id' ") ;
       $get->execute();
       return $get->fetchAll();   
    }
    function getProduit($id){		
        $pdo = $this->getPDO() ;  
       $get = $pdo->prepare("SELECT * FROM produits where ID_PROD ='$id' ") ;
       $get->execute();
       return $get->fetchAll();   
    }
    function getprixProduit($id){		
        $pdo = $this->getPDO() ;  
       $get = $pdo->prepare("SELECT PRIX FROM produits where ID_PROD ='$id' ") ;
       $get->execute();
       return $get->fetchAll();   
    }
    function getProduitqte(){
        $pdo = $this->getPDO();
        $query = "SELECT COUNT(*) FROM produits WHERE ETAT_PROD = 'Disponible'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;
    }
    
    function getProduitcontex($id){		
        $pdo = $this->getPDO() ;  
       $get = $pdo->prepare("SELECT * FROM produits WHERE NOM_PROD = (SELECT NOM_PROD FROM produits WHERE ID_PROD = '$id') AND ID_PROD != '$id' ORDER BY ID_PROD DESC LIMIT 8") ;
       $get->execute();
       return $get->fetchAll();   
    }
    function getAllProduit (){
        $pdo = $this->getPDO() ;  
        $get = $pdo->prepare("SELECT ID_PROD from produits ") ;
        $get->execute();
        return $get->fetchAll();
    }
    function getLastProduit() {
        $pdo = $this->getPDO();
        $stmt = $pdo->prepare("SELECT * FROM produits ORDER BY ID_PROD DESC LIMIT 8");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    
    
  //categogies
    function AjouterCategorie($n,$img){
        $pdo = $this->getPDO();
        $add=$pdo->prepare("INSERT into categories (NOM_CAT,IMG_CAT) values (?,?)");
        $add->execute(array($n,$img));
    }
    function AfficherCategorie(){
        $pdo = $this->getPDO();
        $show=$pdo->prepare("SELECT * FROM categories");
        $show->execute();
        return   $show->fetchAll();
    }
    function ModifierCategorie($id, $n, $qte, $img){
        $pdo = $this->getPDO();
        $upd = $pdo->prepare("UPDATE categories SET NOM_CAT = ?, IMG_CAT = ?, QTE_PROD_INCAT = ? WHERE ID_CAT = ?");
        $upd->execute([$n, $img, $qte, $id]);
    }
    
    function SupprimerCategorie($id){
        $pdo = $this->getPDO() ;    
        $del = $pdo->prepare("DELETE FROM categories WHERE ID_CAT  = '$id' ");
        $del->execute();
    }
    function getCategorie($id){		
        $pdo = $this->getPDO() ;  
       $get = $pdo->prepare("SELECT * FROM categories where ID_CAT ='$id' ") ;
       $get->execute();
       return $get->fetchAll();   
    }
    function getAllCategorie(){
        $pdo = $this->getPDO() ;  
        $get = $pdo->prepare("SELECT ID_CAT,NOM_CAT,QTE_PROD_INCAT,IMG_CAT from categories ") ;
        $get->execute();
        return $get->fetchAll();
    }
    function getqte($id_cat){
        $pdo = $this->getPDO();  
        $get = $pdo->prepare("SELECT COUNT(*) FROM produits WHERE produits.ID_CAT = ?");
        $get->execute([$id_cat]);
        $count = $get->fetchColumn(); // récupère la valeur du résultat de la requête
        return $count;   
    }
    
    public function majQteProdInCat(){
        $categories = $this->getAllCategorie();
        foreach($categories as $cat){
            $qte = $this->getqte($cat['ID_CAT']);
            $this->ModifierCategorie($cat['ID_CAT'], $cat['NOM_CAT'], $qte, $cat['IMG_CAT']);
        }
    } 


  //commentaire 
    function AjouterCommentaire($n,$desc,$img){
        $pdo = $this->getPDO();
        $add=$pdo->prepare("INSERT into commentaire (NOM_C,DESC_C,IMG_C) values (?,?,?)");
        $add->execute(array($n,$desc,$img));
    }
    function AfficherCommentaire(){
        $pdo = $this->getPDO();
        $show=$pdo->prepare("SELECT * FROM commentaire");
        $show->execute();
        return   $show->fetchAll();
    }
    function SupprimerCommentaire($id){
        $pdo = $this->getPDO() ;    
        $del = $pdo->prepare("DELETE FROM commentaire WHERE ID_C  = '$id' ");
        $del->execute();
    }
    function getCommentaire($id){		
        $pdo = $this->getPDO() ;  
    $get = $pdo->prepare("SELECT * FROM commentaire where ID_C ='$id' ") ;
    $get->execute();
    return $get->fetchAll();   
    } 
    
    
  //Commandes 
    function AjouterCommande($ID_PROD,$NOM_CLIENT,$TELE_CLIENT,$VILLE_CLIENT,$ADD_CLIENT,$QTE_PROD_COMM,$TAILLE,$PRIX_TOTEL){
        $pdo = $this->getPDO();
        $add=$pdo->prepare("INSERT into commandes (ID_PROD,NOM_CLIENT,TELE_CLIENT,VILLE_CLIENT,ADD_CLIENT,QTE_PROD_COMM,TAILLE,PRIX_TOTAL) values (?,?,?,?,?,?,?,?)");
        $add->execute(array($ID_PROD,$NOM_CLIENT,$TELE_CLIENT,$VILLE_CLIENT,$ADD_CLIENT,$QTE_PROD_COMM,$TAILLE,$PRIX_TOTEL));
    }
    function AfficherCommande(){
        $pdo = $this->getPDO();
        $show=$pdo->prepare("SELECT commandes.*, produits.IMG_PROD1 FROM commandes JOIN produits ON commandes.ID_PROD = produits.ID_PROD  ORDER BY ID_COMM DESC");
        $show->execute();
        return   $show->fetchAll();
    }
    function TOTALPRIX(){
        $pdo = $this->getPDO();
        $show=$pdo->prepare("SELECT SUM(PRIX_TOTAL) AS total_gains,COUNT(*) AS total_commande FROM commandes ");
        $show->execute();
        return   $show->fetchAll();
    }
    function ModifierCommande($id_comm,$etat){
        $pdo = $this->getPDO() ;
        $upd =$pdo->prepare(" UPDATE commandes SET ETAT_COMM=? where ID_COMM=?; ");
        $upd->execute(array($etat,$id_comm));
    }
    function SupprimerCommande($id){
        $pdo = $this->getPDO() ;    
        $del = $pdo->prepare("DELETE FROM commandes WHERE ID_COMM  = '$id' ");
        $del->execute();
    }
    function getCommande($id){		
        $pdo = $this->getPDO() ;  
        $get = $pdo->prepare("SELECT * FROM commandes where ID_COMM ='$id' ") ;
        $get->execute();
        return $get->fetchAll();   
    }
    function getCommandeqte(){
        $pdo = $this->getPDO();
        $query = "SELECT COUNT(*) FROM commandes WHERE ETAT_COMM = 'Livré'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;
    }
    



  //admin
    function AfficherAdmin(){
        $pdo = $this->getPDO();
        $show=$pdo->prepare("SELECT * FROM administratrice");
        $show->execute();
        return   $show->fetchAll();
    }
    function ModifierAdmin($ID_ADMIN,$EMAIL_ADMIN,$PASSWORD,$NOM_ADMIN,$LOCAL,$TELE_ADMIN){
        $pdo = $this->getPDO() ;
        $upd =$pdo->prepare(" UPDATE administratrice SET EMAIL_ADMIN=?,PASSWORD=?,NOM_ADMIN=?,LOCAL=?,TELE_ADMIN=? where ID_ADMIN =?; ");
        $upd->execute(array($EMAIL_ADMIN,$PASSWORD,$NOM_ADMIN,$LOCAL,$TELE_ADMIN,$ID_ADMIN));
    }
    function getAdmin($id){		
        $pdo = $this->getPDO() ;  
        $get = $pdo->prepare("SELECT * FROM administratrice where ID_ADMIN ='$id' ") ;
        $get->execute();
        return $get->fetchAll();   
    }

  //OFFRE
    function AfficherOffre(){
        $pdo = $this->getPDO();
        $show=$pdo->prepare("SELECT * FROM offres");
        $show->execute();
        return   $show->fetchAll();
    }
    function ModifierOffre($id,$en,$t1,$t2){
        $pdo = $this->getPDO() ;
        $upd =$pdo->prepare(" UPDATE offres SET ENTETE=?,TITRE1=?,TITRE2=? where ID_OFFRE =?; ");
        $upd->execute(array($en,$t1,$t2,$id));
    }
    function getOffre($id){		
        $pdo = $this->getPDO() ;  
        $get = $pdo->prepare("SELECT * FROM offres where ID_OFFRE ='$id' ") ;
        $get->execute();
        return $get->fetchAll();   
    }
}


?>