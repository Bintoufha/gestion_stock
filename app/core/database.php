<?php
class Database{

    public function connect (){
        if (!$bdd=new PDO("mysql:host=" . DBHOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD)) {
           
           die('echec de connection a la bas de données');
        };
        return $bdd;
    }

    public function bdd(){
        $bdd= $this->connect();
        return $bdd;
    }
}
?>