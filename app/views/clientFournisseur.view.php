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
                            <h4>Liste</h4>
                            <h6>gerer tout vos clients et fournisseurs</h6>
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
                        <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-department"><i data-feather="plus-circle" class="me-2"></i>Fournisseur & Client</a>
                    </div>
                </div>
                <?php $this->view("set_flash"); ?>
                <!-- /product list -->
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="table-top table-top-new">

                            <div class="search-set mb-0">
                                <div class="total-employees">
                                    <h6><i data-feather="users" class="feather-user"></i>Total Employees <span>21</span></h6>
                                </div>
                                <div class="search-input">
                                    <a href="" class="btn btn-searchset"><i data-feather="search" class="feather-search"></i></a>
                                    <input type="search" class="form-control">
                                </div>

                            </div>
                            <div class="search-path d-flex align-items-center search-path-new">
                                <div class="d-flex">
                                    <a class="btn btn-filter" id="filter_search">
                                        <i data-feather="filter" class="filter-icon"></i>
                                        <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                    </a>
                                    <a href="department-list.html" class="btn-list"><i data-feather="list" class="feather-user"></i></a>
                                    <a href="department-grid.html" class="btn-grid active"><i data-feather="grid" class="feather-user"></i></a>
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
                        </div>
                        <!-- /Filter -->
                        <div class="card" id="filter_inputs">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="file-text" class="info-img"></i>
                                            <select class="select">
                                                <option>Choose Department</option>
                                                <option>UI/UX</option>
                                                <option>HR</option>
                                                <option>Admin</option>
                                                <option>Engineering</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="users" class="info-img"></i>
                                            <select class="select">
                                                <option>Choose HOD</option>
                                                <option>Mitchum Daniel</option>
                                                <option>Susan Lopez</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-12 ms-auto">
                                        <div class="input-blocks">
                                            <a class="btn btn-filters ms-auto"> <i data-feather="search" class="feather-search"></i> Search </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Filter -->

                    </div>
                </div>
                <!-- /product list -->

                <div class="employee-grid-widget">
                    <div class="row ">
                        <?php foreach ($dataClientFournisseur as $liste_client_fournisseurs): ?>
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 ">
                                <div class="employee-grid-profile">
                                    <div class="profile-head">
                                        <div class="dep-name">
                                            <h5 class="active"><?= $liste_client_fournisseurs->typeClientFournisseur ?></h5>
                                        </div>
                                        <div class="profile-head-action">
                                            <div class="dropdown profile-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i data-feather="more-vertical" class="feather-user"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit-client"
                                                            data-idclient="<?= $liste_client_fournisseurs->uuidClientFourniture ?>"
                                                            data-Nom=" <?= $liste_client_fournisseurs->nomPrenom ?>"
                                                            data-type="<?= $liste_client_fournisseurs->typeClientFournisseur ?>"
                                                            data-telephone="<?= $liste_client_fournisseurs->telephone ?>"><i data-feather="edit" class="info-img"></i>Modifier</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= ROOT ?>/ClientFournisseurs/Supprimer_client_fournisseurs/<?= $liste_client_fournisseurs->uuidClientFourniture ?>"
                                                            class="dropdown-item mb-0"><i data-feather="trash-2" class="info-img"></i>Supprimer</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-info department-profile-info">
                                        <div class="profile-pic">
                                            <img src="<?= ROOT ?>/assets/img/users/user-01.jpg" alt="">
                                        </div>
                                        <h4 class="text-uppercase"><?= $liste_client_fournisseurs->nomPrenom ?></h4>
                                    </div>
                                    <ul class="team-members">
                                        <li class="text-primary fs-5">
                                            <?= $liste_client_fournisseurs->telephone ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row custom-pagination">
                        <div class="col-md-12">
                            <div class="paginations d-flex justify-content-end mb-3">
                                <span><i class="fas fa-chevron-left"></i></span>
                                <ul class="d-flex align-items-center page-wrap">
                                    <li>
                                        <a href="javascript:void(0);" class="active">
                                            1
                                        </a>
                                    </li>
                                </ul>
                                <span><i class="fas fa-chevron-right"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- foot -->
        <?php $this->view("partials/foot") ?>
        <!-- /foot -->

    </div>
    <!-- /Main Wrapper -->
    <!-- Add Department -->
    <div class="modal fade" id="add-department">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Ajouter un client ou un fournisseur</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <form action="<?= ROOT ?>/ClientFournisseurs/Ajouter_client_fournisseur" method="POST">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Nom & Prenom</label>
                                            <input type="text" name="nomPrenom" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Type</label>
                                            <select class="select" name="type">
                                                <option>Selectionner le type</option>
                                                <option value="Fournisseur">Fournisseur</option>
                                                <option value="Client">Client</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="">
                                            <label class="form-label">N° telephone</label>
                                            <input type="number" name="telephone" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer-btn col-lg-12 d-flex justify-content-between">
                                    <button type="button" class="col-lg-6 btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="valider" class="col-lg-6 btn btn-submit">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Department -->

    <!-- Edit Department -->
    <div class="modal fade" id="edit-client">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Modifier le client ou fournisseurs</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <form method="POST">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="id" value="<?= $liste_client_fournisseurs->uuidClientFourniture ?>" class="form-control">

                                        <div class="mb-3">
                                            <label class="form-label">Nom & Prenom</label>
                                            <input type="text" name="nomPrenom" value="<?= $liste_client_fournisseurs->nomPrenom ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Type</label>
                                            <select class="selectx form-control" name="type" >
                                                <option>Selectionner le type</option>
                                                <option value="Fournisseur" <?= $liste_client_fournisseurs->typeClientFournisseur == 'Fournisseur' ? 'selected' : ''; ?>>Fournisseur</option>
                                                <option value="Client" <?= $liste_client_fournisseurs->typeClientFournisseur == 'Client' ? 'selected' : ''; ?>>Client</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="">
                                            <label class="form-label">N° telephone</label>
                                            <input type="number" name="telephone" value="<?= $liste_client_fournisseurs->telephone ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer-btn col-lg-12 d-flex justify-content-between">
                                    <button type="button" class="col-lg-6 btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="Modifier" class="col-lg-6 btn btn-submit">Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Department -->
    <!-- footer -->
    <?php $this->view("partials/footer") ?>
    <!-- /footer -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('edit-client');
            modal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var ClientId = button.getAttribute('data-idclient');
                var nomPrenom = button.getAttribute('data-Nom');
                var type = button.getAttribute('data-type');
                var telephone = button.getAttribute('data-telephone');

                // Remplir les champs de la modale avec les valeurs
                var selectRole = modal.querySelector('select[name="type"]');
                var inputNom = modal.querySelector('input[name="nomPrenom"]');
                var inputTelephone = modal.querySelector('input[name="telephone"]');
                var inputId = modal.querySelector('input[name="id"]');

                inputId.value = ClientId
                selectRole.value = type;
                inputNom.value = nomPrenom;
                inputTelephone.value = telephone
                // Mettre à jour l'action du formulaire avec l'ID de la matière
                var form = modal.querySelector('form');
                form.action = '<?= ROOT ?>/ClientFournisseurs/update/' + ClientId;
            });
        });
    </script>
</body>

</html>