<?php


namespace controllers;

use controllers\base\Web;
use models\CommentaireModel;
use utils\SessionHelpers;

/*
 * Contrôleur des formations
 * Affichage de la liste des formations.
 */

class Commentaire extends Web
{
    private $commentaireModel;

    function __construct()
    {
        $this->commentaireModel = new CommentaireModel();
    }

    // Affichage de la page d'accueil avec en fonction si connecté ou non une liste plus complète.

    function ajouterCommentaire()
    {
        $account = SessionHelpers::getConnected();
        $note = $_POST['note'];
        if($note > 5)
        {
            $note = 5;
        }
        if($note < 0)
        {
            $note = 0;
        }
        if (SessionHelpers::isLogin())
        {
            $idUser = 1;
            $this->commentaireModel->ajouterCommentaire($_POST['texte'], $_POST['idVideo'], $note ,$idUser);
            $this->redirect("./tv?id=" . $_POST['id']);
        }
        else
        {
            $this->redirect("./login");
        }
    }
}