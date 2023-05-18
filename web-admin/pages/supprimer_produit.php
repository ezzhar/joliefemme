<?php
require_once("../../PHP/Produit.php");
Produit::SupprimerProduit($_GET["id"]);

header("Location:aff_product.php");
 

?>