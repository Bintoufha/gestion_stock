<?php
class Ventes extends  Controller
{
  public  function  index()
  {
    $this->view('listeVente');
  }
  public function Liste_vente()
  {
    $vente = new Vente();
    $article = new Article();
    $client = new ClientFournisseur();
    $dataArticle = [];
    $dataClientFournisseur = [];
    $dataVente = [];
    // Génération d'une référence unique
    $uuidBoutique = $_SESSION['uuidBoutique']; // ID de la boutique
    $timestamp = time(); // Horodatage
    $uniqueId = uniqid(); // Identifiant unique basé sur microsecondes
    $reference = "BTQ" . $uuidBoutique . "_" . "VENTE_N°_" . $uniqueId;
    if ($_SESSION['role'] === "SuperAdmin") {
      $dataArticle = $article->SelectAllData("*", "article");
      $dataClientFournisseur = $client->SelectAllData("*", "clientFourniture");
      $dataVente = $vente->SelectAllData("*", "vente");
    } else {
      $dataArticle = $article->FetchSelectWhere2("*", "article", "uuidBoutique=:uuid", [':uuid' => $_SESSION['uuidBoutique']]);
      $dataClientFournisseur = $client->FetchSelectWhere2("*", "clientFourniture", "uuidBoutique=:uuid", [':uuid' => $_SESSION['uuidBoutique']]);
      $dataVente = $vente->FetchSelectWhere2(
        "*",
        "vente INNER JOIN clientFourniture ON clientFourniture.uuidClientFourniture = vente.uuidClientFourniture
          INNER JOIN boutique ON boutique.uuidBoutique = vente.uuidBoutique ",
        "vente.uuidBoutique=:uuid",
        [':uuid' => $_SESSION['uuidBoutique']]
      );
    }
    // var_dump($dataVente);
    // exit;
    $this->view("listeVente", [
      'dataArticle' => $dataArticle,
      'reference' => $reference,
      'dataVente' => $dataVente,
      'dataClientFournisseur' => $dataClientFournisseur
    ]);
  }
  public function ArticleDetails()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $articleId = $_POST['articleId'] ?? null;
      $articleIds = (int)$articleId;
      if ($articleIds) {
        $article = new Article();
        $articleDetails = $article->FetchSelectWhere("*", "article", "uuidArticle=:uuid", ['uuid' => $articleIds]);
        if ($articleDetails) {
          echo json_encode($articleDetails);
        } else {
          error_log("Article introuvable");
          echo json_encode(['error' => 'Article introuvable.']);
        }
      } else {
        error_log("Aucun article ID fourni");
        echo json_encode(['error' => 'Aucun identifiant d\'article fourni.']);
      }
    }
  }
  public function EnregistrerVente()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['articles'])) {
      $vente = new Vente();
      $data = json_decode($_POST['articles'], true);

      $vente->VenteEnregistrer($data);
    }
  }
  public function Supprimer_vente($uuid)
  {
    $vente = new Vente();
    // Définir la requête de suppression et les paramètres
    $sql = "DELETE FROM vente WHERE uuidVente=:uuid AND `MontantReste` = 0";
    $params = [':uuid' => $uuid];
    $result = $vente->insertion_update_simples($sql, $params);
    if ($result->rowCount() > 0) {
      $vente->set_flash("Suppression effectuer avec success", 'success');
      $this->redirect("Ventes/Liste_vente");
    } else {
      $vente->set_flash("Echec de la suppression de la vente! le payement n'est pas au complet", 'danger');
      $this->redirect("Ventes/Liste_vente");
    }
  }
  public function details_vente($uuid)
  {
    $vente = new Vente();
    $Ventedata = $vente->FetchSelectWhere("*", "vente INNER JOIN clientFourniture ON clientFourniture.uuidClientFourniture = vente.uuidClientFourniture
          INNER JOIN boutique ON boutique.uuidBoutique = vente.uuidBoutique", "uuidVente=:uuid", [':uuid' => $uuid]);
    $dataLigneVente = $vente->FetchSelectWhere2(
      "*",
      "ligneVente INNER JOIN article ON article.uuidArticle=ligneVente.uuidArticle",
      "uuidVente=:uuid",
      [':uuid' => $uuid]
    );
    $this->view(
      'detailleVente',
      [
        'Ventedata' => $Ventedata,
        'dataLigneVente' => $dataLigneVente
      ]
    );
  }
  public function update_vente($uuid)
  {
    $vente = new Vente();
    $article = new Article();
    $client = new ClientFournisseur();

    // Récupération des données
    $dataArticle = $article->FetchSelectWhere2("*", "article", "uuidBoutique=:uuid", [
      ':uuid' => $_SESSION['uuidBoutique']
    ]);

    $dataClientFournisseur = $client->FetchSelectWhere2("*", "clientFourniture", "uuidBoutique=:uuid", [
      ':uuid' => $_SESSION['uuidBoutique']
    ]);

    $Ventedata = $vente->FetchSelectWhere(
      "*",
      "vente 
        INNER JOIN clientFourniture ON clientFourniture.uuidClientFourniture = vente.uuidClientFourniture
        INNER JOIN boutique ON boutique.uuidBoutique = vente.uuidBoutique",
      "uuidVente=:uuid",
      [':uuid' => $uuid]
    );

    $dataLigneVente = $vente->FetchSelectWhere2(
      "*",
      "ligneVente 
        INNER JOIN article ON article.uuidArticle = ligneVente.uuidArticle",
      "uuidVente = :uuid",
      [':uuid' => $uuid]
    );

    // Si c’est une requête AJAX, on retourne du JSON
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

      // Génère la vue HTML partielle (contenu du modal) via output buffering
      ob_start();
      $this->view('modifierVente', [ // à adapter à ton chemin réel
        'Ventedata' => $Ventedata,
        'dataArticle' => $dataArticle,
        'dataClientFournisseur' => $dataClientFournisseur
      ]);
      $html = ob_get_clean();

      // Prépare la liste d'articles pour JavaScript
      $articles = [];

      foreach ($dataLigneVente as $ligne) {
        $articles[] = [
          'uuidArticle' => $ligne->uuidArticle,
          'nomArticle' => $ligne->nomArticle,
          'quantite' => $ligne->quantite,
          'prixEngros' => $ligne->prixEngros,
        ];
      }

      // Envoie la réponse JSON
      header('Content-Type: application/json');
      echo json_encode([
        'view' => $html,
        'articles' => $articles,
        'vente' => $Ventedata
      ]);
      return;
    }

    // Sinon, on rend la vue classique
    $this->view('modifierVente', [
      'Ventedata' => $Ventedata,
      'dataLigneVente' => $dataLigneVente,
      'dataArticle' => $dataArticle,
      'dataClientFournisseur' => $dataClientFournisseur
    ]);
  }

  public function detaille_paiement_vente($uuid)
  {
    $vente = new Vente();
    $Ventedata = $vente->FetchSelectWhere("uuidVente,referenceVente,MontantReste", "vente", "uuidVente=:uuid", [':uuid' => $uuid]);
    $this->view(
      'paiementDetaille',
      [
        'Ventedata' => $Ventedata,
      ]
    );
  }
  public function paiement_vente()
  {
    if (isset($_POST['valider'])) {
      $vente = new Vente();
      $data = [
        'datePaiement' => $_POST['datePaiement'],
        'sommeRecu' => (int)($_POST['sommeRecu']),
        'sommeRestant' => (int)($_POST['sommeRestant']),
        'description' => $_POST['description'],
        'idVente' => (int)($_POST['idVente'])
      ];
      $vente->payer_vente($data);
    }
  }
  public function paiement_historique($uuid)
  {
    $vente = new Vente();
    $paiementdata = $vente->FetchSelectWhere2(
      "*",
      "paiement INNER JOIN vente ON vente.uuidVente = paiement.uuidVente",
      "paiement.uuidVente=:uuid",
      [':uuid' => $uuid]
    );
    $this->view(
      'historiquePaiement',
      [
        'paiementdata' => $paiementdata,
      ]
    );
  }
  // public function modifierVente()
  // {
  //   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['venteData'])) {
  //     $vente = new Vente();
  //     $dataVente = json_decode($_POST['venteData'], true);
  //     if (!isset($dataVente['uuidVente'])) {
  //       http_response_code(400);
  //       echo json_encode(['error' => 'Données invalides.']);
  //       return;
  //     };
  //     // Récupère les anciens articles
  //     $anciensArticles = $vente->FetchSelectWhere2(
  //       "ligneVente.uuidArticle, ligneVente.quantite",
  //       "ligneVente",
  //       "uuidVente=:uuid",
  //       [':uuid' => $dataVente['uuidVente']]
  //     );

  //     // Restaurer le stock des anciens articles
  //     // foreach ($anciensArticles as $article) {
  //     //   $vente->ajusterStockGenerique("article", "qantiteStockArticle", "uuidArticle", $article['uuidArticle'],);
  //     // }
  //     //$vente->modifier_vente_et_ligneVente($dataVente);
  //   }
  //   // // Récupère les anciens articles pour ajuster le stock
  //   // $anciensArticles = $this->VenteModel->getArticlesParVente($uuidVente);

  //   // // Restaurer le stock des anciens articles
  //   // foreach ($anciensArticles as $article) {
  //   //     $this->VenteModel->ajusterStock($article['uuidArticle'], $article['quantite'], 'ajouter');
  //   // }

  //   // // Supprimer les anciennes lignes
  //   // $this->VenteModel->supprimerLignesVente($uuidVente);

  //   // // Insérer les nouvelles lignes et ajuster le stock
  //   // foreach ($articles as $article) {
  //   //     $this->VenteModel->ajouterLigneVente($uuidVente, $article);
  //   //     $this->VenteModel->ajusterStock($article['uuidArticle'], $article['quantite'], 'retirer');
  //   // }

  //   // // Mise à jour de la vente
  //   // $this->VenteModel->modifierVente($uuidVente, [
  //   //     'uuidClientFourniture' => $client,
  //   //     'montantTotalVente' => $total,
  //   //     'montantPayerVente' => $payer,
  //   //     'resteVente' => $reste,
  //   //     'rembourserVente' => $rembourser
  //   // ]);


  // }
  public function modifierVente()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $venteData = json_decode($_POST['venteData'], true);

      if (!$venteData || !isset($venteData['uuidVente']) || !is_array($venteData['articles'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Données invalides.']);
        return;
      }

      $vente = new Vente();
      //$ligneVenteModel = new LigneVenteModel();
      $Articles = new Article();
      $uuidVente = $venteData['uuidVente'];
      $articlesData = $venteData['articles'];

      try {
        // 1. Récupérer les anciennes lignes de vente
        $anciennesLignes = $vente->FetchSelectWhere2("*", "ligneVente", "uuidVente=:uuid", [':uuid' => $uuidVente]);
        $anciennesLignesMap = [];
        foreach ($anciennesLignes as $ligne) {
          $anciennesLignesMap[$ligne->uuidArticle] = $ligne;
        }

        // 2. Suivi des articles traités
        $articlesTraites = [];
        foreach ($articlesData as $article) {
          $uuidArticle = $article['uuidArticle'];
          $quantite = intval($article['quantite']);
          $prixEngros = $article['prix'];
          $montant = floatval($article['montant']);

          $articlesTraites[$uuidArticle] = true;

          // Stock actuel
          $stockActuelObj = $Articles->FetchSelectWhere("qantiteStockArticle", "article", "uuidArticle=:uuid", [':uuid' => $uuidArticle]);
          $stockActuel = intval($stockActuelObj->qantiteStockArticle);

          if (isset($anciennesLignesMap[$uuidArticle])) {
            // Article existant : mise à jour si nécessaire
            $ancienneQuantite = intval($anciennesLignesMap[$uuidArticle]->quantite);
            if ($ancienneQuantite != $quantite) {
              $difference = $quantite - $ancienneQuantite;

              if ($difference > 0 && $stockActuel < $difference) {
                throw new Exception("Stock insuffisant pour l'article (ajout de quantité).");
              }

              // Ajustement stock
              if ($difference > 0) {
                $vente->insertion_update_simples(
                  "UPDATE article SET qantiteStockArticle = qantiteStockArticle - :quantite WHERE uuidArticle = :uuid",
                  ['quantite' => $difference, 'uuid' => $uuidArticle]
                );
              } elseif ($difference < 0) {
                $vente->insertion_update_simples(
                  "UPDATE article SET qantiteStockArticle = qantiteStockArticle + :quantite WHERE uuidArticle = :uuid",
                  ['quantite' => abs($difference), 'uuid' => $uuidArticle]
                );
              }

              // Mise à jour ligneVente
              $vente->insertion_update_simples(
                "UPDATE ligneVente SET quantite = :quantite, montant = :montant WHERE uuidVente = :uuidVente AND uuidArticle = :uuidArticle",
                [
                  'quantite' => $quantite,
                  'montant' => $montant,
                  'uuidVente' => $uuidVente,
                  'uuidArticle' => $uuidArticle
                ]
              );
            }
          } else {
            echo 'je suis ici';
            // Nouvel article : insertion
            if ($stockActuel < $quantite) {
              $vente->set_flash("Stock insuffisant pour le nouvel article.", "danger");
              $this->redirect("Ventes/Liste_vente");
            }

            // Diminution stock
            $vente->insertion_update_simples(
              "UPDATE article SET qantiteStockArticle = qantiteStockArticle - :quantite WHERE uuidArticle = :uuid",
              ['quantite' => $quantite, 'uuid' => $uuidArticle]
            );

            // Insertion ligneVente
            $vente->insertion_update_simples(
              "INSERT INTO ligneVente (uuidVente, uuidArticle, quantite, prixEngros, montant)
                     VALUES (:uuidVente, :uuidArticle, :quantite, :prixEngros, :montant)",
              [
                'uuidVente' => $uuidVente,
                'uuidArticle' => $uuidArticle,
                'quantite' => $quantite,
                'prixEngros' => $prixEngros,
                'montant' => $montant
              ]
            );
          }
        }

        // 3. Suppression des anciens articles non inclus dans les données reçues
        foreach ($anciennesLignesMap as $ancienUuidArticle => $ancienneLigne) {
          if (!isset($articlesTraites[$ancienUuidArticle])) {
            $vente->insertion_update_simples(
              "UPDATE article SET qantiteStockArticle = qantiteStockArticle + :quantite WHERE uuidArticle = :uuid",
              [
                'quantite' => $ancienneLigne->quantite,
                'uuid' => $ancienUuidArticle
              ]
            );

            $vente->insertion_update_simples(
              "DELETE FROM ligneVente WHERE uuidVente = :uuidVente AND uuidArticle = :uuidArticle",
              [
                'uuidVente' => $uuidVente,
                'uuidArticle' => $ancienUuidArticle
              ]
            );
          }
        }
        // 4. Mettre à jour la vente principale
        $vente->insertion_update_simples(
          "UPDATE `vente` SET `MontantPayer`=:payer,`MontantReste`=:reste,`montantTotal`=:total WHERE `uuidVente`=:uuid",
          [
            'uuid' => $uuidVente,
            'total' => floatval($venteData['total']),
            'payer' => floatval($venteData['payer']),
            'reste' => floatval($venteData['total']) - floatval($venteData['payer'])
          ]
        );
        $vente->set_flash("Vente modifiée avec succès.", "success");
        $this->redirect("Ventes/Liste_vente");
      } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Erreur serveur : ' . $e->getMessage()]);
      }
    } else {
      http_response_code(405);
      echo json_encode(['error' => 'Méthode non autorisée.']);
    }
  }
}
