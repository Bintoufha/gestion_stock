<?php
class ClientFournisseurs extends Controller
{
    public function index()
    {
        $this->view("clientFournisseur");
    }
    public function Ajouter_client_fournisseur()
    {
        $client = new ClientFournisseur();
        if (isset($_POST['valider'])) {
            $data = [
                'nomPrenom' => $_POST['nomPrenom'],
                'type' => $_POST['type'],
                'telephone' => $_POST['telephone']
            ];
            $client->enregistre_client_fournisseurs($data);
        }
        // else{
        //     $this->redirect('Logins/login');
        // }
    }
    public function Liste_client_fournisseur()
    {
        $client = new ClientFournisseur();
        $dataClientFournisseur = [];
        // Génération d'une référence unique
        $uuidBoutique = $_SESSION['uuidBoutique']; // ID de la boutique
        if ($_SESSION['role'] === "SuperAdmin") {
            $dataClientFournisseur = $client->SelectAllData("*", "clientFourniture");
        } else {
            $dataClientFournisseur = $client->FetchSelectWhere2("*", "clientFourniture", "uuidBoutique=:uuid", [':uuid' => $uuidBoutique]);
        }
        $this->view("clientFournisseur", [
            'dataClientFournisseur' => $dataClientFournisseur
        ]);
    }
    public function update($uuid)
    {
        $client_fournisseurs = new ClientFournisseur();
        if (isset($_POST["Modifier"])) {
            $client_fournisseurs->modification_client_fournisseurs([
                'uuid' => $uuid,
                "nomPrenom" => $_POST["nomPrenom"],
                "telephone" => $_POST["telephone"],
                "type" => $_POST["type"]
            ]);
        }
    }
    public function Supprimer_client_fournisseurs($uuid)
    {
        $user = new User();
        // Définir la requête de suppression et les paramètres
        $sql = "DELETE FROM clientFourniture WHERE uuidClientFourniture=:uuid";
        $params = [':uuid' => $uuid];
        $result = $user->insertion_update_simples($sql, $params);
        if ($result->rowCount() > 0) {
            $user->set_flash("Suppression réussie", 'success');
            $this->redirect('ClientFournisseurs/Liste_client_fournisseur');
        } else {
            $user->set_flash("Echec de la suppression", 'danger');
            $this->redirect('ClientFournisseurs/Liste_client_fournisseur');
        }
    }
}
