<?php
class Boutiques extends  Controller
{
  public  function  index()
  {
    $this->view('boutique');
  }

  public function ListeBoutique()
  {
    $boutique = new Boutique();
    if (isset($_POST['submit'])) {
      $boutique->AjouterBoutique(["nomboutique", "addresse", "telephone"]);
    }
    // Appel à la méthode de recuperation 
    $datas = $boutique->SelectAllData("*", "boutique");
    $this->view("boutique", ['datas' => $datas]);
  }
  public function modifier($id)
  {
    $boutique = new Boutique();
    // Récupérer les données de la boutique à modifier
    $updateboutique = $boutique->FetchSelectWhere("*", "boutique", "uuidBoutique=:uuid", ["uuid" => $id]);
    $this->view("boutique", ['updateboutique' => $updateboutique]);
  }
  public function update_boutique($uuid)
  {
    $boutique = new Boutique();
    if (isset($_POST["Modifier"])) {
      $boutique->modification_boutique([
        'uuid' => $uuid,
        'nomboutique' => $_POST['nomboutique'],
        'lieu' => $_POST['addresse'],
        'telephone' => $_POST['telephone']
      ]);
    }
  }
  public function Supprimer_boutique($uuid)
  {
    $boutique = new Boutique();
    // Définir la requête de suppression et les paramètres
    $sql = 'DELETE FROM boutique WHERE uuidBoutique=:uuid';
    $params = [':uuid' => $uuid];
    $result = $boutique->insertion_update_simples($sql, $params);
    if ($result->rowCount() > 0) {
      $boutique->set_flash("Suppression réussie", 'success');
      $this->redirect('Boutiques/ListeBoutique');
    } else {
      $boutique->set_flash("Echec de la suppression de la boutique", 'danger');
      $this->redirect('Boutiques/ListeBoutique');
    }
  }
}
