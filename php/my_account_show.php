<main class="account_panel">

    <?=$_SESSION['pseudo']?>

    <p>Date d'inscription : <?=$_SESSION['date_inscription']?></p>
    <p>Année BAC : <?=$_SESSION['année_BAC']?></p>

    <p>Type de compte : <?=$_SESSION['administrateur'] ? 'Administrateur' : 'Utilisateur'?></p>

</main>
