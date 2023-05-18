<?php
    require_once("../../../PHP/Commande.php");

    if($_SERVER["REQUEST_METHOD"] =="POST"){
        if(extract($_POST)){

            $com=new Commande($_GET["id"],$NOM_CLIENT,$TELE_CLIENT,$VILLE_CLIENT,$ADD_CLIENT,$QTE_PROD_COMM,$TAILLE,$PRIX_TOTAL);
            $com->AjouterCommande();
            header("Location:../aff_product.php");

        }
    }
?>
