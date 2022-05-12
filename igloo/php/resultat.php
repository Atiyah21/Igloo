<?php
require "config.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Igloo</title>
    <link rel="stylesheet" href="/igloo/css/accueil.css">
</head>
<body>
    <section class="top-page">
        
        <?php include "header.php" ?>;
    </section>
    
    <section class="main-page">
        <?php
            //si la variable logement="appartement", alors on affiche 
            if(($logement == "appartement" && $ville == "paris") || $ville == "paris"){
                include "appartement_paris.php";
            }
            else if(($logement == "appartement" && $ville == "new york") || $ville == "new york"){
                include "appartement_newyork.php";
            }
            
            else if($logement == "appartement"){
                include "appartement_paris.php";
                include "appartement_newyork.php";
            }
            
            else if($logement == "chalet" || $logement == "chalets" || $ville == "montagne" || $logement="chalêts"){ 
                include "chalêts_montagne.php";
            }
            
            
            


        ?>
</body>
</html>
