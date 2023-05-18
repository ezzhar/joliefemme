<?php
require_once("../../../PHP/commentaire.php");
if($_SERVER["REQUEST_METHOD"] =="POST"){
    if(extract($_POST)){
        $photo=$_FILES['image'];
        $filepath=$photo['tmp_name'];
        $extension= pathinfo($photo['name'], PATHINFO_EXTENSION);
        $newName=uniqid().$NOM_CA.".".$extension;
        $destination="../../../images/commentaire/$newName";
        move_uploaded_file($filepath,$destination);
        $Assoc=new commentaire($NOM_c,$DESC_c,$newName);
        $Assoc->AjouterCommentaire();
        header("Location:../commentaire.php");

    }
}

?>