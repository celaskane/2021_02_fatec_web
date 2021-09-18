var reNome = /^[A-z]{3,100}/;
var reEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
var reTel = /^[0-9]{4,5}[0-9]{4}$/;
var reSenha = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/

function validarLogin(){
    //a@a.co
    if(!reEmail.test(email.value)){
        alert("Informe um e-mail válido!");
        txtEmail.focus();
        txtEmail.value="";
        return false;
    }

    if(!reSenha.test(pwd.value)){
        alert("Informe uma senha válida!");
        pwd.focue();
        pwd.value="";
        return false;
    }
    alert("Tudo certo!")
    //frml.submit();
}