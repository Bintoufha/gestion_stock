<?php

class Model extends Database
{
    protected $table = "";

    // fonction pour verifier si les champs input ne sont pas vide
    public function VerifyFields($fields = [])
    {
        if (count($fields) > 0) {
            foreach ($fields as $field) {
                if (empty($_POST[$field]) || trim($_POST[$field]) === '') {
                    return false;
                }
            }
            return true;
        }
    }
    //  contrainte regex pour les champs select et input
    public function VerifyFieldsRegex($fields = [])
    {
        $regex = '/^[a-zA-Z0-9_\-\s]+$/';
        if (count($fields) > 0) {
            foreach ($fields as $field) {
                // Vérifie si le champ est vide ou ne correspond pas à la regex
                if (empty($_POST[$field]) || !preg_match($regex, trim($_POST[$field]))) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }
    // verification des champs
    public function e($value)
    {

        if ($value) {
            $value = htmlspecialchars($value);
            $value = htmlentities($value);
            $value = strip_tags($value);
            return $value;
        }
    }
    // function pour faire insertion et modification dans la base de donnee
    public function insertion_update_simples($insert, $insert_data = [])
    {
        $bdd = $this->connect();
        $q = $bdd->prepare($insert);
        $q->execute($insert_data);
        return $q;
    }
    // function de redirection
    public  function redirect($page)
    {
        header("Location:" . ROOT . "/" . trim($page, "/"));
        exit();
    }
    // function de recuperation des donnees dans la base
    public function SelectAllData($select, $fields)
    {
        $bdd = $this->bdd();
        $que = $bdd->prepare("SELECT $select
                FROM $fields");
        $que->execute();
        $count = $que->fetchAll(PDO::FETCH_OBJ);
        $que->closeCursor();
        return $count;
    }
    // Définit un message flash pour les notifications
    public function set_flash($message, $type = 'danger')
    {
        $_SESSION['notification']['message'] = $message;
        $_SESSION['notification']['type'] = $type;
    }
    // function pour recuperer un donnee en fonction d'une condition
    public function FetchSelectWhere($select, $fields, $whereValue, $value = [])
    {
        $bdd = $this->bdd();
        $que = $bdd->prepare("SELECT $select
                FROM $fields
                WHERE $whereValue");
        $que->execute($value);
        $count = $que->fetch(PDO::FETCH_OBJ);
        $que->closeCursor();
        return $count;
    }
    public function FetchSelectWhere2($select, $fields, $whereValue, $value = [])
    {
        $bdd = $this->bdd();
        $que = $bdd->prepare("SELECT $select FROM $fields WHERE $whereValue");
        $que->execute($value);

        // Utilisez fetchAll() pour récupérer toutes les lignes correspondantes
        $results = $que->fetchAll(PDO::FETCH_OBJ);
        $que->closeCursor();

        return $results; // Retourne toutes les lignes trouvées
    }
    // function pour verifier la validite de numero de telephone
    public function isValidPhoneNumber($number)
    {
        // Supprimer les espaces, tirets et parenthèses inutiles pour uniformiser
        $cleanedNumber = preg_replace('/[\s()-]+/', '', $number);

        // Vérifier la longueur du numéro
        if (strlen($cleanedNumber) !== 8) {
            return false; // Retourne faux si le numéro dépasse 8 caractères
        }

        // Expression régulière pour valider le format
        $regex = "/^\+?[0-9]{8}$/";

        // Valider le numéro avec la regex
        return preg_match($regex, $cleanedNumber);
    }
    // function pour verifier si le numero de telephone est unique
    public function isUniquePhoneNumber($number, $tableName, $whereValue)
    {
        try {
            $bdd = $this->bdd();
            // Nettoyage du numéro pour éviter les incohérences
            $cleanedNumber = preg_replace('/\s+/', '', $number);

            // Requête paramétrée pour éviter les injections SQL
            $sql = "SELECT COUNT(*) FROM $tableName WHERE $whereValue = :number";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(['number' => $cleanedNumber]);

            return $stmt->fetchColumn() == 0; // Retourne true si le numéro est unique
        } catch (PDOException $e) {
            die("Erreur lors de la vérification d'unicité : " . $e->getMessage());
        }
    }
    // function pour verifier la validite de l'email
    public function isValidEmail($email)
    {
        // Validation stricte avec une regex améliorée
        $regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

        // Valide et assure que l'email correspond au format
        return preg_match($regex, $email) && filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    // function pour verifier si les champs ne sont pas vide
    public function isNotEmpty($field)
    {
        foreach ($field as $value) {
            if (empty(trim($value))) { // Vérifie si la valeur est vide (y compris les espaces)
                return false;
            }
        }
        return true;
    }
    // function de verification des prix et format
    public function verifierPrix($prixUnitaire, $prixEngros, $prixDetaillant)
    {

        // Vérifie les relations entre les prix
        if ($prixUnitaire < $prixEngros && $prixEngros < $prixDetaillant) {
            return true;
        }

        // Retourne false si les relations ne sont pas respectées
        return false;
    }
    public function getArticleById($articleId)
    {
        $bdd = $this->bdd();
        $query = $this->$bdd->prepare("SELECT * FROM article WHERE uuidArticle = :uuidArticle");
        $query->execute([':uuidArticle' => $articleId]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    // Effectue une insertion ou mise à jour simple et retourne l'ID de la dernière insertion
    public function insertion_update_simples_insert_id($insert, $insert_data = [])
    {
        $bdd = $this->bdd();
        $q = $bdd->prepare($insert);
        $q->execute($insert_data);
        $data = ["q" => $q, 'lastInsertId' => $bdd->lastInsertId()];
        return $data;
    }
}
