<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Entraînement Kangourou</title>
</head>
<body>

    <div id="main">
        <?php require('php/header.php')?>

        <?php if(isset($_GET['v']) AND !empty($_GET['v'])){
            switch ($_GET['v']){
                case 1:
                    require('php/classement.php');
                    break;
                case 2:
                    require('php/compte.php');
                    break;
                case 3:
                    require('php/about.php');
                    break;
                default:
                    require('php/sujets.php');
                    break;
            }

        }else {
            require('php/sujets.php');
        }?>
    </div>

    <nav id="form-connexion">
        <?php

        if(isset($_SESSION['id'])){
            echo '<h2>Vous êtes actuellement connectés.</h2>
                <a href="php/logout.php">Se déconnecter</a>';
        }else{
            echo '<form action="?v=2" method="POST">

            <h2>Connectez-vous</h2>

            <div>
                <label for="login">Pseudo : </label>
                <input name="login" id="login" type="text" required>
            </div>

            
            <div>
                <label for="password">Mot de passe : </label>
                <input name="password" id="password" type="password" required>
            </div>
            

            <input type="submit" value="Se connecter">

        </form>';
        }?>
    </nav>
    

</body>
</html>
