<?php
class ClientFournisseur extends model{
    public function enregistre_client_fournisseurs($Data=[]){
        if ($this->isNotEmpty($Data)) {
            foreach ($Data as $key => $value) {
                $Data[$key] = htmlspecialchars(strip_tags($value)); // Sécuriser les données
            }
            // Vérification du numero de telephone
            if (isset($Data['telephone']) && !$this->isValidPhoneNumber($Data['telephone'])) {
                $this->set_flash("Numero de telephone est invalide.! verifier s'il vous plait", 'danger');
                $this->redirect('ClientFournisseurs/Liste_client_fournisseur');
            }
            if (isset($Data['telephone']) && !$this->isUniquePhoneNumber($Data['telephone'],"clientFourniture","telephone")) {
                $this->set_flash("il existe deja un numero de telephone qui est identique a la votre.! verifier s'il vous plait", 'danger');
                $this->redirect('ClientFournisseurs/Liste_client_fournisseur');
            }
            $add_client = $this->insertion_update_simples(
                "INSERT INTO `clientFourniture`(`nomPrenom`, `typeClientFournisseur`,`telephone`, `uuidBoutique`) 
                VALUES (:nomPrenom,:typeClientFournisseur,:telephone,:uuidBoutique)",
                [
                    ':nomPrenom' => $Data['nomPrenom'],
                    ':typeClientFournisseur' => $Data['type'],
                    ':telephone' => $Data['telephone'],
                    ':uuidBoutique' => $_SESSION['uuidBoutique']
                ]
            );
            if ($add_client == true) {
                $this->set_flash("Félicitation, enregistrement à été effectuer avec success", 'success');
                $this->redirect('ClientFournisseurs/Liste_client_fournisseur');
            } else {
                $this->set_flash("Echec de l'enregistrement", 'success');
                $this->redirect('ClientFournisseurs/Liste_client_fournisseur');
            }
        }else{
            $this->set_flash("Des données invalides ou des champs vides ont été détectés.! verifier s'il vous plait", 'danger');
            $this->redirect('ClientFournisseurs/Liste_client_fournisseur');
        }

    } 
    public function modification_client_fournisseurs($data)
    {
        $sql = "UPDATE `clientFourniture` SET `nomPrenom`=:nomPrenom,`typeClientFournisseur`=:typeClientFournisseur,
        `telephone`=:telephone WHERE `uuidClientFourniture`=:uuids ";
        $params = [
            ':nomPrenom' => $data['nomPrenom'],
            ':telephone' => $data['telephone'],
            ':typeClientFournisseur' => $data['type'],
            ':uuids' => $data['uuid'] // Ajout de l'ID
        ];
        // Exécution de la requête pour mettre à jour de utilisateur
        $modifier_client = $this->insertion_update_simples($sql, $params);

        if ($modifier_client) {
            $this->set_flash("Félicitation,la modification à été faites avec success", 'info');
            $this->redirect('ClientFournisseurs/Liste_client_fournisseur');
        } else {
            $this->set_flash("Echec de la modification", 'danger');
            $this->redirect('ClientFournisseurs/Liste_client_fournisseur');
        }
    }
}
?>