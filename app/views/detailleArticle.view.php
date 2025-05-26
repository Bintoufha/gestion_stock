<!-- header -->
<?php $this->view("partials/header") ?>
<!-- header -->

<body class="times-text">
	<div id="global-loader">
		<div class="whirly-loader"> </div>
	</div>
	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		<?php $this->view("partials/navbar") ?>
		<!-- /Header -->

		<!-- Sidebar -->
		<?php $this->view("partials/sidebar") ?>
		<!-- /Sidebar -->
		<div class="page-wrapper">
			<div class="content">
				<div class="page-header">
					<div class="page-title ">
						<h4 class=""> Details de l'article</h4>
						<h6>Tout les details sur l'article</h6>
					</div>
				</div>
				<!-- /add -->
				<div class="row">
					<div class="col-lg-8 col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="bar-code-view">
									<img src="<?=ROOT?>/assets/img/barcode/barcode1.png" alt="barcode">
									<a class="printimg">
										<img src="<?=ROOT?>/assets/img/icons/printer.svg" alt="print">
									</a>
								</div>
								<div class="productdetails ">
									<ul class="product-bar t">
										<li>
											<h4>Nom Article</h4>
											<h6><?=$detaille_article->nomArticle?></h6>
										</li>
										<li>
											<h4>Categorie Article</h4>
											<h6><?=$detaille_article->categorieArticle?></h6>
										</li>
										<li>
											<h4>Stock actuelle</h4>
											<h6><?=$detaille_article->qantiteStockArticle?></h6>
										</li>
										<li>
											<h4>Prix Unitaire</h4>
											<h6><?=$detaille_article->prixUnitaireArticle?></h6>
										</li>
										<li>
											<h4>Prix Engros</h4>
											<h6><?=$detaille_article->prixEngrosArticle?></h6>
										</li>
										<li>
											<h4>Prix Detaillants</h4>
											<h6><?=$detaille_article->prixDetaillantArticle?></h6>
										</li>
										<li>
											<h4>Seuil de rupture</h4>
											<h6 class="bg-primary text-light" ><?=$detaille_article->seuil?></h6>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="slider-product-details">
									<div class="owl-carousel owl-theme ">
										<div class="slider-product">
											<img src="<?=ROOT?>/assets/img/logo.png" alt="img">
											<h4>macbookpro.jpg</h4>
											<h6>581kb</h6>
										</div>
									</div>
								</div> 
							</div>
						</div>
					</div>
				</div>

				<!-- /add -->
			</div>

			<!-- foot -->
			<?php $this->view("partials/foot") ?>
			<!-- /foot -->

		</div>
		<!-- /Main Wrapper -->

		<!-- footer -->
		<?php $this->view("partials/footer") ?>
		<!-- /footer -->
</body>

</html>