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
                    
                        <div id="product_area"></div>
                        <div id="skeleton_area"></div>
                        <div id="pagination_area" class="mt-2 mb-5" ></div>
                    </div>
                    
                    <!-- Sidebar Area Start -->
                    <div class="col-lg-3 order-lg-first col-md-12 order-md-last">
                        <div class="shop-sidebar-wrap">
                            
                            <div class="sidebar-widget">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="search_textbox" placeholder="Search Product" aria-label="Search Product" aria-describedby="search_button" />
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-widget">
                                <button type="button" name="clear_filter" class="btn btn-danger btn-sm" id="clear_filter">Annuler le filtre</button>
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

        load_product(1);
        
        function load_product(page = 1, query = '')
        {
            window.$_GET = new URLSearchParams(location.search);
            var scat = $_GET.get('scat');
            $('#product_area').style.display = 'none';

            $('#skeleton_area').style.display = 'block';

            $('#skeleton_area').innerHTML = make_skeleton();

            fetch('process/process.php?page='+page+query+'&scat='+scat+'').then(function(response){

                return response.json();

            }).then(function(responseData){

                var html = '';

                if(responseData.data)
                {
                    if(responseData.data.length > 0)
                    {
                        html += '<div class="shop-top-bar d-flex">';

                            html += '<p class="compare-product"> <span>'+responseData.total_data+'</span> Produits trouvés</p>';

                            html += '<!-- Left Side End -->';
                            html += '<div class="shop-tab nav">';
                                html += '<button class="active" data-bs-target="#shop-grid" data-bs-toggle="tab">';
                                    html += '<i class="fa fa-th" aria-hidden="true"></i>';
                                html += '</button>';
                                html += '<button data-bs-target="#shop-list" data-bs-toggle="tab">';
                                     html += '<i class="fa fa-list" aria-hidden="true"></i>';
                                html += '</button>';
                            html += '</div>';

                            html += '<!-- Right Side Start -->';
                            html += '<div class="select-shoing-wrap d-flex align-items-center">';
                                html += '<div class="shot-product">';
                                    html += '<p>Sort By:</p>';
                                html += '</div>';
                                html += '<!-- Single Wedge End -->';
                                html += '<div class="header-bottom-set dropdown">';
                                    html += '<button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">Default <i class="fa fa-angle-down"></i></button>';
                                    html += '<ul class="dropdown-menu dropdown-menu-right">';
                                        html += '<li><a class="dropdown-item" href="#">Name, A to Z</a></li>';
                                        html += '<li><a class="dropdown-item" href="#">Name, Z to A</a></li>';
                                        html += '<li><a class="dropdown-item" href="#">Price, low to high</a></li>';
                                        html += '<li><a class="dropdown-item" href="#">Price, high to low</a></li>';
                                        html += '<li><a class="dropdown-item" href="#">Sort By new</a></li>';
                                        html += '<li><a class="dropdown-item" href="#">Sort By old</a></li>';
                                    html += '</ul>';
                                html += '</div>';
                                html += '<!-- Single Wedge Start -->';
                            html += '</div>';
                            html += '<!-- Right Side End -->';
                        html += '</div>';

                        html += '<div class="shop-bottom-area">';
                            html += '<!-- Tab Content Area Start -->';
                            html += '<div class="row">';
                                html += '<div class="col">';

                                    html += '<div class="tab-content">';
                                        html += '<div class="tab-pane fade show active" id="shop-grid">';
                                            html += '<div class="row mb-n-30px">';

                                                for(var i = 0; i < responseData.data.length; i++)
                                                {
                                                    html += '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-30px">';
                                                        html += '<!-- Single Prodect -->';
                                                        html += '<div class="product">';

                                                            html += '<span class="badges">';
                                                                html += '<span class="dispo">Disponible</span>';
                                                                html += '</span>';

                                                            html += '<div class="thumb">';
                                                                html += '<a href="produit_details.php?id_prod=12" class="image">';
                                                                    html += '<img src="https://betatest.expert-gaming.tn/ckfinder/userfiles/images/Casque/Casque-Gaming-MSI-IMMERSE-GH30-V2/Casque-Gaming-MSI-IMMERSE-GH30-V2-tunisie-1.jpg" alt="" loading="lazy">';
                                                                    html += '<img class="hover-image" src="https://betatest.expert-gaming.tn/ckfinder/userfiles/images/Casque/Casque-Gaming-MSI-IMMERSE-GH30-V2/Casque-Gaming-MSI-IMMERSE-GH30-V2-tunisie-1.jpg" alt="" loading="lazy">';
                                                                html += '</a>';
                                                            html += '</div>';

                                                            html += '<div class="content">';
                                                                html += '<span class="category">';
                                                                    html += '<img src="https://betatest.expert-gaming.tn//ckfinder/userfiles/images/partenaire/MSI.jpg" alt="MSI" width="130">';
                                                                html += '</span>';
                                                                html += '<h5 class="title">';
                                                                    html += '<a href="#">'+responseData.data[i].name+'</a>';
                                                                html += '</h5>';
                                                                html += '<span class="price">';
                                                                    html += '<span class="new">'+responseData.data[i].price+' TND</span>';
                                                                html += '</span>';
                                                            html += '</div>';

                                                            html += '<div class="actions">';
                                                                html += '<button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>';
                                                                html += '<button class="action wishlist" title="Wishlist" data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist"><i class="pe-7s-like"></i></button>';
                                                                html += '<button class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>';
                                                                html += '<button class="action compare" title="Compare" data-bs-toggle="modal" data-bs-target="#exampleModal-Compare"><i class="pe-7s-refresh-2"></i></button>';
                                                            html += '</div>';

                                                        html += '</div>';
                                                    html += '</div>';
                                                }

                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';

                                html += '</div>';
                            html += '</div>';                                 

                        //Pagination zone

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

                }, 1000);

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
        }

        
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
                            html += '<span class="custom-radio"><input type="radio" name="marque_filter" value="'+responseData.marque[i].id+'" class="marque_filter"> '+responseData.marque[i].name+' - ('+responseData.marque[i].total+')</span>';
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

            var gender_elements = document.getElementsByClassName('marque_filter');

            for(var count = 0; count < gender_elements.length; count++)
            {
                gender_elements[count].checked = false;
            }

            var price_elements = document.getElementsByClassName('price_filter');


            $('#search_textbox').value = '';

            load_product(1, '');

        }

        $('#search_textbox').onclick = function(){

            var search_query = $('#search_textbox').value;

            if(search_query != '')
            {
                load_product(page = 1, make_query());
            }

        }

    </script>
</body>

</html>