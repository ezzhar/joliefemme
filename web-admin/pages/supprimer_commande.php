<?php
require_once("../../PHP/Commande.php");
Commande::SupprimerCommande($_GET["id"]);
header("Location:commandes.php");
 

?>