<?php

$page = 'change-password';
require('inc/connect.php');
require('assets/head.php');
include('assets/nav.php');


if(isset($_POST['submit_update'])){
    $password = $_POST['pass'];
    $newpassword = $_POST['newpass'];
    $newpassword2 = $_POST['newpass2'];

    $sql = $db->query("SELECT * FROM users WHERE id = $_SESSION[id]");
    /*requête de sélection de l'email user en fonction de  l'input user*/
    if($row = $sql->fetch()){
            $db_pass = $row['password'];
         }
        if(password_verify($password, $db_pass)){
            /* Faire une connexion */
            if($newpassword==$newpassword2){
                $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
                $sth = $db->prepare("UPDATE users SET password=:password");

                $sth->bindValue(':password',$newpassword);                  
            }

            if($sth->execute()){
              
                $message = "<div class ='alert alert-success'> Le mot de passe a bien été  modifié </div>";
                
                }else{
                    /* Mot de passe incorrect */
                    $message = "<div class ='alert alert-danger'> Mot de passe incorrect! Veuillez recommencer svp! </div>";
                }
            }else{
                /* Mot de passe inconnu */
                $message = "<div class ='alert alert-danger'> Mot de passe inconnu! </div>";
            }
        }   


?>


<!DOCTYPE html>
<html>

<head>
    <title>Password Change</title>

</head>

<body>
    <section>
        <div class="container">
            <h3 align="center">Changement de mot de passe</h3>
            <div><?php if (isset($message)) {
                        echo $message;
                    } ?></div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="py-4" Changer votre mot de passe :</h2> </div> <div class="col-md-8">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mot de passe actuel</label>
                                    <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nouveau mot de passe</label>
                                    <input type="password" class="form-control" name="newpass" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirmer votre mot de passe</label>
                                    <input type="password" class="form-control" name="newpass2" id="exampleInputPassword1" placeholder="Password">
                                </div>
                        <input type="submit" name="submit_update" class="btn btn-info" value="Mettre à jour">
            </form>
    </section>


</body>

</html>

<?php
require('assets/footer.php');
?>