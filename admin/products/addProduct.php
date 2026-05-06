<?php //require '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>
<?php
$title ="Add a product";
ob_start();
?>
   
<?php //include ROOT_DIRECTORY.'/include/navAdmin.php'; ?>
 <?php require_once '\htdocs\include\navAdmin.php'; ?>


<?php       
    //require_once ROOT_DIRECTORY.'/include/database.php';
    require_once '\htdocs\include\database.php';

    if(isset($_POST['AddProduct'])){

      $name_product = $_POST['name_product'];
      $id_category = $_POST['id_category'] ;     
            $price = $_POST['price'];

      if(empty($imgSrc)){
          $imgSrc='default_product.png';
      }

     //echo "<pre>";
     //var_dump($_POST);
     //echo "</pre>";

     if(!empty($name_product) && !empty($id_category)){

      if(empty($_FILES['imgSrc']['name'])){
         $imgSrc='default_product.png';
       } else {
         $imgSrc=uniqid().$_FILES['imgSrc']['name'];                    
         move_uploaded_file($_FILES['imgSrc']['tmp_name'],'/htdocs/uploads/products/'.$imgSrc);
       }

       //=================================
       $sql= "INSERT INTO `products`
                 (`name_product`,
                  `id_category`,
                  `price`,                                
                  `imgSrc`)
          VALUES ('$name_product',
                  '$id_category',
                  '$price',                                    
                  '$imgSrc');";
       
                       
$result = mysqli_query($conn,$sql);

//Redirection
header('location:index.php');

} else {
echo "<div class='alert alert-danger' role='alert'>
        Le nom du produit, la categorie sont obligatoires !
      </div>";
}          
    }//AddProduct
        
?>      

    <div class="container py-2 w-50">

      <form method="post" enctype="multipart/form-data">

        <label class="form-label">Name product</label>
        <input type="text" class="form-control" name="name_product">

        <label class="form-label" >Category:</label>
        <select class="form-control" name="id_category" id="id_category">
            <option value="">Choisir une Categorie ...</option>
          <?php 
              $sql = "SELECT * FROM categories;";
              $result = mysqli_query($conn, $sql);
              $sqlstm = mysqli_fetch_all($result, MYSQLI_ASSOC);                
              foreach ($sqlstm as $row) {  
          ?>              
            <option value='<?=$row['id_category']?>'><?=$row['name_category']?></option>;
          <?php     
              }                             
          ?>          
        </select>
        
        <label class="form-label">Price</label>
        <input type="text" class="form-control" name="price">



        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="imgSrc">

        <input type="submit" value="AddProduct" class="btn btn-primary my-2" name="AddProduct">

      </form>

      <a href="index.php" class="btn btn-danger btn-sm">Your Add</a>

    </div>

<?php $content = ob_get_clean(); ?>


<?php // include ROOT_DIRECTORY."/layout.php" ?>
<?php require_once 'C:\htdocs\layout.php'?>