<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script_kang.js"></script>
    <title>Correcteur Kangourou</title>
</head>
<body>
    <form>
        <label for="réponse">Réponse : </label>
        <input type="text" name="réponse" id="réponse" required pattern="[A-E]{24}[1-9]{2}">
        <button type="button" onclick="enlever_lettre()">&lt;=</button>

        <br>

        <button type="button" onclick="ajouter_lettre('A')">A</button>
        <button type="button" onclick="ajouter_lettre('B')">B</button>
        <button type="button" onclick="ajouter_lettre('C')">C</button>
        <button type="button" onclick="ajouter_lettre('D')">D</button>
        <button type="button" onclick="ajouter_lettre('E')">E</button>
        <button type="button" onclick="ajouter_lettre('0')">0</button>
        <button type="button" onclick="ajouter_lettre('1')">1</button>
        <button type="button" onclick="ajouter_lettre('2')">2</button>
        <button type="button" onclick="ajouter_lettre('3')">3</button>
        <button type="button" onclick="ajouter_lettre('4')">4</button>
        <button type="button" onclick="ajouter_lettre('5')">5</button>
        <button type="button" onclick="ajouter_lettre('6')">6</button>
        <button type="button" onclick="ajouter_lettre('7')">7</button>
        <button type="button" onclick="ajouter_lettre('8')">8</button>
        <button type="button" onclick="ajouter_lettre('9')">9</button>

        <br>

        <label for="année">Année : </label>
        <select name="année" id="année">
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

            $années = $bdd->query("SELECT année FROM sujets GROUP BY année")->fetchAll(PDO::FETCH_COLUMN);

            // Affiche toutes les années des différents sujets inscrits dans la BDD
            foreach($années as $année){
                echo '<option value="'. $année .'">'. $année .'</option>';
            }?>
        </select>

        <br>

        <label for="niveau">Niveau : </label>
        <select name="niveau" id="niveau">
            <option value="E">E</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="P">P</option>
            <option value="J">J</option>
            <option value="S">S</option>
        </select>

        <input type="submit" value="Envoyer">
    </form>

    <?php 
    
    if(isset($_GET['réponse'], $_GET['année'], $_GET['niveau'])){ // Vérifie que les 3 données sont définis
        if(!empty($_GET['réponse']) AND !empty($_GET['année']) AND !empty($_GET['niveau'])){ // Vérifie que les 3 données ne sont pas vides
            if(!in_array($_GET['année'], $années)){ // Vérifie que l'année demandée est bien dans la BDD
                echo "<p>Erreur : l'année demandée n'a pas été trouvée.</p>";
            }else{
                $niveau = $bdd->prepare("SELECT niveau FROM sujets WHERE année = ?"); // Vérifie que le niveau demandé existe pour l'année demandée
                $niveau->execute(array($_GET['année']));
                if(!in_array($_GET['niveau'], $niveau->fetchAll(PDO::FETCH_COLUMN))){
                    echo "<p>Erreur :  le niveau demandé n'existe pas pour l'année demandée.</p>";
                }else{
                    $reponses = $bdd->prepare("SELECT réponses FROM sujets WHERE année = ? AND niveau = ?"); // Va chercher les réponses demandées
                    $reponses->execute(array($_GET['année'], $_GET['niveau']));
                    $réponses = $reponses->fetchAll(PDO::FETCH_COLUMN)[0];

                    if(!preg_match('/[A-E]{24}[1-9]{2}/', $_GET['réponse']) OR strlen($_GET['réponse']) != 26){ // Vérifie que la forme de la réponse correspond à celle attendue
                        echo '<p>Erreur : la réponse fournie ne respecte pas la forme requise (24 caractères allant de A à E et 2 chiffres).</p>';
                    }else{
                        // Créer un tableau pour comparer les réponses données avec la solution
                        $tableau = '';
                        $bonnesRéponses = 0;

                        echo '<table>
                                <thead>
                                    <tr>
                                        <th colspan="2">Réponses</th>
                                    </tr>
                                    <tr>
                                        <th>Élève</th>
                                        <th>Solutions</th>
                                    </tr>
                                </thead>
                                <tbody>';

                        for($i = 0; $i < 26; $i++){
                            $classe = "mauvais";
                            if($_GET['réponse'][$i] == $réponses[$i]){
                                $bonnesRéponses++;
                                $classe = "bon";
                            }
                            echo '<tr>
                                    <td class="' . $classe .'">' . $_GET['réponse'][$i] . '</td>
                                    <td class="' . $classe .'">' . $réponses[$i] . '</td>
                            </tr>';
                        }

                        echo '</tbody>
                            </table>
                            <p>Nombre de bonnes réponses : ' . $bonnesRéponses . '/26';
                    }
                }
            }
        }
    }?>

</body>
</html>
