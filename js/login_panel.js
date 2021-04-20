function show_login(){
    let main = document.getElementById('main')
    let form_login = document.getElementById('form-connexion')
    
    if(form_login.style.display === "none"){
        form_login.style.display = "block"
        main.style.width = "80%"
    }else{
        form_login.style.display = "none"
        main.style.width = "100%"
    }
}
