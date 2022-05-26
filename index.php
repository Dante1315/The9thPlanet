<?php
 session_start();
    require('funcion.php');
    require('clases/clases.php');
    verificarse();
    verificarad();


    if(isset($_POST['Iniciar'])){
        $contra=hash('sha256',$_POST['pass']);
        $datos=array($_POST['correo'],$contra);
            if(strpos($datos[0]," ")==false){
                if($datos[0]>35){
                    $resultados=usuarios::verificar($datos[0]);
                    $resultadosa=usuarios::verificara($datos[0]);
                    if(empty($resultadosa)==false && empty($resultados)==true){
                        if($datos[1]==$resultadosa[0]["contra_admin"]){
                            $_SESSION['id_admin']=$resultadosa[0]["id_admin"];
                            $_SESSION['nom_admin']=$resultadosa[0]["nom_admin"];
                            $_SESSION['app_admin']=$resultadosa[0]["app_admin"];
                            $_SESSION['apm_admin']=$resultadosa[0]["apm_admin"];
                            $_SESSION['fecha_admin']=$resultadosa[0]["fecha_admin"];
                            $_SESSION['correo_admin']=$resultadosa[0]["correo_admin"];
                            header('location:inicioad.php');
                        }
                    }
                    if(empty($resultados)==false && empty($resultadosa)==true){
                        if($datos[1]==$resultados[0]["contra_usu"]){
                            $_SESSION['id_usu']=$resultados[0]["id_usu"];
                            $_SESSION['nom_usu']=$resultados[0]["nom_usu"];
                            $_SESSION['app_usu']=$resultados[0]["app_usu"];
                            $_SESSION['foto_usu']=$resultados[0]["foto_usu"];
                            $_SESSION['apm_usu']=$resultados[0]["apm_usu"];
                            $_SESSION['alias_usu']=$resultados[0]["apm_usu"];
                            $_SESSION['fecha_usu']=$resultados[0]["fecha_usu"];
                            $_SESSION['correo_usu']=$resultados[0]["correo_usu"];
                            header('location:inicio.php');
                        }
                    }
                }
                
            }
        
    }
 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" sizes="16x16 24x24 32x32 48x48 64x64" href="img/LogoIcono.PNG">
    <link rel="stylesheet" href="./css/IniciarSesioN.css">
    <title>The 9th Planet - Inicia sesión o regístrate</title>

    <!--tipografías-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
    <!--tipografias-->
    <!-- https://material.io/resources/icons/?style=outline -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- https://material.io/resources/icons/?style=round -->

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>


</head>
<body>
    <div id="rectangle">   
        <nav id="logo">  
            <div>
                <img src="./img/Logo9.png">
            </div>
        </nav>
        <nav id="Page-Login">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

                <div class="correo">    
                    <input type="email" name="correo" placeholder="Correo institucional">
                </div>
                <br>
                <div class="contraseña">
                    <input type="password" name="pass" placeholder="Contraseña">
                </div>
                <br>
                <div class="IniciarSesion">
                    <input type="submit" value="Iniciar" name="Iniciar">      
                </div>
                <hr>
                <br>
                <div class="CrearCuenta">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearCuenta">
                        Crea cuenta
                    </button>
                </div>
            </form>
        </nav>
    </div>
    
    <!--información de la escuela y del equipo-->
    <div class="footer">
        <div class="info">
            <br>
            <h4>CECyT</h4>
           <h5>Es una institución educativa de nivel medio superior perteneciente al Instituto Politécnico Nacional.
            </h5>
        </div>      
    </div>
 <!--modal crear cuenta-->
    <div class="modal fade" id="crearCuenta" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Elige una cuenta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ElegirCuenta">
                        <div class="cCuentaA">
                             <a href="registroa.php">   
                                <span class="material-icons-outlined">person</span>
                                <nav>
                                    Cuenta de Alumno 
                                    <br><br><br>
                                    <p>(Para alumnos del CECyT N°9)</p>
                                    <br>
                                </nav>
                            </a>
                        </div>
                        <hr>
                        <div class="cCuentaA">
                             <a href="registrop.php">   
                                <span class="material-icons-outlined">engineering</span>
                                <nav>
                                    Cuenta de Profesor 
                                    <br><br><br>
                                    <p>(Para profesores del CECyT N°9)</p>
                                </nav>
                            </a>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
 </body>
 </html>