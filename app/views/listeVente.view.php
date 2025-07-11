<!-- header -->
<?php $this->view("partials/header") ?>
<!-- header -->
<style>
	.disabled-link {
		pointer-events: none;
		opacity: 0.5;
		cursor: not-allowed;
	}
</style>

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
							<h4>Liste des Ventes Engros</h4>
							<h6>gerer tout vos vente</h6>
						</div>
					</div>
					<ul class="table-top-head">
						<li>
							<a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
						</li>
						<li>
							<a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
						</li>
						<li>
							<a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i data-feather="printer" class="feather-rotate-ccw"></i></a>
						</li>
						<li>
							<a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i data-feather="rotate-ccw" class="feather-rotate-ccw"></i></a>
						</li>
						<li>
							<a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i data-feather="chevron-up" class="feather-chevron-up"></i></a>
						</li>
					</ul>
					<div class="page-btn">
						<a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-sales-new"><i data-feather="plus-circle" class="me-2"></i>Vente Engros</a>
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
										<th>Nom client</th>
										<th>Reference</th>
										<th>Status</th>
										<th>Somme Total</th>
										<th>Montant Reste</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody class="sales-list">
									<?php foreach ($dataVente as $liste_vente): ?>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td><?= $liste_vente->nomPrenom ?></td>
											<td class="text-uppercase"><?= $liste_vente->referenceVente ?></td>
											<!-- <td>19 Jan 2023</td> -->
											<?php if ($liste_vente->MontantReste === 0): ?>
												<td><span class="badge badge-bgsuccess">Complete</span></td>
											<?php else : ?>
												<td><span class="badge badge-bgdanger">Incomplete</span></td>
											<?php endif ?>
											<td>FCFA <?= ($liste_vente->montantTotal) ?></td>
											<td>FCFA <?= $liste_vente->MontantReste ?></td>
											<td class="text-center">
												<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</a>
												<ul class="dropdown-menu">
													<li>
														<a href="javascript:void(0);" class="dropdown-item view-sale-details" data-bs-toggle="modal" data-bs-target="#sales-details-new"
															data-id="<?= $liste_vente->uuidVente ?>"><i data-feather="eye" class="info-img">
															</i>Detaille du vente</a>
													</li>
													<?php if ($liste_vente->MontantReste === 0): ?>
													<?php else: ?>
														<li>
															<a href="javascript:void(0);" class="dropdown-item update-sale" data-bs-toggle="modal" data-bs-target="#edit-sales-new"
																data-id="<?= $liste_vente->uuidVente ?>"><i data-feather="edit" class="info-img"></i>Modifier vente</a>
														</li>
													<?php endif ?>
													<li>
														<a href="javascript:void(0);" class="dropdown-item view-sale-payment-historique" data-bs-toggle="modal" data-bs-target="#showpayment"
															data-id="<?= $liste_vente->uuidVente ?>"><i data-feather="dollar-sign" class="info-img"></i>Historique paiement</a>
													</li>
													<?php if ($liste_vente->MontantReste === 0): ?>
													<?php else: ?>
														<li>
															<a href="javascript:void(0);" class="dropdown-item view-sale-payement" data-bs-toggle="modal" data-bs-target="#createpayment"
																data-id="<?= $liste_vente->uuidVente ?>"><i data-feather="dollar-sign" class="info-img"></i>Effetuer paiement</a>
														</li>
													<?php endif ?>
													<li>
														<a href="javascript:void(0);" class="dropdown-item"><i data-feather="download" class="info-img"></i>Download pdf</a>
													</li>
													<li>
														<a href="<?= ROOT ?>/Ventes/Supprimer_vente/<?= $liste_vente->uuidVente ?>" class="dropdown-item mb-0">
															<i data-feather="trash-2" class="info-img"></i>Supprimer Vente</a>
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
	</div>
	<!--add popup -->
	<div class="modal fade" id="add-sales-new">
		<div class="modal-dialog add-centered">
			<div class="modal-content">
				<div class="page-wrapper p-0 m-0">
					<div class="content p-0">
						<div class="modal-header border-0 custom-modal-header">
							<div class="page-title">
								<h4>Effectuer une Vente</h4>
							</div>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="card">
							<div class="card-body">
								<form method="POST">
									<div class="row">
										<div class="col-lg-12 col-sm-6 col-12">
											<div class="input-blocks">
												<label for="product-select">Nom Article</label>
												<select class="select" id="product-select">
													<?php
													if (!empty($dataArticle)): ?>
														<?php foreach ($dataArticle as $article): ?>
															<option value="<?= $article->uuidArticle ?>">
																<?= $article->nomArticle ?>- (categorie (<?= $article->categorieArticle ?>)-
																Stock disponible (<?= $article->qantiteStockArticle ?>))
															</option>
														<?php endforeach; ?>
													<?php else: ?>
														<option value="">Aucune article disponible</option>
													<?php endif; ?>
												</select>
											</div>

										</div>
										<div class="col-lg-4 col-sm-6 col-12">
											<div class="input-blocks">
												<label>Reference Vente</label>
												<input type="text" name="reference" class="text-uppercase Reference"
													value="<?= $reference ?>" readonly>
											</div>
										</div>
										<div class="col-lg-4 col-sm-6 col-12">
											<div class="input-blocks">
												<label>Date</label>
												<div class="input-groupicon calender-input">
													<i data-feather="calendar" class="info-img"></i>
													<input type="text" name="date" class="datetimepicker" placeholder="Choose" required>
												</div>
											</div>
										</div>
										<div class="col-lg-4 col-sm-6 col-12">
											<div class="input-blocks">
												<label>Nom Client</label>
												<div class="row">
													<div class="col-lg-10 col-sm-10 col-10">
														<select class="select clientFournisseurs" required>
															<?php
															if (!empty($dataClientFournisseur)): ?>
																<option>selectionner un client</option>
																<?php foreach ($dataClientFournisseur as $client): ?>
																	<option value="<?= $client->uuidClientFourniture ?>">
																		<?= $client->nomPrenom ?>(<?= $client->telephone ?>)
																	</option>
																<?php endforeach; ?>
															<?php else: ?>
																<option value="">Aucune client disponible</option>
															<?php endif; ?>
														</select>
													</div>
													<div class="col-lg-2 col-sm-2 col-2 ps-0">
														<div class="add-icon">
															<a href="#" class="choose-add"><i data-feather="plus-circle" class="plus"></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table  table-bordered" id="vente-table">
											<thead>
												<tr>
													<th>Article</th>
													<th>Quantite</th>
													<th>Prix Engros (FCFA)</th>
													<th>Montant</th>
													<th>Operation</th>
												</tr>
											</thead>
											<tbody id="dataListe">
											</tbody>
										</table>
									</div>

									<div class="row">
										<div class="col-lg-6 ms-auto">
											<div class="total-order w-100 max-widthauto m-auto mb-4">
												<ul>
													<li>
														<h4 class="text-uppercase font-bold">Montant Total de Vente (FCFA)</h4>
														<h5 class="MontantTotal"><input type="number" class="form-control MontantTotal" readonly></h5>
													</li>
												</ul>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-4 col-sm-6 col-12">
											<div class="input-blocks">
												<label>Montant Payer</label>
												<div class="input-groupicon select-code">
													<input type="number" name="MontantPayer" class="form-control MontantPayer p-2">
												</div>
											</div>
										</div>
										<div class="col-lg-4 col-sm-6 col-12">
											<div class="input-blocks">
												<label>Montant reste </label>
												<div class="input-groupicon select-code">
													<input type="number" name="MontantReste" class="form-control MontantReste" readonly>
												</div>
											</div>
										</div>
										<div class="col-lg-4 col-sm-6 col-12">
											<div class="input-blocks">
												<label>Montant a Rembourser</label>
												<div class="input-groupicon select-code">
													<input type="number" class="form-control MontantRembourser" readonly>
												</div>
											</div>
										</div>
										<div class="col-lg-12 text-end d-flex justify-content-between">
											<button type="button" class="col-lg-6 btn btn-cancel add-cancel me-3" data-bs-dismiss="modal">Cancel</button>
											<button type="submit" class="col-lg-6 btn btn-submit add-sale valider">Valider</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /add popup -->

	<!-- /details popup -->
	<div class="modal fade" id="sales-details-new">
		<div class="modal-dialog sales-details-modal">
			<div class="modal-content" id="modal-detail-content">

				<!--  -->
			</div>
		</div>
	</div>
	<!-- details popup -->

	<!-- edit popup -->
	<div class="modal fade" id="edit-sales-new">
		<div class="modal-dialog edit-sales-modal">
			<div class="modal-content" id="updateVente">

			</div>
		</div>
	</div>
	<!-- /edit popup -->

	<!-- show payment Modal -->
	<div class="modal fade" id="showpayment" tabindex="-1" aria-labelledby="showpayment" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered stock-adjust-modal">
			<div class="modal-content" id="historiquePaiement">

			</div>
		</div>
	</div>
	<!-- show payment Modal -->

	<!-- Create payment Modal -->
	<div class="modal fade" id="createpayment" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content" id="paiement">

			</div>
		</div>
	</div>
	<!-- Create payment Modal -->

	<!-- edit payment Modal -->
	<div class="modal fade" id="editpayment" tabindex="-1" aria-labelledby="editpayment" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header border-0 custom-modal-header">
					<div class="page-title">
						<h4>Edit Payments</h4>
					</div>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body custom-modal-body">
					<form action="sales-list.html">
						<div class="row">
							<div class="col-lg-6">
								<div class="input-blocks">
									<label>19 Jan 2023</label>
									<div class="input-groupicon calender-input">
										<i data-feather="calendar" class="info-img"></i>
										<input type="text" class="datetimepicker form-control" placeholder="Select Date">
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="input-blocks">
									<label>Reference</label>
									<input type="text" value="INV/SL0101">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-sm-12 col-12">
								<div class="input-blocks">
									<label>Received Amount</label>
									<div class="input-groupicon calender-input">
										<i data-feather="dollar-sign" class="info-img"></i>
										<input type="text" value="1500">
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-sm-12 col-12">
								<div class="input-blocks">
									<label>Paying Amount</label>
									<div class="input-groupicon calender-input">
										<i data-feather="dollar-sign" class="info-img"></i>
										<input type="text" value="1500">
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-sm-12 col-12">
								<div class="input-blocks">
									<label>Payment type</label>
									<select class="select">
										<option>Cash</option>
										<option>Online</option>
										<option>Inprogress</option>
									</select>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="input-blocks summer-description-box transfer">
									<label>Description</label>
									<textarea class="form-control"></textarea>
								</div>
								<p>Maximum 60 Characters</p>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="modal-footer-btn mb-3 me-3">
								<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-submit">Save Changes</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- edit payment Modal -->
	<!-- foot -->
	<?php $this->view("partials/foot") ?>
	<!-- /foot -->

	<!-- footer -->
	<?php $this->view("partials/footer") ?>
	<!-- /footer -->
	<script>
		$(document).ready(function() {
			// Ajout d'un article
			$('#product-select').change(function() {
				var articleId = $(this).val();
				if (articleId) {
					$.ajax({
						url: "<?= ROOT ?>/Ventes/ArticleDetails",
						type: 'POST',
						data: {
							articleId: articleId
						},
						success: function(response) {
							try {
								var articleDetails = JSON.parse(response);
								if (!articleDetails.error) {
									var articleRow = $(`#dataListe tr[data-id="${articleId}"]`);
									if (articleRow.length > 0) {
										var quantiteInput = articleRow.find('input[name="quantite[]"]');
										var currentQuantity = parseInt(quantiteInput.val());
										quantiteInput.val(currentQuantity + 1);
									} else {
										var newRow = `<tr data-id="${articleId}">
                                    <td>${articleDetails.nomArticle}</td>
                                    <td><input type="number" class="form-control" name="quantite[]" min="1" value="1"></td>
                                    <td><input type="number" class="form-control" name="prixEngrosArticle[]" value="${articleDetails.prixEngrosArticle}" readonly></td>
                                    <td><input type="number" class="form-control montant" name="montant[]" readonly></td>
                                    <td><button type="button" class="btn btn-danger remove-item"><i data-feather="trash-2" class="feather-trash-2"></i></button></td>
                                </tr>`;
										$('#dataListe').append(newRow);
										// Déclenche le calcul du montant !
										$('#dataListe tr[data-id="' + articleId + '"]').find('input[name="quantite[]"]').trigger('change');

									}
									updateMontants();
								} else {
									alert(articleDetails.error);
								}
							} catch (e) {
								alert('Erreur de parsing JSON.');
							}
						}
					});
				}
			});

			// Mise à jour du montant de chaque article
			$(document).on('change', 'input[name="quantite[]"]', function() {
				var $row = $(this).closest('tr');
				var quantite = parseInt($(this).val()) || 0;
				var prixEngros = parseFloat($row.find('input[name="prixEngrosArticle[]"]').val()) || 0;
				var montant = quantite * prixEngros;
				$row.find('.montant').val(montant);

				updateMontants();
			});

			// Suppression d'un article
			$(document).on('click', '.remove-item', function() {
				$(this).closest('tr').remove();
				updateMontants();
			});

			// Calcul du montant total et des montants restants
			function updateMontants() {
				var grandTotal = 0;
				$('.montant').each(function() {
					grandTotal += parseFloat($(this).val()) || 0;
				});

				$('.MontantTotal').val(grandTotal.toFixed(2));

				var montantPaye = parseFloat($('.MontantPayer').val()) || 0;
				var montantReste = Math.max(grandTotal - montantPaye, 0);
				var montantRembourser = Math.max(montantPaye - grandTotal, 0);

				$('.MontantReste').val(montantReste);
				$('.MontantRembourser').val(montantRembourser);
			}

			// Mise à jour du montant payé
			$(document).on('input', '.MontantPayer', function() {
				updateMontants();
			});

			updateMontants();
		});
	</script>
	<script>
		$('.valider').click(function(event) {
			//event.preventDefault(); // Empêcher la soumission normale du formulaire

			var data = [];
			var erreur = false; // Variable pour détecter une erreur

			$('#dataListe tr').each(function() {
				var articleId = $(this).attr('data-id') || null;
				var quantite = $(this).find('input[name="quantite[]"]').val() || null;
				var prixEngros = $(this).find('input[name="prixEngrosArticle[]"]').val() || null;
				var montant = $(this).find('input[name="montant[]"]').val() || null;
				var MontantPayer = $('.MontantPayer').val() || null;
				var MontantReste = $('.MontantReste').val() || null;
				var clientFournisseurs = $('.clientFournisseurs').val() || null;
				var datetimepicker = $('.datetimepicker').val() || null;
				var Reference = $('.Reference').val() || null;
				var montant_total = $('.MontantTotal').val() || null;

				// Vérification côté client
				if (!articleId || !quantite || !montant || !MontantPayer || !MontantReste ||
					!clientFournisseurs || !datetimepicker || !Reference || !montant_total) {
					erreur = true;
				}
				data.push({
					articleId: parseInt(articleId),
					quantite: parseInt(quantite),
					montant: parseInt(montant),
					MontantReste: parseInt(MontantReste),
					MontantPayer: parseInt(MontantPayer),
					montant_total: parseInt(montant_total),
					clientFournisseurs: parseInt(clientFournisseurs),
					datetimepicker: datetimepicker,
					prixEngros: prixEngros,
					Reference: Reference
				});

			});
			if (erreur) {
				alert("Tous les champs doivent être remplis !");
				return;
			}
			$.ajax({
				url: "<?= ROOT ?>/Ventes/EnregistrerVente",
				type: "POST",
				data: {
					articles: JSON.stringify(data)
				},
				success: function(response) {
					alert("les données ont été envoyées");
				},
				error: function(xhr) {
					alert("Erreur lors de l'enregistrement.");
					console.error(xhr.responseText);
				}
			});
		});
	</script>
	<script>
		// recuperer les donnee depuis la base de donnee et affiche dans le modal(pour le button detaille)
		$(document).on('click', '.view-sale-details', function() {
			event.preventDefault();
			var venteId = $(this).data('id');
			console.log(venteId)
			$.ajax({
				url: '<?= ROOT ?>/Ventes/details_vente/' + venteId,
				type: 'GET',
				success: function(response) {
					$('#modal-detail-content').html(response); // injecte la vue partielle
					$('#sales-details-new').modal('show');
				},
				error: function() {
					alert('Erreur lors du chargement des détails de la vente.');
				}
			});
		});
		// recuperer les donnee depuis la base de donnee et affiche dans le modal(pour le button effectuer un paiement)
		$(document).on('click', '.view-sale-payement', function() {
			event.preventDefault();
			var venteId = $(this).data('id');
			console.log(venteId)
			$.ajax({
				url: '<?= ROOT ?>/Ventes/detaille_paiement_vente/' + venteId,
				type: 'GET',
				success: function(response) {
					$('#paiement').html(response); // injecte la vue partielle
					$('#createpayment').modal('show'); // ouvre le modal
				},
				error: function() {
					alert('Erreur lors du chargement des détails de la vente.');
				}
			});
		});
		// voir historique de paiememt
		$(document).on('click', '.view-sale-payment-historique', function() {
			event.preventDefault();
			var venteId = $(this).data('id');
			console.log(venteId)
			$.ajax({
				url: '<?= ROOT ?>/Ventes/paiement_historique/' + venteId,
				type: 'GET',
				success: function(response) {
					$('#historiquePaiement').html(response); // injecte la vue partielle
					$('#showpayment').modal('show'); // ouvre le modal
				},
				error: function() {
					alert('Erreur lors du chargement des détails du payememts.');
				}
			});
		});
	</script>
	<script>
		$(document).ready(function() {
			// Charger les données de la vente à modifier
			$('.update-sale').on('click', function() {
				let uuid = $(this).data('id');

				$.ajax({
					url: '<?= ROOT ?>/Ventes/update_vente/' + uuid,
					method: 'GET',
					dataType: 'json',
					success: function(data) {
						$('#modalModifierVente').modal('show');
						$('#updateVente').html(data.view);

						$('#uuidVente').val(uuid);
						$('.Reference').val(data.vente.referenceVente);
						$('.datetimepickers').val(data.vente.date);
						$('.Fournisseursclient').val(data.vente.nomPrenom);

						setTimeout(() => {
							$('#ListeData').empty();
							if (Array.isArray(data.articles)) {
								data.articles.forEach(article => {
									ajouterLigne(article.uuidArticle, article.nomArticle, article.prixEngrosDetaillant, article.quantite, true);
								});
							}
							recalculerTotal();
						}, 100);
					}
				});
			});

			// Lorsqu'on sélectionne un nouveau produit
			$(document).on('change', '#products-selects', function() {
				let option = $(this).find('option:selected');
				let uuid = option.val();
				let nom = option.data('nom');
				let prix = parseFloat(option.data('prix')) || 0;

				if (!uuid) return;

				let dejaPresent = false;
				$('input[name="uuidArticle[]"]').each(function() {
					if ($(this).val() == uuid) {
						dejaPresent = true;
						return false;
					}
				});

				if (dejaPresent) {
					alert('Cet article est déjà ajouté.');
					$(this).val('');
					return;
				}

				ajouterLigne(uuid, nom, prix, 1);
				$(this).val('');
				recalculerTotal();
			});

			// Ajouter une ligne au tableau
			function ajouterLigne(uuid, nom, prix, quantite, existante = false) {
				let montant = prix * quantite;
				let row = `
					<tr ${existante ? 'data-exist="true"' : ''}>
						<td>
							<input type="hidden" name="uuidArticle[]" class="uuidArticle" value="${uuid}">
							${nom}
						</td>
						<td><input type="number" name="quantite" class="form-control quantite" value="${quantite}" required></td>
						<td><input type="number" name="prix" class="form-control prix" value="${prix}" readonly></td>
						<td><input type="number" name="montant" class="form-control montant" value="${montant.toFixed(2)}" readonly></td>
						<td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="feather-trash-2"></i></button></td>
					</tr>
				`;
				$('#ListeData').append(row);
			}

			// Mise à jour du montant ligne quand la quantité change
			$(document).on('input', '.quantite', function() {
				let row = $(this).closest('tr');
				let qte = parseFloat(row.find('.quantite').val().replace(',', '.')) || 0;
				let prix = parseFloat(row.find('.prix').val().replace(',', '.')) || 0;
				let montant = qte * prix;

				row.find('.montant').val(montant.toFixed(2));
				recalculerTotal();
			});

			// Supprimer une ligne
			$(document).on('click', '.remove-row', function() {
				$(this).closest('tr').remove();
				recalculerTotal();
			});

			// Recalcul total et reste à payer
			function recalculerTotal() {
				var grandTotal = 0;
				$('.montant').each(function() {
					grandTotal += parseFloat($(this).val()) || 0;
				});

				$('.TotalMontant').val(grandTotal.toFixed(2));

				var montantPaye = parseFloat($('.PayerMontant').val()) || 0;
				var montantReste = Math.max(grandTotal - montantPaye, 0);
				var montantRembourser = Math.max(montantPaye - grandTotal, 0);

				$('.RestesMontant').val(montantReste.toFixed(2));
				$('.RembourserMontant').val(montantRembourser.toFixed(2));
			}

			// Recalcul du reste à payer quand utilisateur saisit le montant payé
			$(document).on('input', '.PayerMontant', function() {
				recalculerTotal();
			});
		});
	</script>
	<script>
		$(document).on('submit', '#formModifierVente', function(e) {
			// e.preventDefault();

			let venteData = {
				uuidVente: parseInt($('#uuidVente').val()),
				//client: ($('.Fournisseursclient').val()),
				total: parseFloat($('.TotalMontant').val()),
				payer: parseFloat($('.PayerMontant').val()),
				//reste: ($('.RestesMontant').val()),
				articles: []
			};

			$('#ListeData tr').each(function() {
				let row = $(this);
				venteData.articles.push({
					uuidArticle: parseInt(row.find('.uuidArticle').val()),
					quantite: parseInt(row.find('.quantite').val()),
					prix: parseFloat(row.find('.prix').val()),
					montant: parseFloat(row.find('.montant').val()),
					ligneExistante: row.data('exist') || false // flag pour distinguer une ligne ajoutée
				});
			});

			$.ajax({
				url: '<?= ROOT ?>/Ventes/modifierVente',
				type: 'POST',
				data: {
					venteData: JSON.stringify(venteData) // on envoie en tant que string dans un champ POST
				},
				success: function(response) {
					alert("Vente modifiée avec succès !");
					// Optionnel : recharger la liste ou fermer le modal
				},
				error: function(xhr) {
					console.log(xhr.responseText);
				}
			});
		});
	</script>
</body>

</html>