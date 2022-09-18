<div class="section hide">
	<div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
		<!-- Hero slider Active -->
		<div class="swiper-wrapper">
		<?php

						$PDO_query_banniere = Bdd::connectBdd()->prepare("SELECT * FROM eg_banniere ORDER BY eg_banniere_id ASC");
						$PDO_query_banniere->execute();
					
						while ($banniere = $PDO_query_banniere->fetch()){		

							echo '
							<div class="hero-slide-item slider-height swiper-slide bg-color1" data-bg-image="https://betatest.expert-gaming.tn' . $banniere['eg_banniere_image'] . '"  onclick="window.open(\'' . $banniere['eg_banniere_lien'] . '\', \'_blank\');" style="cursor: pointer;"></div>				
							';
						}
						$PDO_query_banniere->closeCursor();

					?>
			
			

		</div>
		<!-- Add Pagination -->
		<div class="swiper-pagination swiper-pagination-white"></div>
		<!-- Add Arrows -->
		<div class="swiper-buttons">
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>
	</div>
</div>