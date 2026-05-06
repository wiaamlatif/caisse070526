<?php

  if(isset($_GET['idEmployee'])){

      $idEmployee = $_GET['idEmployee'];   
  }

?>

<?php $title ="Print X employee"; ?>

<?php ob_start();?>
<!------------------------content---------------------------------->

<div class="container text-center">
  <div class="row">

    <!---------(Col1)------------------->
    <div class="col">      
    </div>
    <!---------(col1)------------------->

    <!---------(Col2)------------------->
    <div class="col d-flex flex-column justify-content-center align-items-center lh-1"> 

      <div id="showHeadxEmploye">
           
      </div>

      <div>
          <table class="table table-striped table-sm">
            <tbody class="text text-dark text-nowrap  h6 fs-6 w-50 align-items-start" id="showListCategory">

            </tbody>
          </table>
      </div>

      <div id="showFootxEmploye">

      </div>

    </div>
    <!---------(col2)------------------->

    <!---------(Col3)------------------->
    <div class="col">      
    </div>
    <!---------(col3)------------------->    

  </div>
</div> 

<style>
  .dateTicket{   
    font-size: 14px;
  }
</style>

<!-----------------------content------------------------------------>
<?php $content = ob_get_clean(); ?>

    

<?php require_once "layout.php";?>