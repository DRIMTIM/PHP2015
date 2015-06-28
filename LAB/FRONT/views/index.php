<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php if(!empty($ofertasTemporales)){?>
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						<?php 
							if(count($ofertasTemporales) > 1){
								for($cont = 0; $cont < count($ofertasTemporales); $cont++){ 
									if($cont == 0){?>
										<li data-target="#slider-carousel" data-slide-to="<?php echo $cont;?>" class="active"></li>
									<?php }else{?>
										<li data-target="#slider-carousel" data-slide-to="<?php echo $cont;?>"></li>
									<?php } ?>
						<?php } } ?>
						</ol>
						<div class="carousel-inner">
							<?php 
								$itemActive = true;
								foreach ($ofertasTemporales as $ofertaTemporal){
									if($itemActive){ $itemActive = false;?>
										<div class="item active">
									<?php } else { ?>
										<div class="item">
									<?php } ?>
									<div class="col-sm-6">
										<h1><?php echo $ofertaTemporal["titulo"];?></h1>
										<h2><?php echo $ofertaTemporal["descripcion_corta"];?></h2>
										<p><?php echo $ofertaTemporal["descripcion"];?></p>
										<button type="button" class="btn btn-default get">Obtener Ahora</button>
									</div>
									<div class="col-sm-6">
										<img src="<?php echo $ofertaTemporal["imagen"];?>" class="girl img-responsive" alt="" />
										<div class="imagePrice">
											<h4>En oferta!</h4>
											<h5><?php echo Moneda::$SIMBOLOS[$ofertaTemporal["moneda"]] . $ofertaTemporal["precio"];?></h5>
											<img src="<?php echo __ROOT_IMG . 'home/pricing.png'?>"  class="pricing" alt="" />
										</div>
									</div>
								</div>
								<?php } ?>
						</div>
						<?php if(count($ofertasTemporales) > 1){?>
							<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						<?php }?>
					</div>
				</div>
			<?php } else {?>
				<h4 class="text-center">No hay ofertas destacadas vigentes en el sistema para el dia de hoy!</h4>
			<?php }?>
		</div>
	</div>
</section><!--/slider-->
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Categorías</h2>
					<div class="panel-group category-products" id="accordian"><!--Categorias de productos-->
					<?php if(!empty($categorias)){
							foreach ($categorias as $categoria){ ?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="#" style="font-size:70%;"><?php echo $categoria["nombre"];?></a></h4>
									</div>
								</div>
						<?php } 
							}else{ ?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="#" style="font-size:70%;">No existen categorías disponibles!</a></h4>
									</div>
								</div>
					<?php }?>
				</div><!--Categorias de productos-->
				
				<div class="price-range"><!--price-range-->
					<h2>Price Range</h2>
					<div class="well text-center">
						 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
						 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
					</div>
				</div><!--/price-range-->
				
				<div class="shipping text-center"><!--propaganda lateral-->
					<img src="<?php echo __ROOT_IMG . 'home/shipping.jpg'?>" alt="" />
				</div><!--/propaganda lateral-->
			
			</div>
		</div>
		
		<div class="col-sm-9 padding-right">
			<div class="features_items"><!--features_items-->
				<h2 id="__tituloOfertas" class="title text-center">Ofertas del dia</h2>
				<script type="text/javascript">
					$(document).ready(function(){
						setInterval(refreshOfertasDelDia, parseInt('<?php echo GlobalConstants::$UPDATE_OFERTAS_TIMEOUT;?>'));
					});
				</script>
				<div id="__contenedor_ofertas"><?php include 'product/ofertasTemporales.php';?></div>
			</div><!--features_items-->
			
			<div class="category-tab"><!--category-tab-->
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
						<li><a href="#blazers" data-toggle="tab">Blazers</a></li>
						<li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
						<li><a href="#kids" data-toggle="tab">Kids</a></li>
						<li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="tshirt" >
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery1.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery2.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery3.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery4.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					
					<div class="tab-pane fade" id="blazers" >
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery4.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery3.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery2.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery1.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					
					<div class="tab-pane fade" id="sunglass" >
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery3.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery4.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery1.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery2.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					
					<div class="tab-pane fade" id="kids" >
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery1.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/home/gallery2.jpg" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery3.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery4.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					
					<div class="tab-pane fade" id="poloshirt" >
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery2.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery4.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery3.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo __ROOT_IMG . 'home/gallery1.jpg'?>" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!--/category-tab-->
			
			<div class="recommended_items"><!--recommended_items-->
				<h2 class="title text-center">recommended items</h2>
				
				<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="item active">	
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo __ROOT_IMG . 'home/recommend1.jpg'?>" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo __ROOT_IMG . 'home/recommend2.jpg'?>" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo __ROOT_IMG . 'home/recommend3.jpg'?>" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<div class="item">	
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo __ROOT_IMG . 'home/recommend1.jpg'?>" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo __ROOT_IMG . 'home/recommend2.jpg'?>" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo __ROOT_IMG . 'home/recommend3.jpg'?>" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					  </a>
					  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
						<i class="fa fa-angle-right"></i>
					  </a>			
				</div>
			</div><!--/recommended_items-->
			</div>
		</div>
	</div>
</section>