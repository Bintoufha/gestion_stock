<?php
class Boutique extends model
{
    public function AjouterBoutique($Data = [])
    {
        if ($this->VerifyFieldsRegex($Data)) {
            $this->e(extract($_POST));
            $AddBoutique = $this->insertion_update_simples(
                'INSERT INTO `boutique`
            (`nomBoutique`, `lieu`, `telephone`) VALUES (:nomBoutique,:lieu,:telephone)',
                [
                    ":nomBoutique" => $nomboutique,
                    ":lieu" => $addresse,
                    ":telephone" => $telephone
                ]
            );
            if ($AddBoutique == true) {
                $this->set_flash("Félicitation, vous venez de créer une nouvelle boutique", 'success');
                $this->redirect('Boutiques/ListeBoutique');
            } else {
                $this->set_flash("Echec de l'insertion des données", 'danger');
                $this->redirect('Boutiques/ListeBoutique');
            }
            // echo "Des données invalides ou des champs vides ont été détectés.";
        } else {
            $this->set_flash("Les données ne sont pas valides! verifier s'il vous plait", 'danger');
        }
    }
    public function modification_boutique($data)
    {
        $sql = "UPDATE `boutique` SET `nomBoutique`=:nomBoutique,`lieu`=:lieu,`telephone`=:telephone WHERE `uuidBoutique`=:uuid";
        $params = [
            ':nomBoutique' => $data['nomboutique'],
            ':lieu' => $data['lieu'],
            ':telephone' => $data['telephone'],
            ':uuid' => $data['uuid']
        ];
        $BoutiqueModifier = $this->insertion_update_simples($sql, $params);
        if ($BoutiqueModifier == true) {
            $this->set_flash("Modification faite avec succès", 'info');
            $this->redirect('Boutiques/ListeBoutique');
        }else{
            $this->set_flash("Echec de la modification de la boutique", 'danger');
            $this->redirect('Boutiques/ListeBoutique');
        }
    }
}
