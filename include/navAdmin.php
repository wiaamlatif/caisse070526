<?php
      //session_start();

      //echo $_SERVER['PHP_SELF'];

      $textNav = array(
                        0 => "Dashboard",
                        1 => "Categories",
                        2 => "Products",                                                
                        3 => "Tickets",
                        4 => "X/Z",                       
                        5 => "Employes",                                            
                        6 => "Users",
                        7 => "Deconnexion"
      );

      $urlNav = array(
                       0 => "/admin/index.php",
                       1 => "/admin/categories/index.php",
                       2 => "/admin/products/index.php",
                       3 => "/admin/ticket/index.php",
                       4 => "/admin/x_z/index.php",
                       5 => "/admin/employes/index.php",
                       6 => "/admin/users/index.php",
                       7 => "/include/deconnexion.php"
      ); 

      for ($i=0; $i < count($urlNav) ; $i++) { 
        $coloredNav[$i]="";
      }
      
      $clickedNav=array_search($_SERVER['PHP_SELF'],$urlNav);

      $coloredNav[$clickedNav]= "bg-primary text-white active";
                  
      $countItems=0;      
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">

<div class="container-fluid">

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

            <?php
            for ($i = 0; $i <= 7; $i++) {
            ?>

               <li class="nav-item">
                 <a class="nav-link <?=$coloredNav[$i]?>" href=<?=$urlNav[$i]?>> <?=$textNav[$i]?> </a>
               </li>

            <?php
            }
            ?>

      </ul>      
      </div>
      
      <div class="d-flex flex-row gap-2 justify-content-center align-items-center">
        
        <span id ="displayTime" class="badge rounded-pill text-bg-primary fs-4"></span>        
      </div>

    
  </div>
</nav>

<style>

  body > nav > div > div.d-flex.flex-row.gap-2.justify-content-center.align-items-center > span:nth-child(1) > a {

    background: black;
    color : chartreuse;

  }

    body > nav > div > div.d-flex.flex-row.gap-2.justify-content-center.align-items-center > span:nth-child(1) > a:hover {

    background: black;
    color : white;

  }

</style>