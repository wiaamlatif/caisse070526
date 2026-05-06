<?php

if(isset($_GET['idTicket'])){

    $idTicket = $_GET['idTicket'];   
}

?>

<?php $title ="Print Ticket"; ?>

<?php ob_start();?>
<!------------------------content---------------------------------->

<div class="container text-center">
  <div class="row">

    <!---------(Col1)------------------->
    <div class="col">      
    </div>
    <!---------(col1)------------------->

    <!---------(Col1)------------------->
    <div class="col d-flex flex-column justify-content-center align-items-center lh-1"> 
      <div id="showHeadTicket">

      </div>

      <div>
          <table>
            <tbody class="text text-dark text-nowrap  h6 fs-6 w-50 align-items-start" id="showDetailTicket">

            </tbody>
          </table>
      </div>

      <div id="showFootTicket">

      </div>

    </div>
    <!---------(col1)------------------->

    <!---------(Col1)------------------->
    <div class="col">      
    </div>
    <!---------(col1)------------------->    

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