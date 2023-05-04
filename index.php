<?php include 'header.php'?>
<main>
	<section class="slider">
		<div class="container">
			<div class="row">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

					<?php
						$args = array('post_type'=>'slider', 'showposts'=>3);
						$my_slider = get_posts( $args );

					?>

					<div class="carousel-inner" role="listbox">
						<?php
							$cont = 0 ; if($my_slider) : foreach($my_slider as $post) : setup_postdata( $post );
						?>
						<div class="item <?php if($cont == 0) echo "active"; ?>">
							
							<div class="container">
								<div class="row">

									<div class="col-12 col-sm-6">
										<div class="caption">
											<h2><?php the_title(); ?></h2>
											<?php the_field('campo_resumo'); ?>
											<a class="leia-mais" href="<?php the_field('link_do_slider'); ?>">Ver nossos cases</a>
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<?php the_post_thumbnail('full'); ?>
									</div>
								</div>
							</div>
						</div>
						<?php
							$cont ++ ;
							endforeach;
							endif;
						?>
					</div>
				</div>

				
			</div>
		</div>

	</section>

	<section class="solucoes">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-4">
					<h2 class="title">SOLUÇÕES</h2>
				</div>
				<div class="col-12 col-sm-4">
					<p class="sub">Nós queremos ser o seu parceiro estratégico. Saiba o que podemos fazer <strong>pelo seu negócio!</strong></p>
				</div>
				<div class="col-12 col-sm-4">
					<a href="" class="default-btn">Solicitar proposta</a>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
			<?php
				$args = array('post_type'=>'servico', 'showposts'=>2);
				$servicos = get_posts( $args );
				if($servicos) : foreach($servicos as $post) : setup_postdata( $post );
  			?>
				<div class="col-12 col-sm-6">
					<div class="item">
						<div class="icone">
							<img src="<?php the_field('icone');?>" alt="">
						</div>
						<h3><?php the_title();?></h3>
						<div class="content">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			<?php
				endforeach;
				endif;
			?>
			</div>
		</div>
	</section>

	<section class="alpina">
		<div class="item-alpina">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-6">
						<img src="<?php bloginfo('template_directory');?>/images/sobre1.png" alt="">
					</div>
					<div class="col-12 col-sm-6">
						<div class="descricao">
							<h2 class="first-title">O que é <strong> ser <br> um Alpinista? </strong></h2>
							<p>
								Alpinistas são pessoas que estão <strong>aprendendo o tempo todo.</strong> Buscam estar sempre preparados para avançar na velocidade das transformações.
								<strong>Não temem mudanças, pelo contrário, são encorajados por elas,</strong> sabe a chamada "zona de desconforto"? Para um alpinista, esse é o seu habitat.
								
							</p>
						</div>
					</div>
				
			</div>
		</div>
		<div class="item-alpina">
			<div class="container">
				<div class="row">
					
					<div class="col-12 col-sm-6">
						<div class="descricao">
							<h2>Os Alpinistas</h2>
							<p>
								Alpinistas são pessoas que estão <strong>aprendendo o tempo todo.</strong> Buscam estar sempre preparados para avançar na velocidade das transformações.
								<strong>Não temem mudanças, pelo contrário, são encorajados por elas,</strong> sabe a chamada "zona de desconforto"? Para um alpinista, esse é o seu habitat.
								<a href="" class="bt-contato">Quero ser um alpinista</a>
							</p>
						</div>
					</div>
					<div class="col-12 col-sm-6">
						<img src="<?php bloginfo('template_directory');?>/images/sobre2.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="clientes">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2>Não é sobre chegar ao topo, <br>
						é sobre <strong>como e com quem você chega lá.</strong></h2>
				</div>
			</div>
		</div>
		<div class="list-item">
			<div class="container">
				<div class="row">
					<?php
						$args = array('post_type'=>'cliente', 'showposts'=>12);
						$clientes = get_posts( $args );
						if($clientes) : foreach($clientes as $post) : setup_postdata( $post );
					?>
					<div class="col-12 col-sm-2">
						<div class="item">
							<?php the_post_thumbnail('full align-middle'); ?>
						</div>
					</div>
					<?php
						endforeach;
						endif;
					?>
				</div>
			</div>
		</div>
	</section>

	<section class="contato">
		<?php
			$args = array('post_type'=>'page', 'pagename'=>'Contato');
			$contato = get_posts( $args );
			if($contato) : foreach($contato as $post) : setup_postdata( $post );
		?>
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-6">
					<h2>Já pensou em fazer <br> parte do <strong> nosso time <br> de Alpinistas? </strong></h2>
					<div class="form-box">
						<?php the_content();?>
					</div>
				</div>
				<div class="col-12 col-sm-6">
					<?php the_post_thumbnail('full align-middle img'); ?>
				</div>
			</div>
		</div>
		<?php
			endforeach;
			endif;
		?>
	</section>
</main>

<?php include 'footer.php'?>
