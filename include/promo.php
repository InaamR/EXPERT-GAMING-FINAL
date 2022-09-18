<div class="feature-product-area pt-40px pb-40px">
	<div class="container">
		<div class="row">
			<div class="col-12">
			<div class="section-title text-center">
					<h2 class="title">Promo FLASH</h2>
					<p>Profitez vite de nos promotions chez Expert Gaming</p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php

			$PDO_query_produit_promo = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_statut = 1 AND eg_produit_promo > '0' AND eg_produit_date_fin_promo <> '' ORDER BY RAND() LIMIT 4");
			$PDO_query_produit_promo->execute();
			$i = 1;
			while($produit_promo = $PDO_query_produit_promo->fetch()){			

			?>

			<div class="col-xl-6 col-lg-6 mb-40px">
				
				<div class="feature-right-content">
					<div class="image-side">
						<?php

							$PDO_query_produit_promo_image = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_image_produit_statut = 1 AND eg_produit_id = :eg_produit_id LIMIT 1");
							$PDO_query_produit_promo_image->bindParam(":eg_produit_id", $produit_promo['eg_produit_id'], PDO::PARAM_INT);
							$PDO_query_produit_promo_image->execute();

							while ($produit_promo_image = $PDO_query_produit_promo_image->fetch()){

									echo '
									<img src="https://betatest.expert-gaming.tn/' . $produit_promo_image['eg_image_produit_nom'] . '" alt="' . $produit_promo_image['eg_image_produit_title'] . '"> 
								<button title="Ajouter au panier" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
									class="pe-7s-shopbag"></i></button>
									';

							}

							$PDO_query_produit_promo_image->closeCursor();

						?>
						<div class="d-flex justify-content-center mt-1">
						<?php
						$PDO_query_produit_marque= Bdd::connectBdd()->prepare("SELECT * FROM eg_marque WHERE eg_marque_statut = 1 AND eg_marque_id  = :eg_marque_id");
						$PDO_query_produit_marque->bindParam(":eg_marque_id", $produit_promo['eg_marque_id'], PDO::PARAM_INT);
						$PDO_query_produit_marque->execute();

						$produit_promo_image_marque = $PDO_query_produit_marque->fetch();

								echo '
								<img src="https://betatest.expert-gaming.tn/' . $produit_promo_image_marque['eg_marque_logo'] . '" alt="' . $produit_promo_image_marque['eg_marque_nom'] . '" width="150">
								';

						

						$PDO_query_produit_marque->closeCursor();
						?>
						</div>						
					</div>
					<div class="content-side">
						<div class="deal-timing">
							<span>Fin dans |</span>
							<div data-countdown<?php echo $i;?>="<?php 
							$originalDate = $produit_promo['eg_produit_date_fin_promo'];
							echo date('M d, Y H:i:s', strtotime($originalDate));
							
							?>"  id="demo-<?php echo $i;?>" class="ms-1"></div>
						</div>
						<div class="prize-content">
							<h5 class="title"><a href="single-product.html"><?php echo $produit_promo['eg_produit_nom']; ?></a></h5>
							<span class="price">
							<span class="old"><?php echo round($produit_promo['eg_produit_prix']); ?>DT</span>
							<span class="new text-danger"><?php echo round($produit_promo['eg_produit_promo']); ?>DT</span>
							</span>
						</div>
						<div class="product-feature">
							<ul>
								<li>Réf : <span><?php echo $produit_promo['eg_produit_reference']; ?></span></li>
								<li>Modéle : <span><?php echo $produit_promo['eg_produit_modele']; ?></span></li>
								<li>Qualité : <span><?php echo $produit_promo['eg_produit_etoiles']; ?> étoiles</span></li>
							</ul>
						</div>
						
					</div>
				</div>			
			</div>
			<?php
			$i = $i+1;
			}
			$PDO_query_produit_promo->closeCursor();
			?>
		</div>
	</div>
</div>
