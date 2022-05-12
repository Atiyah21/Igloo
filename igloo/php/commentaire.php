<?php
            if(isset($_POST['submit'])){
                extract($_POST);

                if(empty($commentaire)){
                    echo "Veuillez entrer un commentaire";
                }else{
                    $usrID = $_SESSION['usrID'];
                    
                    $query = $conn->prepare("INSERT INTO avis(usrID, commentaire, produit_id) VALUES(?, ?, ?)");
                    
                    $query->execute(array($usrID,$commentaire,$cle));

                }
            }
        ?>
        
        <?php
    
        //sortir tout la liste  (commentaire/user)' pour le produit cle
            $reponse = $conn->query('SELECT `a`.`commentaire`, `u`.`name`
            FROM `avis` AS `a`, `user` AS `u` where a.produit_id='.$cle.' and a.usrID=u.usrID;');
           
            while ($donnees = $reponse->fetch()) {
                ?>
                <div class="comm">
                    <p class="name">
                        <?php echo $donnees['name']; ?>
                    </p>
                    
                    <p class = "comment">
                        <?php echo $donnees['commentaire'] ?>                        
                    </p>
                 
                </div>
                
            <?php
            }
            ?>
        
        <div class="commentaire">
            <form method="POST" action="">
                <textarea class="comm" name="commentaire" id="" cols="30" rows="10" placeholder="Votre commentaire"></textarea>
                <input class="btn" type="submit" name="submit" value="Envoyer">
            </form>
        </div>

        


        