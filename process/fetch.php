<?php

session_start();
include("../config/fonction.php");

if(isset($_POST["post_id"]) || isset($_GET['post_id_json']))
{
    if(isset($_GET['post_id_json'])){$post_id = $_GET['post_id_json'];}else{$post_id = $_POST["post_id"];}
    $response = array();
	$PDO_query = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_statut = 1 AND eg_produit_id = :post_id ORDER BY eg_produit_id ASC");
	$PDO_query->bindParam(":post_id", $post_id, PDO::PARAM_INT);
	$PDO_query->execute();
	$output = '';
	$modale = $PDO_query->fetch();
    $PDO_query->closeCursor();

    $response = [
        "name"  => $modale['eg_produit_nom'],
        "prix"  => $modale['eg_produit_prix'],
    ];

    $PDO_query_produit_img_modale = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_image_produit_statut = 1 AND eg_produit_id = :eg_produit_id ORDER BY eg_image_produit_ordre DESC LIMIT 3");
    $PDO_query_produit_img_modale->bindParam(":eg_produit_id", $modale["eg_produit_id"], PDO::PARAM_INT);
    $PDO_query_produit_img_modale->execute();
    while ($produit_image = $PDO_query_produit_img_modale->fetch()){
        $response['images'][] = "https://betatest.expert-gaming.tn" . $produit_image['eg_image_produit_nom'];
    }
    $PDO_query_produit_img_modale->closeCursor();
    echo json_encode($response);
}

?>