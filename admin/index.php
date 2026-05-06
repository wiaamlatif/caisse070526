<?php $title ="Page Admin"; ?>

<?php ob_start();?>
  <?php 
    //Start a SESSION ...
    session_start();
   //var_dump($_SESSION);
   ?>

  <body onload="startTime()">  
   
    <div class="container text-center">

        <div class="d-flex justify-content-between py-2">

            <?php include '../include/navAdmin.php';?>
            
            <span id ="displayTime" class="badge rounded-pill text-bg-primary fs-4"></span>        

            <span ><a class="btn badge bg-black fs-4 fs-bold" href="/index.php">Front side</a></span>

        </div>      

      
        <div style="grid-template-columns: 1fr 1fr 1fr;" class="d-grid gap-1">

          <div class="col"> 
            <a href="#" class="btn">
                <h3>
                    <span class="badge text-bg-success text-white">Statistique</span>
                </h3>
            </a>                            
          </div>

          <div class="col">                                          
            <a href="#" class="btn">
                <h3>
                    <span class="badge text-bg-primary text-white">Personnaliser</span>
                </h3>
            </a>                                              
          </div>
          
          <div class="col" > 
            <a href="#" class="btn">
                <h3>
                    <span class="badge text-bg-danger text-white">Initialise Database</span>
                </h3>
            </a>                      
          </div>  

        </div>


    </div>    

  </body>

<?php $content = ob_get_clean(); ?>


<?php require_once 'C:\htdocs\layout.php'?>