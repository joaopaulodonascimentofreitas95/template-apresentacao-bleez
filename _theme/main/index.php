<main class="main_home_container">
	<article class="main_home_slide">
		<div class="container">
		<h2>Projeto de Seleção</h2>
	</div>
	</article>
	<section class="container">
		<h2 class="header_title_line"><span>Nossos Produtos</span></h2>
		<div class="main_home_pdts">
		<?php foreach (listProducts() as $key => $pdt): 
			extract($pdt);
			$date_start = strtotime(date("d/m/Y", strtotime($pdt_offer_start)));
			$date_end = strtotime(date("d/m/Y", strtotime($pdt_offer_end)));
			$date_hoje = strtotime(date("d/m/Y"));
			?>
			<article class="main_home_single_pdt">
				<?php if($date_hoje >= $date_start && $date_hoje <= $date_end): ?>
					<p class="valido_ate">Oferta válida até: <?=date("d/m/Y", strtotime($pdt_offer_end));?></p>
				<?php endif; ?>
				<div class="main_home_single_pdt_cover">
					<img src="<?=BASE;?>/<?=$pdt_cover;?>"/>
				</div>
				<div class="main_home_single_pdt_content">
					<h3><?=$pdt_title;?></h3>
					<p style="display: none;"><?=limita_caracteres($pdt_description,30);?></p>
				</div>
				<div class="main_home_single_pdt_price">
					<?php						
						if($date_hoje >= $date_start && $date_hoje <= $date_end):
							?>
							<span class="main_home_single_pdt_price_de">
								De <strike><?=$pdt_price;?></strike> por 
							</span>
							<span class="main_home_single_pdt_price_value">
								<small>Apenas</small> 
								R$ <?=number_format($pdt_offer,2,",", ".");?>
							</span>
						<?php else: ?>
							<span class="main_home_single_pdt_price_de">&nbsp;</span>
							<span class="main_home_single_pdt_price_value">
								<small>Apenas</small> 
								R$ <?=number_format($pdt_price,2,",", ".");?>
							</span>
						<?php endif; ?>						
				</div>
				<a href="<?=BASE."/produto/{$pdt_name}";?>" title="<?=$pdt_title." - ".SITE_NAME;?>" class="btn btn_green">Mais detalhes</a>
			</article>

		<?php endforeach; ?>
		</div>	
	</section>
</main>