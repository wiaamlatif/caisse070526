<?php // require '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>

<?php
$title ="Add Category";
ob_start();
?>
  <?php include 'C:\htdocs\include\navAdmin.php';?>

    <div class="container py-2">

    <?php
         
         if(isset($_POST['addCategory'])){
         
          $nameCategory=$_POST['name_category'];
         
          if(!empty($nameCategory)){

            require_once "C:\htdocs\include\database.php";
                      
            $sql = "INSERT INTO categories (name_category)
                    VALUES ('$nameCategory')";

            $result = mysqli_query($conn, $sql); 
        
            if($result){
              //Redirection
              header('location:index.php');
            } else {
              echo "ERROR !" ;
            }
          } else {
             echo "
                    <div class='alert alert-danger' role='alert'>
                      Le nom de la categorie est obligatoire !
                    </div>
                  ";
          }          

         }
?>      

      <form method="post">

        <label class="form-label">Category :  </label>
        <input type="text" class="form-control" name="name_category">

        <input type="submit" value="Ajouter" class="btn btn-primary my-2" name="addCategory">

      </form>

    </div>

<?php $content = ob_get_clean(); ?>


<?php require_once 'C:\htdocs\layout.php'?>