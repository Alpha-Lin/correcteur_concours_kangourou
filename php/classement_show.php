<main class="account_panel">

    <?=$_POST['pseudo']?>

    <p>Date d'inscription : <?=$informations_utilisateur['date_inscription']?></p>
    <p>Année BAC : <?=$informations_utilisateur['année_BAC']?></p>

    <p>Type de compte : <?=$informations_utilisateur['administrateur'] ? 'Administrateur' : 'Utilisateur'?></p>

</main>
