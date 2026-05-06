<?php
    // var_dump($_SESSION);

    require_once "\htdocs\include\database.php"; 

    //>> Get Categories
    $sql = "SELECT * FROM categories"; 

    $result = mysqli_query($conn, $sql);

    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
?> 
   <!------Categories---------->
    <div class="dropdown  py-2">
        <button id="btnCategory" class="btn btn-primary rounded-pill dropdown-toggle fs-5 mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
        </button>
        <ul class="dropdown-menu">
        <?php


        foreach ($categories as $category) { 
          $idCategory = $category['id_category'];
          $categoryName = $category['name_category'];                                         
        ?>            
            <li>
                <button class="dropdown-item" id="dropDrownCategory<?=$idCategory?>"
                        onclick="displayProductsCategory(<?=$idCategory?>)">
                        <?= $category['name_category'] ?>
                       
                </button>                
            </li>
        <?php
        }
        ?>               
        </ul>
    </div>
    <!-------Categories--------->   