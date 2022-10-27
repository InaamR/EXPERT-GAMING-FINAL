<?php

session_start();
include("../config/fonction.php");


if(isset($_GET["page"]))
{
	$data = array();
	if(isset($_GET["pagination"])){
		$nb_produit = $_GET["pagination"];
	}
	$limit = $nb_produit;

	$page = 1;

	if($_GET["page"] > 1)
	{
		$start = (($_GET["page"] - 1) * $limit);

		$page = $_GET["page"];
	}
	else
	{
		$start = 0;
	}

	$where = '';

	$search_query = '';

	if(isset($_GET["marque_filter"]))
	{
		$where .= ' AND eg_marque_id = "'.trim($_GET["marque_filter"]).'"';

		$search_query .= '&marque_filter='.trim($_GET["marque_filter"]);
	}

	if(isset($_GET["price_filter"]))
	{
		if($where != '')
		{
			$where .= ' AND '. $_GET["price_filter"].'';
		}
		else
		{
			$where .= ' AND '. $_GET["price_filter"].'';
		}

		$search_query .= '&price_filter='.$_GET["price_filter"];
	}

	

	/*if(isset($_GET["brand_filter"]))
	{
		$brand_array = explode(",", $_GET["brand_filter"]);

		$brand_condition = '';

		foreach($brand_array as $brand)
		{
			$brand_condition .= 'brand = "' .$brand . '" OR ';
		}

		$brand_condition = substr($brand_condition, 0, -4);

		if($where != '')
		{
			$where .= ' AND ('.$brand_condition.')';
		}
		else
		{
			$where .= $brand_condition;
		}

		$search_query .= '&brand_filter='.$_GET["brand_filter"];
	}*/

	if(isset($_GET["search_filter"]))
	{
		$search_string = str_replace(" ", "%", $_GET["search_filter"]);

		if($where != '')
		{
			$where .= ' AND ( eg_produit_nom LIKE "%'.$search_string.'%" )';
		}
		else
		{
			$where .= 'AND eg_produit_nom LIKE "%'.$search_string.'%"';
		}
		$search_query .= '&search_filter='.$_GET["search_filter"].'';
	}

	if(isset($_GET["ordre_filter"]))
	{
		if($where != '')
		{
			$where .= ' ORDER BY '. $_GET["ordre_filter"].'';
		}
		else
		{
			$where .= ' ORDER BY '. $_GET["ordre_filter"].'';
		}

		$search_query .= '&ordre_filter='.$_GET["ordre_filter"];
	}

	if($where != '')
	{
		$where = 'WHERE eg_sous_categorie_id = :scat AND eg_produit_statut = 1 ' . $where;
	}else{
		$where = 'WHERE eg_sous_categorie_id = :scat AND eg_produit_statut = 1';
	}
	$PDO_query = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit ".$where."");
	$PDO_query->bindParam(":scat", $_GET["scat"], PDO::PARAM_INT);
	$PDO_query->execute();
	$total_data = $PDO_query->rowCount();
	$PDO_query->closeCursor();

	$PDO_query = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit ".$where." LIMIT ".$start.", ".$limit."");
	$PDO_query->bindParam(":scat", $_GET["scat"], PDO::PARAM_INT);
	$PDO_query->execute();
	$produit = $PDO_query->fetchAll();
	

	foreach($produit as $row)
	{
		//$image_array = explode(" ~ ", $row["eg_produit_id"]);
		//$image_array[0]
		if($row['eg_produit_dispo'] == 0){

			$status = '<span class="hs">Hors stock</span>';

		}elseif($row['eg_produit_dispo'] == 1){

			$status = '<span class="dispo">Disponible</span>';

		}elseif($row['eg_produit_dispo'] == 2){

			$status = '<span class="commande">Sur commande 48H</span>';

		}elseif($row['eg_produit_dispo'] == 3){

			$status = '<span class="commande">Sur commande</span>';

		}elseif($row['eg_produit_dispo'] == 4){

			$status = '<span class="arrivage">En arrivage</span>';

		}
		$link_details = 'produit_details.php?id_prod='.$row['eg_produit_id'];

		$PDO_query_produit_img = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_image_produit_statut = 1 AND eg_produit_id = :eg_produit_id LIMIT 1");
		$PDO_query_produit_img->bindParam(":eg_produit_id", $row['eg_produit_id'], PDO::PARAM_INT);
		$PDO_query_produit_img->execute();
		$produit_image = $PDO_query_produit_img->fetch();
		$image = $produit_image['eg_image_produit_nom'];
		$image_nom = $produit_image['eg_image_produit_title'];		
		$PDO_query_produit_img->closeCursor();

		$PDO_query_produit_marque= Bdd::connectBdd()->prepare("SELECT * FROM eg_marque WHERE eg_marque_statut = 1 AND eg_marque_id  = :eg_marque_id");
		$PDO_query_produit_marque->bindParam(":eg_marque_id", $row['eg_marque_id'], PDO::PARAM_INT);
		$PDO_query_produit_marque->execute();
		$produit_promo_image_marque = $PDO_query_produit_marque->fetch();
		$logo_marque = $produit_promo_image_marque['eg_marque_logo'];
		$nom_marque = $produit_promo_image_marque['eg_marque_nom'];
		$PDO_query_produit_marque->closeCursor(); 

		if($row['eg_produit_promo'] <> "0.000"){
			$prix = '<span class="old">' . round($row['eg_produit_promo'], 3) . ' TND</span>';
			$prix .= '<span class="new text-danger"> ' . round($row['eg_produit_prix'], 3) . 'TND</span>';
		}else{
			$prix = '<span class="new"> ' . round($row['eg_produit_prix'], 3) . 'TND</span>';
		}

		$phrase_event = $row['eg_produit_description'];
		$max_words = 40;
		$id_prod = $row['eg_produit_id'];
		$phrase_array = explode(' ',$phrase_event);
		if(count($phrase_array) > $max_words && $max_words > 0){
			$phrase_courte = implode(' ',array_slice($phrase_array, 0, $max_words)).'...'; 
		}else{$phrase_courte = $row['eg_produit_description'];}
		$desc = strip_tags($phrase_courte);

		$data[] = array(
			'name'		=>	$row['eg_produit_nom'],
			'price'		=>	$prix,
			'brand'		=>	$row['eg_marque_id'],
			'status'		=>	$status,
			'link_details'		=>	$link_details,
			'desc'		=>	$desc,
			'image'		=>	$image,
			'image_nom'		=>	$image_nom,
			'logo_marque'		=>	$logo_marque,
			'nom_marque'		=>	$nom_marque,
			'id_prod'		=>	$id_prod
		);

	}
	$PDO_query->closeCursor();
	$pagination_html = '
	<!--  Pagination Area Start -->
	<div class="pro-pagination-style text-center text-lg-end" data-aos="fade-up" data-aos-delay="200">
		<div class="pages">

			<ul>
	';
	
	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array  = array();

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}

			$page_array[] = '...';

			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
				<li class="li"><a class="page-link active" href="#">'.$page_array[$count].'</a></li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				
				$previous_link = '<li class="li"><a class="page-link"  href="javascript:load_product('.$previous_id.', `'.$search_query.'`)"><i class="fa fa-angle-left"></i></a></li>';
			}
			else
			{
				$previous_link = '
				<li class="li"><a class="page-link"  href="#"><i class="fa fa-angle-left"></i></a></li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
					<li class="li"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
				';
			}
			else
			{
				$next_link = '
				<li class="li"><a class="page-link" href="javascript:load_product('.$next_id.', `'.$search_query.'`)"><i class="fa fa-angle-right"></i></a>
				';
			}
		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
					<li class="li"><a class="page-link" href="#">...</a>
				';
			}
			else
			{
				$page_link .= '
					<li class="li"><a class="page-link" href="javascript:load_product('.$page_array[$count].', `'.$search_query.'`)">'.$page_array[$count].'</a></li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
			</ul>

			</div>
		</div>
		<!--  Pagination Area End -->

		</div>
	';
				

	$output = array(
		'data'		=>	$data,
		'pagination'=>	$pagination_html,
		'total_data'=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_GET["action"]))
{
	$data = array();

	$PDO_query_filtre = Bdd::connectBdd()->prepare("SELECT eg_marque.eg_marque_nom, COUNT(eg_produit.eg_produit_id), eg_produit.eg_marque_id FROM eg_produit INNER JOIN eg_marque ON eg_produit.eg_marque_id = eg_marque.eg_marque_id WHERE eg_produit.eg_produit_statut = 1 AND eg_produit.eg_sous_categorie_id = :scat GROUP BY eg_marque.eg_marque_nom");
	$PDO_query_filtre->bindParam(":scat", $_GET["scat"], PDO::PARAM_INT);
	$PDO_query_filtre->execute();
	$marque_filtre = $PDO_query_filtre->fetchAll();
	foreach($marque_filtre as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row[0];
		$sub_data['total'] = $row[1];
		$sub_data['id'] = $row[2];
		$data['marque'][] = $sub_data;
	}
	$PDO_query_filtre->closeCursor();

	$price_range = array(
		'eg_produit_prix < 500' =>	'Moin de 500',
		'eg_produit_prix > 500 && eg_produit_prix < 1500'	=>	'500 - 1500',
		'eg_produit_prix > 1500 && eg_produit_prix < 3000'	=>	'1500 - 3000',
		'eg_produit_prix > 3000 && eg_produit_prix < 6000'=> '3000 - 6000',
		'eg_produit_prix > 6000' =>	'Plus de 6000'
	);

	foreach($price_range as $key => $value)
	{
		
		$PDO_query_filtre = Bdd::connectBdd()->prepare("SELECT COUNT(eg_produit_id) AS Total FROM eg_produit WHERE ".$key." AND eg_sous_categorie_id = :scat AND eg_produit.eg_produit_statut = 1");
		$PDO_query_filtre->bindParam(":scat", $_GET["scat"], PDO::PARAM_INT);
		$PDO_query_filtre->execute();
		$prix_filtre = $PDO_query_filtre->fetchAll();
		$sub_data = array();

		foreach($prix_filtre as $row)
		{
			$sub_data['name'] = $value;
			$sub_data['total'] = $row['Total'];
			$sub_data['condition'] = $key;
		}
		$data['price'][] = $sub_data;
		$PDO_query_filtre->closeCursor();
	}

	$ordre_range = array(
		'eg_produit_nom ASC' => 'Nom, A à Z',
		'eg_produit_nom DESC' => 'Nom, Z à A',
		'eg_produit_prix ASC' => 'Prix ​​croissant',
		'eg_produit_prix DESC' => 'Prix décroissant',
		'eg_produit_id ASC' => 'Nouveau',
		'eg_produit_id DESC' => 'Ancien'
	);

	foreach($ordre_range as $key => $value)
	{
		
		
		$sub_data = array();
		$sub_data['name'] = $value;
		$sub_data['condition'] = $key;
		
		$data['ordre'][] = $sub_data;
	}
	

	/*$query = "
	SELECT brand, COUNT(sample_id) AS Total 
	FROM sample_data 
	GROUP BY brand
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['brand'];
		$sub_data['total'] = $row['Total'];
		$data['brand'][] = $sub_data;
	}*/

	echo json_encode($data);
}

?>