<?php

session_start();
include("../config/fonction.php");


if(isset($_POST["post_id"]))
{
	$PDO_query = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_statut = 1 ORDER BY eg_produit_id ASC");
	$PDO_query->execute();
	
	while($modale = $PDO_query->fetch())
	{
		$output .= '
		<h2>'.$modale["post_title"].'</h2>
		<p><label>Author By - '.$modale["post_author"].'</label></p>
		<p>'.$modale["post_description"].'</p>
		';
		$PDO_query_1 = Bdd::connectBdd()->prepare("SELECT eg_produit_id FROM eg_produit WHERE eg_produit_id < :post_id ORDER BY eg_produit_id_id DESC LIMIT 1");
		$PDO_query_1->bindParam(":post_id", $_POST['post_id'], PDO::PARAM_INT);
		$PDO_query_1->execute();
		$data_1 = $PDO_query_1->fetch(PDO::FETCH_ASSOC);

		$PDO_query_2 = Bdd::connectBdd()->prepare("SELECT eg_produit_id FROM eg_produit WHERE eg_produit_id > :post_id ORDER BY eg_produit_id_id DESC LIMIT 1");
		$PDO_query_2->bindParam(":post_id", $_POST['post_id'], PDO::PARAM_INT);
		$PDO_query_2->execute();
		$data_2 = $PDO_query_2->fetch(PDO::FETCH_ASSOC);

		$if_previous_disable = '';

		$if_next_disable = '';

		if($data_1["eg_produit_id"] == "")
		{
		$if_previous_disable = 'disabled';
		}
		if($data_2["eg_produit_id"] == "")
		{
		$if_next_disable = 'disabled';
		}

		$output .= '
		<br /><br />
		<div align="center">
		<button type="button" name="previous" class="btn btn-warning btn-sm previous" id="'.$data_1["eg_produit_id"].'" '.$if_previous_disable.'>Previous</button>
		<button type="button" name="next" class="btn btn-warning btn-sm next" id="'.$data_2["eg_produit_id"].'" '.$if_next_disable.'>Next</button>
		</div>
		<br />
		<br />
		';
	}
	$PDO_query->closeCursor();
	
 	echo $output;

}

?>