<?php
    require('funcion.php');
    require('clases/clases.php');
    verificarse();
    verificarad();
$error="";

    if(isset($_POST['registrar'])){
        $contra=hash('sha256',$_POST['contra']);
        $datos=array(
            $_POST['nom'],
            $_POST['app'],
            $_POST['apm'],
            $_POST['alias'],
            $_POST['fecha'],
            $contra,
            $_POST['sexo'],
            $_POST['correo']

            
        );
        if(vacio($datos)==false){
            if(strpos($datos[7]," ")==false){
                if(strlen($datos[0])>2 && strlen($datos[0])<15){
                    if(strlen($datos[1])>3 && strlen($datos[1])<15){
                        if(strlen($datos[2])>3 && strlen($datos[2])<15){
                            if(strlen($datos[3])>3 && strlen($datos[3])<15){
                                if(strlen($_POST['contra'])>8 && strlen($_POST['contra'])<45){
                                    if(strlen($datos[7])>8 && strlen($datos[7])<25){
                                       if(empty(usuarios::verificaralias($datos[3]))){
                                        if(empty(usuarios::verificar($datos[7]))){
                                            usuarios::registrar($datos);
                                            session_start();
                                            header('location:inicio.php'); 

                                         }else{
                                            $error.="correo ya registrado";
                                            }
                                       }else{
                                           $error.="Alias no disponible";
                                       }
                                        
                                    }else{
                                        $error.="El correo debe tener entre 10 y 45 caracteres";
                                    }
                                }else{
                                    $error.="La contraseña debe tener entre 8 y 15 caracteres";
                                }
                            }else{
                                $error.="El alias debe tener entre 4 y 15 caracteres";
                            }
                        }else{
                            $error.="El apellido materno debe tener entre 3 y 15 caracteres";
                        }
                    }else{
                        $error.="El apellido paterno debe tener entre 3 y 15 caracteres";
                    }
                }else{
                    $error.="El nombre debe tener entre 3 y 15 caracteres";
                }
            }else{
                $error.="no agregues espacios";
            }
        }else{
            $error .="Hay un dato vacio";
        }
       
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/registraRR.css">
    <link rel="stylesheet" href="./css/ModaS.css">

    <link rel="shortcut icon" sizes="16x16 24x24 32x32 48x48 64x64" href="img/LogoIcono.PNG">
    <title>The 9th Planet - Registrar alumno</title>
     <!--tipografías-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <script src="validacion/funciones.js"></script>
    <!--tipografias-->
    <!-- https://material.io/resources/icons/?style=baseline -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- https://material.io/resources/icons/?style=outline -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- https://material.io/resources/icons/?style=round -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round" rel="stylesheet">
    <!-- https://material.io/resources/icons/?style=sharp -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- https://material.io/resources/icons/?style=twotone -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Two+Tone" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
      
</head>

<body background="./img/Fondo8.png">
    
    <div class="RegistrarA">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formulario"  onsubmit="return validar(this)">
            <br>
            <h2>Crea tu cuenta de alumno</h2>
            <h3>
            The ninth planet te ayuda a comunicarte, compartir y recibir información del CECyT N°9, ya sea académica y/o social, con tu cuenta de alumno podrás consultar comunicados que comparta la escuela de forma directa,  e interactuar con otros estudiantes del plantel.
            </h3>
            <br>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" name="nom"   class="form-control" placeholder="Nombre" id="floatingInputGrid" 
                        tabindex="0" class="btn btn-lg btn-danger" data-bs-toggle="popover"  data-bs-placement="left" data-bs-trigger="focus"
                        data-bs-content="Ingresa tu primer nombre, sin acentos y sustituye la letra ñ por n.Ingresa 3 a 15 letras">  
                        <label for="floatingInputGrid">Nombre</label>
                    </div>
                </div>

                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" name="alias"  class="form-control" placeholder="Alias" id="floatingInputGrid"
                        tabindex="0" class="btn btn-lg btn-danger" role="button" data-bs-toggle="popover"  data-bs-placement="right" data-bs-trigger="focus"
                        data-bs-content="Así te reconoceran tus amigos bartizianos, sin acentos y sustituye la letra ñ por n.Ingresa 3 a 15 letras
                        
                        Reglas:
                        *Debe tener entre 3 y 15 caracteres.">
                        <label for="floatingInputGrid"> Alias </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" name="app"   class="form-control" placeholder="Apellido Paterno" id="floatingInputGrid"
                        tabindex="0" class="btn btn-lg btn-danger" role="button" data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="focus"
                         data-bs-content="ingresa tu apellid paterno, sin acentos y sustituye la letra ñ por n.Ingresa 3 a 15 letras">  
                        <label for="floatingInputGrid">Apellido Paterno</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" name="apm"   class="form-control" placeholder="Apellido Materno" id="floatingInputGrid" 
                        tabindex="0" class="btn btn-lg btn-danger" role="button" data-bs-toggle="popover" data-bs-placement="right"  data-bs-trigger="focus"
                        data-bs-content="ingresa tu apellid materno, sin acentos y sustituye la letra ñ por n.Ingresa 3 a 15 letras">  
                        <label for="floatingInputGrid">Apellido Materno </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <select   name="sexo" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Sexo</option>
                            <option value="1">Hombre</option>
                            <option value="2">Mujer</option>
                            <option value="3">Prefiero no decir</option>

                        </select>
                        <label for="floatingSelect">Sexo</label>
                    </div> 
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="date" max="2006-12-31" min="2000-01-01" name="fecha"  class="form-control" placeholder="Fecha de nacimiento">
                        <label for="floatingInputGrid">Fecha de nacimiento </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" name="correo"  class="form-control" placeholder="Correo institucional" id="floatingInputGrid"
                        tabindex="0" class="btn btn-lg btn-danger" role="button" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="focus"
                         data-bs-content="Ingresa tu correo, puede ser un correo personal o un correo personal">  
                        <label for="floatingInputGrid">Correo </label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="password" name="contra"  class="form-control" placeholder="Contraseña" id="floatingInputGrid" 
                        tabindex="0" class="btn btn-lg btn-danger" role="button" data-bs-toggle="popover" data-bs-placement="right"  data-bs-trigger="focus"
                        data-bs-content="La contraseña debe tener al menos 8 caracteres, máximo 15. ">
                        <label for="floatingInputGrid">Contraseña </label>
                    </div>
                </div>
            </div>
            <br>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AvisoPrivacidad">
            Aviso de privacidad
            </button>
            <br>
            <br>

           <div class="error">
            <?php if(!empty($error)):?>
                <p><?php echo $error; ?> </p>
            <?php endif;?>
            </div>
            <br>
            <input type="submit" value="Registrar" name="registrar" class="btn btn-lg btn-primary" type="button">
            <br><br>
            <a href="index.php">Ya tengo cuenta</a>
            <br>
            <br>
        </form>   
    </div>

    <!--modal aviso de privacidad-->
    <div class="modal fade" id="AvisoPrivacidad" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Aviso de privacidad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>¿Quiénes somos? </h4>
                    <p> IvyCode de S.A. de C.V., mejor conocido como IvyCode, con domicilio
                        en calle Mar Mediterráneo 227, colonia Popotla, ciudad CDMX,
                        municipio o delegación Miguel Hidalgo, c.p. 11400, en la entidad de DF,
                        país México, es el responsable del uso y protección de sus datos
                        personales, y al respecto le informamos lo siguiente: </p>
                    <h4>¿Para qué fines
                        utilizaremos sus
                        datos personales? </h4>
                    <p>Los datos personales que recabamos de usted, los utilizaremos para las
                        siguientes finalidades que son necesarias para el servicio que solicita:
                        • Nombre para tener un registro de los usuarios.
                        • Correo institucional, este nos ayudara a saber si el usuario es
                        perteneciente al politécnico.
                        • Prospección comercial
                        De manera adicional, utilizaremos su información personal para las
                        siguientes finalidades secundarias que no son necesarias para el
                        servicio solicitado, pero que nos permiten y facilitan brindarle una mejor
                        atención:
                        • Edad
                        • Sexo
                        • Mercadotecnia o publicitaria
                        En caso de que no desee que sus datos personales se utilicen para
                        estos fines secundarios, indíquelo a continuación:
                        No consiento que mis datos personales se utilicen para los siguientes
                        fines:
                        [ ] Edad
                        [ ] Sexo
                        [ ] Mercadotecnia o publicitaria
                        La negativa para el uso de sus datos personales para estas finalidades
                        no podrá ser un motivo para que le neguemos los servicios y productos
                        que solicita o contrata con nosotros.</p>


                    <h4>¿Dónde puedo
                        consultar el aviso
                        de privacidad
                        integral?</h4>
                    <p>Para conocer mayor información sobre los términos y condiciones en
                        que serán tratados sus datos personales, como los terceros con quienes
                        compartimos su información personal y la forma en que podrá ejercer
                        sus derechos ARCO, puede consultar el aviso de privacidad integral en:</p>

                        
                <a href="registroa.php">
                    Ya leí el aviso de privacidad y estoy deacuerdo
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--modal fin aviso de privacidad-->

    <!--Popover-->
    <script>
       var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
       var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
    </script>

</body>
</html>