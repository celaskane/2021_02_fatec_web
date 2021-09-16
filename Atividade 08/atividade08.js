var reNome = /^[A-z]{3,100}/;
var reEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
var reTel = /^[0-9]{4,5}[0-9]{4}$/;
var reText = /^[A-Za-z0-9 .'?!,@$#-_]{10}/;

function validar(){
    if(!reNome.test(txtNome.value)){
        alert("Preencha o seu nome!");
        txtNome.focus();
        return false;
    }
    //a@a.co
    if(!reEmail.test(txtEmail.value)){
        alert("Informe um e-mail válido!");
        txtEmail.focus();
        txtEmail.value="";
        return false;
    }
    if(!reTel.test(txtTelefone.value)){
        alert("Informe um telefone válido!");
        txtTelefone.focus();
        txtTelefone.value="";
        return false;
    }
    if((Op1.checked || Op2.checked) == false){
        alert("Você precisa selecionar uma opção antes de continuar!");
        return false;
    }

    if(!reText.test(msg.value)){
        alert("Mensagem inválida");
        return false;
    }

    alert("Tudo certo!")
    //frml.submit();
}