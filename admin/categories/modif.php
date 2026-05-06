<?php // require '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>
<?php
$title ="Modif Category";
ob_start();
?>
    <div class="container py-2">

 <?php 

    if(isset($_POST['back'])){
    //Redirection
    header('location:index.php');
    }

    //require_once ROOT_DIRECTORY."/include/database.php";
    require_once "C:\htdocs\include\database.php";
     
    $id = $_GET['id'];

    //Pour afficher la valeur ancienne 
    $sql = "SELECT * FROM categories
    WHERE id_category= '$id';"; 

    $result = mysqli_query($conn, $sql); 

    $category = mysqli_fetch_assoc($result);
      
if(isset($_POST['modifCategory'])){

  $nameCategory =$_POST['name_category'] ;

  if(!empty($nameCategory)){

    $sql = "UPDATE categories
    SET name_category = '$nameCategory'                                               
    WHERE id_category= '$id';"; 

    $result = mysqli_query($conn, $sql); 

    //Redirection
    header('location:index.php');

  } else {
  ?>

    <div class='alert alert-danger' role='alert'>
    Le nom de la categorie est obligatoire !
    </div>";

  <?php     
  }
} //if(isset($_POST['modifCategory'])) 
     
?>
    

  <form method="post">

    <label class="form-label fw-bolder"> Category: </label>
    <input type="text" class="form-control" name="name_category" value="<?=$category['name_category']?>">
    

    <input type="submit" value="Modif Category" class="btn btn-primary my-2" name="modifCategory">
    <input type="submit" value="Back" class="btn btn-danger my-2" name="back">

  </form>

</div>


<?php $content = ob_get_clean(); ?>


<?php require_once 'C:\htdocs\layout.php'?>