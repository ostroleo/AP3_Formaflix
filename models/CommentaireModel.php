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
        $stmt = $this->pdo->prepare("SELECT commentaire.IDINSCRIT, PRENOMINSCRIT, NOMINSCRIT, LIBELLE, NOTE FROM commentaire INNER JOIN inscrit ON commentaire.IDINSCRIT = inscrit.IDINSCRIT where statut = 1 AND IDFORMATION = ?");
        $stmt->execute([$videoId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    function ajouterCommentaire($texte){
        $stmt = $this->pdo->prepare("INSERT INTO commentaire VALUES (NULL ,?,'0',current_timestamp())");
        $stmt->execute([$texte]);
    }

}