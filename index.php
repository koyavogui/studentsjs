<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./includes/styles.php" ?>
    <title>Attendance</title>
</head>
<body>

    <!-- 
        Menu d'acces au différent modèle 

    -->

    <main class="container">
        <section class="mt-5 ml-5">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#InscriptionModal">Inscription</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signatureModal">Signature</button>
            <a href="./students/" class="btn btn-danger">Espace Etudiant</a>
            <a href="./teacher/" class="btn btn-warning">Espace Professeur</a>
        </section>

        <!-- Modal concernant l'inscription -->
        <div class="modal fade" tabindex="-1" id="InscriptionModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Inscription Etudiant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                         <form action="" method="post" id="inscriptionForm" class="needs-validation">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom : </label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Prénoms</label>
                                <input type="text" class="form-control" name="firstname" id="firstname">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" class="form-control" name="email" id="email">
                                <div class="invalid-feedback">
                                    Cet email n'est pas dispnoible &#x1F62B;
                                </div>
                                <div class="valid-feedback">
                                    Cet email est libre ! &#x1F60E;
                                </div>
                            </div>
                            <label for="" class="label-control">Genre</label>
                            <br>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="radio" name="genre" id="Masculin" value="masculin" checked>
                                <label class="form-check-label" for="Masculin">Masculin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genre" id="feminin" value="feminin">
                                <label class="form-check-label" for="feminin">Féminin</label>
                            </div>
                            <div class="mb-3">
                                <label for="contact"  class="form-label">Contact</label>
                                <input type="tel" class="form-control" name="contact" id="contact">
                                <div class="invalid-feedback">
                                    Cet contact n'est pas dispnoible &#x1F62B;
                                </div>
                                <div class="valid-feedback">
                                    Cet contact est libre ! &#x1F60E;
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Choisir un avatar</label>
                                <input class="form-control" type="file" id="avatar" name="avatar">
                            </div>
                            <div class="mb-3">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password" >
                            </div>
                            <div class="mb-3">
                                <label for="passwordVerify">Mot de passe à nouveau</label>
                                <input type="password" class="form-control" name="passwordVerify" id="passwordVerify"  >
                            </div>
                         </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary shadow" id="modalEnregistrementKey" disabled>Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal " tabindex="-1" id="signatureModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Signer votre presence</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id="signform">
                            <div class="mb-3">
                                <label for="username" class="form-label">Email ou contact</label>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="mb-3">
                                <label for="passwordSign">Mot de passe</label>
                                <input type="password" class="form-control" name="passwordSign" id="passwordSign" >
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary" id="modalSignerKey">Signer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal " tabindex="-1" id="result">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                             Etudiant ajouté avec success !
                    </div>
                     
                </div>
            </div>
        </div>
    </main>
<?php include "./includes/script.php" ?>
<script src="./js/start.js"></script>
</body>
</html>