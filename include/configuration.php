<div class="banner-area style-three pt-70px pb-70px">
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
                    
			<div class="col-xl-12 col-lg-6">
				
				<div class="feature-right-content">
					<div class="image-side">
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
						<button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
							class="pe-7s-shopbag"></i></button>
					</div>
					<div class="content-side">
						<div class="deal-timing">
							<span>End In:</span>
							<div data-countdown="2021/09/15"></div>
						</div>
						<div class="prize-content">
							<h5 class="title"><a href="single-product.html"><?php echo $produit_star['eg_produit_nom']; ?></a></h5>
							<span class="price">
							<span class="new"><?php echo round($produit_star['eg_produit_prix']); ?>DT</span>
							</span>
						</div>
						<div class="product-feature">
							<ul>
								<li>Predecessor : <span>None.</span></li>
								<li>Support Type : <span>Neutral.</span></li>
								<li>Cushioning : <span>High Energizing.</span></li>
								<li>Total Weight : <span> 300gm</span></li>
							</ul>
						</div>
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