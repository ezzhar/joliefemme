<?php
session_start();
if (!isset($_SESSION['EMAIL_ADMIN'])) {
    header("location:login.php");
    exit();
}

  require_once("../../PHP/Produit.php");
  require_once("../../PHP/categorie.php");
  require_once("../../PHP/Admin.php");
  
  $admin = Admin::AfficherAdmin();

  $pdo= new PDO("mysql:host=;dbname=ecom_database", "root", "");
  $cat = categorie::getAllCategorie();
  

  $id = $_GET['id'];
  $v = Produit::getProduit($id);
  $values = $v[0];


  if($_SERVER["REQUEST_METHOD"] =="POST"){
    if(extract($_POST)){
      $v=Produit::getProduit($_POST["id"]);
      $values=$v[0];
      Produit::ModifierProduit($id,$ID_CAT,$NOM_PROD,$PRIX,$OLD_PRIX,$COLOR_PROD,$ETAT_PROD,$QTE_PROD,$DESC_PROD);
      header("Location:aff_product.php");
    }
  }

  $id = $_GET['id'];
  $sql = "SELECT ETAT_PROD FROM produits WHERE ID_PROD = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $etat_prod = $stmt->fetchColumn();

  $sql = "SELECT ID_CAT FROM produits WHERE ID_PROD = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $id_cat = $stmt->fetchColumn();


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modifier Produit</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
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

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">
                          <form class="forms-sample" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="exampleInputName1">Nom</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nom du produit" name="NOM_PROD" value="<?php echo $values["NOM_PROD"]?>" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleSelectGender">Categorie</label>
                              <select required type="text" class="form-control" name="ID_CAT"  style="height: 50px;" required>
                                <?php foreach ($cat as $elm) { $catname = categorie::getCategorie($elm["ID_CAT"]); ?>
                                  <?php foreach ($catname as $cat) {  ?>
                                    <option value="<?php echo $elm["ID_CAT"]; ?>" <?php if ($id_cat == $elm["ID_CAT"]) echo "selected"; ?>>
                                      <?php echo $elm["ID_CAT"] . " - " . $cat["NOM_CAT"];?>
                                    </option>
                                  <?php } ?>
                                <?php } ?>
                              </select>
                            </div> 


                            <div class="prics-pro" style="display: flex;">
                              <div class="form-group">
                                <label for="exampleInputPassword4">Prix</label>
                                <input type="number" class="form-control" id="exampleInputPassword4" placeholder="prix" style="width: 300px;" name="PRIX" value="<?php echo $values["PRIX"]?>" required>
                              </div>
                              <div class="form-group" style="margin-left: 20px;">
                                <label for="exampleInputPassword4">Ancien Prix</label>
                                <input type="number" class="form-control" id="exampleInputPassword4" placeholder="ancien prix" style="width: 300px;" name="OLD_PRIX" value="<?php echo $values["OLD_PRIX"]?>" required>
                              </div>
                            </div>

                            
                            <div class="prics-pro" style="display: flex;">
                              <div class="form-group">
                                <label for="exampleInputPassword4">Couleur</label>
                                <input type="color" class="form-control" id="exampleInputPassword4" placeholder="Password" value="<?php echo $values["COLOR_PROD"]?>" style="height: 40px;width: 40px; padding: 5px;" name="COLOR_PROD">
                              </div>
                              <div class="form-group" style="margin-left: 20px;">
                                <label for="exampleInputPassword4">Etat</label>
                                <select class="form-control" id="exampleSelectGender" style="height: 45px;width: 100px;width: 300px;" name="ETAT_PROD">
                                  <option <?php if($etat_prod == "Disponible") echo "selected"; ?>>Disponible</option>
                                  <option <?php if($etat_prod == "Indisponible") echo "selected"; ?>>Indisponible</option>
                                </select>
                              </div>
                              <div class="form-group" style="margin-left: 20px;">
                                <label for="exampleInputPassword4">Quantité</label>
                                <input type="number" class="form-control" id="exampleInputPassword4" placeholder="quantité du produit" style="width: 300px;" name="QTE_PROD" value="<?php echo $values["QTE_PROD"]?>">
                              </div>
                            </div>

                            <div class="form-group"> 
                                <label for="exampleTextarea1">Description</label>
                                <textarea class="form-control" id="exampleTextarea1" rows="7" name="DESC_PROD"><?php echo $values["DESC_PROD"]?></textarea>

                            </div>




                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>

                          </form>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        

    </div>





    
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>


