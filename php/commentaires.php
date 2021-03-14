<h2>Commentaires utilisateurs :</h2>

<?php

if(isset($_POST['pseudo'], $_POST['commentaire'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['commentaire'])){
        switch (true) {
            case (strlen($_POST['pseudo']) > 20):
                echo '<p>Erreur : le pseudo entré fait plus de 20 caractères</p>';
                break;
            
            case (strlen($_POST['commentaire']) > 200):
                echo '<p>Erreur : le commentaire entré fait plus de 200 caractères</p>';
                break;
            
            default:
                $date = new DateTime();

                $commentaire_send = $bdd->prepare('INSERT INTO commentaires (pseudo, niveau, année, commentaire, date_comm) VALUE (?, ?, ?, ?, now())');
                $commentaire_send->execute(array($_POST['pseudo'],
                                                $_GET['niveau'],
                                                $_GET['année'],
                                                $_POST['commentaire']));
                break;
        }
    }
}


$commentaires = $bdd->prepare('SELECT pseudo, commentaire FROM commentaires WHERE année = ? AND niveau = ?');
$commentaires->execute(array($_GET['année'], $_GET['niveau']));

foreach($commentaires->fetchAll() as $commentaire){
    echo '<div class="div_comm">
            <h4> Pseudo : ' . htmlspecialchars($commentaire['pseudo']) . '</h4>

            <hr>

            <p class="comm">' . htmlspecialchars($commentaire['commentaire']) . '</p>
          </div>';
}

?>

<h2>Ajouter un commentaire :</h2>

<form id="commentaire_area" action="?année=<?=$_GET['année']?>&niveau=<?=$_GET['niveau']?>&réponse=<?=$_GET['réponse']?>#commentaire_area" method="POST">
    <div>
        <label for="pseudo">Pseudo : (20 caractères max)</label>
        <input name="pseudo" id="pseudo" required>
    </div>

    <div>
        <label for="commentaire">Commentaire : (200 caractères max)</label>
        <textarea name="commentaire" id="commentaire" required></textarea>
    </div>

    <input type="submit" value="Envoyer">
</form>
