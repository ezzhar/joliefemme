<?php
require_once("../../PHP/commentaire.php");
commentaire::SupprimerCommentaire($_GET["id"]);

header("Location:commentaire.php");
 

?>