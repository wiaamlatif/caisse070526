<?php
        session_start();

        $idUser = $_SESSION['user']['id_user'];
        
//**************************/
//* find the $lastNrTicket */
//**************************/
require_once "\htdocs\include\database.php";

$sql = "SELECT nr_ticket FROM `tickets` 
        ORDER BY  `id_ticket`DESC
        LIMIT 1;";

$result = mysqli_query($conn,$sql);

$ticket  =  $result -> fetch_assoc();

if(isset($ticket)){
    $lastNrTicket = $ticket['nr_ticket'];
} else {
    $lastNrTicket="0";
}

$lastNrTicket= (int) $lastNrTicket + 1;

//Put eight 0 at left of the numbre of tickets
$lastNrTicket = str_pad( $lastNrTicket, 8, '0', STR_PAD_LEFT);


//***************************************************/
//* Insert a new empty records in the table tickets */
//***************************************************/

$idzUser = 21 ; //Z not yet established 
$setZUser = 0;
$setZGeneral = 0;
$printed = 0;
$nrTicket = $lastNrTicket;
$totalTicket= 0;


require_once "\htdocs\include\database.php";

//`tickets` (`id_ticket`, `id_employee`, `idz_employee`, `nr_ticket`, `total_ticket`, `set_z_employe`, `set_z_general`, `printed`, `date_ticket`
$sql= "INSERT INTO `tickets`
                 (`id_employee`,
                  `idz_employee`,
                  `set_z_employe`,
                  `set_z_general`,
                  `printed`,
                  `nr_ticket`,
                  `total_ticket`)                                   
          VALUES ('$idUser',
                  '$idzEmploye',
                  '$setZEmploye',
                  '$setZGeneral',
                  '$printed',
                  '$nrTicket',
                  '$totalTicket');";             
                                        
$result = mysqli_query($conn,$sql);

if ($result){
  $last_id = $conn->insert_id;      
}

$_SESSION['currentIdTicket'] = $last_id;  

$toSend = [
           'idEmployee' => $idEmployee,
             'idTicket' => $last_id    
           ];

print_r(json_encode($toSend));


?>