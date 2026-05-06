<?php
  $idShow = $_GET['idShow'] ;

  session_start();

  if($idShow==1){
       $_SESSION['user']['display'] = true;
  } else if($idShow==0){
       $_SESSION['user']['display'] = false;
  }

  $arrayTicket=[];

  $infoTicket = [ 
                  "idShow" => $idShow                         
               ]; 

array_push($arrayTicket,$infoTicket);  

print_r(json_encode($arrayTicket)); 
