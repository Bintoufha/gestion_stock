<?php
class User extends model
{
    public function AjouterUtilisateur($Data = [])
    {
        $pwdHash = password_hash($Data['pwd'], PASSWORD_DEFAULT);
        if ($this->isNotEmpty($Data)) {
            // Validez chaque champ explicitement
            foreach ($Data as $key => $value) {
                $Data[$key] = htmlspecialchars(strip_tags($value)); // Sécuriser les données
            }
            // Vérification du format (exemple : e-mail)
            if (isset($Data['email']) && !$this->isValidEmail($Data['email'])) {
                $this->set_flash("L'adresse e-mail est invalide.! verifier s'il vous plait", 'danger');
                $this->redirect('Users/Liste_utilisateur');
            }
            // Vérification du numero de telephone
            if (isset($Data['telephone']) && !$this->isValidPhoneNumber($Data['telephone'])) {
                $this->set_flash("Numero de telephone est invalide.! verifier s'il vous plait", 'danger');
                $this->redirect('Users/Liste_utilisateur');
            }
            $addUser = $this->insertion_update_simples(
                "INSERT INTO `utilisateurs`(`nomPrenom`, `pseudo`, `telephone`, `email`, `pwd`, `role`,`uuidBoutique`) 
            VALUES (:nomPrenom,:pseudo,:telephone,:email,:pwd,:roles,:uuidBoutique)",
                [
                    ':nomPrenom' => $Data['nomPrenom'],
                    ':pseudo' => $Data['pseudo'],
                    ':telephone' => $Data['telephone'],
                    ':email' => $Data['email'],
                    ':pwd' => $pwdHash,
                    ':roles' => $Data['role'],
                    ':uuidBoutique' => $Data['boutique'],
                ]
            );
            if ($addUser == true) {
                $this->set_flash("Félicitation, utilisateurs a été enregistre avec success", 'success');
                $this->redirect("Users/Liste_utilisateur");
            } else {
                $this->set_flash("Echec de l'enregistrement de l'utilisateur", 'success');
                $this->redirect("Users/Liste_utilisateur");
            }
        } else {
            $this->set_flash("Des données invalides ou des champs vides ont été détectés.! verifier s'il vous plait", 'danger');
            $this->redirect('Users/Liste_utilisateur');
        }
    }
    public function modification_utilisateur($data)
    {
        $sql = "UPDATE `utilisateurs` SET `nomPrenom`=:nomPrenom,`pseudo`=:pseudo,`telephone`=:telephone,
        `email`=:email,`role`=:roles WHERE  `uuidUtilisateurs`=:uuid";
        $params = [
            ':nomPrenom' => $data['nomPrenom'],
            ':pseudo' => $data['pseudo'],
            ':telephone' => $data['telephone'],
            ':email' => $data['email'],
            ':roles' => $data['role'],
            ':uuid' => $data['uuid'] // Ajout de l'ID
        ];
        // Exécution de la requête pour mettre à jour de utilisateur
        $modifier_user = $this->insertion_update_simples($sql, $params);

        if ($modifier_user) {
            $this->set_flash("Félicitation, utilisateurs a été modifier avec success", 'info');
            $this->redirect("Users/Liste_utilisateur");
        } else {
            $this->set_flash("Echec, utilisateurs n'a pas pu etre modifier", 'danger');
            $this->redirect("Users/Liste_utilisateur");
        }
    }
}
