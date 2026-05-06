<?php // require '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>
<?php
$title ="List of products";
ob_start();
?>
    
    <?php // include ROOT_DIRECTORY.'/include/navAdmin.php'; ?>
    <?php require_once '\htdocs\include\navAdmin.php'; ?>

<div class="container text-center py-2">
    <!---------------------->
  <div class="row row-danger justify-content-center">
    <div class="col">    
      
    </div>
    <div class="col">
     <!---------------------->
         <a href="addProduct.php" class="btn btn-primary py-2">Ajouter Produit</a>
         
    <table class="table table-striped table-sm table-hover border border-dark w-50 my-2">

        <thead>
            <tr><!-- table row--->
            <th>Id</th><!-- table head--->
            <th>Category</th>
            <th>Product</th>           
            <th>price</th>       
            <th>imgSrc</th>
            <th>Date</th>
            <th>Action</th>
            </tr>
        </thead>

        <tbody>

                <?php 

                    //require_once ROOT_DIRECTORY.'/include/database.php';
                    require_once '\htdocs\include\database.php';

                    $sql =" SELECT * FROM products
                            INNER JOIN categories 
                            ON products.id_category = categories.id_category;";

                    $result = mysqli_query($conn, $sql);
                                
                    $sqlConn = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    
                    foreach ($sqlConn as $row) { 

                        if(empty($row['imgSrc'])){
                          $row['imgSrc']= "default_product.png";
                        } 
                ?>  

                <tr>
                    <td><?=$row['id_product']?></td>
                    <td class="text-nowrap fw-bold h6 fs-6 w-25"><?=$row['name_category']?></td>
                    <td class="text-nowrap fw-bold h6 fs-6 w-25"><?=$row['name_product']?></td>                    
                    <td><?=$row['price']?></td>
                <td>
                       
                
                    <img class="img img-fluid" src="http://localhost:8000/uploads/products/<?=$row['imgSrc']?>" width="70px" alt="">
                </td>
                <td><?= date_format(date_create($row['date_product']),format:'d/m/y' )?></td>
                <td>
                    <div class="d-flex py-2">
                        <a href="modif.php?id=<?=$row['id_product'] ?>" class="btn btn-primary btn-sm mx-1">Modifier</a>
                        <a href="suprim.php?id=<?=$row['id_product']?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('Confirmez la suppression de <?=$row['name_product']?>?')">Suprimer</a>          
                    </div>
                </td>
                </tr>  
                <?php     
                    }                             
                ?>          

        </tbody> 

    </table>

     <!----------------------> 
    </div>
    <div class="col">
      
    </div>
  </div>

    <!----------------------->



</div>

 
<?php $content = ob_get_clean(); ?>


<?php //include ROOT_DIRECTORY."/layout.php" ?>

<?php require_once 'C:\htdocs\layout.php'?>





