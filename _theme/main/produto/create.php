<main class="main_container_products">
	<?php
		$pdt = (object) listProducts($url[2]);
		//var_dump($pdt);
	?>
	<div class="container">

		<form action="" method="post" class="main_container_products_form">	
			<div class="main_container_products_form_left">	
				
				<label class="input-field">
					<span>Imagem do produto</span>
					<input class="file-path validate" type="text">				 
				</label>

				<label class="input-field">
					<span>Nome do produto</span>
		      		<input value="<?=(!empty($pdt->pdt_title) ? $pdt->pdt_title : null);?>" id="pdt_title" type="text" class="validate">		      		
		    	</label>

				<label class="input-field">
					<span>Descrição</span>
					<textarea id="product_description" rows="5" data-length="120"><?=(!empty($pdt->pdt_description) ? $pdt->pdt_description : null);?></textarea>		        	
		        </label>

		        <label class="input-field">
		        	<span class="active" for="product_price">Preço</span>
		      		<input value="<?=(!empty($pdt->pdt_price) ? number_format($pdt->pdt_price,2, ",", ".") : null);?>" id="product_price" type="text" class="validate">		      			
		      	</label>

	       		<p class="col s12">
	       			<span style="color:#777;">Deseja ativar a exibição desse produto?</span>
	       		</p>
		       	<div class="label_flex_2">
		      		<label class="col m6">
		        		<input name="group1" type="radio" <?=($pdt->pdt_status == '1' ? "checked" : null);?> />
		        		<span>Sim!</span>
		      		</label>
		      		<label class="col m6">
		        		<input name="group1" type="radio" <?=($pdt->pdt_status == '0' ? "checked" : null);?> />
		        		<span>Não!</span>
		      		</label>		      		
		  		</div>
		  	</div>
		  	<div class="main_container_products_form_right">
		  		<div class="btn_voltar">
					<a class="btn btn_green"href="<?=BASE."/produto/{$pdt->pdt_name}";?>">Ver Produto</a>
				</div>
				
		  		<div class="main_container_products_form_cover">		  			
					<img src="<?=BASE."/{$pdt->pdt_cover}";?>">
		  		</div>
		  		<h3 class="title-promocao">Promoção</h3>
		  			<label class="input-field">
		  				<span>Valor</span>
      					<input value="<?=(!empty($pdt->pdt_offer) ? number_format($pdt->pdt_offer,2, ",", ".") : null);?>" type="text" class="validate">      				
      				</label>

      				<label class="input-field">
		  				<span>A partir de:</span>
      					<input value="<?=(!empty($pdt->pdt_offer_start) ? date("d/m/Y H:i:s", strtotime($pdt->pdt_offer_start)) : null);?>" type="text" class="validate">      				
      				</label>

					<label class="input-field">
		  				<span>Termina em:</span>
      					<input value="<?=(!empty($pdt->pdt_offer_end) ? date("d/m/Y H:i:s", strtotime($pdt->pdt_offer_end)) : null);?>" type="text" class="validate">      				
      				</label>
      				<label class="input-field" style="margin-top:30px;">
      					<button>Gravar/Atualizar</button>
      				</label>
      	 		</div>
		  	</div>
		</form>

	</div>
</main>