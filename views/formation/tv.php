<div class="d-flex flex-column align-items-center fit-content m-auto">
    <div class="fit-content">
        <div class="frame">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $video['IDENTIFIANTVIDEO']; ?>"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
        <div class="stand">
            <?= $video['LIBELLE'] ?>
        </div>
    </div>
    <div class="w-100">

        <div class="card card-dark mt-5 p-3">
            <div class="text-light"><?= $video['DESCRIPTION'] ?></div>

            <?php
            if (sizeof($competences) > 0) {
                ?>
                <hr class="dropdown-divider">
                <div>
                    <?php
                    foreach ($competences as $competence) {
                        ?>
                        <span class="btn btn-danger"><?= $competence["LIBELLECOMPETENCE"] ?></span>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>

    </div>
    <div class="card border-danger mt-4 w-100 ">
        <h5 class="card-title  my-3 mx-3">Commentaires</h5>
        <form class="form-inline" method="post" action="addCommentaire">
            <div class="card container mt-3 ">

                <input name="texte" class="form-control" id="texte" placeholder="Entrez votre commentaire">
                <button type="submit" class="btn btn-danger my-2">Envoyer le commentaire</button>


                <?php
                foreach ($commentaires as $commentaire) {
                    ?>
                    <div class="card border-danger mb-3">

                        <div class="card-header"><?= $commentaire["NOMINSCRIT"]." ". $commentaire["PRENOMINSCRIT"]?></div>
                        <div class="card-body ">
                            <blockquote class="blockquote mb-0">
                                <p><?= $commentaire["LIBELLE"] ?></p>

                                <footer class="blockquote-footer"><?= $commentaire["NOTE"] ?> /5</footer>
                            </blockquote>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
    </div>
    </form>
</div>

<!--<p>--><? // = $commentaire["commentaire"]?><!--</p>-->
<!-- <footer class="blockquote-footer"> --><? // = $commentaire["inscrit"]?><!--</footer>-->