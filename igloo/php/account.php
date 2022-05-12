<?php
session_start();
require "config.php";

usrNotLog();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Account</title>
    <link rel="stylesheet" href="/igloo/css/accueil.css">
</head>
<header class="header">
            
            <img src="/igloo/img/igloo.png" alt="logo du site">
            
            <nav class="nav">
                <li><a href="accueil.php"> Accueil </a></li>
                <li><a href="logout.php"> Se déconnecter </a></li>
                <li><a href="signup.php"> Inscription </a></li>
            </nav>
            
            <div class="search-box">
                <form action="resultat.php" method="POST">
                    <input type="text" placeholder="Rechercher un type de logement" class="barre" name="logement">
                    <br> 
                    <input type="text" placeholder="Rechercher une ville" class="barre" name="ville">
                    <button type="submit" name="search"></button> 
                </form>     
            </div>
              
            <a  class ="profil" href="account.php"><img class="user" src="/igloo/img/user.png" alt="user-logo"></a>
<?php
            if(isset($_REQUEST['search'])){
                $logement = $_REQUEST['logement'];
                $ville = $_REQUEST['ville'];
}

?>
            
        
        </header>

<body>
    <div class="card-profile-info">
        <div class="main">
            <div class="card">
                <div class="acc-details">
                <?php
                $userdata=$conn->query('SELECT * FROM `user` WHERE usrID='.$_SESSION['usrID'].'' )->fetch();  
                ?>              
                <span class="acc-img">
  
                              
                            
                        </span>
                    <span class="acc-name">
                        <h1><?php echo $userdata["name"] ?></h1>
                    </span>
                    <span class="acc-other">
                       
                        <?php 
                            $countUserReact = $conn->query('SELECT count(*) as cnt FROM `réaction` WHERE usrID='.$_SESSION['usrID'].' ')->fetch()['cnt'];
                            if($countUserReact>0){
                            $lastReact = $conn->query('SELECT * FROM `réaction` WHERE usrID='.$_SESSION['usrID'].' order by reactID desc limit 1 ')->fetch()['produit_id'];
                            echo '<a href="avis.php?cle='.$lastReact.'">Ma dernière réaction</a>';?><br>
                            <br>
                            <?php }
                           
                         $countUserAvis = $conn->query('SELECT count(*) as cnt FROM `avis` WHERE usrID='.$_SESSION['usrID'].' ')->fetch()['cnt'];
                         if($countUserAvis>0){
                         $lastAvis = $conn->query('SELECT * FROM `avis` WHERE usrID='.$_SESSION['usrID'].' order by AvisID desc limit 1 ')->fetch()['produit_id'];
                            echo '<a href="avis.php?cle='.$lastAvis.'">Mon dernier avis</a>';
                            }
                         
      
                        ?>
                     
                    </span>
                </div>
                
            </div>
            <div class="comment-section-posted">
            </div>
        </div>
</body>

</html>

