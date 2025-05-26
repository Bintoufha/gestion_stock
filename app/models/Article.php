<?php

class Article extends model
{
    public function addArticle($Data = [])
    {
        if ($this->isNotEmpty($Data)) {
            foreach ($Data as $key => $value) {
                $Data[$key] = htmlspecialchars(strip_tags($value)); // Sécuriser les données
            }
            if (
                $Data['prixUnitaire'] < 0 || $Data['prixEngros'] < 0 || $Data['prixDetaillant'] < 0 ||
                $Data['Seuilrupture'] < 0 || $Data['quantite'] < 0
            ) {
                $this->set_flash("les prix ne peuvent pas etre de nombre negative! verifier s'il vous plait", 'danger');
                $this->redirect('Articles/Liste_article');
            }
            if ($Data['prixUnitaire'] > $Data['prixEngros'] || $Data['prixEngros'] > $Data['prixDetaillant']) {
                echo 'le prix sont incorrect';
                $this->set_flash("le prix unitaire doit etre inferieur au prix engros et le prix engros doit etre inferieur au prix detaillant ", 'danger');
                $this->redirect('Articles/Liste_article');
            }
            $addArticle = $this->insertion_update_simples(
                "INSERT INTO `article`(`nomArticle`, `categorieArticle`, `prixUnitaireArticle`,`prixEngrosArticle`, 
                `prixDetaillantArticle`, `qantiteStockArticle`, `seuil`,`uuidBoutique`) VALUES (:nomArticle,:categorieArticle,:prixUnitaireArticle,
                    :prixEngrosArticle,:prixDetaillantArticle,:qantiteStockArticle,:seuil,:uuidBoutique)",
                [
                    ':nomArticle' => $Data['article'],
                    ':categorieArticle' => $Data['categorie'],
                    ':prixUnitaireArticle' => $Data['prixUnitaire'],
                    ':prixEngrosArticle' => $Data['prixEngros'],
                    ':prixDetaillantArticle' => $Data['prixDetaillant'],
                    ':qantiteStockArticle' => $Data['quantite'],
                    ':seuil' => $Data['Seuilrupture'],
                    ':uuidBoutique' => $_SESSION['uuidBoutique']
                ]
            );
            if ($addArticle == true) {
                $this->set_flash("Félicitation, l'article a été enregistre avec success", 'success');
                $this->redirect("Articles/Liste_article");
            } else {
                $this->set_flash("Echec de l'enregistrement de l'utilisateur", 'danger');
                $this->redirect("Articles/Liste_article");
            }
        } else {
            $this->set_flash("Le formulaire n'est pas valide", 'danger');
            $this->redirect("Articles/Liste_article");
        }
    }
    public function modification_article($data)
    {
        $sql = "UPDATE `article` SET `nomArticle`=:nomArticle,`categorieArticle`=:categorieArticle,`prixUnitaireArticle`=:prixUnitaireArticle,
        `prixEngrosArticle`=:prixEngrosArticle,`prixDetaillantArticle`=:prixDetaillantArticle,
        `qantiteStockArticle`=:qantiteStockArticle,`seuil`=:seuil WHERE `uuidArticle`=:uuid";
        $params = [
            ':nomArticle' => $data['article'],
            ':categorieArticle' => $data['categorie'],
            ':prixUnitaireArticle' => $data['prixUnitaire'],
            ':prixEngrosArticle' => $data['prixEngros'],
            ':prixDetaillantArticle' => $data['prixDetaillant'],
            ':qantiteStockArticle' => $data['quantite'],
            ':seuil' => $data['Seuilrupture'],
            ':uuid' => $data['uuid']
        ];
        $ArticleModifier = $this->insertion_update_simples($sql, $params);
        if ($ArticleModifier == true) {
            $this->set_flash("Modification faite avec succès", 'info');
            $this->redirect("Articles/Liste_article");
        } else {
            $this->set_flash("Echec de la modification de l'article", 'danger');
            $this->redirect("Articles/Liste_article");
        }
    }
    public function approvisionner_stock($data)
    {
        if (isset($data)) {
            $Q_actuel = (int)$data['Stock'];
            $Q_approvisonnement = (int)$data['Qapprovisionnement'];
            $Q_apres_approvisionnement = $Q_actuel + $Q_approvisonnement;

            $sql = "UPDATE `article` SET `qantiteStockArticle`=:qantiteStockArticle WHERE `uuidArticle`=:uuid";
            $params = [
                ':qantiteStockArticle' => $Q_apres_approvisionnement,
                ':uuid' => $data['uuid']
            ];
            $Article_approvisionner = $this->insertion_update_simples($sql, $params);
            if ($Article_approvisionner == true) {
                $this->set_flash("Approvisionnement du stock a été effectuer avec success", 'success');
                $this->redirect("Articles/Liste_article");
            } else {
                $this->set_flash("Echec de approvisionnement du stock", 'danger');
                $this->redirect("Articles/Liste_article");
            }
        }
    }
}
