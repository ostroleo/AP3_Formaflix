<?php


namespace controllers;


use controllers\base\Web;
use models\AccountModel;
use utils\SessionHelpers;

class Account extends Web
{
    protected $accountModel;

    public function __construct()
    {
        $this->accountModel = new AccountModel();
    }

    // Méthode de connexion. Prise des paramètre en POST
    function login()
    {
        $error = false;
        if (isset($_POST['login']) && isset($_POST['password'])) {
            if ($this->accountModel->login($_POST["login"], $_POST["password"])) {
                $this->redirect("me");
            } else {
                // Connexion impossible avec les identifiants fourni.
                $error = true;
            }
        }

        $this->header();
        include("views/account/login.php");
        $this->footer();
    }

    // Déconnexion et suppression de la SESSION.
    function logout()
    {
        SessionHelpers::logout();
        $this->redirect("/login");
    }

    // Affiche l'utilisateur actuellement connecté.
    function me()
    {
        $this->header();
        include("views/account/me.php");
        $this->footer();
    }

    function sign()
    {

        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])) {
            if ($this->accountModel->sign($_POST["nom"],$_POST["prenom"],$_POST["email"], $_POST["password"], $_POST["password2"],$_POST["diplome"])) {
                $this->redirect("/me");
            } else {
                // Connexion impossible avec les identifiants fourni.
                 $error = $this->accountModel->sign($_POST["nom"],$_POST["prenom"],$_POST["email"], $_POST["password"], $_POST["password2"],$_POST["diplome"]);
            }

        }

        $diplomes = $this->accountModel->getAllDiplome();
        $this->header();
        include("views/account/sign.php");
        $this->footer();
    }
}
