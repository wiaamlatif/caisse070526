<?php 
  //Start a SESSION 
  session_start();
  // echo "<pre>"; 
  // var_dump($_SESSION);
  // echo "</pre>"; 
?>
<?php $title ="Home"; ?>

<?php ob_start();?>

    <div class="container text-center">

        <div class="d-flex justify-content-between py-2">

          <?php include 'C:\htdocs\include\nav.php';?>  

          <div class="d-flex justify-content-center py-2">
            <span ><a class="btn badge rounded-pill text-bg-dark text-info fs-6 fs-bold py-3 mx-2" href="http://localhost:8000/admin/index.php">Back side</a></span>
            <span id ="displayTime" class="badge rounded-pill text-bg-dark fs-6 fs-bold py-3"></span>                    
          </div>

        </div>

        <div style="grid-template-columns: 1fr 1fr 1fr;" class="d-grid gap-1">

          <div class="col">                  
              
          </div>

          <div class="col">              
             <?php include 'C:\htdocs\front\product\dropDownCategory.php';?> 
             <?php include 'C:\htdocs\front\product\productsTable.php';?>       
          </div>
          
          <div class="col" >            
             
          </div>  

        </div>        

     </div>

<?php $content = ob_get_clean(); ?>

<?php require "layout.php" ?>
