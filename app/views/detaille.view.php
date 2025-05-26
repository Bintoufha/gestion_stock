<!-- header -->
<?php $this->view("partials/header") ?>
<!-- header -->
<body>
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
						<div class="page-title">
							<h4> Details de l'utilisateur</h4>
							<h6>Tout les details de l'utilisateur</h6>
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
									<div class="productdetails">
										<ul class="product-bar">
											<li>
												<h4>Nom et Prenom</h4>
												<h6><?= $detaille_user->nomPrenom ?></h6>
											</li>
											<li>
												<h4>Nom utilisateur</h4>
												<h6><?= $detaille_user->pseudo ?></h6>
											</li>
											<li>
												<h4>Email</h4>
												<h6><?= $detaille_user->email ?></h6>
											</li>
											<li>
												<h4>N° telephone</h4>
												<h6><?= $detaille_user->telephone ?></h6>
											</li>
											<li>
												<h4>Role</h4>
												<h6><?= $detaille_user->role ?></h6>
											</li>
											<li>
												<h4>Status</h4>
												<?php if (($detaille_user->status)== "true"):?>
													<h6 class="badge badge-linesuccess">Active</h6>
												<?php else:?>
													<h6 class="badge badge-linedanger">Inactive</h6>
												<?php endif ?>
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