<div class="modal-header border-0 custom-modal-header">
    <div class="page-title">
        <h4>Paiement de la vente : <span class="text-uppercase"><?= $Ventedata->referenceVente?></span></h4>
    </div>
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body custom-modal-body">
    <form method="POST" action="<?=ROOT?>/Ventes/paiement_vente">
        <div class="row">
            <input type="hidden" name="idVente" value="<?= $Ventedata->uuidVente?>">
            <div class="col-lg-6">
                <div class="input-blocks">
                    <label> Date</label>
                    <div class="input-groupicon calender-input">
                        <i data-feather="calendar" class="info-img"></i>
                        <input type="date" name="datePaiement" class="datetimepicker form-control" placeholder="Date">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-12">
                <div class="input-blocks">
                    <label>Reference</label>
                    <input type="text" name="reference" value="<?= $Ventedata->referenceVente?>" 
                    class="form-control" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-12">
                <div class="input-blocks">
                    <label>Montant reçu</label>
                    <div class="input-groupicon calender-input">
                        <input type="number" name="sommeRecu" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-12">
                <div class="input-blocks">
                    <label>Montant restant</label>
                    <div class="input-groupicon calender-input">
                        <input type="number" name="sommeRestant" class="form-control" value="<?= $Ventedata->MontantReste?>" readonly>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="input-blocks">
                    <label>Description</label>
                    <textarea class="form-control" name="description"></textarea>
                    <p>Maximum 60 carateres</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="modal-footer-btn d-flex justify-contente-between">
                <button type="button" class="col-md-6 btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="valider" class="col-md-6 btn btn-submit">Submit</button>
            </div>
        </div>
    </form>
</div>