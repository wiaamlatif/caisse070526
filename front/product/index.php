<?php 
  //Start a SESSION 
  session_start();
  // echo "<pre>"; 
  // var_dump($_SESSION);
  // echo "</pre>"; 
?>
<?php $title ="Opération Vente"; ?>
<?php ob_start();?>
<!------------------------content----------------------------------->
  <body onload="displayHeadsTickets(<?=$_SESSION['user']['id_user']?>)">  
   
    <div class="container text-center">

        <div class="d-flex justify-content-between py-2">

          <?php include 'C:\htdocs\include\nav.php';?>  

          <div class="d-flex justify-content-center py-2">
            <span ><a class="btn badge rounded-pill text-bg-dark text-info fs-6 fs-bold py-3 mx-2" href="http://localhost:8000/admin/index.php">Back side</a></span>
            <span id ="displayTime" class="badge rounded-pill text-bg-dark fs-6 fs-bold py-3"></span>                    
          </div>

        </div>

        <div class="d-flex justify-content-center py-2">

          <div>
                <?php include'dropDownVendeur.php'; ?>
          </div>
          
          <div id="idShowBtnCategories">   
              
          </div>               
      
        </div>

        <div style="grid-template-columns: 1fr 1fr 1fr;" class="d-grid gap-1">

          <div class="col">                  
              <?php include 'HeadsTicketTable.php';?>
          </div>

          <div class="col">              
              <?php include 'ticketTable.php';?>          
          </div>
          
          <div class="col" >            
             <?php include 'productsTable.php';?>       
          </div>  

        </div>
                
      </div> 

  </body>

<?php $content = ob_get_clean(); ?>

<!-----------------------content------------------------------------>

      <script> 
  
        function startVente(){

        //()=> id="idShowBtnCategories"
          var idShowBtnCategoriesEl = document.getElementById("idShowBtnCategories");
          if(idShowBtnCategoriesEl!=null){
              idShowBtnCategoriesEl.innerHTML=``;
          }

        //()=> C:\htdocs\front\product\ticketTable.php

          // -------> id="showHeadTicket"
          var showHeadTicketEl= document.getElementById("showHeadTicket");
          if(showHeadTicketEl!=null){
            showHeadTicketEl.innerHTML=``;
          }

          // -------> id="showDetailTicket"          
          var showDetailTicketEl = document.getElementById("showDetailTicket");
          if(showDetailTicketEl!=null){
            showDetailTicketEl.innerHTML=``;
          }          


          // -------> id="showFootTicket"         
          var showFootTicketEl= document.getElementById("showFootTicket")
          if(showFootTicketEl!=null){
            showFootTicketEl.innerHTML=``;
          }          


        //()=> C:\htdocs\front\product\productsTable.php

          // -------> id="showHeadProduct">          
          var showHeadProductEl= document.getElementById("showHeadProduct")
          if(showHeadProductEl!=null){
            showHeadProductEl.innerHTML=``;
            }                    


          // -------> id="showDetailProduct"         
          var showDetailProductEl= document.getElementById("showDetailProduct")
          if(showDetailProductEl!=null){
            showDetailProductEl.innerHTML=``;
            }          

        }//startVente

        function updateTicket(){
          
          //idShowBtnCategories
          var idShowBtnCategoriesEl = document.getElementById("idShowBtnCategories");
          if(idShowBtnCategoriesEl!=null){
              idShowBtnCategoriesEl.innerHTML=`<?php include 'dropDownCategory.php'; ?>`;
          }
          
        } 

      </script>

<?php require_once 'C:\htdocs\layout.php'?>




