function ajouter_lettre(lettre){
    document.getElementById('réponse').value += lettre
}

function enlever_lettre(){
    document.getElementById('réponse').value = document.getElementById('réponse').value.slice(0, -1);
}
