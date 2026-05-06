<?php
    // Handle 2 ids :
    // id of the selected product ...color the selected line => currentIdProduct
    // id of the line of the item's ticket come from products => color the line 

    session_start();

     $idUser = $_SESSION['user']['id_user'];

    if(isset( $_SESSION['currentIdProduct'])){
        $currentIdProduct = $_SESSION['currentIdProduct'];       
    }
   
    if(isset( $_SESSION['currentIdTicket'])){
        $currentIdTicket = $_SESSION['currentIdTicket'];       
    }
   
    require_once "\htdocs\include\database.php";

    $sql="SELECT COUNT(`id_product`) as countProduct FROM lignes_ticket     
           WHERE `id_ticket` = $currentIdTicket
             AND `id_product`= $currentIdProduct;";
             
    $result = mysqli_query($conn, $sql);

    $countIdProduct = mysqli_fetch_assoc($result);

    $countProduct = $countIdProduct['countProduct'];
        
    if($countProduct>0){
       //   echo 'The product alrady exist !';
    
       //Find the id_ligne_ticket of the added product,
       // if it is alrady exist in the ticket 
       $sql="SELECT id_ligne_ticket AS idLineSelected FROM lignes_ticket     
              WHERE `id_ticket` = $currentIdTicket
                AND `id_product`= $currentIdProduct;";
         
        $result = mysqli_query($conn, $sql);

        $LineTicket = mysqli_fetch_assoc($result);

        //id_ligne_ticket for the picked product 
        $idLineSelected = $LineTicket['idLineSelected'];
      
        $_SESSION['idLineSelected']=$idLineSelected;
        $_SESSION['lastIdInserted']=0;

    } else {
        //If it is a new product in the ticket, 
        // it will be inserted at the last of the ticket
        $sql= "INSERT INTO  `lignes_ticket`
                           (`id_ticket`,
                            `id_product`,
                            `quantity`)
                    VALUES('$currentIdTicket',
                           '$currentIdProduct',
                           '1');";

        $result = mysqli_query($conn,$sql);

        $lastIdInserted = mysqli_insert_id($conn);

        $_SESSION['idLineSelected']=$lastIdInserted;
        $_SESSION['lastIdInserted']=$lastIdInserted;
      
//>> totalTicket

        $sql="SELECT SUM(products.price*lignes_ticket.quantity) as sumTicket FROM lignes_ticket
              INNER JOIN products ON lignes_ticket.id_product = products.id_product
                   WHERE lignes_ticket.id_ticket = $currentIdTicket;";
                 
        $result = mysqli_query($conn, $sql);

        $product = mysqli_fetch_assoc($result);
  
        $totalTicket=$product['sumTicket'];//$product['sumTicket'];
        
        $sql=" UPDATE  `tickets`
                  SET   total_ticket = $totalTicket 
                WHERE      id_ticket = $currentIdTicket;";

        $result = mysqli_query($conn, $sql); 

    }

               $data = ['idUser' => $idUser,
               'currentIdTicket' => $currentIdTicket];

    print_r(json_encode($data));        
        //==================================    

/*
`lignes_ticket`
id_ligne_ticket
id_ticket
id_product
price
quantity
total_ligne	
*/
?>