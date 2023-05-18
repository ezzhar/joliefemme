<?php
require_once("../../../PHP/categorie.php");
if($_SERVER["REQUEST_METHOD"] =="POST"){
    if(extract($_POST)){
        $photo=$_FILES['image'];
        $filepath=$photo['tmp_name'];
        $extension= pathinfo($photo['name'], PATHINFO_EXTENSION);
        $newName=uniqid().$NOM_CAT.".".$extension;
        $destination="../../../images/categories/$newName";
        move_uploaded_file($filepath,$destination);
        $Assoc=new categorie($NOM_CAT,$newName);
        $Assoc->AjouterCategorie();
        header("Location:../categories.php");

    }
}

?>