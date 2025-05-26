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
        <div class="page-wrapper cardhead">
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Liste & Formulaire</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Ajouter Boutique</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <?php $this->view("set_flash"); ?>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Ajouter une boutique</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?= isset($updateboutique) ? ROOT . "/Boutiques/update_boutique/{$updateboutique->uuidBoutique}" : ROOT . "/Boutiques/ListeBoutique" ?>"
                                    id="formpost">
                                    <div class="mb-3">
                                        <label class="form-label">Nom du Boutique</label>
                                        <input type="text" name="nomboutique" value="<?= $updateboutique->nomBoutique ?? '' ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Addresse</label>
                                        <input type="text" name="addresse" value="<?= $updateboutique->lieu ?? '' ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Telephone</label>
                                        <input type="number" name="telephone" value="<?= $updateboutique->telephone ?? '' ?>" class="form-control">
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" name="<?= isset($updateboutique) ? "Modifier" : "submit" ?>" class="col-12 btn btn-primary"><?= isset($updateboutique) ? "Modifier" : "Submit" ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Liste des boutiques</h5>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table  datanew table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom du boutique</th>
                                                <th>Addresse</th>
                                                <th>Telephone</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($datas as $liste_boutique): ?>
                                                <tr>
                                                    <td><?= $liste_boutique->nomBoutique ?></td>
                                                    <td><?= $liste_boutique->lieu ?></td>
                                                    <td><?= $liste_boutique->telephone ?></td>
                                                    <td class="text-center">
                                                        <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <!-- <li>
														<a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#sales-details-new"><i data-feather="eye" class="info-img"></i>Detail boutique</a>
													</li> -->
                                                            <li>
                                                                <a href="<?= ROOT ?>/Boutiques/modifier/<?= $liste_boutique->uuidBoutique ?>" class="dropdown-item"><i data-feather="edit" class="info-img"></i>Modifier boutique</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= ROOT ?>/Boutiques/Supprimer_boutique/<?= $liste_boutique->uuidBoutique ?>" class="dropdown-item"><i data-feather="trash-2" class="info-img"></i>Supprimer boutique</a>
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
                    </div>
                </div>
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