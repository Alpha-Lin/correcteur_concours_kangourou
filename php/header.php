<?php
// On initialise une connexion à la BDD

$options =
[
    PDO::ATTR_EMULATE_PREPARES => false
];

try{
    $bdd = new PDO('mysql:host=localhost;dbname=kangourou', 'root', '');
}catch(PDOException $pe){
    die('<p>Erreur lors de l\'accès à la base de donnée : </p>');
}

session_start();

?>

<header class="main-header">

    <header class="header-image">
        <img src="img/kangourou.jpg" alt="bannière kangourou">

        <img src="img/login.svg" alt="connexion" width="50" class="login-icon">
    </header>
    
    <nav class="header-nav">
        <a href="?v=0" class="sujets-drop">Sujets</a>
        <a href="?v=1">Classement utilisateurs</a>

        <?php

        if(isset($_SESSION['id']))
            echo '<a href="?v=2">Mon compte</a>'?>

        <a href="?v=3">À propos</a>
    </nav>

</header>
