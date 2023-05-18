<?php 
  require_once("PHP/categorie.php");
  require_once("PHP/produit.php");
  require_once("PHP/Commande.php");
  require_once("PHP/offre.php");
  require_once("PHP/Admin.php");

  $admin = Admin::getAdmin(1);
  
  $offre1 = Offre::getOffre(1);
  
  $id_prod = $_GET['id_prod'];

  $produits = Produit::getProduit($_GET["id_prod"]);
  $categoties = categorie::getAllCategorie();
  $produitsCont = Produit::getProduitcontex($_GET["id_prod"]);


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (extract($_POST)) {
       $produit = Commande::getprixProduit($id_prod);

       $com = new Commande($id_prod, $NOM_CLIENT, $TELE_CLIENT, $VILLE_CLIENT, $ADD_CLIENT, $QTE_PROD_COMM, $TAILLE, $QTE_PROD_COMM * $produits[0]["PRIX"]);

       $com->AjouterCommande();
       header("Location: fin.php?id_comm=");
   }
}


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
      <title>PRODUITS</title>
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
                           <a class="nav-link" href="index.php">Home </a>
                        </li>
                       <li class="nav-item dropdown">
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
      

      <section class="product_section ">
        <div class="container" style="padding: 0;">
            <div class = "card-wrapper">
                <div class = "card">
                    <!-- card left -->
                    <div class = "product-imgs">
                        <div class = "img-display">
                           <div class = "img-showcase">
                              <?php foreach($produits as $prod) {
                                 $img1 = "images/produits/" . $prod['IMG_PROD1'];
                                 $img2 = "images/produits/" . $prod['IMG_PROD2'];
                                 $img3 = "images/produits/" . $prod['IMG_PROD3'];
                                 $img4 = "images/produits/" . $prod['IMG_PROD4'];
                                 $img5 = "images/produits/" . $prod['IMG_PROD5'];
                              
                                 // Vérifier l'existence de chaque fichier
                                 if (file_exists($img1)) {
                                    echo '<img src="' . $img1 . '">';
                                 }
                                 if (file_exists($img2)) {
                                    echo '<img src="' . $img2 . '">';
                                 }
                                 if (file_exists($img3)) {
                                    echo '<img src="' . $img3 . '">';
                                 }
                                 if (file_exists($img4)) {
                                    echo '<img src="' . $img4 . '">';
                                 }
                                 if (file_exists($img5)) {
                                    echo '<img src="' . $img5 . '">';
                                 }
                              } ?>
                           </div>
                        </div>
                        <div class = "img-select">

                        <?php foreach($produits as $prod) { ?>
                           <?php if (file_exists($img1)) { ?>
                           <div class = "img-item">
                              <a href = "#" data-id = "1">
                               <?php echo '<img src="' . $img1 . '">'; ?>
                              </a>
                           </div>
                           <?php } ?>
                           <?php if (file_exists($img2)) { ?>
                           <div class = "img-item">
                              <a href = "#" data-id = "2">
                               <?php echo '<img src="' . $img2 . '">'; ?>
                              </a>
                           </div>
                           <?php } ?>
                           <?php if (file_exists($img3)) { ?>
                           <div class = "img-item">
                              <a href = "#" data-id = "3">
                               <?php echo '<img src="' . $img3 . '">'; ?>
                              </a>
                           </div>
                           <?php } ?>
                           <?php if (file_exists($img4)) { ?>
                           <div class = "img-item">
                              <a href = "#" data-id = "4">
                               <?php echo '<img src="' . $img4 . '">'; ?>
                              </a>
                           </div>
                           <?php } ?>
                           <?php if (file_exists($img5)) { ?>
                           <div class = "img-item">
                              <a href = "#" data-id = "4">
                               <?php echo '<img src="' . $img5 . '">'; ?>
                              </a>
                           </div>
                           <?php } ?>
                        <?php } ?>

                        </div>

                    </div>
                    <!-- card right -->
                <div class = "product-content">
                    <h2 class = "product-title"><?php foreach($produits as $prod) {echo $prod["NOM_PROD"] ;}?></h2>
                    <div class = "product-rating">
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star-half-alt"></i>
                    <span>4.7(21)</span>
                    </div>
        
                    <div class = "product-price">
                    <p class = "last-price"><span style=" font-size:20px"><?php foreach($produits as $prod) {echo $prod["OLD_PRIX"] ;}?> DH</span></p>
                    <p class = "new-price" ><span style="color:green; font-size:30px"><strong> <?php foreach($produits as $prod) {echo $prod["PRIX"] ;}?> DH </strong></span></p>
                    </div>

                  <form method="post" action="productPage.php?id_prod=<?php foreach($produits as $prod) {echo $prod["ID_PROD"] ;} ?>">
        
                    <div class = "product-detail">
                        <hr class="my-4">
                        <h2>À propos de cet article: </h2>
                        <p><?php foreach($produits as $prod) {echo $prod["DESC_PROD"] ;}?></p>
                        <ul >
                           <li style="display: flex; align-items: center;">couleur : <span><div style="  width: 28px;height: 28px;border-radius: 50%;background-color: <?php foreach($produits as $prod) {echo $prod["COLOR_PROD"] ;}?> ;border: 4px solid #c3c3c3;border-radius: 10px; margin-left:20px"></div></span></li>
                           <li>Disponibilité : <span><?php foreach($produits as $prod) {echo $prod["ETAT_PROD"] ;}?></span></li>
                           <li style="display: flex;align-items: center;">Quantiter : <span class = "purchase-info" style="margin:0;margin-left: 20px;"><input style="margin: 0;" type = "number" min = "1" name="QTE_PROD_COMM" value = "1"></span></li>
                           <li style="display: flex; align-items: center;">Taille :
                              <select name="TAILLE" class = "purchase-info" style="margin: 0; margin-left: 20px;padding: 0.45rem 0.8rem;border: 1.5px solid #ddd;border-radius: 25px;text-align: center;">
                                 <option value="37">36</option>
                                 <option value="38">37</option>
                                 <option value="39">38</option>
                                 <option value="40">39</option>
                                 <option value="41">40</option>
                              </select>
                           </li>

                        </ul>
                    </div>

                     <div class = "product-detail">
                        <hr class="my-4" style="margin-top:40px">
                       <h2 style="margin-bottom: 0; ">Informations client :</h2>
                          </div>
                          <div class="form-client">
                              <h5 class="text-uppercase text-uppercase-form" style="font-size: 16px;">Nom & Prénom</h5>
                              <div class="form-outline">
                                 <input type="text" id="form3Examplea2" placeholder="Nom & Prénom" class="form-control" style="font-size:15px" name="NOM_CLIENT" required />
                              </div>
                           </div>
                           <div class="form-client">
                              <h5 class="text-uppercase text-uppercase-form" style="font-size: 16px;">Téléphone</h5>
                              <div class="form-outline">
                                 <input type="number" id="form3Examplea2" placeholder="Téléphone" class="form-control" style="font-size:15px" name="TELE_CLIENT" required />
                              </div>
                           </div>
                           <div class="form-client">
                              <h5 class="text-uppercase text-uppercase-form" style="font-size: 16px;">Ville</h5>
                              <div class="form-outline">
                                 <input type="text" id="form3Examplea2" placeholder="Ville" class="form-control" style="font-size:15px" name="VILLE_CLIENT" required />
                              </div>
                           </div>
                           <div class="form-client">
                              <h5 class="text-uppercase text-uppercase-form" style="font-size: 16px;">Adresse</h5>
                              <div class="form-outline">
                                 <input type="text" id="form3Examplea2" placeholder="Adresse" class="form-control" style="font-size:15px" name="ADD_CLIENT" required />
                              </div>
                           </div>

                           <hr class="my-4">

                           <div class="d-flex justify-content-between" style="margin-bottom: 0;">
                              <h5 class="text-uppercase">LIVRAISON</h5>
                              <h5>gratuit</h5>
                           </div>

                           <button type="submit" name="submit" class="btn btn-block btn-lg" data-mdb-ripple-color="dark" style="background-color: red;color:blanchedalmond"><strong>Acheter Maintenant</strong><i class="fas fa-shopping-cart"></i></button>
                        </form>
                        <?php 
                               // Récupérer les détails de la commande
                           $nomClient = $_POST['NOM_CLIENT'];
                           $teleClient = $_POST['TELE_CLIENT'];
                           // ...

                           // Construction du contenu de l'e-mail
                           $sujet = "Nouvelle commande ajoutée";
                           $message = "Une nouvelle commande a été ajoutée. Veuillez vérifier votre tableau de commandes.";

                           // Envoyer l'e-mail
                           $destinataire = "zakariaezzhar0@gmail.com";
                           $headers = "From: zakariaezzhar69@gmail.com\r\n";
                           $headers .= "Reply-To: $teleClient\r\n";
                           $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

                           mail($destinataire, $sujet, $message, $headers);
                        ?>
                     
                </div>
                </div>
            </div>
        </div>
        <script>
            const imgs = document.querySelectorAll('.img-select a');
            const imgBtns = [...imgs];
            let imgId = 1;

            imgBtns.forEach((imgItem) => {
                imgItem.addEventListener('click', (event) => {
                    event.preventDefault();
                    imgId = imgItem.dataset.id;
                    slideImage();
                });
            });

            function slideImage(){
                const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

                document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
            }

            window.addEventListener('resize', slideImage);
        </script>
      </section>


      <!-- les produit en relation "8"-->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Produits <span>Connexes</span>
               </h2>
            </div>
            <div class="row">

            <?php foreach ($produitsCont as $produits): ?>
               <div class="col-md-3 col-sm-6">
                  <div class="product-grid">
                    <div class="product-image">
                        <div class="image">
                          <img class="pic-1" src="images/produits/<?php echo $produits['IMG_PROD1'] ?>">
                          <img class="pic-2" src="images/produits/<?php echo $produits['IMG_PROD2'] ?>">
                        </div>
                        <ul class="product-links">
                           <li><a href="cart.php?id_prod=<?php echo $produits['ID_PROD'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                           <li><a href="productPage.php?id_prod=<?php echo $produits['ID_PROD'] ?>" style="width: 100px;"><Strong>PLUS</Strong></a></li>
                        </ul>
                     </div>
                     <div class="product-content">
                        <h3 class="title"><a href="#"><?php echo $produits["NOM_PROD"] ?></a></h3>
                        <div style="display: flex;">
                           <div class="price"><?php echo $produits["PRIX"] ?> DH</div>
                           <div class="price" style="color: rgb(158, 1, 1);margin-left: 20px;"><S><?php echo $produits["OLD_PRIX"] ?> DH</S></div>
                        </div>
                     </div>
                  </div>
               </div>
             <?php endforeach; ?>

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