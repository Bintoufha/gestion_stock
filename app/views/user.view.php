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
							<h4>Liste des Utilisateurs</h4>
							<h6>Gerer vos utilisateurs</h6>
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
						<a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i data-feather="plus-circle" class="me-2"></i>Ajouter un nouveau utilisateurs</a>
					</div>
				</div>
				<?php $this->view("set_flash"); ?>
				<!-- user list -->
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
									<option>Newest</option>
									<option>Oldest</option>
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
												<option>Choose Name</option>
												<option>Lilly</option>
												<option>Benjamin</option>
											</select>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="input-blocks">
											<i data-feather="stop-circle" class="info-img"></i>
											<select class="select">
												<option>Choose Status</option>
												<option>Active</option>
												<option>Inactive</option>
											</select>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="input-blocks">
											<i data-feather="zap" class="info-img"></i>
											<select class="select">
												<option>Choose Role</option>
												<option>Store Keeper</option>
												<option>Salesman</option>
											</select>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="input-blocks">
											<a class="btn btn-filters ms-auto"> <i data-feather="search" class="feather-search"></i> Search </a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Filter -->
						<div class="table-responsive">
							<table class="table datanew table-bordered">
								<thead>
									<tr>
										<th class="no-sort">
											<label class="checkboxs">
												<input type="checkbox" id="select-all">
												<span class="checkmarks"></span>
											</label>
										</th>
										<th>Nom & Prenom</th>
										<th>Nom Utilisateurs</th>
										<th>Email</th>
										<th>telephone</th>
										<th>Role</th>
										<th>Status</th>
										<th class="no-sort">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php

									foreach ($dataUser as $liste_user): ?>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td><?= $liste_user->nomPrenom ?></td>
											<td><?= $liste_user->pseudo ?></td>
											<td><?= $liste_user->email ?></td>
											<td><?= $liste_user->telephone ?></td>
											<td><?= $liste_user->role ?></td>
											<?php if (($liste_user->status) == "true"): ?>
												<td><span class="badge badge-linesuccess">Active</span></td>
											<?php else: ?>
												<td><span class="badge badge-linedanger">Inactive</span></td>
											<?php endif ?>
											<td class="text-center">
												<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</a>
												<ul class="dropdown-menu">
													<li>
														<a href="<?= ROOT ?>/Users/detaille_utilisateur/<?= $liste_user->uuidUtilisateurs ?>" class="dropdown-item"><i data-feather="eye" class="info-img"></i>Detail utilisateur</a>
													</li>
													<li>
														<a href="<?= ROOT ?>/Users/desactiver_utilisateur/<?= $liste_user->uuidUtilisateurs ?>" class="dropdown-item"><i data-feather="edit" class="info-img"></i>desactiver utilisateur</a>
													</li>
													<li>
														<a href="<?= ROOT ?>/Users/activer_utilisateur/<?= $liste_user->uuidUtilisateurs ?>" class="dropdown-item"><i data-feather="edit" class="fa fa-unlock"></i>Activer utilisateur</a>
													</li>
													<li>
														<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit-units"
															class="dropdown-item"
															data-idUser="<?= $liste_user->uuidUtilisateurs ?>"
															data-Nom="<?= $liste_user->nomPrenom ?>"
															data-Pseudo="<?= $liste_user->pseudo ?>"
															data-Email="<?= $liste_user->email ?>"
															data-telephone="<?= $liste_user->telephone ?>"
															data-role="<?= $liste_user->role ?>">
															<i data-feather="edit" class="info-img">
															</i>Modifier utilisateur</a>
													</li>
													<li>
														<a href="<?= ROOT ?>/Users/Supprimer_utilisateur/<?= $liste_user->uuidUtilisateurs ?>" class="dropdown-item"><i data-feather="trash-2" class="info-img"></i>Supprimer utilisateur</a>
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
				<!-- /user list -->
			</div>
		</div>
		<!-- foot -->
		<?php $this->view("partials/foot") ?>
		<!-- /foot -->
	</div>
	<!-- /Main Wrapper -->
	<!-- Add User -->
	<div class="modal fade" id="add-units">
		<div class="modal-dialog modal-lg modal-dialog-centered custom-modal-two">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="modal-header border-0 custom-modal-header">
							<div class="page-title">
								<h4>Ajouter un utilisateurs</h4>
							</div>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body custom-modal-body">
							<form action="<?= ROOT ?>/Users/Ajouter_utilisateurs" method="POST">
								<div class="row">
									<div class="col-lg-12">
										<div class="new-employee-field">
											<span>Avatar</span>
											<div class="profile-pic-upload mb-2">
												<div class="profile-pic">
													<span><i data-feather="plus-circle" class="plus-down-add"></i> Profile Photo</span>
												</div>
												<div class="input-blocks mb-0">
													<div class="image-upload mb-0">
														<input type="file">
														<div class="image-uploads">
															<h4>Change Image</h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="input-blocks">
											<label>Boutique</label>
											<select class="select" name="boutique">
												<?php
												if (!empty($dataBoutiques)) : ?>
													<option>selectionner une boutique</option>
													<?php foreach ($dataBoutiques as $Nomboutiques): ?>
														<option value="<?= $Nomboutiques->uuidBoutique ?>">
															<?= $Nomboutiques->nomBoutique ?>
															(<?= $Nomboutiques->lieu ?>-<?= $Nomboutiques->telephone ?>)
														</option>
													<?php endforeach; ?>
												<?php else: ?>
													<option value="">Aucune boutique disponible</option>
												<?php endif; ?>
											</select>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="input-blocks">
											<label>Nom & Prenom</label>
											<input type="text" name="nomPrenom" class="form-control">
										</div>
									</div>
									<div class="col-lg-4">
										<div class="input-blocks">
											<label>Pseudo</label>
											<input type="text" name="pseudo" class="form-control">
										</div>
									</div>
									<div class="col-lg-4">
										<div class="input-blocks">
											<label>telephone</label>
											<input type="number" name="telephone" class="form-control">
										</div>
									</div>
									<div class="col-lg-4">
										<div class="input-blocks">
											<label>Email</label>
											<input type="email" name="email" class="form-control">
										</div>
									</div>

									<div class="col-lg-4">
										<div class="input-blocks">
											<label>Password</label>
											<div class="pass-group">
												<input type="password" name="pwd" class="pass-input">
												<span class="fas toggle-password fa-eye-slash"></span>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="input-blocks">
											<label>Role</label>
											<select class="select" name="role">
												<?php if (!empty($dataUser)) : ?>
													<option>selectionner</option>
													<?php if ($_SESSION['role'] === "SuperAdmin") : ?>
														<option value="SuperAdmin">SuperAdmin </option>
													<?php endif; ?>
													<option value="Admin">Admin</option>
													<option value="utilisateur">utilisateur</option>
												<?php else: ?>
													<option value="">Aucune role disponible</option>
												<?php endif; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="modal-footer-btn col-lg-12 d-flex justify-contente-between ">
									<button type="button" class="btn btn-cancel me-2 col-lg-6" data-bs-dismiss="modal">Cancel</button>
									<button type="submit" name="submit" class="btn btn-submit col-lg-6">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add User -->

	<!-- Edit User -->
	<div class="modal fade" id="edit-units">
		<div class="modal-dialog modal-lg modal-dialog-centered custom-modal-two">
			<div class="modal-content">
				<div class="page-wrapper-new p-0">
					<div class="content">
						<div class="modal-header border-0 custom-modal-header">
							<div class="page-title">
								<h4>Modifier un utilisateur</h4>
							</div>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body custom-modal-body">
							<form method="POST">
								<div class="row">
									<div class="col-lg-12">
										<div class="new-employee-field">
											<span>Avatar</span>
											<div class="profile-pic-upload edit-pic">
												<div class="profile-pic">
													<span><img src="assets/img/users/edit-user.jpg" class="user-editer" alt="User"></span>
													<div class="close-img">
														<i data-feather="x" class="info-img"></i>
													</div>
												</div>
												<div class="input-blocks mb-0">
													<div class="image-upload mb-0">
														<input type="file">
														<div class="image-uploads">
															<h4>Change Image</h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<input type="hidden" name="id" value="<?= $liste_user->uuidUtilisateurs ?>" class="form-control">
									<div class="col-lg-12">
										<div class="input-blocks">
											<label>Boutique</label>
											<select class="select" name="boutique">
												<?php
												if (!empty($dataBoutiques)): ?>
													<option>selectionner une boutique</option>
													<?php foreach ($dataBoutiques as $Nomboutiques): ?>
														<option value="<?= $Nomboutiques->uuidBoutique ?>">
															<?= $Nomboutiques->nomBoutique ?>
															(<?= $Nomboutiques->lieu ?>-<?= $Nomboutiques->telephone ?>)
														</option>
													<?php endforeach; ?>
												<?php else: ?>
													<option value="">Aucune boutique disponible</option>
												<?php endif; ?>
											</select>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="input-blocks">
											<label>Nom & Prenom</label>
											<input type="text" name="nomPrenom"
												value="<?= $liste_user->nomPrenom ?>"
												class="form-control">
										</div>
									</div>
									<div class="col-lg-4">
										<div class="input-blocks">
											<label>Pseudo</label>
											<input type="text" name="pseudo"
												value="<?= $liste_user->pseudo ?>"
												class="form-control">
										</div>
									</div>
									<div class="col-lg-4">
										<div class="input-blocks">
											<label>telephone</label>
											<input type="number" name="telephone"
												value="<?= $liste_user->telephone ?>"
												class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="input-blocks">
											<label>Email</label>
											<input type="email" name="email"
												value="<?= $liste_user->email ?>"
												class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="input-blocks">
											<label>Role</label>
											<select class="form-control" name="role">
												<option value="SuperAdmin" <?= $liste_user->role == 'SuperAdmin' ? 'selected' : ''; ?>>SuperAdmin</option>
												<option value="Admin" <?= $liste_user->role == 'Admin' ? 'selected' : ''; ?>>Admin</option>
												<option value="utilisateur" <?= $liste_user->role == 'utilisateur' ? 'selected' : ''; ?>>utilisateur</option>
											</select>
										</div>
									</div>
								</div>
								<div class="modal-footer-btn col-lg-12 d-flex justify-contente-between">
									<button type="button" class="btn btn-cancel me-2 col-lg-6 " data-bs-dismiss="modal">Cancel</button>
									<button type="submit" name="Modifier" class="btn btn-submit col-lg-6 ">Modifier</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit User -->
	<!-- footer -->
	<?php $this->view("partials/footer") ?>
	<!-- /footer -->
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var modal = document.getElementById('edit-units');
			modal.addEventListener('show.bs.modal', function(event) {
				var button = event.relatedTarget;
				var UserId = button.getAttribute('data-idUser');
				var nomPrenom = button.getAttribute('data-Nom');
				var Pseudo = button.getAttribute('data-Pseudo');
				var Email = button.getAttribute('data-Email');
				var telephone = button.getAttribute('data-telephone');
				var role = button.getAttribute('data-role');

				// Remplir les champs de la modale avec les valeurs
				var selectRole = modal.querySelector('select[name="role"]');
				var inputNom = modal.querySelector('input[name="nomPrenom"]');
				var inputPseudo = modal.querySelector('input[name="pseudo"]');
				var inputEmail = modal.querySelector('input[name="email"]');
				var inputTelephone = modal.querySelector('input[name="telephone"]');
				var inputId = modal.querySelector('input[name="id"]');

				inputId.value = UserId
				selectRole.value = role;
				inputNom.value = nomPrenom;
				inputPseudo.value = Pseudo
				inputEmail.value = Email
				inputTelephone.value = telephone
				// Mettre à jour l'action du formulaire avec l'ID de la matière
				var form = modal.querySelector('form');
				form.action = '<?= ROOT ?>/Users/update/' + UserId;
			});
		});
	</script>
