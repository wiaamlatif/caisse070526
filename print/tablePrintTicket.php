<?php  $idTicket=$_GET['idTicket'] ?>
<?php
  $title="Impression Tcket Vente";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">  
    <link rel="stylesheet" href="/asset/css/style.css" media="print">   
    <title><?=$title?></title>
</head>

<body onload="printTicketCaisse(<?=$idTicket?>)" onafterprint="">

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
      
      <script src="/asset/js/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>     
</body>
</html>
