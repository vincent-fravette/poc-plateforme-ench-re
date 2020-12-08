<?php
    session_start();
    $msg = "";
    $msg_class = "";
    //$update = false;

    if (isset($_POST['create'])) {

        $id = uniqid("item-".rand());
        $state = false;
        $picture = time() . '-' . $_FILES['picture']['name'];
        $title = htmlspecialchars($_POST['title']);
        $price = $_POST['price'];
        $duration_auction = $_POST['duration-auction'];
        $duration_increase = $_POST['duration-increase'];
        $price_increase = $_POST['price-increase'];
        $price_clic = $_POST['price-clic'];
        
        $image_dir = "public/images/upload/";
        $image_file = $image_dir . basename($picture);

        $required_fields = ['title', 'price', 'duration-auction', 'duration-increase', 'price-increase', 'price-clic'];
        foreach($required_fields as $input) {
            if ($_POST["$input"] == "") {
                $validation = false;
                $msg = "Veuillez remplir tous les champs";
                $msg_class = "alert-danger";
            }
        }

        if ($_FILES['picture']['size'] > 10000000) {
            $msg = "La taille de l'image ne doit pas dépasser 10mo";
            $msg_class = "alert-danger";
        }
        //if (empty($error)) {
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $image_file)) {
                $products = array(
                    'id' => $id,
                    'state' => $state,
                    'picture' => $image_file,
                    'title' => $title,
                    'price' => $price,
                    'duration-auction' => $duration_auction,
                    'duration-increase' => $duration_increase,
                    'price-increase' => $price_increase,
                    'price-clic' => $price_clic,
                    'gain' => 0,
                    'timer' => array(hours => 'h', minutes => 'm', seconds => 's')
                );
                $json_to_php = json_decode(file_get_contents('public/json/data.json'), true);
                array_unshift($json_to_php, $products);
                file_put_contents('public/json/data.json', json_encode($json_to_php));

                $msg = "Le produit a bien été ajouté";
                $msg_class = "alert-success";
                
            } else {
                $msg = "Image manquante";
                $msg_class = "alert-danger";
                //$products['picture'] = "public/images/no-image.png";
            }
        //}

    }

    if (isset($_POST['update'])) {

        $id = $_GET['edit'];
        $picture = time() . '-' . $_FILES['picture']['name'];
        $title = htmlspecialchars($_POST['title']);
        $price = $_POST['price'];
        $duration_auction = $_POST['duration-auction'];
        $duration_increase = $_POST['duration-increase'];
        $price_increase = $_POST['price-increase'];
        $price_clic = $_POST['price-clic'];

        $image_dir = "public/images/upload/";
        $image_file = $image_dir . basename($picture);

        $required_fields = ['title', 'price', 'duration-auction', 'duration-increase', 'price-increase', 'price-clic'];
        foreach($required_fields as $input) {
            if ($_POST["$input"] == "") {
                $validation = false;
                $msg = "Veuillez remplir tous les champs";
                $msg_class = "alert-danger";
            }
        }

        if ($_FILES['picture']['size'] > 10000000) {
            $msg = "La taille de l'image ne doit pas dépasser 10mo";
            $msg_class = "alert-danger";
        }


        if (move_uploaded_file($_FILES['picture']['tmp_name'], $image_file)) {

            $product_update = json_decode(file_get_contents('public/json/data.json'), true);

            foreach ($product_update as $key => $article) {

                if ($article['id'] == $id) {

                    $product_update[$key]['picture'] = $image_file;
                    $product_update[$key]['title'] = $title;
                    $product_update[$key]['price'] = $price;
                    $product_update[$key]['price-increase'] = $price_increase;
                    $product_update[$key]['duration-auction'] = $duration_auction;
                    $product_update[$key]['duration-increase'] = $duration_increase;
                    $product_update[$key]['price-clic'] = $price_clic;
                }

            }

            file_put_contents('public/json/data.json', json_encode($product_update));
        
            $msg = "Le produit a été modifié";
            $msg_class = "alert-success";
                        
        } else {

            $msg = "Image manquante";
            $msg_class = "alert-danger";
            //$products['picture'] = "public/images/no-image.png";
        }
        
    }
    
?>