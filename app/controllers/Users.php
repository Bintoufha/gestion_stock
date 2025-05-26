<?php
class Users extends Controller
{
    public function index()
    {
        $this->view("user");
    }
    public function Ajouter_utilisateurs()
    {
        $user = new User();
        $data = [
            "nomPrenom" => $_POST["nomPrenom"] ?? '',
            "telephone" => $_POST["telephone"] ?? '',
            "email" => $_POST["email"] ?? '',
            "pwd" => $_POST["pwd"] ?? '',
            "role" => $_POST["role"] ?? '',
            "boutique" => $_POST["boutique"] ?? '',
            "pseudo" => $_POST["pseudo"] ?? ''
        ];
        $user->AjouterUtilisateur($data);
    }
    public function Liste_utilisateur()
    {

        $user = new User();
        $boutique = new Boutique();
        $uuid = $_SESSION['uuidBoutique'];
        $dataBoutiques = [];

        // Gestion des rôles
        if ($_SESSION['role'] === "SuperAdmin") {
            $dataBoutiques = $boutique->SelectAllData("*", "boutique");
        }elseif ($_SESSION['role'] === "Admin") {
            $dataBoutiques = $boutique->FetchSelectWhere2("*", "boutique", "uuidBoutique=:uuid", [":uuid" => $uuid]);

        }
        // Récupération des utilisateurs
        $dataUser = $user->SelectAllData("*", "utilisateurs");
        // Rendu de la vue
        $this->view("user", [
            'dataBoutiques' => $dataBoutiques,
            'dataUser' => $dataUser
        ]);
    }
    public function update($uuid)
    {
        $user = new User();
        if (isset($_POST["Modifier"])) {
            $user->modification_utilisateur([
                'uuid' => $uuid,
                "nomPrenom" => $_POST["nomPrenom"],
                "telephone" => $_POST["telephone"],
                "email" => $_POST["email"],
                "role" => $_POST["role"],
                "pseudo" => $_POST["pseudo"]
            ]);
        }
    }
    public function desactiver_utilisateur($uuid)
    {
        $user = new User();
        // Définir la requête de suppression et les paramètres
        $sql = "UPDATE utilisateurs SET `status` = 'false' WHERE uuidUtilisateurs=:uuid";
        $params = [':uuid' => $uuid];
        $result = $user->insertion_update_simples($sql, $params);
        if ($result->rowCount() > 0) {
            $user->set_flash("Cet utilisateur à été desactive ", 'info');
            $this->redirect("Users/Liste_utilisateur");
        } else {
            $user->set_flash("Echec de la desactivation", 'danger');
            $this->redirect("Users/Liste_utilisateur");
        }
    }
    public function activer_utilisateur($uuid)
    {
        $user = new User();
        // Définir la requête de suppression et les paramètres
        $sql = "UPDATE utilisateurs SET `status` = 'true' WHERE uuidUtilisateurs=:uuid";
        $params = [':uuid' => $uuid];
        $result = $user->insertion_update_simples($sql, $params);
        if ($result->rowCount() > 0) {
            $user->set_flash("Cet utilisateur à été active ", 'info');
            $this->redirect("Users/Liste_utilisateur");
        } else {
            $user->set_flash("Echec de l'activation", 'danger');
            $this->redirect("Users/Liste_utilisateur");
        }
    }
    public function detaille_utilisateur($uuid)
    {
        $user = new User();
        $detaille_user = $user->FetchSelectWhere("*", "utilisateurs", "uuidUtilisateurs= :uuid", [":uuid" => $uuid]);
        $this->view("detaille", ['detaille_user' => $detaille_user]);
    }
    public function Supprimer_utilisateur($uuid)
    {
        $user = new User();
        // Définir la requête de suppression et les paramètres
        $sql = "DELETE FROM utilisateurs WHERE uuidUtilisateurs=:uuid AND `status` = 'true'";
        $params = [':uuid' => $uuid];
        $result = $user->insertion_update_simples($sql, $params);
        if ($result->rowCount() > 0) {
            $user->set_flash("Suppression réussie", 'success');
            $this->redirect("Users/Liste_utilisateur");
        } else {
            $user->set_flash("Echec de la suppression de l'utilisateur car il est desactive", 'danger');
            $this->redirect("Users/Liste_utilisateur");
        }
    }
    public function deconnexion()
    {
        // Détruire toutes les données de session
        session_unset(); // Libérer toutes les variables de session
        session_destroy(); // Détruire la session

        // Rediriger vers la page de connexion ou une autre page appropriée
        $this->redirect("Logins/login");
    }
}
