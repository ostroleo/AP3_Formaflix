<?php

namespace models;

use models\base\SQL;

class CommentaireModel extends SQL
{
    public function __construct()
    {
        parent::__construct("formation", "IDFORMATION");
    }

    function getCommentaire($videoId)
    {
        $stmt = $this->pdo->prepare("SELECT commentaire.IDINSCRIT, PRENOMINSCRIT, NOMINSCRIT, LIBELLE, NOTE FROM commentaire INNER JOIN inscrit ON commentaire.IDINSCRIT = inscrit.IDINSCRIT where IDSTATUT = 2 AND IDFORMATION = ?");
        $stmt->execute([$videoId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    function ajouterCommentaire($texte, $idFormation, $note, $idUti)
    {
        if($texte !== "") {
            $stmt = $this->pdo->prepare("INSERT INTO commentaire (IDCOM, LIBELLE, NOTE, IDSTATUT, IDINSCRIT, IDFORMATION) VALUES (NULL, ?, ?, 2, ?, ?)");
            $stmt->bindParam(1, $texte);
            $stmt->bindParam(2, $note);
            $stmt->bindParam(3, $idUti);
            $stmt->bindParam(4, $idFormation);
            return $stmt->execute();
        }
    }
}