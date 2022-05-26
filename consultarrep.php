
<?php
    session_start();
    require('clases/clases.php');
    require('funcion.php');
    verificarse();
    verificarads();

   $checar=usuarios::verre();
        if(isset($_GET['id_publi'])){
            $id_publi=$_GET['id_publi'];
            publi::eliminarr($id_publi);
            publi::eliminarc($id_publi);
            publi::eliminarr($id_publi);
            publi::eliminar($id_publi);

            publi::eliminarre($id_publi);


        }
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

        <a  href="inicioad.php"> <span class="material-icons-outlined">home</span></a>
        <a href="consultarrep.php"><span class="material-icons-outlined">account_balance</span></a>
        <a href="inter.php"> <span class="material-icons-outlined">supervised_user_circle</span></a>


        <button id="N" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#opciones">
            <span class="material-icons-outlined">menu</span>
        </button>
    </div>
    <section class="public">
        <br><br>
        <!--Gestion de usuarios-->
        <table class="table table-hover">
   
        <h3>Gestion de usuarios</h3>
        <?php foreach($checar as $c):?>

            <thead>
                <tr>
                <tr>
                    <th>ID del usuario</th>
                    <th>No.Reportes</th>
                    <th>ID de la publicacion</th>
                    <th>ID usuario que reporto</th>
                    <th>Dar de baja</th>
                </tr>

                </tr>
            </thead>
            <!--aqui se agregan ususrios-->
            <tbody>
                <td><?php echo $c['reportado_rep']?></td>
                <td><p><?php echo usuarios::contar($c['reportado_rep'])[0][0];?></td>
                <td><?php echo $c['id_publi']?></td>
                <td><?php echo $c['id_usu']?></td>

                <td>
                    <a href="consultarrep.php?id_publi=<?php echo $c['id_publi']?>">Dar de baja publicación</a>
                </td>


            </tbody>
            <?php endforeach;?>

            <!--aqui se agregan ususrios-->

        </table>
        <br><br>
        <!--Gestion de publicaciones-->
        

    <!-- Modal de opciones administrador -->
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
   
    <!-- Modal de opciones administrador -->

</body>

</html>