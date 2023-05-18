<?php
session_start();
if (!isset($_SESSION['EMAIL_ADMIN'])) {
    header("location:pages/login.php");
    exit();
}

  require_once("../PHP/Commande.php");
  require_once("../PHP/Produit.php");
  require_once("../PHP/Admin.php");
  require_once("../PHP/DAO.php");

  $aff = Admin::AfficherAdmin();
  $comm = commande::AfficherCommande();
  $prix = commande::TOTALPRIX();
  $qte = Produit::getProduitqte();
  $qtecomm = Commande::getCommandeqte();


  function getDatesSemaineEnCours() {
    $datesSemaine = array();
    $dateActuelle = date('Y-m-d');
    $jourSemaine = date('N', strtotime($dateActuelle));
    $decalage = $jourSemaine - 1;
    $dateDebutSemaine = date('Y-m-d', strtotime("-{$decalage} days", strtotime($dateActuelle)));
    for ($i = 0; $i < 7; $i++) {
        $date = date('Y-m-d', strtotime("+{$i} days", strtotime($dateDebutSemaine)));
        $datesSemaine[] = $date;
    }
    return $datesSemaine;
  }
  function getCommandeParDate($date){	
    $dao = new DAO();
    $pdo = $dao->getPDO() ;  
    $get = $pdo->prepare("SELECT COALESCE(COUNT(*), 0) AS commande_date FROM commandes where DATE_COMM ='$date' ") ;
    $get->execute();
    return $get->fetchAll();   
  }

  $datesSemaine = getDatesSemaineEnCours();

  

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>

      <!-- navbar -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.php" ><img src="assets/images/logo-m.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">

          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>

          <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="index.php" data-bs-toggle="dropdown">
                <img src="../images/icones/notification.png" >
                <span class="count-symbol bg-danger"></span>
              </a>
            </li>
            
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="../images/logo.png" alt="image">
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php foreach($aff as $elm){echo $elm["NOM_ADMIN"];} ?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="pages/modifier_admin.php?id=<?php foreach($aff as $elm){echo $elm["ID_ADMIN"];}?>">
                  <i class="mdi mdi-cached me-2 "></i> Informations </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="pages/seDeconnecter.php">
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
              <a href="pages/modifier_admin.php?id=<?php foreach($aff as $elm){echo $elm["ID_ADMIN"];}?>" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../images/logo.png" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php foreach($aff as $elm){echo $elm["NOM_ADMIN"];} ?></span>
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="index.php" style="display: flex; justify-content: space-between; align-items: center;">
                <span class="menu-title">Home</span>
                <img src="../images/icones/maison.png" style="margin-left: 20px;">
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="pages/commandes.php" style="display: flex; justify-content: space-between; align-items: center;">
                <span class="menu-title">Commandes</span>
                <img src="../images/icones/verifier.png" style="margin-left: 20px;">
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic"  style="display: flex; justify-content: space-between; align-items: center;">
                <span class="menu-title">Produits</span>
                <div>  
                  <img src="../images/icones/jaccepte.png" style="margin-left: 20px;">
                </div>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/aff_product.php">Tous les produit</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/add_product.php">Nouveau produit</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="pages/categories.php" style="display: flex; justify-content: space-between; align-items: center;">
                <span class="menu-title">Categories</span>
                <img src="../images/icones/categorie.png" style="margin-left: 20px;">
              </a>
            </li>

            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                </div>
                <a href="pages/add_product.php"><button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a product</button></a>
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
              <a class="nav-link" href="pages/offres.php" style="display: flex; justify-content: space-between; align-items: center;">
                <span class="menu-title">Les offres</span>
                <img src="../images/icones/globe.png" style="margin-left: 20px;">
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="pages/commentaire.php" style="display: flex; justify-content: space-between; align-items: center;">
                <span class="menu-title">Les commentaires</span>
                <img src="../images/icones/globe.png" style="margin-left: 20px;">
              </a>
            </li>

          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2" style="display: flex; justify-content: center; align-items: center;">
                  <img src="../images/icones/accueil.png" alt="">
                </span> <h3>Home</h3>
              </h3>
            </div>

            <div class="row">

              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <img src="assets/images/dashboard/symbole-monetaire-dollar.png" class="card-img-absolute" alt="circle-image" style="opacity: 0.6;"/>
                    <h4 class="font-weight-normal mb-3"><strong>Total Des Gains</strong> <i style="float: right;" class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 ><?php foreach($prix as $elm){ echo $elm["total_gains"]; } ?> DH</h2>
                  </div>
                </div>
              </div>

              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <img src="assets/images/dashboard/verifier.png" class="card-img-absolute" alt="circle-image" style="opacity: 0.6;"/>
                    <h4 class="font-weight-normal mb-3"><strong>Total Des Ordres </strong><i style="float: right;" class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2><?php echo $qtecomm; ?></h2>
                  </div>
                </div>
              </div>

              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <img src="assets/images/dashboard/cube.png" class="card-img-absolute" alt="circle-image" style="opacity: 0.6;"/>
                    <h4 class="font-weight-normal mb-3"><strong>Produits Dispo </strong><i style="float: right;" class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2><?php echo $qte; ?></h2>
                  </div>
                </div>
              </div>

            </div>


            <div class="row">

              <div class="col-lg-6 grid-margin stretch-card" style="width:100%" >
                <div class="card">
                  <div class="card-body" >
                    <div class="d-flex flex-nowrap justify-content-between">
                      <h1 class="card-title" style="font-size: 20px;">Tableau Des Ventes
                      <form method="POST" id="myForm" style="display: flex; align-items: center;" >
                        <p style="margin:0 ;margin-right: 10px;">MAX :</p>
                        <select class="btn btn-icon" name="valeur_saisie" id="exampleSelectGender" style="width: 50px;" >
                          <option value="5"<?php if(isset($_POST['valeur_saisie']) && $_POST['valeur_saisie'] == '5') echo ' selected'; ?>>5</option>
                          <option value="10"<?php if(isset($_POST['valeur_saisie']) && $_POST['valeur_saisie'] == '10') echo ' selected'; ?>>10</option>
                          <option value="20"<?php if(isset($_POST['valeur_saisie']) && $_POST['valeur_saisie'] == '20') echo ' selected'; ?>>20</option>
                          <option value="50"<?php if(isset($_POST['valeur_saisie']) && $_POST['valeur_saisie'] == '50') echo ' selected'; ?>>50</option>
                          <option value="100"<?php if(isset($_POST['valeur_saisie']) && $_POST['valeur_saisie'] == '100') echo ' selected'; ?>>100</option>
                        </select>
                      </form>
                    </h1>
                    </div>
                        
                    <canvas id="barChart" style="height:230px"></canvas>
                  </div>
                </div>
              </div>

            </div>


            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tous Les Commandes</h4>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        
                        <thead>
                          <tr>
                            <th>
                              <strong>Réf</strong>
                            </th>
                            <th>
                              <strong>Client</strong>
                            </th>
                            <th>
                              <strong>Téléphone</strong>
                            </th>
                            <th>
                              <strong>Produit</strong>
                            </th>
                            <th>
                              <strong>Date</strong>
                            </th>
                            <th>
                              <strong>Actions</strong>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                            <?php    foreach($comm as $elm)      {  $prod = Produit::getProduit( $elm["ID_PROD"]);   ?>
                            <tr>
                              <td> #<?php echo $elm["ID_COMM"];   ?> </td>
                              <td><?php echo $elm["NOM_CLIENT"];   ?></td>
                              <td><?php echo $elm["TELE_CLIENT"];   ?></td>
                              <td class="py-1">
                                <img src="../images/produits/<?php foreach($prod as $p){echo $p["IMG_PROD1"];}?>" alt="image"/>
                              </td>
                              <td><?php echo $elm["DATE_COMM"];   ?></td>
                              <td>
                                <div style="display: flex;">
                                  <a href="aff_commande.php?id=<?php echo $elm["ID_COMM"]?>">
                                    <div>
                                      <img style="width:30px;height:30px;border-radius:0" src="../images/icones/eye.svg" alt="x" >
                                    </div>
                                  </a>
                                  <a href="supprimer_commande.php?id=<?php echo $elm["ID_COMM"]?>">
                                    <img style="width:30px;height:30px;border-radius:0;margin-left:10px" src="../images/icones/x.svg" alt="x" >
                                  </a>
                                </div>
                              </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                            
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.php -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">© 2023 All Rights Reserved By</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"><a href="#">JOLIE FEMME</a></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>




    



    <!-- container-scroller -->
    <script>      
      $(function () {
        'use strict';
        var data = {
          labels: ["L", "M", "M", "J", "V", "S", "D"],
          datasets: [{
            data: [<?php
                      foreach ($datesSemaine as $date) {
                        $table_comm = getCommandeParDate($date);
                        foreach ($table_comm as $elm) {
                          echo $elm['commande_date'] . ", ";
                        }
                      }
                    ?>],
            label: '# Commandes',
            backgroundColor: [
              '#FFEAF1',
              '#FFC7D8',
              '#FFB8CE',
              '#FE94B4',
              '#FA739D',
              '#DB6A8F',
              '#CA3C66'
            ],
            borderColor: [
              '#FFEAF1',
              '#FFC7D8',
              '#FFB8CE',
              '#FE94B4',
              '#FA739D',
              '#DB6A8F',
              '#CA3C66'
            ],
            borderWidth: 1,
            fill: false
          }]
        };
        var options = {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                max: 
                <?php
                  if (isset($_POST['valeur_saisie'])) {
                    $valeur = $_POST['valeur_saisie'];
                    echo $valeur;
                  } else {
                    $valeur = 5; 
                    echo $valeur;
                  }
                ?>
              }
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }

        };

        // Get context with jQuery - using jQuery's .get() method.
        if ($("#barChart").length) {
          var barChartCanvas = $("#barChart").get(0).getContext("2d");
          // This will get the first returned node in the jQuery collection.
          var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: data,
            options: options
          });
        }

        if ($("#barChartDark").length) {
          var barChartCanvasDark = $("#barChartDark").get(0).getContext("2d");
          // This will get the first returned node in the jQuery collection.
          var barChartDark = new Chart(barChartCanvasDark, {
            type: 'bar',
            data: dataDark,
            options: optionsDark
          });
        }
      });
    </script>
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <script>
      document.getElementById("exampleSelectGender").addEventListener("change", function() {
        document.getElementById("myForm").submit();
      });
    </script>
      <!--firebase-->
      <script src="../js/firebase.js"></script>
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>










