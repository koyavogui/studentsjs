<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./../includes/styles.php" ?>
    <title>Espace Professeur</title>
</head>
<body>
    <div class="container">
        <div class="row pt-2">
            <section class="col-md-6 col-lg-7" id="formTitle"></section>
            <section class="col-md-6  col-lg-5 mt-5 pt-5 pb-3 border-bottom border-4 border-primary bg-white ">
                <article class="fs-4 text-center mx-3">
                    Bienvenu sur notre plateforme de suivie de vos souscriptions et d'acquisition de terrain.
                </article>
                <form class="container mt-5" id="formSingin">
                    <div class="mb-3">
                        <label class="form-label" for="emailLogin" class="text-warning">Email : </label>
                        <input type="emailLogin" name="emailLogin" id="emailLogin" class="form-control border border-primary" required>
                    </div>
                    <div class="mb-3" class="text-warning">
                        <label class="form-label" for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control border border-primary" required> 
                    </div>
                    <div class="mb-3" class="text-warning">
                        <button class="mx-auto container-fluid btn btn-primary text-light mt-3 mb-3" id="MySigin">Connexion</button>
                    </div>
                </form>
            </section>
        </div>
    </div>

    <?php include "./../includes/script.php" ?>
    <script src="./../js/teacher.js"></script>
</body>
</html>