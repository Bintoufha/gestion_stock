<div class="page-wrapper p-0 m-0">
    <div class="content p-0">
        <div class="page-header p-4 mb-0">
            <div class="add-item new-sale-items d-flex">
                <div class="page-title">
                    <h4>Modification de la vente</h4>
                </div>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="POST" id="formModifierVente">
                    <div class="row">
                        <input type="hidden" name="uuidVente" id="uuidVente">
                        <div class="col-lg-12 col-sm-6 col-12">
                            <div class="input-blocks">
                                <label for="product-select">Nom Article</label>
                                <select class="select form-control" id="products-selects">
                                    <?php
                                    if (!empty($dataArticle)): ?>
                                        <option>selectionner un article</option>
                                        <?php foreach ($dataArticle as $article): ?>
                                            <option value="<?= $article->uuidArticle ?>"
                                                data-nom="<?= htmlspecialchars($article->nomArticle) ?>"
                                                data-prix="<?= $article->prixEngrosArticle ?>">
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
                        <!-- <div class="col-lg-4 col-sm-6 col-12">
                            <div class="input-blocks">
                                <label>Reference Vente</label>
                                <input type="text" name="reference" class="text-uppercase Reference" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="input-blocks">
                                <label>Date</label>
                                <div class="input-groupicon calender-input">
                                    <i data-feather="calendar" class="info-img"></i>
                                    <input type="text" name="date" value="<?= $Ventedata->referenceVente ?>" class="datetimepickers" placeholder="Choose" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="input-blocks">
                                <label>Nom Client</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <select class="select Fournisseursclient form-control" required>
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
                                </div>
                            </div>
                        </div> -->
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
                            <tbody id="ListeData">

                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 ms-auto">
                            <div class="total-order w-100 max-widthauto m-auto mb-4">
                                <ul>
                                    <li>
                                        <h4 class="text-uppercase font-bold">Montant Total de Vente (FCFA)</h4>
                                        <h5 class="TotalMontant"><input type="number" class="form-control TotalMontant" readonly></h5>
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
                                    <input type="number" name="PayerMontant" class="form-control PayerMontant p-2">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="input-blocks">
                                <label>Montant reste </label>
                                <div class="input-groupicon select-code">
                                    <input type="number" name="MontantReste" class="form-control RestesMontant" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="input-blocks">
                                <label>Montant a Rembourser</label>
                                <div class="input-groupicon select-code">
                                    <input type="number" class="form-control RembourserMontant" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-end d-flex justify-content-between">
                            <button type="button" class="col-lg-6 btn btn-cancel add-cancel me-3" data-bs-dismiss="modal">Retour</button>
                            <button type="submit" class="col-lg-6 btn btn-submit valider">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>