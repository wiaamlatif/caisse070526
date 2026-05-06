    <?php

    if(isset($_POST['connexion'])){

      //  echo "<pre>";
      //  var_dump($_POST);
      //  echo "</pre>";                

         $firstName=$_POST['firstName'];
         $lastName=$_POST['lastName'];
         $wordPass=$_POST['password'];
 
         if(!empty($firstName) && !empty($lastName) && !empty($wordPass)){
   
        require_once 'database.php';

        $sql = "SELECT * FROM users WHERE first_name = '$firstName'
                                      AND  last_name = '$lastName'
                                      AND        pwd = '$wordPass' ;";
                                                                                                         
            $result = mysqli_query($conn,$sql);

            $user = mysqli_fetch_assoc($result);

            $row_cnt = mysqli_num_rows($result);  

            echo "<pre>";
            var_dump($user);
            echo "</pre>";            
                            
            echo "<br> rowcount :".$row_cnt;

            if($row_cnt >0){ 

                session_start();
                $_SESSION['user'] = $user; 
                
                //switch block
                switch ($user['role']) {
                case 0:
                     ;//           
                break;                
                case 1:
                    header('location:../admin/index.php');                               
                break;
                case 2:
                    header('location:../index.php');
                break;

                default:
                    //code block
                }//switch            

            } else {
            ?>
                <div class="alert alert-danger text-center text-danger" id="alert" role="alert">
                    Login ou mot de passe incorrects !
                </div>

            <?php
            }               

        }//if(!empty($firstName) && !empty($lastName) && !empty($pwd))
        else {
        ?>
            <div class="alert alert-danger text-center text-warning" id="alert" role="alert">
                Completer S.V.P le formulaire !
            </div>
        <?php
        }            
        
   
    }//connexion
      
    





