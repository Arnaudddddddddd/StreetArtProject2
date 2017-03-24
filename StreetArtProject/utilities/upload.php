<?php

// ex pour une image jpg
if (!empty($_FILES['fichier']['tmp_name']) && is_uploaded_file($_FILES['fichier']['tmp_name'])) {
// Le fichier a bien été téléchargé
// Par sécurité on utilise getimagesize plutot que les variables $_FILES
    list($larg, $haut, $type, $attr) = getimagesize($_FILES['fichier']['tmp_name']);
    echo $larg . " " . $haut . " " . $type . " " . $attr;
// JPEG => type=2
    if ($type == 2) {
        if (move_uploaded_file($_FILES['fichier']['tmp_name'], '/Users/arnaudstiegler/Desktop/imagePHP/' . $_POST['titre'])) {
            echo "Copie réussie";
        } else {
            echo "Echec de la copie";
        }
    } else {
        echo "Mauvais type de fichier ";
    }
}

