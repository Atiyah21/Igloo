<?php
require "config.php";
session_start();
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
            
            //aficher le contenu de la variable "cle"
            $cle = $_GET['cle'];

            //afficher toutes les images de la base de donnees qui ont la cle = cle
             
            echo '<div class="first">';
            $reponse = $conn->query('SELECT `image1`, `image2`, `image3`, `image4`  FROM `produit` WHERE `cle`= '.$cle.'');
            $donnees = $reponse->fetch();
                       
                echo '<img src="data:image/jpeg;base64,' . base64_encode($donnees['image1']). '" />';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($donnees['image2']). '" />';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($donnees['image3']). '" />';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($donnees['image4']). '" />';

            if(isset($_SESSION['usrID'])){
                $response2 = $conn->query('SELECT count(*) as nbrecat  FROM `réaction` WHERE `produit_id`= '.$cle.' and `usrID`='.$_SESSION['usrID'].'');
                $nombreReaction=$response2->fetch()['nbrecat'];  
                    
            if ($nombreReaction==0){ 
                
          echo '<div class="react">';

           echo '<a href ="avis.php?like=1&cle='.$cle.'" class="btn">';
               echo '<img src="/igloo/img/like.png" class="like_img">';
           echo '</a>';
   
           echo '<a href ="avis.php?like=0&cle='.$cle.'" class="btn">';
               echo '<img src="/igloo/img/dislike.png" class="dislike_img">';
           echo'</a>';
   
   echo '</div>';

            if(isset($_REQUEST['like'])){
                $query = $conn->prepare("INSERT INTO réaction(produit_id, aime, usrID) VALUES(?, ?, ?)");
                $query->execute(array($cle, $_REQUEST['like'], $_SESSION['usrID']));
                echo '<script type="text/JavaScript"> location.reload(); </script>';
                
            }
            
        }
       }
            ?>

            </div>
          


        <div class="description">
        <?php
        $description = $conn->query('SELECT `description` FROM `produit` WHERE `cle`= '.$cle.'');
        ?>    
        <p> <?php echo $description->fetch()['description']; ?> </p> <!-- Affiche la description -->
        </div>


        <?php
            echo '<br>';
            
            //si l'utilisateur est connecté
            if(isset($_SESSION['usrID'])){
                include "commentaire.php";
        
            }
            else{
                echo "Veuillez vous connecter pour pouvoir commenter et ajouter une réaction";
            }
        ?>


    
    </section>

           
         

</body>
</html>
