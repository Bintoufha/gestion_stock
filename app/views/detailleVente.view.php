<!-- details popup -->
<div class="page-wrapper details-blk">
    <div class="content p-0">
        <div class="page-header p-4 mb-0">
            <div class="add-item d-flex">
                <div class="page-title modal-datail">
                    <h4>Detaille du Vente</h4>
                </div>
                <!-- <div class="page-btn">
                    <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-payroll-new"><i data-feather="plus-circle" class="me-2"></i> Add New Sales</a>
                </div> -->
            </div>
            <ul class="table-top-head">
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><i data-feather="edit" class="action-edit sales-action"></i></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="<?= ROOT?>/assets/img/icons/pdf.svg" alt="img"></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img src="<?= ROOT?>/assets/img/icons/excel.svg" alt="img"></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i data-feather="printer" class="feather-rotate-ccw"></i></a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-body ">
                <form>
                    <div class="invoice-box table-height" style="max-width: 1600px;width:100%;overflow: auto;padding: 0;font-size: 14px;line-height: 24px;color: #555;">
                        <div class="sales-details-items d-flex">
                            <div class="details-item">
                                <h6>Information Client</h6>
                                <p><?= $Ventedata->nomPrenom ?><br>
                                    <?= $Ventedata->telephone ?><br>
                                    <?= $Ventedata->typeClientFournisseur ?><br>
                                </p>
                            </div>
                            <div class="details-item">
                                <h6>Infomation du Boutique</h6>
                                <p><?= $Ventedata->nomBoutique ?><br>
                                    <?= $Ventedata->telephone ?><br>
                                    <?= $Ventedata->lieu ?><br>
                                </p>
                            </div>
                            <div class="details-item">
                                <h6>Information du Vente</h6>
                                <p><?= $Ventedata->referenceVente ?><br>
                                    <?php if ($Ventedata->MontantReste === 0): ?>
                                        <td><span class="badge badge-bgsuccess">Complete</span></td>
                                    <?php else : ?>
                                        <td><span class="badge badge-bgdanger">Incomplete</span></td>
                                    <?php endif ?>
                                    <br>
                                    Date vente: <?= $Ventedata->date ?>
                                </p>
                            </div>
                            <div class="details-item">
                                <h5><span><?= $Ventedata->referenceVente ?></span>Paiement<br><?php if ($Ventedata->MontantReste === 0): ?>
                                        <td><span class="badge badge-bgsuccess">Complete</span></td>
                                    <?php else : ?>
                                        <td><span class="badge badge-bgdanger">Incomplete</span></td>
                                    <?php endif ?>
                                </h5>
                            </div>
                        </div>
                        <div class="table-responsive no-pagination">
                            <table class="table datanew table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Article</th>
                                        <th>Quantite</th>
                                        <th>Prix Unitaire</th>
                                        <th>Prix Engros</th>
                                        <th>Montant</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataLigneVente as $article): ?>
                                        <tr>
                                            <td><?=$article->nomArticle ?></td>
                                            <td><?=$article->quantite ?></td>
                                            <td><?=$article->prixUnitaireArticle ?></td>
                                            <td><?=$article->prixEngrosArticle ?></td>
                                            <td><?=$article->montant ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-6 ms-auto">
                                <div class="total-order w-100 max-widthauto m-auto mb-4">
                                    <ul>
                                        <li>
                                            <h4>Grand Total</h4>
                                            <h5><?= $Ventedata->montantTotal ?> FCFA</h5>
                                        </li>
                                        <li>
                                            <h4>Montant Payer</h4>
                                            <h5><?= $Ventedata->MontantPayer ?> FCFA</h5>
                                        </li>
                                        <li>
                                            <h4>Montant Restant</h4>
                                            <h5><?= $Ventedata->MontantReste ?> FCFA</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /details popup -->