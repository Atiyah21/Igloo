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

<section class="top-page">
        
        <?php include "header.php" ?>;

    </section>

<body>
    


    <section class="main-page">                  
                <?php
                    include "appartement_paris.php";

                    include "appartement_newyork.php"; 
                    
                    include "chalêts_montagne.php";
            ?>

        
    </section>
            
</body>
</html>