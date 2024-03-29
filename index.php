<?php

  require_once("PHP/categorie.php");
  require_once("PHP/produit.php");
  require_once("PHP/commentaire.php");
  require_once("PHP/offre.php");
  require_once("PHP/Admin.php");

  $admin = Admin::getAdmin(1);
  $offre1 = Offre::getOffre(1);

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
      <link rel="shortcut icon" href="images/logo.png" type="">
      <title>Home</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
     <script src="https://www.gstatic.com/firebasejs/9.0.2/firebase-app.js"></script>
     <script src="https://www.gstatic.com/firebasejs/9.0.2/firebase-firestore.js"></script>
   </head>
   <body>


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

                        <li class="nav-item active">
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

                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->


         <!-- slider section -->
         <section class="slider_section ">
            <div class="slider_bg_box">
               <img src="images/slider-bg.png" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">

                  <div class="carousel-item active">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                    <?php foreach($offre1 as $elm) { echo $elm["TITRE1"]; }?>
                                    </span>
                                    <br>
                                    <?php foreach($offre1 as $elm) { echo $elm["TITRE2"]; }?>
                                 </h1>
                                 <div class="btn-box" style="margin-bottom: 80px;margin-top: 30px;">
                                    <a href="products.php" class="btn1">
                                    Voir Produits
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item ">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                    <?php foreach($offre2 as $elm) { echo $elm["TITRE1"]; }?>
                                    </span>
                                    <br>
                                    <?php foreach($offre2 as $elm) { echo $elm["TITRE2"]; }?>
                                 </h1>
                                 <div class="btn-box" style="margin-bottom: 80px;margin-top: 30px;">
                                    <a href="products.php" class="btn1">
                                    Voir Produits
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

               </div>
               <div class="container">
                  <ol class="carousel-indicators">
                     <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                     <li data-target="#customCarousel1" data-slide-to="1"></li>
                  </ol>
               </div>
            </div>
         </section>
         <!-- end slider section -->


      </div>
 
      <!-- categories -->
      <section class="wrapper">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Nos <span>categories</span>
               </h2>
            </div>
            <main>
               <div class="row">
               <?php foreach ($categoties as $categorie): ?>
                  <section class="sec">
                     <div class="profile profile-imgonly">
                        <div class="profile__image"><img src="images/categories/<?php echo $categorie["IMG_CAT"];?>" alt="image"/></div>
                        <div class="profile__info" style="text-align: left;">
                           <small style="display: flex;"><h1 style="margin-right: 10px;"><?php echo $categorie["QTE_PROD_INCAT"]; ?></h1>produits</small>
                           <h3><?php echo $categorie["NOM_CAT"] ?></h3>
                        </div>
                        <div class="profile__cta" ><a class="button" href="products_categorie.php?id_cat=<?php echo $categorie['ID_CAT'] ?>"><strong>Voir Plus</strong></a></div>
                     </div>
                  </section>
               <?php endforeach; ?>
               </div>
            </main>
        </div>
      </section>
      
      <!-- /categories -->

      
      <!-- product section -->
      <section class="product_section layout_padding" style="padding-top: 0;">
         <div class="container" style="padding-left: 40px;padding-right: 40px;">
            <div class="heading_container heading_center">
               <h2>
                  Nos <span>produits</span>
               </h2>
            </div>

            <div class="row">
            <?php foreach ($prod as $produit): ?>
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

            <div class="btn-box">
               <a href="products.php">
               Voir tous les produits
               </a>
            </div>
         </div>
      </section>
      <!-- end product section -->


      <!-- subscribe section -->
      <section class="subscribe_section">
         <div class="box-insta">
            <div class="phone">
               <img width="350PX" src="images/phone.png" alt="INSTA">
            </div>
            <div class="insta">
               <H1 style="font-family: 'fr3';">FOLLOW ME</H1>
               <H1 style="margin-top: 0;font-size: 60px;font-family: 'fr1';">Jolie_Femm</H1>
            </div>
         </div>
      </section>
      <!-- end subscribe section -->

      <!-- why section -->
      <section class="why_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Pourquoi <span>Nous</span>
               </h2>
            </div>
            <div class="row">

               <div class="col-md-4">
                  <div class="box ">
                     <div class="img-box">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                           <g>
                              <g>
                                 <path d="M476.158,231.363l-13.259-53.035c3.625-0.77,6.345-3.986,6.345-7.839v-8.551c0-18.566-15.105-33.67-33.67-33.67h-60.392
                                    V110.63c0-9.136-7.432-16.568-16.568-16.568H50.772c-9.136,0-16.568,7.432-16.568,16.568V256c0,4.427,3.589,8.017,8.017,8.017
                                    c4.427,0,8.017-3.589,8.017-8.017V110.63c0-0.295,0.239-0.534,0.534-0.534h307.841c0.295,0,0.534,0.239,0.534,0.534v145.372
                                    c0,4.427,3.589,8.017,8.017,8.017c4.427,0,8.017-3.589,8.017-8.017v-9.088h94.569c0.008,0,0.014,0.002,0.021,0.002
                                    c0.008,0,0.015-0.001,0.022-0.001c11.637,0.008,21.518,7.646,24.912,18.171h-24.928c-4.427,0-8.017,3.589-8.017,8.017v17.102
                                    c0,13.851,11.268,25.119,25.119,25.119h9.086v35.273h-20.962c-6.886-19.883-25.787-34.205-47.982-34.205
                                    s-41.097,14.322-47.982,34.205h-3.86v-60.393c0-4.427-3.589-8.017-8.017-8.017c-4.427,0-8.017,3.589-8.017,8.017v60.391H192.817
                                    c-6.886-19.883-25.787-34.205-47.982-34.205s-41.097,14.322-47.982,34.205H50.772c-0.295,0-0.534-0.239-0.534-0.534v-17.637
                                    h34.739c4.427,0,8.017-3.589,8.017-8.017s-3.589-8.017-8.017-8.017H8.017c-4.427,0-8.017,3.589-8.017,8.017
                                    s3.589,8.017,8.017,8.017h26.188v17.637c0,9.136,7.432,16.568,16.568,16.568h43.304c-0.002,0.178-0.014,0.355-0.014,0.534
                                    c0,27.996,22.777,50.772,50.772,50.772s50.772-22.776,50.772-50.772c0-0.18-0.012-0.356-0.014-0.534h180.67
                                    c-0.002,0.178-0.014,0.355-0.014,0.534c0,27.996,22.777,50.772,50.772,50.772c27.995,0,50.772-22.776,50.772-50.772
                                    c0-0.18-0.012-0.356-0.014-0.534h26.203c4.427,0,8.017-3.589,8.017-8.017v-85.511C512,251.989,496.423,234.448,476.158,231.363z
                                    M375.182,144.301h60.392c9.725,0,17.637,7.912,17.637,17.637v0.534h-78.029V144.301z M375.182,230.881v-52.376h71.235
                                    l13.094,52.376H375.182z M144.835,401.904c-19.155,0-34.739-15.583-34.739-34.739s15.584-34.739,34.739-34.739
                                    c19.155,0,34.739,15.583,34.739,34.739S163.99,401.904,144.835,401.904z M427.023,401.904c-19.155,0-34.739-15.583-34.739-34.739
                                    s15.584-34.739,34.739-34.739c19.155,0,34.739,15.583,34.739,34.739S446.178,401.904,427.023,401.904z M495.967,299.29h-9.086
                                    c-5.01,0-9.086-4.076-9.086-9.086v-9.086h18.171V299.29z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M144.835,350.597c-9.136,0-16.568,7.432-16.568,16.568c0,9.136,7.432,16.568,16.568,16.568
                                    c9.136,0,16.568-7.432,16.568-16.568C161.403,358.029,153.971,350.597,144.835,350.597z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M427.023,350.597c-9.136,0-16.568,7.432-16.568,16.568c0,9.136,7.432,16.568,16.568,16.568
                                    c9.136,0,16.568-7.432,16.568-16.568C443.591,358.029,436.159,350.597,427.023,350.597z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M332.96,316.393H213.244c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017H332.96
                                    c4.427,0,8.017-3.589,8.017-8.017S337.388,316.393,332.96,316.393z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M127.733,282.188H25.119c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017h102.614
                                    c4.427,0,8.017-3.589,8.017-8.017S132.16,282.188,127.733,282.188z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M278.771,173.37c-3.13-3.13-8.207-3.13-11.337,0.001l-71.292,71.291l-37.087-37.087c-3.131-3.131-8.207-3.131-11.337,0
                                    c-3.131,3.131-3.131,8.206,0,11.337l42.756,42.756c1.565,1.566,3.617,2.348,5.668,2.348s4.104-0.782,5.668-2.348l76.96-76.96
                                    C281.901,181.576,281.901,176.501,278.771,173.37z" />
                              </g>
                           </g>
                        </svg>
                     </div>
                     <div class="detail-box">
                        <h5>
                           Livraison Rapide
                        </h5>
                        <p>
                           Le délai de livraison ne dépasse pas 48 heures
                        </p>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="box ">
                     <div class="img-box">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.667 490.667" style="enable-background:new 0 0 490.667 490.667;" xml:space="preserve">
                           <g>
                              <g>
                                 <path d="M138.667,192H96c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.667-10.667
                                    v-74.667h32c5.888,0,10.667-4.779,10.667-10.667S144.555,192,138.667,192z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M117.333,234.667H96c-5.888,0-10.667,4.779-10.667,10.667S90.112,256,96,256h21.333c5.888,0,10.667-4.779,10.667-10.667
                                    S123.221,234.667,117.333,234.667z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M245.333,0C110.059,0,0,110.059,0,245.333s110.059,245.333,245.333,245.333s245.333-110.059,245.333-245.333
                                    S380.608,0,245.333,0z M245.333,469.333c-123.52,0-224-100.48-224-224s100.48-224,224-224s224,100.48,224,224
                                    S368.853,469.333,245.333,469.333z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M386.752,131.989C352.085,88.789,300.544,64,245.333,64s-106.752,24.789-141.419,67.989
                                    c-3.691,4.587-2.965,11.307,1.643,14.997c4.587,3.691,11.307,2.965,14.976-1.643c30.613-38.144,76.096-60.011,124.8-60.011
                                    s94.187,21.867,124.779,60.011c2.112,2.624,5.205,3.989,8.32,3.989c2.368,0,4.715-0.768,6.677-2.347
                                    C389.717,143.296,390.443,136.576,386.752,131.989z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M376.405,354.923c-4.224-4.032-11.008-3.861-15.061,0.405c-30.613,32.235-71.808,50.005-116.011,50.005
                                    s-85.397-17.771-115.989-50.005c-4.032-4.309-10.816-4.437-15.061-0.405c-4.309,4.053-4.459,10.816-0.405,15.083
                                    c34.667,36.544,81.344,56.661,131.456,56.661s96.789-20.117,131.477-56.661C380.864,365.739,380.693,358.976,376.405,354.923z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M206.805,255.723c15.701-2.027,27.861-15.488,27.861-31.723c0-17.643-14.357-32-32-32h-21.333
                                    c-5.888,0-10.667,4.779-10.667,10.667v42.581c0,0.043,0,0.107,0,0.149V288c0,5.888,4.779,10.667,10.667,10.667
                                    S192,293.888,192,288v-16.917l24.448,24.469c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.136
                                    c4.16-4.16,4.16-10.923,0-15.083L206.805,255.723z M192,234.667v-21.333h10.667c5.867,0,10.667,4.779,10.667,10.667
                                    s-4.8,10.667-10.667,10.667H192z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M309.333,277.333h-32v-64h32c5.888,0,10.667-4.779,10.667-10.667S315.221,192,309.333,192h-42.667
                                    c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667h42.667c5.888,0,10.667-4.779,10.667-10.667
                                    S315.221,277.333,309.333,277.333z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M288,234.667h-21.333c-5.888,0-10.667,4.779-10.667,10.667S260.779,256,266.667,256H288
                                    c5.888,0,10.667-4.779,10.667-10.667S293.888,234.667,288,234.667z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M394.667,277.333h-32v-64h32c5.888,0,10.667-4.779,10.667-10.667S400.555,192,394.667,192H352
                                    c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667h42.667c5.888,0,10.667-4.779,10.667-10.667
                                    S400.555,277.333,394.667,277.333z" />
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M373.333,234.667H352c-5.888,0-10.667,4.779-10.667,10.667S346.112,256,352,256h21.333
                                    c5.888,0,10.667-4.779,10.667-10.667S379.221,234.667,373.333,234.667z" />
                              </g>
                           </g>
                           
                        </svg>
                     </div>
                     <div class="detail-box">
                        <h5>
                           Livraison gratuite
                        </h5>
                        <p>
                           livraison gratuite partout au Maroc
                        </p>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="box ">
                     <div class="img-box">
                        <svg id="_30_Premium" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg" data-name="30_Premium">
                           <g id="filled">
                              <path d="m252.92 300h3.08a124.245 124.245 0 1 0 -4.49-.09c.075.009.15.023.226.03.394.039.789.06 1.184.06zm-96.92-124a100 100 0 1 1 100 100 100.113 100.113 0 0 1 -100-100z" />
                              <path d="m447.445 387.635-80.4-80.4a171.682 171.682 0 0 0 60.955-131.235c0-94.841-77.159-172-172-172s-172 77.159-172 172c0 73.747 46.657 136.794 112 161.2v158.8c-.3 9.289 11.094 15.384 18.656 9.984l41.344-27.562 41.344 27.562c7.574 5.4 18.949-.7 18.656-9.984v-70.109l46.6 46.594c6.395 6.789 18.712 3.025 20.253-6.132l9.74-48.724 48.725-9.742c9.163-1.531 12.904-13.893 6.127-20.252zm-339.445-211.635c0-81.607 66.393-148 148-148s148 66.393 148 148-66.393 148-148 148-148-66.393-148-148zm154.656 278.016a12 12 0 0 0 -13.312 0l-29.344 19.562v-129.378a172.338 172.338 0 0 0 72 0v129.38zm117.381-58.353a12 12 0 0 0 -9.415 9.415l-6.913 34.58-47.709-47.709v-54.749a171.469 171.469 0 0 0 31.467-15.6l67.151 67.152z" />
                              <path d="m287.62 236.985c8.349 4.694 19.251-3.212 17.367-12.618l-5.841-35.145 25.384-25c7.049-6.5 2.89-19.3-6.634-20.415l-35.23-5.306-15.933-31.867c-4.009-8.713-17.457-8.711-21.466 0l-15.933 31.866-35.23 5.306c-9.526 1.119-13.681 13.911-6.634 20.415l25.384 25-5.841 35.145c-1.879 9.406 9 17.31 17.367 12.618l31.62-16.414zm-53-32.359 2.928-17.615a12 12 0 0 0 -3.417-10.516l-12.721-12.531 17.658-2.66a12 12 0 0 0 8.947-6.5l7.985-15.971 7.985 15.972a12 12 0 0 0 8.947 6.5l17.658 2.66-12.723 12.535a12 12 0 0 0 -3.417 10.516l2.928 17.615-15.849-8.231a12 12 0 0 0 -11.058 0z" />
                           </g>
                        </svg>
                     </div>
                     <div class="detail-box">
                        <h5>
                           Meilleure Qualité
                        </h5>
                        <p>
                           Fiabilité supérieure distinguant nos produits
                        </p>
                     </div>
                  </div>
               </div>

            </div>
         </div>
      </section>
      <!-- end why section -->

      <!-- client section -->
      <section class="client_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Avis Des <span>Clients</span>
               </h2>
            </div>
            <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  
               <?php  $firstItem = true;
                  foreach ($comm as $elm) {
                     $img =  "images/commentaire/". $elm["IMG_C"] ; 
                     $activeClass = ($firstItem) ? 'active' : '';
                     $firstItem = false;;
                  ?>
                  <div class="carousel-item <?php echo $activeClass; ?>">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                        <div class="img-box">
                           <div class="img_box-inner">
                              <img src="<?php if (file_exists($img)) { echo $img; } else { echo "images/commentaire/client.jpg"; }?>" alt="">
                           </div>
                        </div>
                        </div>
                        <div class="detail-box">
                        <h5><?php echo $elm['NOM_C']; ?></h5>
                        <p><?php echo $elm['DESC_C']; ?></p>
                        </div>
                     </div>
                  </div>
                  <?php
                  }
               ?>


               </div>
               <div class="carousel_btn_box">
                  <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
                  <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
                  <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                  <span class="sr-only">Next</span>
                  </a>
               </div>
            </div>
         </div>
      </section>
      <!-- end client section -->


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


      <script>
      // Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyApZXlj5R5cTYvb2o-BE2OeCtsbwBWFU5c",
  authDomain: "jolie-femme-fa6b0.firebaseapp.com",
  databaseURL: "https://jolie-femme-fa6b0-default-rtdb.firebaseio.com",
  projectId: "jolie-femme-fa6b0",
  storageBucket: "jolie-femme-fa6b0.appspot.com",
  messagingSenderId: "938680347105",
  appId: "1:938680347105:web:142c97d6af22946d334aa0",
  measurementId: "G-G9SQJ7PTPW"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
     </script>

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
