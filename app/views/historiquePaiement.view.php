<div class="page-wrapper-new p-0">
    <div class="content">
        <div class="modal-header border-0 custom-modal-header">
            <div class="page-title">
                <h4>Historisque de Paiement de Reference:<span class="text-uppercase text-success"> <?=$paiement->referenceVente?></span></h4>
            </div>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body custom-modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="modal-body-table total-orders">
                        <div class="table-responsive">
                            <table class="table  datanew table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Reference</th>
                                        <th>Montant payer</th>
                                        <th>Paiement par</th>
                                        <!-- <th class="no-sort">Action</th> -->

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($paiementdata as $paiement) :?>
                                    <tr>
                                        <td><?=$paiement->paiementDate?></td>
                                        <td><?=$paiement->referenceVente?></td>
                                        <td><?=$paiement->sommePayer?></td>
                                        <td>Cash</td>
                                        
                                        <!-- <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-3 p-2" href="javascript:void(0);">
                                                    <i data-feather="printer" class="feather-rotate-ccw"></i>
                                                </a>
                                                <a class="me-3 p-2" href="#" data-bs-toggle="modal" data-bs-target="#editpayment">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>

                                        </td> -->
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