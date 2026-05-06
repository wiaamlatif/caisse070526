<?php
    session_start();

    $idUser = $_SESSION['user']['id_user'];

    $idLigneTicket=0;
    if(isset($_GET['idLigneTicket'])){
        $idLigneTicket = $_GET['idLigneTicket'];  
        $_SESSION['idLigneTicket']=$idLigneTicket;             
    }

    if(isset($_GET['plusMinus'])){
        $plusMinus = $_GET['plusMinus'];     
    }

    if(isset( $_SESSION['currentIdTicket'])){
        $idTicket= $_SESSION['currentIdTicket'];       
    }
 
  require_once "\htdocs\include\database.php";

  $sql="SELECT quantity
          FROM lignes_ticket 
         WHERE id_ligne_ticket = $idLigneTicket;";
                      
  $result = mysqli_query($conn, $sql);

  $Quantity = mysqli_fetch_assoc($result);

  $currentQuantity = (int) $Quantity['quantity']; 

  if( $plusMinus == 1){

    if($currentQuantity<100){
        $currentQuantity= $currentQuantity + 1;
    }

  }  elseif ($plusMinus == 0) {

    if($currentQuantity>0){
        $currentQuantity= $currentQuantity - 1;
    }

  }
  
  if($currentQuantity>0){

    $sql="UPDATE lignes_ticket
             SET quantity = $currentQuantity                                                      
           WHERE id_ligne_ticket  = $idLigneTicket ;";

  } else {
    $sql ="DELETE FROM lignes_ticket 
                  WHERE id_ligne_ticket=$idLigneTicket;";
  } 
      
  $result = mysqli_query($conn, $sql); 
  
  $sql="SELECT SUM(price * quantity) as sumTicket FROM lignes_ticket
        INNER JOIN products ON products.id_product = lignes_ticket.id_product
             WHERE id_ticket= $idTicket;";

  $result = mysqli_query($conn, $sql); 
  $totalCurrentTicket = mysqli_fetch_assoc($result);
  
  $totalTicket=0;
  if($totalCurrentTicket!=null){

  $totalTicket = $totalCurrentTicket['sumTicket'];

  }

   $sql=" UPDATE  `tickets`
             SET   total_ticket = $totalTicket               
           WHERE   id_ticket   = $idTicket;";
 
   $result = mysqli_query($conn, $sql); 
  
 
   $toSend = [
                    "idTicket" => $idTicket,             
                      "idUser" => $idUser
             ];
  
  print_r(json_encode($toSend));