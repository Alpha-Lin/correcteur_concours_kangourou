<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script_kang.js"></script>
    <title>Entraînement Kangourou</title>
</head>
<body>

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

</body>
</html>
