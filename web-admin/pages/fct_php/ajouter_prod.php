<?php
    require_once("../../../PHP/Produit.php");
    if($_SERVER["REQUEST_METHOD"] =="POST"){
        if(extract($_POST)){

            $photo1=$_FILES['image1'];
            $photo2=$_FILES['image2'];
            $photo3=$_FILES['image3'];
            $photo4=$_FILES['image4'];
            $photo5=$_FILES['image5'];

            $extension1 = pathinfo($photo1['name'], PATHINFO_EXTENSION);
            $extension2 = pathinfo($photo2['name'], PATHINFO_EXTENSION);
            $extension3 = pathinfo($photo3['name'], PATHINFO_EXTENSION);
            $extension4 = pathinfo($photo4['name'], PATHINFO_EXTENSION);
            $extension5 = pathinfo($photo5['name'], PATHINFO_EXTENSION);

            $IMG_PROD1=uniqid().$NOM_PROD."_1.".$extension1;
            $IMG_PROD2=uniqid().$NOM_PROD."_2.".$extension2;
            $IMG_PROD3=uniqid().$NOM_PROD."_3.".$extension3;
            $IMG_PROD4=uniqid().$NOM_PROD."_4.".$extension4;
            $IMG_PROD5=uniqid().$NOM_PROD."_5.".$extension5;

            $destination1="../../../images/produits/$IMG_PROD1";
            $destination2="../../../images/produits/$IMG_PROD2";
            $destination3="../../../images/produits/$IMG_PROD3";
            $destination4="../../../images/produits/$IMG_PROD4";
            $destination5="../../../images/produits/$IMG_PROD5";

            move_uploaded_file($photo1['tmp_name'],$destination1);
            move_uploaded_file($photo2['tmp_name'],$destination2);
            move_uploaded_file($photo3['tmp_name'],$destination3);
            move_uploaded_file($photo4['tmp_name'],$destination4);
            move_uploaded_file($photo5['tmp_name'],$destination5);

            $PROD=new Produit($NOM_PROD,$ID_CAT,$PRIX,$OLD_PRIX,$COLOR_PROD,$ETAT_PROD,$QTE_PROD,$DESC_PROD,$IMG_PROD1,$IMG_PROD2,$IMG_PROD3,$IMG_PROD4,$IMG_PROD5);
            $PROD->AjouterProduit();
            header("Location:../aff_product.php");

        }
    }
?>
