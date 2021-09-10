function soma(){
    var x = confirm("realizar soma?");
    if(x){
        chk1.checked = true;
        var a = parseFloat(n1.value);
        var b = parseFloat(n2.value);
        var c = a+b;
        resultado.value = c;
    }
}

function sub(){
    var x = confirm("realizar subtração?");
    if(x){
        chk1.checked = true;
        var a = parseFloat(n1.value);
        var b = parseFloat(n2.value);
        var c = a-b;
        resultado.value = c;
    }
}

function mult(){
    var x = confirm("realizar multiplicação?");
    if(x){
        chk1.checked = true;
        var a = parseFloat(n1.value);
        var b = parseFloat(n2.value);
        var c = a*b;
        resultado.value = c;
    }
}

function div(){
    var x = confirm("realizar divisão?");
    if(x){
        chk1.checked = true;
        var a = parseFloat(n1.value);
        var b = parseFloat(n2.value);
        var c = a/b;
        resultado.value = c;
    }
}