</body>

</html>

<!-- CREATE TABLE ligne_approvisionnement (
    uuidLigneAppro CHAR(36) PRIMARY KEY,
    uuidApprovisionnement CHAR(36),
    uuidArticle CHAR(36),
    quantiteApprovisionnee INT,
    prixUnitaireAchat DECIMAL(10,2), -- optionnel
    FOREIGN KEY (uuidApprovisionnement) REFERENCES approvisionnements(uuidApprovisionnement),
    FOREIGN KEY (uuidArticle) REFERENCES article(uuidArticle)
);

CREATE TABLE approvisionnements (
    uuidApprovisionnement CHAR(36) PRIMARY KEY,
    dateApprovisionnement DATE NOT NULL,
    uuidFournisseur CHAR(36),       -- si fournisseur existe
    uuidUtilisateur CHAR(36),       -- qui a fait l’entrée
    uuidBoutique INT,               -- boutique concernée
    commentaire TEXT,
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE mouvements_stock (
    uuidMouvement CHAR(36) PRIMARY KEY,
    uuidArticle CHAR(36),
    type ENUM('approvisionnement', 'vente', 'correction', 'transfert'),
    quantite INT,
    dateMouvement DATETIME DEFAULT CURRENT_TIMESTAMP,
    origine UUID, -- uuidApprovisionnement ou autre
    commentaire TEXT
); -->

