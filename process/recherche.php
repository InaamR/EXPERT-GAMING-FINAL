<?php

	$PDO_query = Bdd::connectBdd()->prepare("SELECT eg_produit_nom FROM eg_produit ORDER BY eg_produit_id ASC");
	$PDO_query->execute();
	$total_data = $PDO_query->fetchAll();
	
	
	$data = array();

	foreach($total_data as $row)
	{
		$data[] = array(
			'label'     =>  $row['eg_produit_nom'],
			'value'     =>  $row['eg_produit_nom']
		);
	}
	$PDO_query->closeCursor();

?>