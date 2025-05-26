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
					<div class="add-item d-flex">
						<div class="page-title times-text">
							<h4>Liste des Articles</h4>
							<h6>gerer tout vos Articles</h6>
						</div>
					</div>

					<div class="page-btn">
						<a href="<?= ROOT ?>/Articles/AjouterArticle" class="btn btn-added"><i data-feather="plus-circle" class="me-2"></i>Nouveau Article</a>
					</div>
				</div>
				<?php $this->view("set_flash"); ?>


				<!-- /product list -->
				<div class="card table-list-card">
					<div class="card-body">
						<div class="table-top">
							<div class="search-set">
								<div class="search-input">
									<a href="" class="btn btn-searchset"><i data-feather="search" class="feather-search"></i></a>
								</div>
							</div>
							<div class="search-path">
								<div class="d-flex align-items-center">
									<a class="btn btn-filter" id="filter_search">
										<i data-feather="filter" class="filter-icon"></i>
										<span><img src="assets/img/icons/closes.svg" alt="img"></span>
									</a>

								</div>

							</div>
							<div class="form-sort">
								<i data-feather="sliders" class="info-img"></i>
								<select class="select">
									<option>Sort by Date</option>
									<option>07 09 23</option>
									<option>21 09 23</option>
								</select>
							</div>
						</div>
						<!-- /Filter -->
						<div class="card" id="filter_inputs">
							<div class="card-body pb-0">
								<div class="row">
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="input-blocks">
											<i data-feather="user" class="info-img"></i>
											<select class="select">
												<option>Choose Customer Name</option>
												<option>Macbook pro</option>
												<option>Orange</option>
											</select>
										</div>
									</div>
									<div class="col-lg-2 col-sm-6 col-12">
										<div class="input-blocks">
											<i data-feather="stop-circle" class="info-img"></i>
											<select class="select">
												<option>Choose Status</option>
												<option>Computers</option>
												<option>Fruits</option>
											</select>
										</div>
									</div>
									<div class="col-lg-2 col-sm-6 col-12">
										<div class="input-blocks">
											<i data-feather="file-text" class="info-img"></i>
											<input type="text" placeholder="Enter Reference" class="form-control">
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="input-blocks">
											<i data-feather="stop-circle" class="info-img"></i>
											<select class="select">
												<option>Choose Payment Status</option>
												<option>Computers</option>
												<option>Fruits</option>
											</select>
										</div>
									</div>
									<div class="col-lg-2 col-sm-6 col-12">
										<div class="input-blocks">
											<a class="btn btn-filters ms-auto"> <i data-feather="search" class="feather-search"></i> Search </a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Filter -->
						<div class="table-responsive">
							<table class="table  datanew table-bordered">
								<thead>
									<tr>
										<th class="no-sort">
											<label class="checkboxs">
												<input type="checkbox" id="select-all">
												<span class="checkmarks"></span>
											</label>
										</th>
										<th>Nom Article</th>
										<th>Categories</th>
										<th>Stock Article</th>
										<th>Prix Unitaires</th>
										<th>Prix Detaillant</th>
										<th>Stock Securite</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody class="sales-list">
									<?php foreach ($dataArticle as $liste_article): ?>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td><?= $liste_article->nomArticle ?></td>
											<td><?= $liste_article->categorieArticle ?></td>
											<td><?= $liste_article->qantiteStockArticle ?></td>
											<td><?= $liste_article->prixUnitaireArticle ?> FCFA</td>
											<td><?= $liste_article->prixDetaillantArticle ?> FCFA</td>
											<td><?= $liste_article->seuil ?></td>
											<td class="text-center">
												<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</a>
												<ul class="dropdown-menu">
													<li>
														<a href="<?= ROOT ?>/Articles/detaille_article/<?= $liste_article->uuidArticle ?>" class="dropdown-item"><i data-feather="eye" class="info-img"></i>Detaille article</a>
													</li>
													<li>
														<a href="<?= ROOT ?>/Articles/modifier/<?= $liste_article->uuidArticle ?>" class="dropdown-item"><i data-feather="edit" class="info-img"></i>Modifier article</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#add-units"
															data-idArticle="<?= $liste_article->uuidArticle ?>"
															data-NomArticle="<?= $liste_article->nomArticle ?>"
															data-Quantite="<?= $liste_article->qantiteStockArticle ?>"
															data-seuil="<?= $liste_article->seuil ?>">
															<i data-feather="download" class="info-img"></i>Approvisionner article</a>
													</li>
													<li>
														<a href="<?= ROOT ?>/Articles/Supprimer_article/<?= $liste_article->uuidArticle ?>" class="dropdown-item  mb-0"><i data-feather="trash-2" class="info-img"></i>Supprimer article</a>
													</li>
												</ul>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /product list -->
			</div>
		</div>

		<!-- foot -->
		<?php $this->view("partials/foot") ?>
		<!-- /foot -->

	</div>
	<!-- /Main Wrapper -->
	<!-- Add Stock -->
	<div class="modal fade" id="add-units">
		<div class="modal-dialog modal-dialog-centered stock-adjust-modal">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="modal-header border-0 custom-modal-header">
							<div class="page-title">
								<h4>Approvisionnement du Stock</h4>
							</div>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body custom-modal-body">
							<form method="POST">
								<div class="row">
								<input type="hidden" name="id" value="<?= $liste_article->uuidArticle?>" class="form-control" readonly />
									<div class="col-lg-6">
										<div class="input-blocks search-form mb-3">
											<label>Nom Article</label>
											<input type="text" name="article" value="<?= $liste_article->nomArticle?>" class="form-control" readonly />
										</div>
									</div>
									<div class="col-lg-6">
										<div class="input-blocks search-form mb-3">
											<label>Stock actuelle</label>
											<input type="number" name="Stock" value="<?= $liste_article->qantiteStockArticle?>" class="form-control" readonly/>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="input-blocks">
											<label>Seuil de rupture</label>
											<input type="number" name="rupture" value="<?= $liste_article->seuil?>" class="form-control" readonly/>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="input-blocks">
											<label>Quantite d'Approvisionnement</label>
											<input type="number" name="Qapprovisionnement" class="form-control" />
										</div>
									</div>
								</div>
								<div class=" modal-footer-btn col-lg-12 d-flex justify-contente-between">
									<button type="button" class="btn btn-cancel me-2 col-lg-6" data-bs-dismiss="modal">Annuler</button>
									<button type="submit" name="Modifier" class="btn btn-submit col-lg-6">Valider</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Stock -->
	<!-- footer -->
	<?php $this->view("partials/footer") ?>
	<!-- /footer -->
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var modal = document.getElementById('add-units');
			modal.addEventListener('show.bs.modal', function(event) {
				var button = event.relatedTarget;
				var ArticleId = button.getAttribute('data-idArticle');
				var article = button.getAttribute('data-NomArticle');
				var quantite = button.getAttribute('data-Quantite');
				var seuil = button.getAttribute('data-seuil');
				

				// Remplir les champs de la modale avec les valeurs
				var inputArticle = modal.querySelector('input[name="article"]');
				var inputQuantite = modal.querySelector('input[name="Stock"]');
				var inputSeuil = modal.querySelector('input[name="rupture"]');
				var inputId = modal.querySelector('input[name="id"]');

				inputId.value = ArticleId
				inputSeuil.value = seuil;
				inputArticle.value = article;
				inputQuantite.value = quantite

				// Mettre à jour l'action du formulaire avec l'ID de la matière
				var form = modal.querySelector('form');
				form.action = '<?= ROOT ?>/Articles/approvisionner_article/' + ArticleId;
			});
		});
	</script>
</body>

</html>