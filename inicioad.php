
<?php
    session_start();
    require('clases/clases.php');
    require('funcion.php');
    verificarse();
    verificarads();


$error="";

    if(isset($_POST['admin'])){
        $contra=hash('sha512',$_POST['contra']);
        $datos=array(
            $_POST['nom'],
            $_POST['app'],
            $_POST['apm'],
            $_POST['fecha'],
            $contra,
            $_POST['correo'] 
        );
            if(strpos($datos[5]," ")==false){
                if(strlen($datos[0])>3 && strlen($datos[0])<15){
                    if(strlen($datos[1])>3 && strlen($datos[1])<15){
                        if(strlen($datos[2])>3 && strlen($datos[2])<15){
                                if(strlen($_POST['contra'])>8 && strlen($_POST['contra'])<15){
                                    if(strlen($datos[5])>8 && strlen($datos[5])<25){
                                        if(empty(usuarios::verificara($datos[5]))){
                                            usuarios::registrarad($datos);
                                            session_start();
                                            header('location:inicioad.php');           
                                         }else{
                                            $error.="correo ya registrado";
                                            }
                                      
                                        
                                    }else{
                                        $error.="El correo debe tener entre 10 y 25 caracteres";
                                    }
                                }else{
                                    $error.="La contraseña debe tener entre 8 y 15 caracteres";
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
                $error.="usuario";
            }
        
        foreach($datos as $dato){
            echo $dato;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/Logo .png">
    <link rel="stylesheet" href="./css/MenuA.css">
    <link rel="stylesheet" href="./css/AgregarPubliA.css">
    <link rel="stylesheet" href="./css/PublicacioNES.css">
    <link rel="stylesheet" href="./css/LadoLateral.css">
    <link rel="stylesheet" href="./css/grupos.css">
    <link rel="stylesheet" href="./css/ModaS.css">

   
    <title>The ninth planet</title>

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--bootstrap-->
    <!--tipografías-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <!--icons-->
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</head>

<body> 
    <header>
    <div id="menu">
        <img src="./img/Logo The 9° Planet.PNG">

        <a  href="inicioad.php"> <span class="material-icons-outlined">home</span></a>
        <a href="consultarrep.php"><span class="material-icons-outlined">account_balance</span></a>
        <a href="reportes.php"> <span class="material-icons-outlined">supervised_user_circle</span></a>


        <button id="N" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#opciones">
            <span class="material-icons-outlined">menu</span>
        </button>
    </div>
    </header>
    
    <div class="RegistrarA">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formulario"  onsubmit="return validar(this)">
        <br>
        <br>
        <br>

        <br>
            <h2>Agregar administrador</h2>
            
            <br>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" name="nom"   class="form-control" placeholder="Nombre" id="floatingInputGrid" 
                        tabindex="0" class="btn btn-lg btn-danger" data-bs-toggle="popover"  data-bs-placement="left" data-bs-trigger="focus"
                        data-bs-content="¿Cómo te llamas?">  
                        <label for="floatingInputGrid">Nombre</label>
                    </div>
                </div>

               
            <br>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" name="app"   class="form-control" placeholder="Apellido Paterno" id="floatingInputGrid"
                        tabindex="0" class="btn btn-lg btn-danger" role="button" data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="focus"
                         data-bs-content="¿Cómo te apellidas?">  
                        <label for="floatingInputGrid">Apellido Paterno</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" name="apm"   class="form-control" placeholder="Apellido Materno" id="floatingInputGrid" 
                        tabindex="0" class="btn btn-lg btn-danger" role="button" data-bs-toggle="popover" data-bs-placement="right"  data-bs-trigger="focus"
                        data-bs-content="¿Cómo te apellidas?">
                        <label for="floatingInputGrid">Apellido Materno </label>
                    </div>
                </div>
            </div>
            <br>
            
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
                         data-bs-content="Necesitas comprobar que actualmente estudias en el CECyT N°9">  
                        <label for="floatingInputGrid">Correo</label>
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
            <br>
            <br>

           <div class="error">
            <?php if(!empty($error)):?>
                <p><?php echo $error; ?> </p>
            <?php endif;?>
            <br>
            <input type="submit" value="Registrar" name="admin" class="btn btn-lg btn-primary" type="button">
            <br><br>
        </form>   
    </div>
   
    <!-- Modal  de opciones-->
    <div class="modal fade" id="opciones" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Opciones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <a href="cerrars.php"><h4>Cerrar sesión</h4></a>
                    <
        
                </div>
            </div>
        </div>
    </div>
    <!-- Modal  de opciones-->
    <!--Modal restablecer contraseña-->


   

</body>

</html>
