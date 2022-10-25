<?php
	session_start();
    header('Access-Control-Allow-Origin: https://betatest.expert-gaming.tn/error/erreur.php?erreur=403');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Content-Type');
	include("config/fonction.php");
    
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expert Gaming Tunisie</title>
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
        <!-- Shop Page Start  -->
        <div class="shop-category-area pt-70px pb-100px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                        <!-- Shop Top Area Start -->
                        <div class="shop-top-bar d-flex">
                            <p class="compare-product"> <span>12</span> Product Found of <span>30</span></p>
                            <!-- Left Side End -->
                            <div class="shop-tab nav">
                                <button class="active" data-bs-target="#shop-grid" data-bs-toggle="tab">
                                    <i class="fa fa-th" aria-hidden="true"></i>
                                </button>
                                <button data-bs-target="#shop-list" data-bs-toggle="tab">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                </button>
                            </div>
                            <!-- Right Side Start -->
                            <div class="select-shoing-wrap d-flex align-items-center">
                                <div class="shot-product">
                                    <p>Sort By:</p>
                                </div>
                                <!-- Single Wedge End -->
                                <div class="header-bottom-set dropdown">
                                    <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">Default <i class="fa fa-angle-down"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a class="dropdown-item" href="#">Name, A to Z</a></li>
                                        <li><a class="dropdown-item" href="#">Name, Z to A</a></li>
                                        <li><a class="dropdown-item" href="#">Price, low to high</a></li>
                                        <li><a class="dropdown-item" href="#">Price, high to low</a></li>
                                        <li><a class="dropdown-item" href="#">Sort By new</a></li>
                                        <li><a class="dropdown-item" href="#">Sort By old</a></li>
                                    </ul>
                                </div>
                                <!-- Single Wedge Start -->
                            </div>
                            <!-- Right Side End -->
                        </div>
                        <!-- Shop Top Area End -->
                        <!-- Shop Bottom Area Start -->
                        <div class="shop-bottom-area">

                            <!-- Tab Content Area Start -->
                            <div class="row">
                                <div class="col">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="shop-grid">
                                            <div class="row mb-n-30px">

                                                <?php
                                                    $PDO_query_produit = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_statut = 1 AND eg_sous_categorie_id = :eg_sous_categorie_id ORDER BY RAND()");
                                                    $PDO_query_produit->bindParam(":eg_sous_categorie_id", $_GET['scat']);
                                                    $PDO_query_produit->execute();

                                                    while ($produit = $PDO_query_produit->fetch()){
                                                
                                                        echo '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-30px">';
                                                        echo '<!-- Single Prodect -->';
                                                        echo '<div class="product">';
                                                        echo '<span class="badges">';
                                                        if($produit['eg_produit_dispo'] == 0){

                                                            echo '<span class="hs">Hors stock</span>';
                            
                                                        }elseif($produit['eg_produit_dispo'] == 1){
                            
                                                            echo '<span class="dispo">Disponible</span>';
                            
                                                        }elseif($produit['eg_produit_dispo'] == 2){
                            
                                                            echo '<span class="commande">Sur commande 48H</span>';
                            
                                                        }elseif($produit['eg_produit_dispo'] == 3){
                            
                                                            echo '<span class="commande">Sur commande</span>';
                            
                                                        }elseif($produit['eg_produit_dispo'] == 4){
                            
                                                            echo '<span class="arrivage">En arrivage</span>';
                            
                                                        }

                                                        echo '</span>';

                                                        echo '<div class="thumb">';
                                                        echo '<a href="produit_details.php?id_prod='.$produit['eg_produit_id'].'" class="image">';

                                                        $PDO_query_produit_img = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_image_produit_statut = 1 AND eg_produit_id = :eg_produit_id LIMIT 1");
                                                        $PDO_query_produit_img->bindParam(":eg_produit_id", $produit['eg_produit_id'], PDO::PARAM_INT);
                                                        $PDO_query_produit_img->execute();
                                                        while ($produit_image = $PDO_query_produit_img->fetch()){

                                                            echo '<img src="https://betatest.expert-gaming.tn' . $produit_image['eg_image_produit_nom'] . '" alt="' . $produit_image['eg_image_produit_title'] . '"  loading="lazy"/>';
                                                            echo '<img class="hover-image" src="https://betatest.expert-gaming.tn' . $produit_image['eg_image_produit_nom'] . '" alt="' . $produit_image['eg_image_produit_title'] . '"  loading="lazy"/>';

                                                        }
                                                        $PDO_query_produit_img->closeCursor();
                                                        

                                                        echo '</a>';
                                                        echo '</div>';

                                                        echo '<div class="content">';
                                                        echo '<span class="category">';
                                                        $PDO_query_produit_marque= Bdd::connectBdd()->prepare("SELECT * FROM eg_marque WHERE eg_marque_statut = 1 AND eg_marque_id  = :eg_marque_id");
                                                        $PDO_query_produit_marque->bindParam(":eg_marque_id", $produit['eg_marque_id'], PDO::PARAM_INT);
                                                        $PDO_query_produit_marque->execute();
                                                        $produit_promo_image_marque = $PDO_query_produit_marque->fetch();
                                                                echo '
                                                                <img src="https://betatest.expert-gaming.tn/' . $produit_promo_image_marque['eg_marque_logo'] . '" alt="' . $produit_promo_image_marque['eg_marque_nom'] . '" width="130">
                                                                ';                                      

                                                        $PDO_query_produit_marque->closeCursor();                                       
                                                        
                                                        echo'</span>';

                                                        echo '<h5 class="title">';
                                                        echo '<a href="#">';
                                                        $text = wordwrap($produit['eg_produit_nom'], 100, "***", true); // insertion de marqueurs ***
                                                        $tcut = explode("***", $text); // on créé un tableau à partir des marqueurs ***
                                                        $part1 = $tcut[0]; // la partie à mettre en exergue
                                                        $part2 = '';
                                                        for($i=1; $i<count($tcut); $i++) {
                                                            $part2 .= $tcut[$i].' ';
                                                        }
                                                        $part2 = trim($part2); //suppression du dernier espace dans la partie de texte restante
                                                        echo $part1;
                                                        echo '</a>';
                                                        echo '</h5>';

                                                        echo '<span class="price">';
                                                        if($produit['eg_produit_promo'] <> "0.000"){
                                                        echo '<span class="old">' . round($produit['eg_produit_promo'], 3) . ' TND</span>';
                                                        echo '<span class="new text-danger"> ' . round($produit['eg_produit_prix'], 3) . 'TND</span>';
                                                        }else{
                                                        echo '<span class="new">' . round($produit['eg_produit_prix'], 3) . 'TND</span>';
                                                        }
                                                        echo '</span>';
                                                        echo '</div>';

                                                        echo '<div class="actions">';
                                                        echo '<button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist">
                                                            <i class="pe-7s-like"></i></button>
                                                            <button class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                                            <button class="action compare" title="Compare" data-bs-toggle="modal" data-bs-target="#exampleModal-Compare">
                                                            <i class="pe-7s-refresh-2"></i></button>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                    }
                                                    $PDO_query_produit->closeCursor();
                                                ?>

                                            </div>
                                        </div>
                                        <!--<div class="tab-pane fade mb-n-30px" id="shop-list">

                                            <div class="shop-list-wrapper mb-30px">
                                                <div class="row">                                                    
                                                    <div class="col-md-5 col-lg-5 col-xl-4 mb-lm-30px">
                                                        <div class="product">
                                                            <div class="thumb">
                                                                <a href="single-product.html" class="image">
                                                                    <img src="assets/images/product-image/1.webp" alt="Product" />
                                                                    <img class="hover-image" src="assets/images/product-image/1.webp" alt="Product" />
                                                                </a>
                                                                <span class="badges">
                                                                <span class="new">New</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7 col-lg-7 col-xl-8">
                                                        <div class="content-desc-wrap">
                                                            <div class="content">
                                                                <span class="category"><a href="#">Accessories</a></span>
                                                                <h5 class="title"><a href="single-product.html">Modern Smart Phone</a></h5>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                                    sed do eiusmodol tempor incididunt ut labore et dolore
                                                                    magna aliqua. Ut enim ad minim veni quis nostrud
                                                                    exercitation ullamco laboris </p>
                                                            </div>
                                                            <div class="box-inner">
                                                                <span class="price">
                                                                <span class="new">$38.50</span>
                                                                </span>
                                                                <div class="actions">
                                                                    <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
                                                                        class="pe-7s-shopbag"></i></button>
                                                                    <button class="action wishlist" title="Wishlist" data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist"><i
                                                                            class="pe-7s-like"></i></button>
                                                                    <button class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                                                    <button class="action compare" title="Compare" data-bs-toggle="modal" data-bs-target="#exampleModal-Compare"><i
                                                                            class="pe-7s-refresh-2"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <!-- Tab Content Area End -->

                            <!--  Pagination Area Start -->
                            <div class="pro-pagination-style text-center text-lg-end" data-aos="fade-up" data-aos-delay="200">
                                <div class="pages">
                                    <ul>
                                        <li class="li"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
                                        </li>
                                        <li class="li"><a class="page-link" href="#">1</a></li>
                                        <li class="li"><a class="page-link active" href="#">2</a></li>
                                        <li class="li"><a class="page-link" href="#">3</a></li>
                                        <li class="li"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--  Pagination Area End -->

                        </div>
                        <!-- Shop Bottom Area End -->
                    </div>
                    <!-- Sidebar Area Start -->
                    <div class="col-lg-3 order-lg-first col-md-12 order-md-last">
                        <div class="shop-sidebar-wrap">
                            <div class="sidebar-widget">
                            <button type="button" name="clear_filter" class="btn btn-warning btn-sm" id="clear_filter">Clear Filter</button>
                            </div>
                            <!-- Sidebar single item -->
                            <div class="sidebar-widget">
                                <h4 class="sidebar-title">Marque</h4>
                                <div class="sidebar-widget-category">
                                    <div id="marque_filter" class="mb-2"></div>
                                </div>
                            </div>
                            <!-- Sidebar single item -->
                            <div class="sidebar-widget">
                                <h4 class="sidebar-title">Prix</h4>
                                <div class="sidebar-widget-size">
                                <div id="price_filter" class="mb-2"></div>
                                </div>
                            </div>
                            <!-- Sidebar single item -->
                            <div class="sidebar-widget">
                                <h4 class="sidebar-title">Brands</h4>
                                <div class="sidebar-widget-brand">
                                    <ul>
                                        <li><a href="#" class="selected m-0"> Lakmeeto<span>(65)</span> </a></li>
                                        <li><a href="#" class=""> Beautifill <span>(14)</span></a></li>
                                        <li><a href="#" class=""> Made In GD <span>(21)</span></a></li>
                                        <li><a href="#" class=""> Pecifico <span>(16)</span></a></li>
                                        <li><a href="#" class=""> Xlovgtir<span>(12)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar single item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Page End  -->

        <!-- Footer Area Start -->
        <?php
            include("include/footer.php");
        ?>
        <!-- Footer Area End -->

    </div>

    
    <!-- Modal -->
    <div class="modal modal-2 fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> <i class="pe-7s-close"></i></button>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                            <!-- Swiper -->
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/zoom-image/1.webp" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/zoom-image/2.webp" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/zoom-image/3.webp" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/zoom-image/4.webp" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/zoom-image/5.webp" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-container gallery-thumbs mt-20px slider-nav-style-1 small-nav">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/small-image/1.webp" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/small-image/2.webp" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/small-image/3.webp" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/small-image/4.webp" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/small-image/5.webp" alt="">
                                    </div>
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-buttons">
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-details-content quickview-content">
                                <h2>Modern Smart Phone</h2>
                                <div class="pricing-meta">
                                    <ul class="d-flex">
                                        <li class="new-price">$20.90</li>
                                    </ul>
                                </div>
                                <div class="pro-details-rating-wrap">
                                    <div class="rating-product">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span class="read-review"><a class="reviews" href="#">( 2 Review )</a></span>
                                </div>
                                <p class="mt-30px">Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmll tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mill veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exet commodo consequat. Duis aute irure dolor</p>
                                <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                    <span>SKU:</span>
                                    <ul class="d-flex">
                                        <li>
                                            <a href="#">Ch-256xl</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                    <span>Categories: </span>
                                    <ul class="d-flex">
                                        <li>
                                            <a href="#">Smart Device, </a>
                                        </li>
                                        <li>
                                            <a href="#">ETC</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                    <span>Tags: </span>
                                    <ul class="d-flex">
                                        <li>
                                            <a href="#">Smart Device, </a>
                                        </li>
                                        <li>
                                            <a href="#">Phone</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                    </div>
                                    <div class="pro-details-cart">
                                        <button class="add-cart"> Add To
                                            Cart</button>
                                    </div>
                                    <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                        <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                                    </div>
                                </div>
                                <div class="payment-img">
                                    <a href="#"><img src="assets/images/icons/payment.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- Modal Cart -->
    <div class="modal customize-class fade" id="exampleModal-Cart" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                    <div class="tt-modal-messages">
                        <i class="pe-7s-check"></i> Added to cart successfully!
                    </div>
                    <div class="tt-modal-product">
                        <div class="tt-img">
                            <img src="assets/images/product-image/1.webp" alt="Modern Smart Phone">
                        </div>
                        <h2 class="tt-title"><a href="#">Modern Smart Phone</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>     
    <!-- Modal wishlist -->
    <div class="modal customize-class fade" id="exampleModal-Wishlist" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                    <div class="tt-modal-messages">
                        <i class="pe-7s-check"></i> Added to Wishlist successfully!
                    </div>
                    <div class="tt-modal-product">
                        <div class="tt-img">
                            <img src="assets/images/product-image/1.webp" alt="Modern Smart Phone">
                        </div>
                        <h2 class="tt-title"><a href="#">Modern Smart Phone</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <!-- Modal compare -->
    <div class="modal customize-class fade" id="exampleModal-Compare" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                    <div class="tt-modal-messages">
                        <i class="pe-7s-check"></i> Added to compare successfully!
                    </div>
                    <div class="tt-modal-product">
                        <div class="tt-img">
                            <img src="assets/images/product-image/1.webp" alt="Modern Smart Phone">
                        </div>
                        <h2 class="tt-title"><a href="#">Modern Smart Phone</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Global Vendor, plugins JS -->
    <!-- JS Files
    ============================================ -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/scrollUp.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/jquery-ui.min.js"></script>

    <!-- Minify Version -->
    <!-- <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/main.min.js"></script> -->

    <!--Main JS (Common Activation Codes)-->
    <script src="assets/js/main.js"></script>
    <script>
        
        function $(selector){

            return document.querySelector(selector);

        }

        /*load_product(1);
        
        function load_product(page = 1, query = '')
        {
            $('#product_area').style.display = 'none';

            $('#skeleton_area').style.display = 'block';

            $('#skeleton_area').innerHTML = make_skeleton();

            fetch('process.php?page='+page+query+'').then(function(response){

                return response.json();

            }).then(function(responseData){

                var html = '';

                if(responseData.data)
                {
                    if(responseData.data.length > 0)
                    {
                        html += '<p class="h6">'+responseData.total_data+' Products Found</p>';

                        html += '<div class="row">';

                        for(var i = 0; i < responseData.data.length; i++)
                        {
                            html += '<div class="col-md-3 mb-2 p-3">';

                            html += '<img src ="'+responseData.data[i].image+'" class="img-fluid border mb-3 p-3" />';

                            html += '<p class="fs-6 text-center">'+responseData.data[i].name+'&nbsp;&nbsp;&nbsp;<span class="badge bg-info text-dark">'+responseData.data[i].brand+'</span><br />';

                            html += '<span class="fw-bold text-danger"><span>&#8377;</span> '+responseData.data[i].price+'</span>';

                            html += '</div>';
                        }

                        html += '</div>';

                        $('#product_area').innerHTML = html;
                    }
                    else
                    {
                        $('#product_area').innerHTML = '<p class="h6">No Product Found</p>';
                    }
                }

                if(responseData.pagination)
                {
                    $('#pagination_area').innerHTML = responseData.pagination;
                }

                setTimeout(function(){

                    $('#product_area').style.display = 'block';

                    $('#skeleton_area').style.display = 'none';

                }, 3000);

            });
        }

        function make_skeleton()
        {
            var output = '<div class="row">';

            for(var count = 0; count < 8; count++)
            {
                output += '<div class="col-md-3 mb-3 p-4">';

                output += '<div class="mb-2 bg-light text-dark" style="height:240px;"></div>';

                output += '<div class="mb-2 bg-light text-dark" style="height:50px;"></div>';

                output += '<div class="mb-2 bg-light text-dark" style="height:25px;"></div>';

                output += '</div>';
            }

            output += '</div>';

            return output;
        }*/

        
        load_filter();
        function load_filter()
        {
            window.$_GET = new URLSearchParams(location.search);
            var scat = $_GET.get('scat');
            fetch('process/process.php?action=filter&scat='+scat+'').then(function(response){

                return response.json();

            }).then(function(responseData){

                if(responseData.marque)
                {

                    if(responseData.marque.length > 0)            
                    {
                        var html = '<div class="input-radio-filtre flex">';

                        for(var i = 0; i < responseData.marque.length; i++)
                        {
                            html += '<span class="custom-radio"><input type="radio" name="marque_filter" value="'+responseData.marque[i].name+'" class="marque_filter"> '+responseData.marque[i].name+' - ('+responseData.marque[i].total+')</span>';
                        }

                        html += '</div>';
                        $('#marque_filter').innerHTML = html;

                        var marque_elements = document.getElementsByClassName('marque_filter');

                        for(var i = 0; i < marque_elements.length; i++)
                        {
                            marque_elements[i].onclick = function(){

                                load_product(page = 1, make_query());

                            }
                        }
                    }

                }
                if(responseData.price)
                {
                    if(responseData.price.length > 0)
                    {
                        var html = '<div class="list-group">';

                        for(var i = 0; i < responseData.price.length; i++)
                        {
                            html += '<a href="#" class="list-group-item list-group-item-action price_filter" id="'+responseData.price[i].condition+'">'+responseData.price[i].name+' TND <span class="text-muted">('+responseData.price[i].total+')</a>';
                        }

                        html += '</div>';

                        $('#price_filter').innerHTML = html;

                        var price_elements = document.getElementsByClassName('price_filter');

                        for(var i = 0; i < price_elements.length; i++)
                        {
                            price_elements[i].onclick = function()
                            {
                                remove_active_class(price_elements);

                                this.classList.add('active');

                                load_product(page = 1, make_query());
                            }
                        }
                    }
                }

            });
        }

        function make_query()
        {
            var query = '';

            var marque_elements = document.getElementsByClassName('marque_filter');

            for(var i = 0; i < marque_elements.length; i++)
            {
                if(marque_elements[i].checked)
                {
                    query += '&marque_filter='+marque_elements[i].value+'';
                }
            }

            var price_elements = document.getElementsByClassName('price_filter');

            for(var i = 0; i < price_elements.length; i++)
            {
                if(price_elements[i].matches('.active'))
                {
                    query += '&price_filter='+price_elements[i].getAttribute('id')+'';
                }
            }

            var brand_elements = document.getElementsByClassName('brand_filter');

            var brandlist = '';

            for(var i = 0; i < brand_elements.length; i++)
            {
                if(brand_elements[i].checked)
                {
                    brandlist += brand_elements[i].value +',';
                }
            }

            if(brandlist != '')
            {
                query += '&brand_filter='+brandlist+'';
            }

            var search_query = $('#search_textbox').value;

            query += '&search_filter='+search_query+'';

            return query;
        }

        function remove_active_class(element)
        {
            for(var i = 0; i < element.length; i++)
            {
                if(element[i].matches('.active'))
                {
                    element[i].classList.remove("active");
                }
            }
        }

        $('#clear_filter').onclick = function(){

            var gender_elements = document.getElementsByClassName('gender_filter');

            for(var count = 0; count < gender_elements.length; count++)
            {
                gender_elements[count].checked = false;
            }

            var price_elements = document.getElementsByClassName('price_filter');

            remove_active_class(price_elements);

            var brand_elements = document.getElementsByClassName('brand_filter');

            for(var count = 0; count < brand_elements.length; count++)
            {
                brand_elements[count].checked = false;
            }

            $('#search_textbox').value = '';

            load_product(1, '');

        }

        $('#search_button').onclick = function(){

            var search_query = $('#search_textbox').value;

            if(search_query != '')
            {
                load_product(page = 1, make_query());
            }

        }

    </script>
</body>

</html>