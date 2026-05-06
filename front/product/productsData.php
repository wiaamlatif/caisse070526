<?php  
       session_start();

       if(isset($_GET['idCategory'])){
        $currentIdCategory = $_GET['idCategory'];       
        $_SESSION['currentIdCategory']= $currentIdCategory;
       }       

      if(isset($_SESSION['currentIdProduct'])){
        $currentIdProduct = $_SESSION['currentIdProduct'];
      } else {
        $currentIdProduct =1;
      }
     
       require_once "\htdocs\include\database.php";

       //>> Get produits       
       $sql ="SELECT * FROM products
              INNER JOIN categories 
              ON products.id_category = categories.id_category
              WHERE products.id_category = $currentIdCategory;";
                   
       $result = mysqli_query($conn, $sql);
                     
       $produits = mysqli_fetch_all($result, MYSQLI_ASSOC);

       $arrayProducts = [];
       foreach ($produits as $product) {

                $idProduct = $product['id_product'];              
             $nameCategory = $product['name_category'];
              $nameProduct = $product['name_product'];
                    $price = $product['price'];
                   $imgSrc = $product['imgSrc'];

              $elementProduct =  [
                       "idProduct" => $idProduct,                                      
                     "nameProduct" => $nameProduct,
                           "price" => $price,
                          "imgSrc" => $imgSrc
              ];

              array_push($arrayProducts,$elementProduct); 

       } //foreach

       $infoProduct=[
                          "nameCategory" => $nameCategory,
                      "currentIdProduct" => $currentIdProduct
                    ];

       array_push($arrayProducts,$infoProduct); 
     
       print_r(json_encode($arrayProducts));

   /* id_product name_product 	price	imgSrc	date_product */
   /* id_category	name_category	date_category	*/
   
   
   