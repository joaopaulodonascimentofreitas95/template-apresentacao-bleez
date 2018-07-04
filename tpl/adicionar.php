<main class="main_container_products">
	
	<div class="container">

		<form action="" method="post" class="main_container_products_form">	
			<div class="main_container_products_form_left">	
				
				<label class="input-field">
					<span>Imagem do produto</span>
					<input class="file-path validate" type="text">				 
				</label>

				<label class="input-field">
					<span>Nome do produto</span>
		      		<input value="" id="pdt_title" type="text" class="validate">		      		
		    	</label>

				<label class="input-field">
					<span>Descrição</span>
					<textarea id="product_description" rows="5" data-length="120"></textarea>
		        </label>

		        <label class="input-field">
		        	<span class="active" for="product_price">Preço</span>
		      		<input value="" id="product_price" type="text" class="validate">		      			
		      	</label>

	       		<p class="col s12">
	       			<span style="color:#777;">Deseja ativar a exibição desse produto?</span>
	       		</p>
		       	<div class="label_flex_2">
		      		<label class="col m6">
		        		<input name="group1" type="radio" checked />
		        		<span>Sim!</span>
		      		</label>
		      		<label class="col m6">
		        		<input name="group1" type="radio" />
		        		<span>Não!</span>
		      		</label>		      		
		  		</div>
		  	</div>
		  	<div class="main_container_products_form_right">
		  				  	
		  		<h3 class="title-promocao">Promoção</h3>
		  			<label class="input-field">
		  				<span>Valor</span>
      					<input value="" type="text" class="validate">      				
      				</label>

      				<label class="input-field">
		  				<span>A partir de:</span>
      					<input value="" type="text" class="validate">      				
      				</label>

					<label class="input-field">
		  				<span>Termina em:</span>
      					<input value="" type="text" class="validate">      				
      				</label>
      				<label class="input-field" style="margin-top:30px;">
      					<button>Gravar/Atualizar</button>
      				</label>
      	 		</div>
		  	</div>
		</form>

	</div>
</main>