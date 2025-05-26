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
							<h4>gestion des Stock</h4>
							<h6>gerer votre stock</h6>
						</div>
					</div>
					<ul class="table-top-head">
						<li>
							<a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i data-feather="rotate-ccw" class="feather-rotate-ccw"></i></a>
						</li>
						<li>
							<a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i data-feather="chevron-up" class="feather-chevron-up"></i></a>
						</li>
					</ul>

				</div>
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

						</div>
						<div class="table-responsive">
							<table class="table  datanew table-hover">
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
										<th>Prix Unitaire</th>
										<th>Prix Engros</th>
										<th>Prix detaillant</th>
										<th>Quantite</th>
										<th>Seuil Rupture</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($dataStock as $liste_stock): ?>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td><?= $liste_stock->nomArticle ?></td>
											<td><?= $liste_stock->categorieArticle ?></td>
											<td><?= $liste_stock->prixUnitaireArticle ?> FCFA</td>
											<td><?= $liste_stock->prixEngrosArticle ?> FCFA</td>
											<td><?= $liste_stock->prixDetaillantArticle ?> FCFA</td>
											<td><?= $liste_stock->qantiteStockArticle ?></td>
											<?php if (($liste_stock->qantiteStockArticle) > ($liste_stock->seuil)) : ?>
												<td class="bg-success text-light"><?= $liste_stock->seuil ?></td>
											<?php elseif(($liste_stock->qantiteStockArticle) == ($liste_stock->seuil)): ?>
												<td class="bg-warning text-light"><?= $liste_stock->seuil ?></td>
											<?php else: ?>
												<td class="bg-danger text-light"><?= $liste_stock->seuil ?></td>
											<?php endif ?>
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<th>bbbb</th>
								</tfoot>
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
	<!-- Edit Stock -->
	<div class="modal fade" id="edit-units">
		<div class="modal-dialog modal-dialog-centered stock-adjust-modal">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="modal-header border-0 custom-modal-header">
							<div class="page-title">
								<h4>Edit Stock</h4>
							</div>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body custom-modal-body">
							<form action="manage-stocks.html">
								<div class="input-blocks search-form">
									<label>Product</label>
									<input type="text" class="form-control" value="Nike Jordan">
									<i data-feather="search" class="feather-search"></i>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="input-blocks">
											<label>Warehouse</label>
											<select class="select">
												<option>Lobar Handy</option>
												<option>Quaint Warehouse</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="input-blocks">
											<label>Shop</label>
											<select class="select">
												<option>Selosy</option>
												<option>Logerro</option>
											</select>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="input-blocks">
											<label>Responsible Person</label>
											<select class="select">
												<option>Steven</option>
												<option>Gravely</option>
											</select>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="input-blocks search-form mb-3">
											<label>Product</label>
											<input type="text" class="form-control" placeholder="Select Product" value="Nike Jordan">
											<i data-feather="search" class="feather-search"></i>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="modal-body-table">
											<div class="table-responsive">
												<table class="table  datanew">
													<thead>
														<tr>
															<th>Product</th>
															<th>SKU</th>
															<th>Category</th>
															<th>Qty</th>
															<th class="no-sort">Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<div class="productimgname">
																	<a href="javascript:void(0);" class="product-img stock-img">
																		<img src="assets/img/products/stock-img-02.png" alt="product">
																	</a>
																	<a href="javascript:void(0);">Nike Jordan</a>
																</div>
															</td>
															<td>PT002</td>
															<td>Nike</td>
															<td>
																<div class="product-quantity">
																	<span class="quantity-btn"><i data-feather="minus-circle" class="feather-search"></i></span>
																	<input type="text" class="quntity-input" value="2">
																	<span class="quantity-btn">+<i data-feather="plus-circle" class="plus-circle"></i></span>
																</div>
															</td>
															<td class="action-table-data">
																<div class="edit-delete-action">
																	<a class="me-2 p-2" href="#" data-bs-toggle="modal" data-bs-target="#edit-units">
																		<i data-feather="edit" class="feather-edit"></i>
																	</a>
																	<a class="confirm-text p-2" href="javascript:void(0);">
																		<i data-feather="trash-2" class="feather-trash-2"></i>
																	</a>
																</div>

															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer-btn">
									<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-submit">Save Changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Stock -->

	<!-- footer -->
	<?php $this->view("partials/footer") ?>
	<!-- /footer -->
</body>

</html>