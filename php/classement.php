<?php

if(isset($_POST['pseudo']) AND !empty($_POST['pseudo'])){
    $req = $bdd->prepare('SELECT année_BAC, date_inscription, administrateur FROM utilisateurs WHERE pseudo = ?');
    if ($req->execute(array($_POST['pseudo']))){

        $informations_utilisateur = $req->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($informations_utilisateur)){
            $informations_utilisateur = $informations_utilisateur[0];
            require('php/classement_show.php');
        }else{
            echo '<p>Utilisateur non trouvé</p>';
        }

        
    }else {
        echo '<p>Erreur lors de la requête à la base de données.</p>';
    }
}

?>

<form action="?v=1" method="POST">
    <label for="pseudo">Pseudo : </label>
    <input name="pseudo" id="pseudo" type="text" required>

    <input type="submit" value="Rechercher">
</form>
