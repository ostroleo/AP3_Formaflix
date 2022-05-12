<?php

use utils\Gravatar;
use utils\SessionHelpers;
use models\accountModel;
use models\CommentaireModel;

$account = SessionHelpers::getConnected();
?>
<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body text-center">
            <div class="container">
<div class="row gutters">
	<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
		<div class="card h-100">
			<div class="card-body">
				<div class="account-settings">
					<div class="user-profile">
						<div class="user-avatar">
                        <img class="m-5" src="<?= Gravatar::get_gravatar($account['email']) ?>"/>
						</div>
						<h5 class="user-name"><?= $account['username'] ?></h5>
						<h6 class="user-email"><?= $account['email'] ?></h6>
					</div>					
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
		<div class="card h-100">
			<div class="card-body">
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-3 text-primary">Personal Details</h6>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="fullName">Nom</label>
							<input type="text" class="form-control" id="fullName" placeholder="<?= $account['username'] ?>">
							<label for="eMail">Email</label>
							<input type="email" class="form-control" id="eMail" placeholder="<?= $account['email'] ?>">
                            <label for="diplome">Diplome</label>
                            <select name="diplome" class="form-select col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" aria-label="Default select example">
                                    <option selected>Niveau de diplôme obtenu</option>
                                    <?php
                                    foreach ($diplomes as $diplome){
                                        echo '<option value="'.$diplome["id"].'">'.$diplome["libelle"].'</option>';
                                    }
                                    ?>
                                </select>
						</div>
					</div>                 

				</div>
				<div class="row gutters">
					<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
						<div class="text-right">
							<button type="button" id="submit" name="submit" class="btn btn-secondary ">Réinitialiser</button>
							<button type="button" id="submit" name="submit" class="btn btn-danger ">Modifier</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>   
                
                <div class="mt-5">
                    <a class="btn btn-danger d-block full" href="./logout">Déconnexion</a>
                </div>
            </div>
        </div>
    </div>
</div>
