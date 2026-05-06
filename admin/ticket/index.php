<?php $title ="Opération Vente"; ?>


<?php ob_start();?>
<!------------------------content----------------------------------->
   <?php require_once '\htdocs\include\navAdmin.php'; ?>

  <div class="container text-center">

    <div style="grid-template-columns: 1fr 1fr 1fr;" class="d-grid gap-1">

      <div class="col">    
      <?php include 'HeadsTicketTable.php';?>   
      </div>

      <div class="col">
      <?php include 'C:\htdocs\front\product\ticketTable.php';?>          
      </div>

      <div class="col">
      <?php include 'C:\htdocs\front\product\productsTable.php';?>
      </div>  

    </div>

  </div>

<?php $content = ob_get_clean(); ?>
<!-----------------------content------------------------------------>


<?php require_once 'C:\htdocs\layout.php'?>




