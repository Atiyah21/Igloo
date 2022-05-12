<header class="header">
            
            <img src="/igloo/img/igloo.png" alt="logo du site">
            
            <nav class="nav">
                <li><a href="accueil.php"> Accueil </a></li>
                <li><a href="login.php"> Connection </a></li>
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