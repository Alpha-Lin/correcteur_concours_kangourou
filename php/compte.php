<?php

if(isset($_SESSION['id'])){
    echo '<p>Vous êtes connectés</p>';
}else if (isset($_POST['password'], $_POST['login'])){
	if (!empty($_POST['password']) AND !empty($_POST['login'])){ // Pour se log, on vérifie si l'utilisateur a fourni des identifiants et s'ils correspondent avec ceux de la base de données
		
		$reponse = $bdd->prepare("SELECT id, motDePasse, année_BAC, date_inscription, administrateur FROM utilisateurs WHERE pseudo = ?"); // va chercher les infos de l'utilisateur
		$reponse->execute(array($_POST['login']));
		$infoUser = $reponse->fetch();
		if (!empty($infoUser)){ // vérifie que l'utilisateur existe
			if (password_verify($_POST['password'], $infoUser['motDePasse']) OR $infoUser['motDePasse'] == 'NULL')
			{
				$_SESSION['id'] = $infoUser['id'];
                echo '<p>Vous êtes connectés</p>';
			}else{
				echo '<p>Mot de passe incorrect</p>';
			}
		}else{
			echo '<p>Pseudo incorrect</p>';
		}
	}
}else{
    echo "<p>Vous n'êtes actuellement pas connectés, veuillez vous connecter.</p>";
}?>