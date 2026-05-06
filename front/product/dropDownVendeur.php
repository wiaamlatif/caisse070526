<?php

    //echo "<pre>"; 
    //var_dump($_SESSION['user']);
    //echo "</pre>"; 

    require_once "\htdocs\include\database.php";

    //>> Get vendeurs
    $sql = "SELECT * FROM users";
                  
    $result = mysqli_query($conn,$sql);
    
    $vendeurs = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
             
    <!-------Vendeurs--------->

    <div class="dropdown py-2">
        <button id="btnVendeur" class="btn btn-primary rounded-pill dropdown-toggle fs-5 mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?=$_SESSION['user']['first_name']?>
        </button>
        <ul class="dropdown-menu">
            <?php
                foreach ($vendeurs as $vendeur) { 

                    $idUser= $vendeur['id_user'];                                                                                
                    $firstname= $vendeur['first_name']; 

                    session_destroy();

                    session_start();

                    $_SESSION['user'] = $vendeur;

                    $_SESSION['user']['displayBtnCategories']=false;
            ?>
                <li>
                    <button id="dropdownVendeur<?=$idUser?>"  class="dropdown-item" 
                            onclick="displayHeadsTickets(<?=$idUser?>);startVente();">
                            <?=$idUser."-".$firstname ?>
                    </button>                
                </li>            
            <?php
                }
            ?>               
        </ul>
    </div>

    <!------Vendeurs---------->


    
