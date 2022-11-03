<?php

session_start();
include("../config/fonction.php");

if(isset($_POST["post_id"]))
{
	$PDO_query = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_statut = 1 AND eg_produit_id = :post_id ORDER BY eg_produit_id ASC");
	$PDO_query->bindParam(":post_id", $_POST['post_id'], PDO::PARAM_INT);
	$PDO_query->execute();
	$output = '';
	while($modale = $PDO_query->fetch())
	{
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
                    while ($produit_image = $PDO_query_produit_img_modale->fetch()){
                        $output_img_cc = '
                        <div class="swiper-slide">
                            <img class="img-responsive m-auto" src="https://betatest.expert-gaming.tn' . $produit_image['eg_image_produit_nom'] . '" alt="' . $produit_image['eg_image_produit_title'] . '">
                        </div>
                        ';
                            
                        $output_img = $output_img. $output_img_cc;
                    }
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
                    while ($produit_image = $PDO_query_produit_img_modale->fetch()){
                        $output_img_1_cc = '
                        <div class="swiper-slide">
                            <img class="img-responsive m-auto" src="https://betatest.expert-gaming.tn' . $produit_image['eg_image_produit_nom'] . '" alt="' . $produit_image['eg_image_produit_title'] . '">
                        </div>
                        ';
                            
                        $output_img_1 = $output_img_1.$output_img_1_cc;
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
                            <li class="new-price">$20.90</li>
                        </ul>
                    </div>
                    <hr>
                    <p class="facilite">Payez en plusieurs fois :</p>
                    <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                   
                        <table class="table" border="1">
                            <tbody>
                                <tr>
                                    <td class="titre_tab"><b>3 mois</b></td>
                                    <td class="titre_tab"><b>6 mois</b></td>
                                    <td class="titre_tab"><b>9 mois</b></td>
                                </tr>
                                <tr>
                                    <td><span class="amount">'.$trois_mois.' DT</span></td>
                                    <td><span class="amount">'.$six_mois.' DT</span></td>
                                    <td><span class="amount">'.$neuf_mois.' DT</span></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-start"><small>* Facilité de paiement par chèque</small></td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
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
                            <button class="add-cart"> Ajouter au panier</button>
                        </div>
                        <div class="pro-details-compare-wishlist pro-details-wishlist ">
                            <a href="#"><i class="pe-7s-like"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		';
	}
	$PDO_query->closeCursor();
	
 	echo $output;

}

?>