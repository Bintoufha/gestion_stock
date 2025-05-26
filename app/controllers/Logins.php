<?php
class Logins extends Controller
{
    public function index()
    {
        $this->view("login");
    }
    public function auth()
    {
        $connexion = new Login();
        if (isset($_POST["connexion"])) {
            $data=[
                "pwd" => $_POST["pwd"] ?? '',
                "email" => $_POST["email"] ?? ''
            ];
            $connexion->authentification($data);
        }
        $this->view("login");
    }
}
