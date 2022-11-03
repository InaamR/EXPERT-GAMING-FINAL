<?php

session_start();
include("../config/fonction.php");

if(isset($_POST["post_id"]))
{
	$PDO_query = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_statut = 1 AND eg_produit_id = :post_id ORDER BY eg_produit_id ASC");
	$PDO_query->bindParam(":post_id", $_POST['post_id'], PDO::PARAM_INT);
	$PDO_query->execute();
	$output = '';
	$modale = $PDO_query->fetch();
	
		$trois_mois = round($modale['eg_produit_prix']/3, 3);

        $interet_six_mois = ($modale['eg_produit_prix']*5)/100;
        $six_mois = round(($modale['eg_produit_prix']+$interet_six_mois)/6, 3);

        $interet_neuf_mois = ($modale['eg_produit_prix']*10)/100;
        $neuf_mois = round(($modale['eg_produit_prix']+$interet_neuf_mois)/9, 3);
        $output .= '
		<div class="row">
            <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">';
                    $output_img = '';
                    $PDO_query_produit_img_modale = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_image_produit_statut = 1 AND eg_produit_id = :eg_produit_id ORDER BY eg_image_produit_ordre DESC LIMIT 1");
                    $PDO_query_produit_img_modale->bindParam(":eg_produit_id", $modale["eg_produit_id"], PDO::PARAM_INT);
                    $PDO_query_produit_img_modale->execute();
                    $produit_image = $PDO_query_produit_img_modale->fetch();
                        $output_img_cc = '
                        <div class="swiper-slide">
                            <img class="img-responsive m-auto" src="https://betatest.expert-gaming.tn' . $produit_image['eg_image_produit_nom'] . '" alt="' . $produit_image['eg_image_produit_title'] . '">
                        </div>
                        ';                            
                        $output_img .= $output_img_cc;
                    
                    $PDO_query_produit_img_modale->closeCursor();
                    $output .= $output_img;
                    $output .= '
                    </div>
                </div>
                <div class="swiper-container gallery-thumbs mt-20px slider-nav-style-1 small-nav">
                    <div class="swiper-wrapper">';
                    $output_img_1 = '';
                    $PDO_query_produit_img_modale = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_image_produit_statut = 1 AND eg_produit_id = :eg_produit_id ORDER BY eg_image_produit_ordre DESC");
                    $PDO_query_produit_img_modale->bindParam(":eg_produit_id", $modale["eg_produit_id"], PDO::PARAM_INT);
                    $PDO_query_produit_img_modale->execute();
                    while ($produit_image_1 = $PDO_query_produit_img_modale->fetch()){
                        $output_img_1_cc = '
                        <div class="swiper-slide">
                            <img class="img-responsive m-auto" src="https://betatest.expert-gaming.tn' . $produit_image_1['eg_image_produit_nom'] . '" alt="' . $produit_image_1['eg_image_produit_title'] . '">
                        </div>
                        ';
                            
                        $output_img_1 .= $output_img_1_cc;
                    }
                    $PDO_query_produit_img_modale->closeCursor();
                    $output .= $output_img_1;
                    $output .= '
                    </div>
                    <div class="swiper-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                <div class="product-details-content quickview-content">
                    <h2>'.$modale["eg_produit_nom"].'</h2>
                    <div class="pricing-meta">
                        <ul class="d-flex">
                            <li class="new-price">'.$modale['eg_produit_prix'].' TD</li>
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
                    <hr>';
                    if($modale['eg_produit_prix'] >= 1000){
                        $output .= '<p class="facilite">Payez en plusieurs fois :</p>
                            <div class="pro-details-categories-info pro-details-same-style m-0"> 
                                <div class="product-details-table table-responsive">                
                                    <table class="table" border="1">
                                        <tbody>
                                            <tr>
                                                <td class="titre_tab"><b>3 mois</b></td>
                                                <td class="titre_tab"><b>6 mois</b></td>
                                                <td class="titre_tab"><b>9 mois</b></td>
                                            </tr>
                                            <tr>
                                                <td>'.$trois_mois.' DT</td>
                                                <td>'.$six_mois.' DT</td>
                                                <td>'.$neuf_mois.' DT</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-start"><small>* Facilité de paiement par chèque</small></td>
                                            </tr>
                                        </tbody>
                                    </table>                        
                                </div>
                            </div>';
                    }
                    $output .= '<div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                        <span>REF :</span>
                        <ul class="d-flex">
                            <li>
                                '.$modale['eg_produit_reference'].'
                            </li>
                        </ul>
                    </div>
                    <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                        <span>Modéle : </span>
                        <ul class="d-flex">
                            <li>
                                '.$modale['eg_produit_modele'].'
                            </li>
                        </ul>
                    </div>
                    <div class="pro-details-quality">
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                        </div>
                        <div class="pro-details-cart">
                            <button class="add-cart" id="dali"> Ajouter au panier</button>
                        </div>
                        <div class="pro-details-compare-wishlist pro-details-wishlist ">
                            <a href="#"><i class="pe-7s-like"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		';
	
	$PDO_query->closeCursor();	
 	echo $output;

}

?>