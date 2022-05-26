function validar(formulario){
   

    /*
    Validar que acepte unicamente letras */

    var checkOk = "QWERTYUIOPASDFGHJKLÑZXCVBNM" 
    + "qwertyuioasdfghjklzxcvbnm";

    var checkStr = formulario.nom.value;
    var checkStra= formulario.app.value;
    var checkStrb= formulario.apm.value;
    var checkStrc= formulario.alias.value;

    var allValid= true;
    var allValida= true;
    var allValidb= true;
    var allValidc = true;

    for(var i = 0; i < checkStr.length; i++){
        var ch = checkStr.charAt(i);
        for( var j = 0; j < checkOk.length; j++)
        if(ch == checkOk.charAt(j))
            break;
        
        if(j == checkOk.length){
            allValid = false;
            break;
        }
    }
    for(var i = 0; i < checkStra.length; i++){
        var ch = checkStra.charAt(i);
        for( var j = 0; j < checkOk.length; j++)
        if(ch == checkOk.charAt(j))
            break;
        
        if(j == checkOk.length){
            allValida = false;
            break;
        }
    }
    for(var i = 0; i < checkStrb.length; i++){
        var ch = checkStrb.charAt(i);
        for( var j = 0; j < checkOk.length; j++)
        if(ch == checkOk.charAt(j))
            break;
        
        if(j == checkOk.length){
            allValidb = false;
            break;
        }
    }
    for(var i = 0; i < checkStrc.length; i++){
        var ch = checkStrc.charAt(i);
        for( var j = 0; j < checkOk.length; j++)
        if(ch == checkOk.charAt(j))
            break;
        
        if(j == checkOk.length){
            allValidc= false;
            break;
        }
    }

    if(!allValid){
        alert("Escribe solo letras en el campo Nombre");
        formulario.nom.focus();
        return false;
    }
    if(!allValida){
        alert("Escribe solo letras en el campo Apellido Paterno");
        formulario.app.focus();
        return false;
    } if(!allValidb){
        alert("Escribe solo letras en el campo Apellido Materno");
        formulario.apm.focus();
        return false;
    } if(!allValidc){
        alert("Escribe solo letras en el campo Alias");
        formulario.alias.focus();
        return false;
    }


}