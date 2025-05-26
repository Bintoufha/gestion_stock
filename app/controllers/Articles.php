<?php
class Articles extends Controller
{
    public function index()
    {
        $this->view("listeArticle");
    }

    public function AjouterArticle()
    {
        $article = new Article();
        if (isset($_POST['submit'])) {
            $data = [
                "article" => $_POST["article"] ?? '',
                "categorie" => $_POST["categorie"] ?? '',
                "Seuilrupture" => $_POST["Seuilrupture"] ?? '',
                "prixUnitaire" => $_POST["prixUnitaire"] ?? '',
                "prixEngros" => $_POST["prixEngros"] ?? '',
                "prixDetaillant" => $_POST["prixDetaillant"] ?? '',
                "quantite" => $_POST["quantite"] ?? ''
            ];
            $article->addArticle($data);
            exit;
        }
        $this->view("article");
    }
    public function Liste_article()
    {
        $article = new Article();
        $uuidBoutique = $_SESSION['uuidBoutique']; // ID de la boutique
        $dataArticle =[];
        if ($_SESSION['role'] === "SuperAdmin") {
            $dataArticle = $article->SelectAllData("*", "article");
          } else {
            $dataArticle = $article->FetchSelectWhere2("*", "article", "uuidBoutique=:uuid", [':uuid' => $uuidBoutique]);
          }
        //$dataArticle = $article->SelectAllData("*", "article");
        $this->view("listeArticle", ['dataArticle' => $dataArticle]);
    }
    public function Supprimer_article($uuid)
    {
        $article = new Article();
        // Définir la requête de suppression et les paramètres
        $sql = "DELETE FROM `article` WHERE uuidArticle=:uuid";
        $params = [':uuid' => $uuid];
        $result = $article->insertion_update_simples($sql, $params);
        if ($result->rowCount() > 0) {
            $article->set_flash("Suppression réussie", 'success');
            $this->redirect("Articles/Liste_article");
        } else {
            $article->set_flash("Echec de la suppression de l'article", 'danger');
            $this->redirect("Articles/Liste_article");
        }
    }
    public function modifier($uuid)
    {
        $article = new Article();
        // Récupérer les données de l'article à modifier
        $updateArticle = $article->FetchSelectWhere("*", "article", "uuidArticle=:uuid", ["uuid" => $uuid]);
        $this->view("article", ['updateArticle' => $updateArticle]);
    }
    public function update_article($uuid)
    {
        $article = new Article();
        if (isset($_POST["Modifier"])) {
            $article->modification_article([
                'uuid' => $uuid,
                "article" => $_POST["article"] ?? '',
                "categorie" => $_POST["categorie"] ?? '',
                "Seuilrupture" => $_POST["Seuilrupture"] ?? '',
                "prixUnitaire" => $_POST["prixUnitaire"] ?? '',
                "prixEngros" => $_POST["prixEngros"] ?? '',
                "prixDetaillant" => $_POST["prixDetaillant"] ?? '',
                "quantite" => $_POST["quantite"] ?? ''
            ]);
        }
    }
    public function detaille_article($uuid)
    {
        $article = new Article();
        $detaille_article = $article->FetchSelectWhere("*", "article", "uuidArticle= :uuid", [":uuid" => $uuid]);
        $this->view("detailleArticle", ['detaille_article' => $detaille_article]);
    }
    public function approvisionner_article($uuid)
    {
        $article = new Article();
        if (isset($_POST["Modifier"])) {
            $article->approvisionner_stock([
                'uuid' => $uuid,
                "Qapprovisionnement" => $_POST["Qapprovisionnement"],
                "Stock" => $_POST["Stock"],
            ]);
        }
        // $detaille_article = $article->FetchSelectWhere("*", "article", "uuidArticle= :uuid", [":uuid" => $uuid]);
        // $this->view("ApproByArticle");
    }
}
