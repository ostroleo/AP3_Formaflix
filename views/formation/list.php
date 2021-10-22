<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<br>
<center>
<div class="container">
    <div class="BtComp">
        <button style="margin-right: 0.50%" class="d-lg-inline-block ml-3 btn btn-outline-danger filter-button" data-filter="all">Voir tout</button>
        <?php
        foreach ($competencesA as $competence) {
            echo '<button style="margin-right: 0.50%" class="d-lg-inline-block ml-3 btn btn-outline-danger filter-button" data-filter="'.$competence['LIBELLECOMPETENCE'].'">'.$competence['LIBELLECOMPETENCE'].'</button>';
        }       //boutons qui récupèrent les libélé des compétences
        ?>
    </div>
    <div class="row pt-5">
        <?php
        $cpt=0;
        foreach ($formations as $formation) {       //intialisation d'un compteur qui permet d'associer un chiffer à une compétence
            ?>
            <div class="col-sm-12 p-3n filter <?php
            foreach ($competenceByVideos[$cpt] as $competenceByVideo[$cpt]){
                echo $competenceByVideo[$cpt]['LIBELLECOMPETENCE'].' ';
            }
            ?>">
                <div class="card card-hover">
                    <div class="card-body d-flex">
                        <div class="p-3">
                            <img class="preview-image" src="<?= $formation["IMAGE"] ?>">
                        </div>
                        <div class="p-3 flex-grow-1">
                            <h5 class="mb-0 pb-0"><?= $formation['LIBELLE']; ?></h5>
                            <p><?= $formation['DESCRIPTION'] ?></p>
                            <a href="./tv?id=<?= $formation['IDENTIFIANTVIDEO'] ?>" class="btn btn-outline-danger">Voir la formation →</a>
                            <br><br>
                            <?php
                            foreach ($competenceByVideos[$cpt] as $competenceByVideo[$cpt]){
                                echo '<p style="margin-right: 0.50%" class="btn btn-danger">' . $competenceByVideo[$cpt]['LIBELLECOMPETENCE'].'</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div><br>
            </div>

            <?php
            $cpt++;
        }
        ?>
    </div>
</div>

<script>
    $(document).ready(function(){

        $(".filter-button").click(function(){
            var value = $(this).attr('data-filter');

            if(value == "all")
            {
                $('.filter').show('1000');          //affiche toutes les compétences si la formation correspond a toutes les compétences
            }
            else
            {
                $(".filter").not('.'+value).hide('3000');           //si la compétence (filtre) ne correspond pas à la formatino alors elle est cachée
                $('.filter').filter('.'+value).show('3000');        //si la compétence (filtre) correspond à la formation alors elle apparait

            }
        });

    });
</script>