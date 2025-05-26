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
					<div class="add-item d-flex">
						<div class="page-title">
							<h4>Nouveau Article</h4>
							<h6>Enregistre un nouveau article</h6>
						</div>
					</div>
					<ul class="table-top-head">
						<li>
							<div class="page-btn">
								<a href="<?=ROOT?>/Articles/Liste_article" class="btn btn-secondary"><i data-feather="arrow-left" class="me-2"></i></a>
							</div>
						</li>
						<li>
							<a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i data-feather="chevron-up" class="feather-chevron-up"></i></a>
						</li>
					</ul>
				</div>
				<!-- /add -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h6 class="card-title">Information sur article</h6>
							</div>
							<div class="card-body">
								<form action="<?= isset($updateArticle) ? ROOT . "/Articles/update_article/{$updateArticle->uuidArticle}" : ROOT."/Articles/AjouterArticle"?>" 
								method="POST">
									<div class="row">
									<input type="hidden" name="uuid" value="<?= $updateArticle->uuidArticle?>" class="form-control">

										<div class="col-md-4 mb-3">
											<label class="form-label">Nom article</label>
											<input type="text" name="article" value="<?= $updateArticle->nomArticle?>" class="form-control">
										</div>
										<div class="col-md-4 mb-3">
											<label class="form-label">Categorie</label>
											<select class="select" name="categorie">
												<option>Select</option>
												<option value="Sanitaire" <?= $updateArticle->categorieArticle == 'Sanitaire' ? 'selected' : ''; ?>>Sanitaire</option>
												<option value="Plomberie" <?= $updateArticle->categorieArticle == 'Plomberie' ? 'selected' : ''; ?>>Plomberie</option>
												<option value="electricite" <?= $updateArticle->categorieArticle == 'electricite' ? 'selected' : ''; ?>>electricite</option>
											</select>
										</div>
										<div class="col-md-4 mb-3">
											<label class="form-label"> Seuil rupture</label>
											<input type="number" name="Seuilrupture" value="<?= $updateArticle->seuil?>" class="form-control">
										</div>
									</div>
									<div class="row">
										<div class="col-md-3 mb-3">
											<label class="form-label">Prix Unitaire</label>
											<input type="number" name="prixUnitaire" value="<?= $updateArticle->prixUnitaireArticle?>" class="form-control">
										</div>
										<div class="col-md-3 mb-3">
											<label class="form-label">Prix Engros</label>
											<input type="number" name="prixEngros" value="<?= $updateArticle->prixEngrosArticle?>" class="form-control">
										</div>
										<div class="col-md-3 mb-3">
											<label class="form-label">Prix Detaillant</label>
											<input type="number" name="prixDetaillant" value="<?= $updateArticle->prixDetaillantArticle?>" class="form-control">
										</div>
										<div class="col-md-3 mb-3">
											<label class="form-label">Quantite</label>
											<input type="number" name="quantite" value="<?= $updateArticle->qantiteStockArticle?>" class="form-control">
										</div>
									</div>
									<div class="card-footer">
									<div class="row d-flex justify-content-between gap-1">
										<button type="submit" name="<?= isset($updateArticle) ? "Modifier" : "submit" ?>" class="col-md-5 btn btn-primary"><?= isset($updateArticle) ? "Modifier" : "Valider" ?></button>
										<a href="<?=ROOT?>/Articles/Liste_article" class="col-md-5 btn btn-secondary">Liste article</a>
									</div>
									</div>
								</form>
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