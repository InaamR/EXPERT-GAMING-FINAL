<?php
	session_start();
    header('Access-Control-Allow-Origin: https://betatest.expert-gaming.tn/error/erreur.php?erreur=403');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Content-Type');
	include("config/fonction.php");
    $PDO_query_produit = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_statut = 1 AND eg_produit_id = :eg_produit_id");
    $PDO_query_produit->bindParam(":eg_produit_id", $_GET['id_prod']);
    $PDO_query_produit->execute();
    $produit = $PDO_query_produit->fetch();
    $PDO_query_produit->closeCursor();
?>
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expert Gaming Tunisie - Favoris</title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="Expert Gaming, Vente Pc Gamer, Carte Graphique, Processeur en Tunisie, Vente Pc Gamer et accessoires en Tunisie" />
    <meta name="robots" content="index, follow" />
	<meta name="author" content="Expert Gaming Tunisie">
	<meta name="description" content="Expert Gaming : Vente de matériel Gaming et informatique en Tunisie"/>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="ico/favicon.png" />
    <!-- CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Minify Version -->
    <!-- <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->
</head>

<body>
    <div class="main-wrapper">
        <?php
			include("include/top.php");
		?>
        <!-- offcanvas overlay start -->
        <div class="offcanvas-overlay"></div>
        <!-- offcanvas overlay end -->
        <!-- OffCanvas Wishlist Start -->
        <?php
            include("include/favoris.php");
        ?>
        <!-- OffCanvas Wishlist End -->
        <!-- OffCanvas Cart Start -->
        <?php
            include("include/panier.php");
        ?>
        <!-- OffCanvas Cart End -->
        <!-- OffCanvas Menu Start -->
        <?php
            include("include/menu_mobile.php");
        ?>
        <!-- OffCanvas Menu End -->
        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                            <li class="breadcrumb-item">Vos Favoris</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        <!-- Wishlist Area Start -->
        <div class="cart-main-area pt-40px pb-40px">
            <div class="container">
                <h3 class="cart-page-title">Vos Favoris</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Until Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>Ajouter au panier</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img class="img-responsive ml-15px" src="assets/images/product-image/1.webp" alt="" /></a>
                                            </td>
                                            <td class="product-name"><a href="#">Modern Smart Phone</a></td>
                                            <td class="product-price-cart"><span class="amount">$60.00</span></td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                                </div>
                                            </td>
                                            <td class="product-subtotal">$70.00</td>
                                            <td class="product-wishlist-cart">
                                                <a href="#">Ajouter</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist Area End -->
        <!-- Footer Area Start -->
        <?php
            include("include/footer.php");
        ?>
        <!-- Footer Area End -->
    </div>
    
    <!-- JS Files
    ============================================ -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/scrollUp.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/plugins/mailchimp-ajax.js"></script>

    <!-- Minify Version -->
    <!-- <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/main.min.js"></script> -->

    <!--Main JS (Common Activation Codes)-->
    <script src="assets/js/main.js"></script>
</body>

</html>