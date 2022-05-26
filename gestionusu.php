
<?php
    session_start();
    require('clases/clases.php');
    require('funcion.php');
    verificarse();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/Logo .png">
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/publicacionA.css">
    <link rel="stylesheet" href="./css/publicacionU.css">
    <link rel="stylesheet" href="./css/comunicados.css">
    <link rel="stylesheet" href="./css/grupos.css">
    <link rel="stylesheet" href="./css/batizianos.css">
    <link rel="stylesheet" href="./css/notificaciones.css">
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
    <div id="menu">
        <img src="./img/Logo The 9° Planet.PNG">

        <a href="inicioAdm.html"> <span class="material-icons-outlined">home</span></a>
        <a href="comunicadosAdm.html"><span class="material-icons-outlined">account_balance</span></a>

        <!-- Button trigger modal -->
        <button id="N" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#notificaciones">
            <span class="material-icons-outlined">notifications</span>
        </button>

        <a href="mensajeriaAdm.html"><span class="material-icons-outlined">local_post_office</span></a>
        <a class="active" href="gestionUsuarios.html"><span class="material-icons-round">badge</span></a>
        <a href="consultarReportes.html"> <span class="material-icons-outlined">supervised_user_circle</span></a>

        <!-- Button trigger modal -->
        <button id="N" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#publicacion">
            <span class="material-icons-outlined">campaign</span>
        </button>

        <button id="N" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#opciones">
            <span class="material-icons-outlined">menu</span>
        </button>
    </div>

    <section class="public">
        <br><br>
        <!--Gestion de usuarios-->
        <table class="table table-hover">
            <h3>Reportes de</h3>
            <thead>
                <tr>
                    <th>ID de publicacion</th>
                    <th>Nombre</th>
                    <th>reportes</th>
                    <th>NO. reacciones</th>
                </tr>
            </thead>
            <tbody>
                <td>1</td>
                <td>Julio el Profe</td>
                <td>3</td>
                <td>5</td>
                <td>15</td>
            </tbody>
        </table>
        <br><br>
    </section>

    <!-- Modal de notificaciones -->
    <div class="modal fade" id="notificaciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Notificaciones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p> Maria Perez ha comentado tu publicacion</p>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal de notificaciones -->

    <!-- Modal de publicacion -->
    <div class="modal fade" id="publicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Publicación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!--Agregar publicación-->
                    <div class="publicacionA">
                        <span class="material-icons-outlined">
                            account_circle
                        </span>

                        <div class="textpublicacionA">
                            <textarea placeholder="¿Qué esta sucediendo?" rows="3.5" cols="40" name="msg" minlength="2"
                                maxlength="180"></textarea>

                            <div class="imgpublicacionA">
                                <span class="material-icons-outlined">
                                    image
                                </span>
                            </div>
                        </div>
                    </div>
                    <!--Agregar publicación-->

                </div>
                <div class="modal-footer">


                    <a href="inicio.html">
                        <button class="btn btn-primary" data-bs-toggle="modal">
                            <h4>Publicar</h4>
                        </button>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal de notificaciones -->

    <!-- Modal de opciones -->
    <div class="modal fade" id="opciones" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Opciones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <a href="index.html">
                        <h4>Cerrar sesión</h4>
                    </a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
                        Restablecer contraseña</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="restablecercontraseña"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="restablecercontraseña">Restablecer contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="col-auto">
                        <input type="text" placeholder="Correo institucional" id="inputPassword6" class="form-control"
                            aria-describedby="passwordHelpInline">
                        <br>
                        <input type="password" placeholder="Contraseña" id="inputPassword6" class="form-control"
                            aria-describedby="passwordHelpInline">
                        <br>
                        <input type="password" placeholder="Confirmar contraseña" id="inputPassword6"
                            class="form-control" aria-describedby="passwordHelpInline">
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="index.html">
                        <button class="btn btn-primary" data-bs-toggle="modal">Actualizar contraseña</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de opciones -->
</body>

</html>