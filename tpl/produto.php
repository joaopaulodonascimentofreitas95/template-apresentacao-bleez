<main class="main_container_products">

	<?php
		$Pdt = (object) listProducts($url[1]);
		//var_dump($Pdt);
	?>
	<div class="button_edit_product">
		<p><a href="<?=URL_PDT_EDIT."/{$Pdt->pdt_name}";?>" title="Editar produto <?=$Pdt->pdt_title;?>">Editar produto <?=$Pdt->pdt_title;?></a></p>
	</div>
	<div class="container">
		

		<div class="main_single_pdt">
			<div class="main_single_pdt_left">
				<div class="main_single_pdt_image">
					<img src="<?=BASE."/{$Pdt->pdt_cover}";?>">
				</div>
			</div>

			<div class="main_single_pdt_right">
				<h2><?=$Pdt->pdt_title;?></h2>
				<p><?=$Pdt->pdt_description;?></p>

				<div class="price">
					<span class="price_de">De <strike><?=number_format($Pdt->pdt_price,2, ",", ".");?></strike> por apenas:</span>
					<span class="price_value" data-price="<?=$Pdt->pdt_offer;?>">R$ <?=number_format($Pdt->pdt_offer,2, ",", ".");?></span>
				</div>
				<p class="offer">Oferta válida até: <b><?=date("d/m/Y", strtotime($Pdt->pdt_offer_end));?></b></p>

				<div class="main_single_pdt_frete">
			
				<p>Calcular Frete</p>
				<form class="main_single_pdt_frete_form" action="" method="post" name="sendForm">
					<input type="hidden" name="action" value="frete" />
					<input type="text" name="cep" value="" placeholder="00.000-000" />
					<button class="btn btn_green btn_frete">Calcular Frete
						<span class="load">
							<span><img  src="<?=BASE;?>/Assets/images/load.gif"></span>
						</span>
					</button>
				</form>
		</div>
			</div>
		</div>

		<div class="information_frete">
			<h3><span>Informações de Frete</span></h3>			
			<div class="frete_result"></div>

	</div>

</main>