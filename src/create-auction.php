<?php
    include_once('data-processing.php');
?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- MON CSS -->
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/media-queries.css">


    <title>Ajouter une enchère - Plateforme d'enchères</title>
</head>

<body>
    <!---------- HEADER ---------->
    <header>
        <!---- NAVIGATION ---->
        <nav class="navbar navbar-expand-lg navbar-dark px-md-5">
            <a id="logo" class="navbar-brand text-white text-uppercase" href="index.php">ventes aux enchères</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="nav text-uppercase justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">enchéres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create-auction.php">ajouter une enchère</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-auction.php">liste des enchères</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!---------- FORMULAIRE ---------->
    <section id="create-form">
        <div class="container">
            <h1 class="text-center text-uppercase py-5">ajouter une enchère</h1>
            <?php if (!empty($msg)): ?>
                <div class="text-center alert <?php echo $msg_class ?>" role="alert">
                    <?php echo $msg; ?>
                </div>
            <?php endif; ?>
            <form class="py-5" method="POST" enctype="multipart/form-data">
                <div class="d-flex flex-column align-items-center">
                    <div class="w-75 text-capitalize d-flex justify-content-between">
                        <!-- IMAGE -->
                        <div id="preview" class="custom-file">
                            <input type="file" class="custom-file-input h-100" name="picture" id="picture">
                            <label class="custom-file-label h-100" for="picture" id="browse">Choose file</label>
                        </div>
                        <div class="w-75">
                            <!-- INTITULE -->
                            <label for="title" class="m-0">intitulé du produit</label>
                            <input type="text" class="form-control mb-3" id="title" name="title"
                                maxlength="24" placeholder="24 caractères maximum" required>
                            <!-- PRIX -->
                            <label for="price" class="m-0">prix de lancement (&euro;)</label>
                            <input type="number" class="form-control" aria-label="Price" placeholder="En euros"
                                name="price" id="price" min="0.01" value="1.00" step="0.01" required>
                        </div>
                    </div>

                    <h3 class="text-uppercase text-center mb-0">paramétres de l'enchère</h3>

                    <div class="d-flex w-75">
                        <div class="w-50 pr-2">
                            <!-- DUREE -->
                            <label for="duration-auction" class="m-0">durée (h):</label>
                            <input type="number" class="form-control" aria-label="duration-auction"
                                placeholder="En heures" id="duration-auction" name="duration-auction" min="1" value="48"
                                required>
                            <!-- PRIX DU CLIC -->
                            <label for="price-clic" class="m-0">prix du clic (cts):</label>
                            <input type="number" class="form-control" placeholder="En centimes" aria-label="price-clic"
                                name="price-clic" id="price-clic" value="0.50" max="0.99" min="0.01" step="0.01"
                                required>
                        </div>
                        <div class="w-50 pl-2">
                            <!-- AUGMENTATION DE LA DUREE -->
                            <label for="duration-increase" class="m-0">augmentation durée (s):</label>
                            <input type="number" class="form-control" aria-label="duration-increase"
                                placeholder="En secondes" name="duration-increase" value="30" id="duration-increase"
                                min="0" required>
                            <!-- AUGMENTATION DU PRIX -->
                            <label for="price-increase" class="m-0">augmentation du prix (cts):</label>
                            <input type="number" class="form-control" aria-label="price-increase"
                                placeholder="En centimes" name="price-increase" value="0.01" id="augmentation_prix"
                                max="0.99" min="0.01" step="0.01" required>
                        </div>
                    </div>
                    <!-- BOUTON -->
                    <button type="submit" name="create"
                        class="btn btn-warning mt-5 text-uppercase font-weight-bold">ajouter l'enchère</button>
                </div>
            </form>
            
        </div>
    </section>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>

</html>