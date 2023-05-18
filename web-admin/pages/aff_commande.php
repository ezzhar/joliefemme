<?php
session_start();
if (!isset($_SESSION['EMAIL_ADMIN'])) {
    header("location:login.php");
    exit();
}

  require_once("../../PHP/Produit.php");
  require_once("../../PHP/Admin.php");
  require_once("../../PHP/Commande.php");
  
  $admin = Admin::AfficherAdmin();

  $id = $_GET['id'];
  $v = Commande::getCommande($id);

  if($_SERVER["REQUEST_METHOD"] =="POST"){
    if(extract($_POST)){
      $v=Commande::getCommande($_POST["id"]);
      Commande::ModifierCommande($id,$ETAT_COMM);
      header("Location:commandes.php");
    }
  }

  $pdo= new PDO("mysql:host=;dbname=ecom_database", "root", "");


  $sql = "SELECT ETAT_COMM FROM commandes WHERE ID_COMM = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $etat_com = $stmt->fetchColumn();

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Afficher Commande </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <script src="https://kit.fontawesome.com/35d8d7bd24.js" crossorigin="anonymous"></script>
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
  </head>
  <body>

      <!-- navbar -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../index.php"><img src="../assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../index.php" ><img src="../assets/images/logo-m.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">

          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>

          <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="../index.php" data-bs-toggle="dropdown">
                <img src="../../images/icones/notification.png" >
                <span class="count-symbol bg-danger"></span>
              </a>
            </li>
            
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="../../images/logo.png" alt="image">
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php foreach($admin as $elm){echo $elm["NOM_ADMIN"];} ?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="modifier_admin.php?id=<?php foreach($admin as $elm){echo $elm["ID_ADMIN"];}?>">
                  <i class="mdi mdi-cached me-2 "></i> Informations </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="seDeconnecter.php">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            
          </ul>
          
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>

        </div>
      </nav>
      <!-- navbar -->


      <div class="container-fluid page-body-wrapper">
        <!-- la partie a gauche -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            
            <li class="nav-item nav-profile">
              <a href="modifier_admin.php?id=<?php foreach($admin as $elm){echo $elm["ID_ADMIN"];}?>" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../../images/logo.png" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php foreach($admin as $elm){echo $elm["NOM_ADMIN"];} ?></span>
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="../index.php" style="display: flex; justify-content: space-between; align-items: center;">
                <span class="menu-title">Home</span>
                <img src="../../images/icones/maison.png" style="margin-left: 20px;">
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="commandes.php" style="display: flex; justify-content: space-between; align-items: center;">
                <span class="menu-title">Commandes</span>
                <img src="../../images/icones/verifier.png" style="margin-left: 20px;">
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic"  style="display: flex; justify-content: space-between; align-items: center;">
                <span class="menu-title">Produits</span>
                <div>  
                  <img src="../../images/icones/jaccepte.png" style="margin-left: 20px;">
                </div>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="aff_product.php">Tous les produit</a></li>
                  <li class="nav-item"> <a class="nav-link" href="add_product.php">Nouveau produit</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="categories.php" style="display: flex; justify-content: space-between; align-items: center;">
                <span class="menu-title">Categories</span>
                <img src="../../images/icones/categorie.png" style="margin-left: 20px;">
              </a>
            </li>

            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                </div>
                <a href="add_product.php"><button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a product</button></a>
              </span>
            </li>
            
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h4>Pour le site</h4>
                </div>
              </span>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="offres.php" style="display: flex; justify-content: space-between; align-items: center;">
                <span class="menu-title">Les offres</span>
                <img src="../../images/icones/globe.png" style="margin-left: 20px;">
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="commentaire.php" style="display: flex; justify-content: space-between; align-items: center;">
                <span class="menu-title">Les commentaires</span>
                <img src="../../images/icones/globe.png" style="margin-left: 20px;">
              </a>
            </li>

          </ul>
        </nav>
        <!-- partial -->
        
        <div class="main-panel">
          <div class="content-wrapper">
             
            <div class="row" style="background-color: white;padding:20px">

              

            
              <div class="col-md-7 d-flex flex-column justify-content-center" style="margin: 0;margin-top: 20px;margin-bottom: 20px">
                <div class="card card-img-holder " style="background-color: rgba(0, 0, 0, 0.059); padding: 20px;border: 2px solid #0000004d;border-radius: 10px;box-shadow: 0  2px 10px rgba(0, 0, 0, 0.2);">
                 <?php  foreach($v as $comm) {   $prod = Produit::getProduit($comm["ID_PROD"]); ?>

                  <p style="font-size: 20px;"><strong style="margin-right: 5px;">Nom Client :</strong> <?php echo $comm["NOM_CLIENT"];   ?></p>
                  <p style="font-size: 20px;"><strong style="margin-right: 5px;">Téléphone :</strong> +212 <?php echo $comm["TELE_CLIENT"];   ?></p>
                  <p style="font-size: 20px;"><strong style="margin-right: 5px;">VILLE :</strong> <?php echo $comm["VILLE_CLIENT"];   ?></p>
                  <p style="font-size: 20px;"><strong style="margin-right: 5px;">DATE :</strong> <?php echo $comm["DATE_COMM"];   ?></p>

                 <?php } ?>

                </div>
                <div class="card card-img-holder " style="background-color: rgba(0, 0, 0, 0.059); padding: 20px;margin-top:20px;border: 2px solid #0000004d;border-radius: 10px;box-shadow: 0  2px 10px rgba(0, 0, 0, 0.2);">
                  <p style="font-size: 20px;"><strong style="margin-right: 5px;">Nom Produit :</strong><?php foreach($prod as $p){ echo $p["NOM_PROD"]; }?></p>
                  <p style="font-size: 20px;"><strong style="margin-right: 5px;">Quantiter :</strong ><?php foreach($v as $comm){ echo $comm["QTE_PROD_COMM"]; }?></p>
                  <p style="font-size: 20px;"><strong style="margin-right: 5px;">Taille :</strong ><?php foreach($v as $comm){ echo $comm["TAILLE"]; }?></p>
                  <p style="font-size: 30px;text-align:center"><strong style="margin-right: 10px;">PRIX TOTAL :</strong><?php foreach($v as $comm){ echo $comm["PRIX_TOTAL"]; }?> DH</p>
                </div>
                <form method="post">
                  <div class="form-group d-flex" style="margin-top:20px;">
                    
                    <select required type="text" style="background-color: rgba(0, 0, 0, 0.059);width:75%;border: 2px solid #0000004d;border-radius: 10px; color:#000000c4;text-align:left;padding-left:10px;margin-right:20px;box-shadow:0  2px 10px rgba(0, 0, 0, 0.2);" class="btn btn-icon col-md-5" name="ETAT_COMM" required>
                      <option <?php if($etat_com == "En Cour") echo "selected"; ?>>En Cour</option>
                      <option <?php if($etat_com == "Livré") echo "selected"; ?>>Livré</option>
                      <option <?php if($etat_com == "Retour") echo "selected"; ?>>Retour</option>
                    </select>
                    <button type="submit" class="btn btn-gradient-primary me-2">modifier</button>
                  </div>
                </form>
                
              </div>
              
              <div class="col-md-5 stretch-card grid-margin " style="margin: 0;margin-top: 20px;margin-bottom: 20px">
                <div class="card card-img-holder ">
                  <img src="../../images/produits/<?php foreach($prod as $p){ echo $p["IMG_PROD1"]; }?>" alt="prod" style="border-radius: 10px;box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                </div>
              </div>


            </div>
                    
          </div>

      

        </div>
        



        
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>