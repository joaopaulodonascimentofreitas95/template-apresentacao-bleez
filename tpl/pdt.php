<main class="main_container_products">
	<?php
	if(!empty($url[1])):
		$pdt = (object) listProducts($url[1]);
	endif;
	?>
	<div class="container">

		<form action="" method="post" name="sendFormPdt" enctype="multipart/form-data" class="main_container_products_form">	
			<input type="hidden" name="action" value="pdt_create">	
			<div class="main_container_products_form_left">					
				<label class="input-field">
					<span>Imagem do produto</span>
					<input class="file-path validate" type="text" value="">
				</label>

				<label class="input-field">
					<span>Nome do produto</span>
		      		<input name="pdt_title" value="<?=(!empty($pdt->pdt_title) ? $pdt->pdt_title : null);?>" id="pdt_title" type="text" class="validate">		      		
		    	</label>

				<label class="input-field">
					<span>Descrição</span>
					<textarea name="pdt_description" rows="5" data-length="120"><?=(!empty($pdt->pdt_description) ? $pdt->pdt_description : null);?></textarea>		        	
		        </label>

		        <label class="input-field">
		        	<span class="active" for="product_price">Preço</span>
		      		<input name="pdt_price"  value="<?=(!empty($pdt->pdt_price) ? number_format($pdt->pdt_price,2, ",", ".") : null);?>" id="product_price" type="text" class="validate">		      			
		      	</label>

	       		<p class="col s12">
	       			<span style="color:#777;">Deseja ativar a exibição desse produto?</span>
	       		</p>
		       	<div class="label_flex_2">
		      		<label class="col m6">
		        		<input name="pdt_status" value="1" type="radio" <?=(!empty($pdt->pdt_status) && $pdt->pdt_status == '1' ? "checked" : null);?> />
		        		<span>Sim!</span>
		      		</label>
		      		<label class="col m6">
		        		<input name="pdt_status" value="0" type="radio" <?=(!empty($pdt->pdt_status) && $pdt->pdt_status == '0' ? "checked" : null);?> />
		        		<span>Não!</span>
		      		</label>		      		
		  		</div>
		  	</div>
		  	<div class="main_container_products_form_right">
		  		<?php if(!empty($pdt->pdt_name)):?>
		  			<div class="btn_voltar">
						<a class="btn btn_green"href="<?=URL_PDT."/{$pdt->pdt_name}";?>">Ver Produto</a>
					</div>
				<?php endif;?>
		  		<div class="main_container_products_form_cover">
		  			<?php if(!empty($pdt->pdt_cover)):?>		  			
						<img src="<?=BASE."/{$pdt->pdt_cover}";?>">
					<?php endif;?>
		  		</div>
		  		<h3 class="title-promocao">Promoção</h3>
		  			<label class="input-field">
		  				<span>Valor</span>
      					<input  name="pdt_offer" value="<?=(!empty($pdt->pdt_offer) ? number_format($pdt->pdt_offer,2, ",", ".") : null);?>" type="text" class="validate">      				
      				</label>

      				<label class="input-field">
		  				<span>A partir de:</span>
      					<input name="pdt_offer_start"  value="<?=(!empty($pdt->pdt_offer_start) ? date("d/m/Y H:i:s", strtotime($pdt->pdt_offer_start)) : null);?>" type="text" class="validate">      				
      				</label>

					<label class="input-field">
		  				<span>Termina em:</span>
      					<input name="pdt_offer_end" value="<?=(!empty($pdt->pdt_offer_end) ? date("d/m/Y H:i:s", strtotime($pdt->pdt_offer_end)) : null);?>" type="text" class="validate">      				
      				</label>
      				<label class="input-field" style="margin-top:30px;">
      					<button>Gravar/Atualizar</button>
      				</label>
      	 		</div>
		  	</div>
		</form>

	</div>
</main>