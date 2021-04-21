<?php

if(isset($_SESSION['id'])){
	require('php/my_account_show.php');
}else if (isset($_POST['password'], $_POST['login'])){
	if (!empty($_POST['password']) AND !empty($_POST['login'])){ // Pour se log, on vérifie si l'utilisateur a fourni des identifiants et s'ils correspondent avec ceux de la base de données
		
		$reponse = $bdd->prepare("SELECT id, motDePasse, année_BAC, date_inscription, administrateur FROM utilisateurs WHERE pseudo = ?"); // va chercher les infos de l'utilisateur
		$reponse->execute(array($_POST['login']));
		$infoUser = $reponse->fetch();
		if (!empty($infoUser)){ // vérifie que l'utilisateur existe
			if (password_verify($_POST['password'], $infoUser['motDePasse']) OR $infoUser['motDePasse'] == 'NULL')
			{
				// On stock les informations de l'utilisateur lors de sa connexion
				$_SESSION['id'] = $infoUser['id'];
				$_SESSION['pseudo'] = $_POST['pseudo'];
				$_SESSION['année_BAC'] = $infoUser['année_BAC'];
				$_SESSION['date_inscription'] = $infoUser['date_inscription'];
				$_SESSION['administrateur'] = $infoUser['administrateur'];
                header ('location: index.php?v=2'); 
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