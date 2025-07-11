<?php
class Vente extends model
{
    public function VenteEnregistrer($Data = [])
    {
        //var_dump($Data);
        try {
            // Étape 1 : Vérification du stock pour chaque article
            foreach ($Data as $vente) {
                $stock = $this->FetchSelectWhere(
                    "qantiteStockArticle",
                    "article",
                    "uuidArticle = :uuid",
                    [':uuid' => $vente['articleId']]
                );

                $stockDisponible = intval($stock->qantiteStockArticle);
                $quantiteDemandee = intval($vente['quantite']);

                if ($stockDisponible < $quantiteDemandee) {
                    $this->set_flash("Stock insuffisant pour l'article sélectionné.", 'danger');
                    exit;
                }
            }

            // ✅ Étape 2 : Insertion de la vente principale
            $createVente = $this->insertion_update_simples_insert_id(
                "INSERT INTO `vente`(`referenceVente`, `typeVente`,`date`, `uuidClientFourniture`, `uuidBoutique`, `MontantPayer`, `MontantReste`, `montantTotal`) 
                 VALUES (:referenceVente, :typeVente, :date, :uuidClientFourniture, :uuidBoutique, :montantPayer, :montantReste, :montantTotal)",
                [
                    ':montantTotal' => $Data[0]['montant_total'],
                    ':montantPayer' => $Data[0]['MontantPayer'],
                    ':montantReste' => $Data[0]['MontantReste'],
                    ':uuidClientFourniture' => $Data[0]['clientFournisseurs'],
                    ':date' => $Data[0]['datetimepicker'],
                    ':typeVente' => 'ENGROS',
                    ':referenceVente' => $Data[0]['Reference'],
                    ':uuidBoutique' => $_SESSION['uuidBoutique']
                ]
            );

            $id_vente = $createVente['lastInsertId'];

            // ✅ Étape 3 : Insertion des lignes de vente et mise à jour du stock
            foreach ($Data as $vente) {
                $insertLigne = $this->insertion_update_simples(
                    "INSERT INTO `ligneVente`(`uuidVente`, `uuidArticle`, `quantite`, `prix_Engros_Detaillant`, `montant`) 
                     VALUES (:uuidVente, :uuidArticle, :quantite, :prix_Engros_Detaillant, :montant)",
                    [
                        ':uuidVente' => $id_vente,
                        ':uuidArticle' => $vente['articleId'],
                        ':quantite' => $vente['quantite'],
                        ':montant' => $vente['montant'],
                        ':prix_Engros_Detaillant' => $vente['prixEngros']
                    ]
                );

                $updateStock = $this->insertion_update_simples(
                    "UPDATE `article` SET `qantiteStockArticle` = `qantiteStockArticle` - :qantite WHERE `uuidArticle` = :uuid",
                    [
                        ':uuid' => $vente['articleId'],
                        ':qantite' => $vente['quantite']
                    ]
                );

                if (!$insertLigne || !$updateStock) {
                    $this->set_flash("Échec de l'enregistrement des lignes de vente.", 'danger');
                    $this->redirect("Ventes/Liste_vente");
                }
            }

            // ✅ Étape 4 : Paiement
            $paiement = $this->insertion_update_simples(
                "INSERT INTO `paiement`(`uuidVente`, `sommePayer`, `paiementDate`, `uuidBoutique`) 
                 VALUES (:uuidVente, :sommePayer, :paiementDate, :uuidBoutique)",
                [
                    ':uuidVente' => $id_vente,
                    ':sommePayer' => $Data[0]['MontantPayer'],
                    ':paiementDate' => $Data[0]['datetimepicker'],
                    ':uuidBoutique' => $_SESSION['uuidBoutique']
                ]
            );

            if ($createVente && $paiement) {
                $this->set_flash("Félicitations, la vente a été effectuée avec succès.", 'success');
            } else {
                $this->set_flash("Échec ! La vente n'a pas pu être enregistrée.", 'danger');
            }
            $this->redirect("Ventes/Liste_vente");
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur serveur : ' . $e->getMessage()]);
        }
    }
    public function payer_vente($data = [])
    {
        if ($data) {
            if (empty($data['datePaiement']) || empty($data['sommeRecu']) || empty($data['idVente'])) {
                $this->set_flash("les champs sont invalide", 'danger');
                $this->redirect("Ventes/Liste_vente");
            }
            if (!is_numeric($data['idVente']) || !is_numeric($data['sommeRecu'])) {
                $this->set_flash("les donnees doivent etre des numerique", 'danger');
                $this->redirect("Ventes/Liste_vente");
            }
            if (($data['sommeRestant']) < ($data['sommeRecu'])) {
                $this->set_flash("la montant restant doit être superieur ou egale au montant reçu", 'danger');
                $this->redirect("Ventes/Liste_vente");
            }
            $paiement = $this->insertion_update_simples(
                "INSERT INTO `paiement`(`uuidVente`, `sommePayer`, `paiementDate`, `description`,`uuidBoutique`) 
                VALUES (:uuidVente,:sommePayer,:paiementDate,:description,:uuidBoutique)",
                [
                    ':uuidVente' => $data['idVente'],
                    ':sommePayer' => $data['sommeRecu'],
                    ':paiementDate' => $data['datePaiement'],
                    ':description' => $data['description'],
                    ':uuidBoutique' => $_SESSION['uuidBoutique']
                ]
            );
            if ($paiement) {
                $sql = "UPDATE `vente` SET `MontantPayer`=`MontantPayer` + :sommeRecu,`MontantReste`=`MontantReste`- :sommeRecu WHERE `uuidVente`=:uuid";
                $params = [
                    ':uuid' => $data['idVente'],
                    ':sommeRecu' => $data['sommeRecu'],
                ];
                $updateVente = $this->insertion_update_simples($sql, $params);
                if ($updateVente) {
                    $this->set_flash("Paiement effectuer avec success", 'success');
                    $this->redirect("Ventes/Liste_vente");
                } else {
                    $this->set_flash("Echec du Paiement ", 'danger');
                    $this->redirect("Ventes/Liste_vente");
                }
            }
        } else {
            $this->set_flash("il n'existe pas de donnee", 'danger');
            $this->redirect("Ventes/Liste_vente");
        }
    }
    public function VenteDetailleEnregistrer($Data = [])
    {
        try {
            // Étape 1 : Vérification du stock pour chaque article
            foreach ($Data as $venteDetaille) {
                $stock = $this->FetchSelectWhere(
                    "qantiteStockArticle",
                    "article",
                    "uuidArticle = :uuid",
                    [':uuid' => $venteDetaille['articleId']]
                );

                $stockDisponible = intval($stock->qantiteStockArticle);
                $quantiteDemandee = intval($venteDetaille['quantite']);

                if ($stockDisponible < $quantiteDemandee) {
                    $this->set_flash("Stock insuffisant pour l'article sélectionné.", 'danger');
                    exit;
                }
            }
            echo $Data[0]['clientFournisseurs'];
            // ✅ Étape 2 : Insertion de la vente principale
            $createVenteDetaille = $this->insertion_update_simples_insert_id(
                "INSERT INTO `vente`(`referenceVente`, `typeVente`,`date`,`uuidClientFourniture`, `uuidBoutique`, `MontantPayer`, `MontantReste`, `montantTotal`) 
                 VALUES (:referenceVente, :typeVente, :dates,:uuidClientFourniture,:uuidBoutique, :montantPayer, :montantReste, :montantTotal)",
                [
                    ':montantTotal' => $Data[0]['montant_total'],
                    ':montantPayer' => $Data[0]['MontantPayer'],
                    ':montantReste' => $Data[0]['MontantReste'],
                    ':uuidClientFourniture' => $Data[0]['clientFournisseurs'],
                    ':dates' => $Data[0]['datetimepicker'],
                    ':typeVente' => 'DETAILLE',
                    ':referenceVente' => $Data[0]['Reference'],
                    ':uuidBoutique' => $_SESSION['uuidBoutique']
                ]
            );

            $id_vente = $createVenteDetaille['lastInsertId'];

            // ✅ Étape 3 : Insertion des lignes de vente et mise à jour du stock
            foreach ($Data as $lignesventeDetaille) {
                $insertLigne = $this->insertion_update_simples(
                    "INSERT INTO `ligneVente`(`uuidVente`, `uuidArticle`, `quantite`, `prix_Engros_Detaillant`, `montant`) 
                     VALUES (:uuidVente, :uuidArticle, :quantite, :prix_Engros_Detaillant, :montant)",
                    [
                        ':uuidVente' => $id_vente,
                        ':uuidArticle' => $lignesventeDetaille['articleId'],
                        ':quantite' => $lignesventeDetaille['quantite'],
                        ':montant' => $lignesventeDetaille['montant'],
                        ':prix_Engros_Detaillant' => $lignesventeDetaille['prixDetaillant']
                    ]
                );

                $updateStock = $this->insertion_update_simples(
                    "UPDATE `article` SET `qantiteStockArticle` = `qantiteStockArticle` - :qantite WHERE `uuidArticle` = :uuid",
                    [
                        ':uuid' => $lignesventeDetaille['articleId'],
                        ':qantite' => $lignesventeDetaille['quantite']
                    ]
                );

                if (!$insertLigne || !$updateStock) {
                    $this->set_flash("Échec de l'enregistrement des lignes de vente.", 'danger');
                    $this->redirect("Ventes/Liste_vente");
                }
            }

            // ✅ Étape 4 : Paiement
            $paiement = $this->insertion_update_simples(
                "INSERT INTO `paiement`(`uuidVente`, `sommePayer`, `paiementDate`, `uuidBoutique`) 
                 VALUES (:uuidVente, :sommePayer, :paiementDate, :uuidBoutique)",
                [
                    ':uuidVente' => $id_vente,
                    ':sommePayer' => $Data[0]['MontantPayer'],
                    ':paiementDate' => $Data[0]['datetimepicker'],
                    ':uuidBoutique' => $_SESSION['uuidBoutique']
                ]
            );

            if ($createVenteDetaille && $paiement) {
                $this->set_flash("Félicitations, la vente a été effectuée avec succès.", 'success');
            } else {
                $this->set_flash("Échec ! La vente n'a pas pu être enregistrée.", 'danger');
            }
            $this->redirect("Ventes/Liste_vente");
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur serveur : ' . $e->getMessage()]);
        }
    }
}
