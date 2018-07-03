<main class="main_container_products">

	<?php
		$Pdt = (object) listProducts($url[1]);
		//var_dump($Pdt);
	?>
	<div class="button_edit_product">
		<p><a href="<?=BASE;?>/produto/create/<?=$Pdt->pdt_name;?>" title="Editar produto <?=$Pdt->pdt_title;?>">Editar produto <?=$Pdt->pdt_title;?></a></p>
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
					<span class="price_value">R$ <?=number_format($Pdt->pdt_offer,2, ",", ".");?></span>
				</div>
				<p class="offer">Oferta válida até: <b><?=date("d/m/Y", strtotime($Pdt->pdt_offer_end));?></b></p>
			</div>
		</div>

		<div class="main_single_pdt_frete">
			
				<p>Calcule o frete para receber o produto no conforto de sua casa!</p>
				<form class="main_single_pdt_frete_form">
					<input type="text" name="cep" placeholder="00.000-000" />
				</form>
		</div>

	</div>

</main>