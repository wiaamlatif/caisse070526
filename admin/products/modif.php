<?php // require '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>
<?php
$title ="Modif product";
ob_start();
?>
  <?php // include ROOT_DIRECTORY.'/include/navAdmin.php'; ?>
  <?php require_once '\htdocs\include\navAdmin.php'; ?>

  <?php
  if(isset($_POST['back'])){
    //Redirection
    header('location:index.php');
  }
  ?>  

  <?php

  //require_once ROOT_DIRECTORY.'/include/database.php';
    require_once '\htdocs\include\database.php';
     
    $id = $_GET['id'];          
    
    //Pour afficher les anciennes valeurs
    $sql= " SELECT * FROM products
            INNER JOIN categories
            ON products.id_category = categories.id_category
            WHERE products.id_product  = '$id';";

    $result = mysqli_query($conn, $sql); 

    $produit = mysqli_fetch_assoc($result); 
    
    if(empty($produit['imgSrc'])){
      $produit['imgSrc']='default_product.png';
    }


    //=======(Submit modif product)===============================

         if(isset($_POST['modifProduct'])){
        $nameProduct = $_POST['name_product'];
         $idCategory = $_POST['id_category'];         
              $price = $_POST['price'];
           
         //$data = json_decode(file_get_contents("php://input"));
         
        var_dump($_FILES);

        echo "<br>";
        var_dump($_POST); 
         
      if(empty($_FILES['imgSrc']['name'])){
          $imgSrc='default_product.png';
        } else {        
          $imgSrc=uniqid().$_FILES['imgSrc']['name'];           
          move_uploaded_file($_FILES['imgSrc']['tmp_name'],'/htdocs/uploads/products/'.$imgSrc);
        }
          
      if(!empty($nameProduct) && !empty($imgSrc) ){

      $sql="UPDATE products
               SET name_product   ='$nameProduct',
                      id_category ='$idCategory',
                            price ='$price',
                           imgSrc ='$imgSrc'                                     
            WHERE id_product = '$id';";

      $result = mysqli_query($conn,$sql);
      
         
      //Redirection
      header('location:index.php');

      } else {
      echo "
      <div class='alert alert-danger' role='alert'>
        Le nom du produit est obligatoire !
      </div>";      
      }
     }//isset($_POST['modifProduct'])

    ////=======(Submit modif product)===============================
  ?>

 <div class="container py-2">

  <form method="post" enctype="multipart/form-data">

        <label class="form-label">Name product</label>
        <input type="text" class="form-control w-50" name="name_product" value="<?=$produit['name_product']?>">

        <label class="form-label" >Category:</label>
        <select class="form-control w-50" name="id_category" id="id_category">
            <option value="<?=$produit['id_category']?>"><?=$produit['name_category']?></option>
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
        <input type="text" class="form-control" name="price" value="<?=$produit['price']?>">

        <label for="file-input">Sélectionnez une image :</label>
        <!-- Input de type fichier qui accepte seulement les images -->
        <input type="file" id="file-input" name="imgSrc" accept="image/*">
        <!-- Élément img pour afficher l'aperçu -->
        <img src="http://localhost:8000/uploads/products/<?=$produit['imgSrc']?>" id="image-preview" alt="Aperçu de l'image" style="max-width: 150px; margin-top: 10px;">

        <input type="submit" value="Modif Produit" class="btn btn-primary my-2" name="modifProduct">
        <input type="submit" value="Back" class="btn btn-danger my-2" name="back">
  

  </form>

 </div>

   <script>

// Sélection des éléments HTML
const fileInput = document.getElementById('file-input');
const imagePreview = document.getElementById('image-preview');

// Ajout d'un écouteur d'événement 'change' sur l'input
fileInput.addEventListener('change', function(event) {
  // S'assurer qu'un fichier a bien été sélectionné
  if (event.target.files && event.target.files[0]) {
    // Créer un objet FileReader
    const reader = new FileReader();

    // Définir ce qui se passe quand le fichier est lu avec succès
    reader.onload = function(e) {
      // e.target.result contient l'URL de données Base64 de l'image
      // Mettre à jour l'attribut src de l'image d'aperçu
      imagePreview.src = e.target.result;
      // Rendre l'image visible
      imagePreview.style.display = 'block';
    };

    // Lire le fichier comme une URL de données (Base64)
    
    reader.readAsDataURL(event.target.files[0]);

  }
});
  
  </script>




<?php $content = ob_get_clean(); ?>

<?php // include ROOT_DIRECTORY."/layout.php" ?>
<?php require_once 'C:\htdocs\layout.php'?>