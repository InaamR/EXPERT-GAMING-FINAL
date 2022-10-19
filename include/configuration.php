<div class="banner-area style-three pt-40px pb-40px">
	<div class="container">
		<div class="row">
			<div class="col-12">
			<div class="section-title text-center">
					<h2 class="title">Nos Laptops</h2>
					<p>Notre meilleur selection de pc gaming pour tous vos besoins !</p>
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
				<div class="feature-right-content_h">
					<div class="image-side">
						<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-inner">
								<?php
									$PDO_query_produit_image = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_image_produit_statut = 1 AND eg_produit_id = :eg_produit_id ");
									$PDO_query_produit_image->bindParam(":eg_produit_id", $produit_star['eg_produit_id'], PDO::PARAM_INT);
									$PDO_query_produit_image->execute();
									$i = 0;
									while ($produit_image = $PDO_query_produit_image->fetch()){
					
											echo '
											<div class="carousel-item ';
											if($i == 0) { echo 'active';}
											echo'">
											<img src="https://betatest.expert-gaming.tn/' . $produit_image['eg_image_produit_nom'] . '" alt="' . $produit_image['eg_image_produit_title'] . '" title="' . $produit_image['eg_image_produit_title'] . '" class="d-block w-100">
											</div>
												';
									$i = $i+1;
									}
					
									$PDO_query_produit_image->closeCursor();
								?>							
							</div>
						</div>
						<button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
					</div>
					<div class="content-side">
						<div class="prize-content">
							<div class="row mt-4">
								<div class="col-lg-9">
									<h5 class="title"><a href="single-product.html"><?php echo $produit_star['eg_produit_nom']; ?></a></h5>
									<span class="price">
										<span class="new"><?php echo round($produit_star['eg_produit_prix']); ?>DT</span>							
									</span>
								</div>
								<div class="col-lg-3 d-flex justify-content-end">
									<?php
										$PDO_query_produit_marque= Bdd::connectBdd()->prepare("SELECT * FROM eg_marque WHERE eg_marque_statut = 1 AND eg_marque_id  = :eg_marque_id");
										$PDO_query_produit_marque->bindParam(":eg_marque_id", $produit_star['eg_marque_id'], PDO::PARAM_INT);
										$PDO_query_produit_marque->execute();

										$produit_promo_image_marque = $PDO_query_produit_marque->fetch();

												echo '
												<img src="https://betatest.expert-gaming.tn/' . $produit_promo_image_marque['eg_marque_logo'] . '" alt="' . $produit_promo_image_marque['eg_marque_nom'] . '" width="150" class="cover">
												';

										

										$PDO_query_produit_marque->closeCursor();
									?>
								</div>
							</div>
						</div>
						<div class="product-feature">
							<div class="row">
								<div class="col-lg-6">
									<ul>
										<li>Predecessor : <span>None.</span></li>
										<li>Support Type : <span>Neutral.</span></li>
										<li>Cushioning : <span>High Energizing.</span></li>
										<li>Total Weight : <span> 300gm</span></li>
									</ul>
								</div>
								<div class="col-lg-6">
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
				</div>
				
			</div>
			<?php
				}
				$PDO_query_produit_star->closeCursor();
			?>
		</div>
	</div>
</div>