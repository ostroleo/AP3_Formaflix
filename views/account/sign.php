<div class="cover-gradient full-height pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="card card-dark">
                    <div class="card-body text-center p-5">
                        <main class="form-signin">
                            <?php
                            if (isset($error) && $error == 0) {
                                ?>
                                <div class="alert alert-danger">Identifiant de connexion invalide</div>
                                <?php
                            }
                            ?>
                           
                            <form method="POST" action="./sign">
                                <h1 class="h3 mb-3 fw-normal text-light">Inscription</h1>

                                <div class="form-floating">
                                    <input name="nom" type="nom" class="form-control" id="floatingInput" placeholder="Votre nom">
                                    <label for="floatingInput">Nom</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <input name="prenom" type="prenom" class="form-control" id="floatingInput" placeholder="Votre prénom">
                                    <label for="floatingPassword">Prénom</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Votre Email">
                                    <label for="floatingInput">Adresse email</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
                                    <label for="floatingInput">Mot de passe</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <input name="password2" type="password" class="form-control" id="floatingPassword" placeholder="Confirmation mot de passe">
                                    <label for="floatingInput">Confirmation Mot de passe</label>
                                </div>
                                <select name="diplome" class="form-select mt-2" aria-label="Default select example">
                                    <option selected>Niveau de diplôme obtenu</option>
                                    <?php
                                    foreach ($diplomes as $diplome){
                                        echo '<option value="'.$diplome["id"].'">'.$diplome["libelle"].'</option>';
                                    }
                                    ?>
                                </select>
                                
                                <button class="w-100 mt-4 btn btn-lg btn-primary" type="submit">Valider</button>

                                <?php
                            if ($diplome == 0) {
                                ?>
                                <div class="alert alert-danger">Aucun diplôme rentré</div>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_POST["password"] != $_POST["password2"] ) {
                                ?><br>
                                <div class="alert alert-danger">Les mots de passe ne sont pas identiques</div>
                                <?php
                            }
                            ?>



                            </form>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
