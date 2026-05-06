<?php
$title ="Liste des categories";

$idz=$_GET['id'];

ob_start();
?>
  <?php $varSell="Sell";$varData="Data";?>
  <?php include 'C:\caisse191124\include\navAdmin.php'; ?>

<div class="container py-2">

<table class="table table-striped table-hover">
  <thead>
    <tr><!-- table row--->  
    <!--
      <th>name category</th>
      <th>total category</th>  
    -->
    </tr>
  </thead>

  <tbody>

  <?php 
        require_once 'C:/caisse191124/include/database.php';

        $sql = "SELECT
                  tickets.id_z,
                  lignes_ticket.id_ligne_ticket,
                  categories.id_category,
                  categories.name_category,
                  lignes_ticket.id_product,
                  products.name_product,
                  products.price,
                  lignes_ticket.quantity,
                  lignes_ticket.total_ligne
                FROM
                    lignes_ticket
                INNER JOIN tickets ON tickets.id_ticket = lignes_ticket.id_ticket
                INNER JOIN products ON lignes_ticket.id_product = products.id_product
                INNER JOIN categories ON categories.id_category = products.id_category
                WHERE
                    tickets.id_z = ?
                ORDER BY
                    categories.id_category,
                    lignes_ticket.id_product;";

      $sqlPdo = $pdo -> prepare($sql);

      $sqlPdo ->execute([$idz]);

      //lignes_ticket, name_Category, name_product, Quantity, total_lignes 
      $items=$sqlPdo -> fetchAll(PDO::FETCH_ASSOC); 

      //Extraire les categories
      $listCategory=[];   
      foreach($items as $item){
         
        $idCategory=$item['id_category'];          
        $listCategory[$idCategory]=$item['name_category'];         
       
      }

      //somCategory
      foreach($listCategory as $category){//1

        $somCategory[$category]=0;
        foreach($items as $item){//2

          $nameCategory=$item['name_category'];
          if($nameCategory==$category){

             $somCategory[$category]+=$item['total_ligne'];          
          }      
        }//2   
      }//1

      $listProduct=[];   
      foreach($items as $item){
         
        $idProduct=$item['id_product'];          
        $listProduct[$idProduct]=[$item['name_category'],$item['name_product']]; 

      }

      
//*/
      foreach($listProduct as $product){//1

        $somProduct[$product[1]]=0;
        $somQuantity[$product[1]]=0;        
        foreach($items as $item){//2

          $nameProduct=$item['name_product'];
          if($nameProduct==$product[1]){           
            $price[$product[1]]=$item['price'];
            $somProduct[$product[1]]+=$item['total_ligne'];
            $somQuantity[$product[1]]+=$item['quantity'];
//   echo $item['name_product']."...".$item['quantity']."....".$item['total_ligne']."<br>";
          } //if     
        }//2  
 // echo  $product."...".$price[$product]
 //               ."...".$somQuantity[$product]
 //               ."...".$somProduct[$product]."<br>";              
      }//1

      //....Table for datail Items 
/*
      foreach($listCategory as $category){//1
 
        echo $category."....".$somCategory[$category]."<br>";

        foreach($listProduct as $product){//2

          if($product[0]==$category){                       
            echo str_repeat("&nbsp",10);
            echo $product[1]."......";
            echo $price[$product[1]]."......";
            echo $somQuantity[$product[1]]."......";
            echo $somProduct[$product[1]]."<br>";
            
          }//if

        }//2
        
      }//1
*/
            
  ?>  
    <?php    
    
    $totalEtatZ=array_sum($somCategory);   

    foreach($listCategory as $category){//1
    ?>
    <tr>    
           <td><?= $category ?></td>                     
           <td><?= $somCategory[$category] ?></td>
    </tr> 
    <tr>
      <td colspan="2">
        <table style="margin-left:30px;" class="table mb-0">
          <thead>          
            <tr><!-- table row--->      
              <th>name product</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total product</th>
            </tr>            
          </thead>
          <tbody>
            <!-------------------->
            <?php  
                foreach($listProduct as $product){//2
                  if($product[0]==$category){ //if                      
             ?>
                <tr>                  
                  <td><?=$product[1]?></td>
                  <td><?=$price[$product[1]] ?></td>
                  <td><?=$somQuantity[$product[1]] ?></td>                  
                  <td><?=$somProduct[$product[1]] ?></td>                  
                </tr>

            <?php 
               }//if
               }//2 
            ?>
            <!-------------------->            
          </tbody>        
        </table>
      </td>
    </tr>

  <?php     
    }                               
  ?>      
  
  
  </tbody> 
  <tfoot>
    <tr>
      <td style="text-align:right;"><strong>Total</strong></td>
      <td><strong><?=number_format($totalEtatZ,2)?></strong></td>      
    </tr>                
  </tfoot>        
</table>

</div>

<?php $content = ob_get_clean(); ?>


<?php $varSell="Tickets";$varData="Data";?>
<?php include "c:/caisse191124/layout.php" ?>





