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
?>
