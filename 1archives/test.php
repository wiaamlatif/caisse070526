<?php

    session_start();

    $_SESSION['user']['id']=27;
    $_SESSION['user']['firstName']="Abdellatif";
    $_SESSION['user']['lastName']="ESSADRY";
    $_SESSION['user']['muslim']= true;

    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">  
    <link rel="stylesheet" href="/asset/css/style.css" media="print">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Test</title>
</head>
<body">


    <div id="idStart">
        
    </div>
     

    <button id="idDisplay" onclick="display_ON()">
        DisplayON
    </button>

    <button id="idDisplay" onclick="display_OFF()">
        DisplayOFF
    </button>    

   <script>

function display_ON(){

     document.getElementById("idStart").innerHTML= `
                                                    <?php include 'testo.php' ?>
                                                   `;
}
     
   </script>
            
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>         

</body>              
</html>
