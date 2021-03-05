function ajouter_lettre(lettre){
    document.getElementById('réponse').value += lettre
}

function enlever_lettre(){
    document.getElementById('réponse').value = document.getElementById('réponse').value.slice(0, -1);
}

function année_changée(année){
    if (année <= 2009){
        document.getElementById('niveau_P').hidden = true
        document.getElementById('niveau').selectedIndex = 0
        document.getElementById('niveau_E').textContent = "Ecoliers (CE2 - CM1 - CM2)"
        document.getElementById('niveau_B').textContent = "Benjamins (6ème - 5ème)"
        document.getElementById('niveau_C').textContent = "Cadets (4ème - 3ème - CAP / BEP)"
        document.getElementById('niveau_J').textContent = "Juniors (Lycées)"
        document.getElementById('niveau_S').textContent = "Etudiants (TS, Bac+)"
    }else if (année == 2010){
        document.getElementById('niveau_P').hidden = true
        document.getElementById('niveau').selectedIndex = 0
        document.getElementById('niveau_E').textContent = "Ecoliers (CE2 - CM1 - CM2)"
        document.getElementById('niveau_B').textContent = "Benjamins (6ème - 5ème)"
        document.getElementById('niveau_C').textContent = "Cadets (4ème - 3ème - voie pro.)"
        document.getElementById('niveau_J').textContent = "Juniors (Lycées G. et T.)"
        document.getElementById('niveau_S').textContent = "Etudiants (TS, Bac+)"
    }else if (année <= 2019){
        document.getElementById('niveau_P').hidden = false
        document.getElementById('niveau_E').textContent = "E (CE2 - CM1 - CM2)"
        document.getElementById('niveau_B').textContent = "B (6ème - 5ème)"
        document.getElementById('niveau_C').textContent = "C (4ème - 3ème)"
        document.getElementById('niveau_P').textContent = "P (Lycées Professionnels)"
        document.getElementById('niveau_J').textContent = "J (Lycées G. et T., sauf série S)"
        document.getElementById('niveau_S').textContent = "S (1reS, TS, Bac+)"
    }else{
        document.getElementById('niveau_P').hidden = false
        document.getElementById('niveau_E').textContent = "E (CE2 - CM1 - CM2)"
        document.getElementById('niveau_B').textContent = "B (6ème - 5ème)"
        document.getElementById('niveau_C').textContent = "C (4ème - 3ème)"
        document.getElementById('niveau_P').textContent = "P (Lycées Professionnels)"
        document.getElementById('niveau_J').textContent = "J (Lycées G. et T., sauf : 1re+Spéc.Maths & TS)"
        document.getElementById('niveau_S').textContent = "S (1re+Spéc.Maths, TS, Bac+)"
    }
}
