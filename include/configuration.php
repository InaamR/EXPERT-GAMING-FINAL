<div class="banner-area style-three pt-70px pb-70px bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-12">
			<div class="section-title text-center">
					<h2 class="title">Nos TOP Gaming Laptop</h2>
				</div>
			</div>
		</div>
		
		<div class="row">


		<?php

			$PDO_query_produit_star = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_statut = 1 AND eg_produit_config = 1 ORDER BY RAND() LIMIT 2");
			$PDO_query_produit_star->execute();
			while($produit_star = $PDO_query_produit_star->fetch()){						

		?>

			<div class="col-md-6">
				<div class="single-banner mb-lm-30px">
					<?php
						$PDO_query_produit_image = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_image_produit_statut = 1 AND eg_produit_id = :eg_produit_id LIMIT 1");
						$PDO_query_produit_image->bindParam(":eg_produit_id", $produit_star['eg_produit_id'], PDO::PARAM_INT);
						$PDO_query_produit_image->execute();
		
						while ($produit_image = $PDO_query_produit_image->fetch()){
		
								echo '
								<img src="https://betatest.expert-gaming.tn/' . $produit_image['eg_image_produit_nom'] . '" alt="' . $produit_image['eg_image_produit_title'] . '" title="' . $produit_image['eg_image_produit_title'] . '">
								';
		
						}
		
						$PDO_query_produit_image->closeCursor();
					?>
					<div class="banner-content nth-child-3">
						<h3 class="title"><?php echo $produit_star['eg_produit_nom']; ?></h3>
						<span class="category"><?php echo round($produit_star['eg_produit_prix']); ?>DT</span>
						<a href="#" class="shop-link">Commander <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>

		<?php
			}
			$PDO_query_produit_star->closeCursor();
		?>



		</div>
	</div>
</div>