<?php
   if(isset($_GET['idUser'])){

    $idUser = $_GET['idUser'];     
   }

   session_start();

   //var_dump($_SESSION);
   $_SESSION['user']['id_user']=$idUser;
  

require_once "\htdocs\include\database.php";


//>> we select all tickets for idEmployeeSelected
$sql ="SELECT * FROM tickets
       WHERE id_user = $idUser;";
             
$result = mysqli_query($conn,$sql);
                
$headTickets = mysqli_fetch_all($result, MYSQLI_ASSOC);

$arrayHeadTicket=[];
if(!empty($headTickets)){ 

   foreach ($headTickets as $headTicket){ 

         $idTicket = $headTicket['id_ticket'];
         $nrTicket = $headTicket['nr_ticket'];
      $totalTicket = $headTicket['total_ticket'];
        
      $elementHeadTicket = [  
            "idTicket" => $idTicket,
            "nrTicket" => $nrTicket,
         "totalTicket" => $totalTicket         
                           ];
      
      array_push($arrayHeadTicket,$elementHeadTicket); 

   }//foreach

   //Find firstName
   $sql = "SELECT * FROM users
           WHERE id_user  = '$idUser';";

   $result = mysqli_query($conn, $sql);

   $user = mysqli_fetch_assoc($result);
  
   $firstName = $user['first_name'];

   $arrayInfo = [
                 "firstName" => $firstName //pour afficher le vendeur choisi             
                ];

   array_push($arrayHeadTicket,$arrayInfo); 

   print_r(json_encode($arrayHeadTicket));

}

