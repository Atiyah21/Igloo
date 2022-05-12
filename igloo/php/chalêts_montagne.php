<div class="montagne châlets">
            <h2> Chalêts en montagne </h2>
            
            <?php
                $reponse = $conn->query('SELECT `image1`, `cle` FROM `produit` WHERE `ville`= "montagne"');
                echo '<div class="second">';
                while ($donnees = $reponse->fetch()) {
                    $nblike = $conn->query('SELECT count(*) as nbrecat FROM `réaction` WHERE `produit_id`= '.$donnees['cle'].' AND `aime`= 1')-> fetch()['nbrecat'];
                        $nbdislike = $conn->query('SELECT count(*) as nbrecat FROM `réaction` WHERE `produit_id`= '.$donnees['cle'].' AND `aime`= 0')-> fetch()['nbrecat'];
                        
                    
                    
                    echo '<div class="premier">';
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($donnees['image1']). '" />'; 
                            
                            echo '<div class="react_avis">';
                                echo '<a href="avis.php?cle= '.$donnees['cle'].'">voir les avis</a>';                                                           
                                echo '<img src="/igloo/img/like.png" class="like_img"><p>'.$nblike.'</p>
                                <img src="/igloo/img/dislike.png" class="dislike_img"><p>'.$nbdislike.'</p>';
                                 

                            echo '</div>';

                        echo '</div>'; 
                }
                echo '</div>';

            ?>
        </div>