<?php

  if(isset($_GET['idEmployee'])){

      $idEmployee = $_GET['idEmployee'];   
  }

  require_once "\htdocs\include\database.php";

  $sql = "SELECT * FROM  employees           
            WHERE id_employee  = $idEmployee";    
          
  $result = mysqli_query($conn, $sql);

  $theEmploye = mysqli_fetch_assoc($result);
  
  $idLastZ = $theEmploye['idLastZ'];
  $nameVendeur =  $theEmploye['first_name']; 

  $sql = "SELECT
                tickets.idz_employee,
                lignes_ticket.id_ligne_ticket,
                categories.id_category,
                categories.name_category,
                lignes_ticket.id_product,
                products.name_product,
                products.price,
                lignes_ticket.quantity           
          FROM
                lignes_ticket
          INNER JOIN tickets ON tickets.id_ticket = lignes_ticket.id_ticket
          INNER JOIN products ON lignes_ticket.id_product = products.id_product
          INNER JOIN categories ON categories.id_category = products.id_category
          WHERE
                tickets.id_employee = $idEmployee 
          AND   tickets.idz_employee = $idLastZ 
          AND   tickets.set_z_employe = 0     
          ORDER BY
                categories.id_category,
                lignes_ticket.id_product;";  
                
  $result = mysqli_query($conn,$sql);
  
  $items = mysqli_fetch_all($result, MYSQLI_ASSOC); 

  $arrayTicket=[];
      
  //Extraire les categories existantes, de la table "lignes_ticket"
  //tableau listCategory 
  $listCategory=[];   
  foreach($items as $item){

  $idCategory=$item['id_category'];          
  $listCategory[$idCategory]=$item['name_category'];         

  }//foreach  

  // array_push($arrayTicket,$listCategory);

  //Extraire les produits existants, de la table "lignes_ticket"
  //tableau listProduct 
  $listProduct=[];   
  foreach($items as $item){

    $idProduct=$item['id_product'];          
    $listProduct[$idProduct]=$item['name_product'];         

  }//foreach  

 //array_push($arrayTicket,$listProduct);

  //Trouver les details de vente venteProducts
  // pour chaque produit de la table "lignes_ticket"
  $venteProducts=[];
  $somCategory=[];
  $somX=0;
  foreach ($listCategory as $category){

    $somCategory[$category]=0;
    foreach($listProduct as $product){

      $somQuantity=0;
      $somMontant=0;
      foreach($items as $item){
       
        $idProduct = $item['id_product'];
        $nameProduct = $item['name_product'];
        $nameCategory= $item['name_category'];      
        if(($product==$nameProduct)and($category==$nameCategory)){

          $somQuantity += $item['quantity'];
          $montant = $item['quantity'] * $item['price'];
          $somMontant += $montant;          
          $venteProducts[$idProduct]=[$item['name_category'],$item['name_product'],$item['price'],$somQuantity,$somMontant];         
          $somCategory[$category]+=$montant;
        }

      }//items

    }//listProduct

    $somX+=$somCategory[$category];

  }//$listCategory
  

  array_push($arrayTicket,$somCategory);
  array_push($arrayTicket,$venteProducts);
 
  $infoTicket = [                    
                  "idVendeur" => $idEmployee,           
                "nameVendeur" => $nameVendeur,
                    "idLastZ" => $idLastZ, 
                    "somX"    => $somX
                ]; 


  array_push($arrayTicket,$infoTicket); 


  print_r(json_encode($arrayTicket));    
    
?>