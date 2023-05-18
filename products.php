<?php

  require_once("PHP/categorie.php");
  require_once("PHP/produit.php");
  require_once("PHP/offre.php");
  require_once("PHP/Admin.php");

  $admin = Admin::getAdmin(1);
  
  $offre1 = Offre::getOffre(1);
  
   $aff = Produit::AfficherProduit();
   $categoties = categorie::getAllCategorie();

?>



<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Tous les Produits</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
   </head>
   
   <body class="sub_page">
      <div class="hero_area">
         <div class="text-white" style="height: 50px; background: black; display: flex; align-items: center; justify-content: center;">
            <marquee behavior="scroll" direction="left" style="font-size: 18px; padding: 10px; text-transform: uppercase;" scrollamount="10">
               <strong><?php foreach($offre1 as $elm) { echo $elm["ENTETE"]; }?></strong>
            </marquee>
         </div>
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand logo" href="index.php">Jolie Femme</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">

                        <li class="nav-item ">
                           <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown ">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">CATEGORIES <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <?php foreach ($categoties as $cat): ?>
                                 <li><a href="products_categorie.php?id_cat=<?php echo $cat['ID_CAT'] ?>"><?php echo $cat['NOM_CAT'] ?></a></li>
                              <?php endforeach; ?>
                           </ul>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="products.php">produits</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="about.php">about</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact.php">Contact</a>
                        </li>

                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->
      </div>
      
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Grille de produits</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->

      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container" style="padding-left: 40px;padding-right: 40px;">
            <div class="heading_container heading_center">
               <h2>
                  Nos <span>Produits</span>
               </h2>
            </div>
            <div class="row">
               <?php foreach ($aff as $produit): ?>
                  <?php if ($produit['ETAT_PROD'] == "Disponible"): ?>
                        <div class="col-md-3 col-sm-6">
                           <div class="product-grid">
                              <div class="product-image">
                                 <div class="image">
                                    <img class="pic-1" src="images/produits/<?php echo $produit['IMG_PROD1'] ?>">
                                    <img class="pic-2" src="images/produits/<?php echo $produit['IMG_PROD2'] ?>">
                                 </div>
                                 <ul class="product-links">
                                    <li><a href="productPage.php?id_prod=<?php echo $produit['ID_PROD'] ?>" style="width: 100px;"><Strong>PLUS</Strong></a></li>
                                 </ul>
                              </div>
                              <div class="product-content">
                                 <h3 class="title"><a href="#"><?php echo $produit['NOM_PROD']; ?></a></h3>
                                 <div style="display: flex;">
                                    <div class="price"><?php echo $produit['PRIX']; ?> DH</div>
                                    <div class="price" style="color: rgb(158, 1, 1);margin-left: 20px;"><s><?php echo $produit['OLD_PRIX']; ?> DH</s></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                  <?php endif; ?>
               <?php endforeach; ?>
            </div>
         </div>
      </section>
      <!-- end product section -->

      <!-- footer start -->
      <footer>
         <div class="container">
            <div class="row">

               <div class="col-md-4">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="index.php"><img width="210" src="images/logo.png" alt="#" /></a>
                      </div>
                      <div style="margin: 0;padding: 0;text-align: center;font-family: 'fr1';font-size: 50px;">Jolie Femme</div>
                   </div>
               </div>
               <div class="col-md-8">
                  <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                           <li><a href="index.php">Home</a></li>
                           <li><a href="products.php">PRODUITS</a></li>
                           <li><a href="about.php">About</a></li>
                           <li><a href="contact.php">Contact</a></li>
                        </ul>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Categories</h3>
                        <ul>
                           <?php foreach ($categoties as $cat): ?>
                              <li><a href="products_categorie.php?id_cat=<?php echo $cat['ID_CAT'] ?>"><?php echo $cat['NOM_CAT'] ?></a></li>
                           <?php endforeach; ?>
                        </ul>
                     </div>
                  </div>
                     </div>
                  </div>   

                  <div class="col-md-5">
                     <div class="widget_menu">
                        <h3>Informations</h3>
                        <div class="information_f">
                           <p><strong>TELEPHONE:</strong> +212 <?php foreach($admin as $elm) { echo $elm["TELE_ADMIN"]; } ?></p>
                           <p><strong>EMAIL:</strong> <?php foreach($admin as $elm) { echo $elm["EMAIL_ADMIN"]; } ?></p>
                         </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="web-admin/index.php">JOLIE FEMME</a></p>
      </div>
      <!-- footer end -->


      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!--firebase-->
      <script src="js/firebase.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>