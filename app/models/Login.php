<?php
class Login extends model
{
    public function authentification($Data = [])
    {
        if ($this->isNotEmpty($Data)) {
            foreach ($Data as $key => $value) {
                $Data[$key] = htmlspecialchars(strip_tags($value)); // Sécuriser les données
            }
            $utilisateur = $this->FetchSelectWhere(
                '*',
                'utilisateurs',
                'email = :email',
                ['email' => $Data['email']]
            );
            if ($utilisateur) {
                // Comparer le mot de passe de l'utilisateur
                if (password_verify($Data['pwd'], $utilisateur->pwd)) {
                    // Stocker les informations de l'enseignant dans la session
                    $_SESSION['uuid'] = $utilisateur->uuidUtilisateurs;
                    $_SESSION['nomPrenom'] = $utilisateur->nomPrenom;
                    $_SESSION['pseudo'] = $utilisateur->pseudo;
                    $_SESSION['telephone'] = $utilisateur->telephone;
                    $_SESSION['email'] = $utilisateur->email;
                    $_SESSION['role'] = $utilisateur->role;
                    $_SESSION['uuidBoutique'] = $utilisateur->uuidBoutique;

                    // Redirection pour les enseignants
                    $this->redirect("Homes/home");
                //     return; // Sortir de la fonction après redirection
                }else {
                    $this->set_flash("Mot de passe incorrect'! verifier s'il vous plait", 'danger');
                    $this->redirect('Logins');
                }
            } else {
                $this->set_flash("l'email incorrect ou compte desactiver'! verifier s'il vous plait", 'danger');
                $this->redirect('Logins');
            }
        } else {
            $this->set_flash("les champs sont vide! verifier s'il vous plait", 'danger');
            $this->redirect('Logins');
        }
    }
}
