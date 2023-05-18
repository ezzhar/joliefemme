<?php

  require_once("PHP/categorie.php");
  require_once("PHP/produit.php");
  require_once("PHP/commentaire.php");
  require_once("PHP/offre.php");
  require_once("PHP/Admin.php");

  $admin = Admin::getAdmin(1);

  $categoties = categorie::getAllCategorie();
  $prod = Produit::getLastProduit();
  $comm = commentaire::AfficherCommentaire();
  $offre1 = Offre::getOffre(1);
  $offre2 = Offre::getOffre(2);


  $catqte = categorie::majQteProdInCat();

  

  

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
      <title>NICE !!</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

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
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">CATEGORIES <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <?php foreach ($categoties as $cat): ?>
                                 <li><a href="products_categorie.php?id_cat=<?php echo $cat['ID_CAT'] ?>"><?php echo $cat['NOM_CAT'] ?></a></li>
                              <?php endforeach; ?>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="products.php">produits</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="about.php">about</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="#">
                              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                 <g>
                                    <g>
                                       <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                          c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                          C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                          c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                          C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                          c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                    </g>
                                 </g>
                                 
                              </svg>
                           </a>
                        </li>

                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->
      </div>
      


      <section class="product_section layout_padding" style="padding: 10px  20% 15% 20%; text-align: center;font-size: 15px;">
        <div class="container">
        <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
         <lord-icon
            src="https://cdn.lordicon.com/xxdqfhbi.json"
            trigger="loop"
            delay="2000"
            colors="primary:#121331,secondary:#ffc738,tertiary:#4bb3fd"
            style="width:250px;height:250px">
         </lord-icon>
           <p style="font-size: 20px;">Nous avons pris en charge votre demande avec succès. Nous vous contacterons rapidement au numéro que vous avez fourni.</p>
           <div class="btn-box">
            <a href="index.php">
                <i class="fas fa-long-arrow-alt-left me-2"></i><strong style="margin-left: 10px;"> Retour à la boutique </strong>
            </a>
         </div>
        </div>
     </section>



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
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!--firebase-->
      <script src="js/firebase.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>