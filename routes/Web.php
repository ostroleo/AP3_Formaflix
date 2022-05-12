<?php

namespace routes;

use controllers\Account;
use controllers\Formation;
use controllers\Main;
use routes\base\Route;
use utils\SessionHelpers;
use controllers\Commentaire;

class Web
{
    function __construct()
    {
        $main = new Main();
        $formation = new Formation();
        $account = new Account();
        $commentaire = new Commentaire();

        Route::Add('/', [$main, 'home']);
        Route::Add('/formations', [$formation, 'home']);
        Route::Add('/tv', [$formation, 'tv']);
        Route::Add('/about', [$main, 'about']);
        Route::Add('/login', [$account, 'login']);
        Route::Add('/sign', [$account, 'sign']);
        Route::Add('/ajouterCommentaire', [$commentaire, 'ajouterCommentaire']);

        if (SessionHelpers::isLogin()) {
            Route::Add('/me', [$account, 'me']);
            Route::Add('/logout', [$account, 'logout']);
        }
    }
}

