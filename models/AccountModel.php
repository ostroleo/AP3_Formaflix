<?php

namespace models;

use models\base\SQL;
use utils\SessionHelpers;

class AccountModel extends SQL
{
    public function __construct()
    {
        parent::__construct('inscrit', 'IDINSCRIT');
    }

    public function login($username, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM inscrit WHERE EMAILINSCRIT=? LIMIT 1");
        $stmt->execute([$username]);
        $inscrit = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($inscrit !== false && password_verify($password, $inscrit['MOTPASSEINSCRIT'])) {
            SessionHelpers::login(array("username" => "{$inscrit["NOMINSCRIT"]} {$inscrit["PRENOMINSCRIT"]}", "email" => $inscrit["EMAILINSCRIT"]));
            return true;
        } else {
            SessionHelpers::logout();
            return false;
        }
    }

    public function sign($nom, $prenom, $email, $password, $password2, $diplome)
    {
        $stmt = $this->pdo->prepare("SELECT EMAILINSCRIT FROM inscrit where EMAILINSCRIT=?");
        $stmt->execute([$email]);
        $listeMail = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $register=true;
        if ($diplome == 0) {
            $register=false;
            return 1;
        }

        if ($password != $password2) {
            $register=false;
            return 2;
        }
//            SessionHelpers::logout();
//            $login = false;
//            return $error = 3; //mots de passe différents
//        }

        if($register){
            $stmt = $this->pdo->prepare("INSERT INTO inscrit VALUES (NULL ,:nom , :prenom, :email, :password ,:diplome)");
            $stmt->bindValue('nom', $nom);
            $stmt->bindValue('prenom', $prenom);
            $stmt->bindValue('email', $email);
            $stmt->bindValue('password', password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]));
            $stmt->bindValue('diplome', $diplome);
            $stmt->execute();
        }

    }


    public function getAllDiplome()
    {
        $stmt = $this->pdo->query("SELECT id,libelle FROM diplome");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    // -> À faire, récupération des paramètres & création du mot de passe
    // -> Ajouter en base de données l'utilisateur.
}