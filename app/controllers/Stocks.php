<?php 
class Stocks extends Controller{
    public function index() {
            $this->view("stock");
        }
    
    public function Liste_Stock() {
        $stock = new Stock();
        $uuidBoutique = $_SESSION['uuidBoutique']; // ID de la boutique
        $$dataStock =[];
        if ($_SESSION['role'] === "SuperAdmin") {
            $dataStock = $stock->SelectAllData("*", "article");
          } else {
            $dataStock = $stock->FetchSelectWhere2("*", "article", "uuidBoutique=:uuid", [':uuid' => $uuidBoutique]);
          }
        $this->view("stock",['dataStock'=>$dataStock]);
    }
}
?>