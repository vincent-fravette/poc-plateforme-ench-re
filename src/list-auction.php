<?php
    $product = json_decode(file_get_contents('public/json/data.json'), true);
    //var_dump($product, json_last_error_msg());
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


    <title>Liste des enchères - Plateforme d'enchères</title>
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
    <section id="list-auction">
        <div class="container-fluid">
        <h1 class="text-center text-uppercase py-5">liste des enchères</h1>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">intitulé</th>
                        <th scope="col">prix</th>
                        <th scope="col">durée de l'enchére</th>
                        <th scope="col">augmentation de la durée<br/>de l'enchère</th>
                        <th scope="col">augmentation du prix</th>
                        <th scope="col">prix du clic</th>
                        <th scope="col">gain total</th>
                        <th scope="col" colspan="3" class="text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                    <?php foreach ($product as $key => $article): ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $article['title']; ?></td>
                        <td><?php echo $article['price']; ?> &euro;</td>
                        <td><?php echo $article['duration-auction']; ?> heures</td>
                        <td><?php echo $article['duration-increase']; ?> secondes</td>
                        <td><?php echo $article['price-increase']; ?> &euro;</td>
                        <td><?php echo $article['price-clic']; ?> &euro;</td>
                        <td><?php echo $article['gain']; ?> &euro;</td>
                        <td><a href="edit-auction.php?edit=<?= $article['id']; ?>" class="edit-btn text-dark" >modifier</a></td>
                        <td>activer</td>
                        <td>désactiver</td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
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

</body>

</html>