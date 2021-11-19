<?php

namespace controllers;

use controllers\base\Web;
use models\CommentaireModel;
use models\CompetenceModel;
use models\FormationModel;
use utils\SessionHelpers;

/**
 * Contrôleur des formations
 * Affichage de la liste des formations.
 */
class Formation extends Web
{
    private $formationModel;
    private $CompetenceModel;
    private $CommentaireModel;

    function __construct()
    {
        $this->formationModel = new FormationModel();
        $this->CompetenceModel = new CompetenceModel();
        $this->CommentaireModel = new CommentaireModel();
    }
    function liste()
    {
        $this->header(); // Affichage de l'entête.
        $todos = $this->todoModel->getAll(); // Récupération des TODOS présents en base.
        include("views/global/liste.php"); // Affichage de votre vue.
        $this->footer(); // Affichage de votre pied de page.
    }

    // Affichage de la page d'accueil avec en fonction si connecté ou non une liste plus complète.
    function home()
    {

        if (SessionHelpers::isLogin()) {                    //si l'utilisateur est connecté alors on recupère
            // Récupération des vidéo par le modèle
            $formations = $this->formationModel->getVideos();
            $cpt = 0;
            foreach($formations as $formation){
                $competenceByVideos[$cpt] = $this->formationModel->competencesFormation($formation['IDFORMATION']);
                $cpt++;
            }
            $competencesA = $this->CompetenceModel->getAllComp();
        } else {
            $formations = $this->formationModel->getPublicVideos();
            $cpt = 0;
            foreach($formations as $formation){
                $competenceByVideos[$cpt] = $this->formationModel->competencesFormation($formation['IDFORMATION']);
                $cpt++;
            }
            $competencesA = $this->CompetenceModel->getAllComp();
        }

        $competencesA = $this->CompetenceModel->getAllComp();

        $this->header();
        include("./views/formation/list.php");
        $this->footer();
    }


    /**
     * $id est automatiquement rempli via la valeur du GET
     * @param $id
     */
    function tv($id)
    {
        // Récupération de la vidéo par rapport à l'ID demandé
        $video = $this->formationModel->getByVideoId($id);
        if (!$video) {
            $this->redirect("./formations");
        }

        // Les vidéos non public ne doivent pas être visible si non connecté
        if($video['VISIBILITEPUBLIC'] == 0 && !SessionHelpers::isLogin()){
            $this->redirect("./formations");
        }

        // Compétence assocés à la vidéo
        $competences = $this->formationModel->competencesFormation($video["IDFORMATION"]);
        $commentaires = $this->CommentaireModel->getCommentaire($video["IDFORMATION"]);
        $this->header();
        include("./views/formation/tv.php");
        $this->footer();
    }
}