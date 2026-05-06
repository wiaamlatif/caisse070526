    <?php
    $title ="Connexion";
    ob_start();
    ?>
   
   <?php include '\htdocs\include\nav.php';?>
    
    <form action="connexionData.php" method="POST">
        <div class="container">
            <label class="form-label">First Name</label>
            <input type="text" name="firstName" class="form-control">

            <label class="form-label">Last Name</label>
            <input type="text" name="lastName" class="form-control">

            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">

            <input type="submit" name="connexion" value="Connexion" class="btn btn-primary my-2">
        </div>
    </form>    

<?php $content = ob_get_clean(); ?>


<?php require_once 'C:\htdocs\layout.php'?>

