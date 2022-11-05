<?php

session_start();
include("../config/fonction.php");

if(isset($_POST["post_id"]) || isset($_GET['post_id_json']))
{
    if(isset($_GET['post_id_json'])){$post_id = $_GET['post_id_json'];}else{$post_id = $_POST["post_id"];}
    $data = array();
	$PDO_query = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_statut = 1 AND eg_produit_id = :post_id ORDER BY eg_produit_id ASC");
	$PDO_query->bindParam(":post_id", $post_id, PDO::PARAM_INT);
	$PDO_query->execute();
	$output = '';
	$modale = $PDO_query->fetch();

    $response = [
        "name"  => $modale['eg_produit_nom'],
    ];

    // Get product images
    $PDO_query_produit_img_modale = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_image_produit_statut = 1 AND eg_produit_id = :eg_produit_id ORDER BY eg_image_produit_ordre DESC");
    $PDO_query_produit_img_modale->bindParam(":eg_produit_id", $modale["eg_produit_id"], PDO::PARAM_INT);
    $PDO_query_produit_img_modale->execute();
    while ($produit_image = $PDO_query_produit_img_modale->fetch()){
        $response['images'][] = "https://betatest.expert-gaming.tn" . $produit_image['eg_image_produit_nom'];
    }
    


	echo json_encode($response);
    // echo json_encode($modale);

    

	// 	$trois_mois = round($modale['eg_produit_prix']/3, 3);

    //     $interet_six_mois = ($modale['eg_produit_prix']*5)/100;
    //     $six_mois = round(($modale['eg_produit_prix']+$interet_six_mois)/6, 3);

    //     $interet_neuf_mois = ($modale['eg_produit_prix']*10)/100;
    //     $neuf_mois = round(($modale['eg_produit_prix']+$interet_neuf_mois)/9, 3);
    //     $output_img = '';
    //     $PDO_query_produit_img_modale = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_image_produit_statut = 1 AND eg_produit_id = :eg_produit_id ORDER BY eg_image_produit_ordre DESC");
    //     $PDO_query_produit_img_modale->bindParam(":eg_produit_id", $modale["eg_produit_id"], PDO::PARAM_INT);
    //     $PDO_query_produit_img_modale->execute();
    //     while ($produit_image = $PDO_query_produit_img_modale->fetch()){
    //         $output_img_cc = '
    //         <div class="swiper-slide">
    //             <img class="img-responsive m-auto" src="https://betatest.expert-gaming.tn' . $produit_image['eg_image_produit_nom'] . '" alt="' . $produit_image['eg_image_produit_title'] . '">
    //         </div>
    //         ';                            
    //         $output_img .= $output_img_cc;
    //     }
        
    //     $PDO_query_produit_img_modale->closeCursor();


    //     $output_img_1 = '';
    //     $PDO_query_produit_img_modale = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_image_produit_statut = 1 AND eg_produit_id = :eg_produit_id ORDER BY eg_image_produit_ordre DESC");
    //     $PDO_query_produit_img_modale->bindParam(":eg_produit_id", $modale["eg_produit_id"], PDO::PARAM_INT);
    //     $PDO_query_produit_img_modale->execute();
    //     while ($produit_image_1 = $PDO_query_produit_img_modale->fetch()){
    //         $output_img_1_cc = '
    //         <div class="swiper-slide">
    //             <img class="img-responsive m-auto" src="https://betatest.expert-gaming.tn' . $produit_image_1['eg_image_produit_nom'] . '" alt="' . $produit_image_1['eg_image_produit_title'] . '">
    //         </div>
    //         ';                
    //         $output_img_1 .= $output_img_1_cc;
    //     }
    //     $PDO_query_produit_img_modale->closeCursor();
                    
	
	// $PDO_query->closeCursor();	
    // $data['titre'][] = $modale["eg_produit_nom"];
    // $data['prix'][] = $modale["eg_produit_prix"];
    // $data['big_img_prod'][] = $output_img;
    // $data['petite_img_prod'][] = $output_img_1;
    // echo json_encode($data);

}

?>