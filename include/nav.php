<?php
  //echo $_SERVER['PHP_SELF'];
 
  $urlNav = array(
                   0 => "/index",//Products                   
                   1 => "/front/product/index.php",
                   2 => "/include/deconnexion.php",
                   3 => "/include/connexion.php"
                );

  for ($i=0; $i < count($urlNav) ; $i++) { 
    $coloredNav[$i]="";
  }
  
  $clickedNav=array_search($_SERVER['PHP_SELF'],$urlNav);

  //if(in_array($clickedNav,[1,7])){$clickedNav=1;}

  $coloredNav[$clickedNav]= "bg-primary text-white active";

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">

  <div class="container-fluid">

      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link <?=$coloredNav[0]?>" role="button" aria-disabled="true" href=<?=$urlNav[0]?>>Products</a>
        </li>

        <?php if(isset($_SESSION['user'])) { ?> 

        <li class="nav-item">
          <a onfocusin="displayHeadsTickets(<?=$_SESSION['user']['id_user']?>)" class="nav-link <?=$coloredNav[1]?>" role="button" aria-disabled="true" href=<?=$urlNav[1]?> >Vente</a>
        </li>        

        <li class="nav-item">                                       
          <a class="nav-link <?=$coloredNav[2]?>" href=<?=$urlNav[2]?>>Deconnexion</a>
        </li>        
        <?php   } else {       ?>       
        <li class="nav-item">
          <a class="nav-link <?=$coloredNav[3]?>" href=<?=$urlNav[3]?>>Connexion</a>
        </li>
        <?php   }       ?>       
        
      </ul>
            

      <?php
         if(isset($_SESSION['user']) && $_SESSION['user']['role']==1){
      ?>
      
      <div class="d-flex flex-row gap-2 justify-content-center align-items-center">
        <span><a class="btn badge fs-4 fs-bold" href="/admin/index.php">Back side</a></span>
       
      </div>

      <?php
         }
      ?>

      <h3><span class="badge text-bg-success text-white" id="NameVendeur"></span></h3>
      
  </div>
  
</nav>

<style>

body > nav > div > div > span:nth-child(1) > a {
  background: black;
      color : chartreuse;
}

body > nav > div > div > span:nth-child(1) > a:hover {  
      background: black;
      color : white;
}
 
</style>