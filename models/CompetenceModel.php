<?php

namespace models;

use models\base\SQL;

class CompetenceModel extends SQL
{
    public function __construct()
    {
        parent::__construct("competence", "IDCOMPETENCE");
    }

    function getAllComp()
    {
        return $this->getAll();
    }

}