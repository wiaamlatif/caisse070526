<?php //require '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>
<?php
$title ="Delete product";
ob_start();
?>

<?php //$varSell="Sell";$varData="Data";?>
<?php //include ROOT_DIRECTORY.'/include/navAdmin.php'; ?>
<?php require_once '\htdocs\include\navAdmin.php'; ?>

<?php
  if(isset($_POST['back'])){
    //Redirection
    header('location:index.php');
  }
  ?> 

<?php
$id = $_GET['id'];

//require_once ROOT_DIRECTORY.'/include/database.php';
require_once '\htdocs\include\database.php';

$sql ="DELETE FROM products
       WHERE products.id_product ='$id';";

$result = mysqli_query($conn, $sql);        


//Redirection
header('location:index.php');
?>



<?php $content = ob_get_clean(); ?>


<?php include ROOT_DIRECTORY."/layout.php" ?>