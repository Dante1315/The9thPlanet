
<?php
    session_start();
    require('clases/clases.php');
    require('funcion.php');
    verificars();
    verificarad();
    if(isset($_GET['amigos'])){
        $usu=usuarios::busca($_GET['amigos']);


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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
       
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
       <script>

            $(document).ready(function (e) {
                var conn = new WebSocket('ws://localhost:8080'); //conectara con el websocket

                conn.onopen = function (e) { //si la conexion es existossa
                    console.log("Conexion exitosa");
                };

                conn.onmessage = function (e) {
                    var respuesta = JSON.parse(e.data); //recibimos la respuesta y como es json la parseamos


                    $('#mensaje-div').append("<p><h3><?php echo $usu[0]['nom_usu']?>:</h3> " + respuesta.mensaje + "</p>"); //imprimimos en el div
                };

                $('#btn').click(function (e) { //si clickea el boton enviar
                    var mensaje = $('#mensaje').val(); //recibimos el textarea mensaje

                    var enviar = { 'mensaje': mensaje}; //lo guardamos en un array

                    conn.send(JSON.stringify(enviar));//enviamos el array atraves de json

                    $('#mensaje-div').append("<p><h3>Tu:</h3> " + mensaje + "</p>");  //imprimimos en el div para mi


                });



                //conn.send('Hello World!');
            });
        </script>
    </head>
    <body>
    <header>
    <div id="menu">
        <img src="./img/Logo The 9° Planet.PNG">
        <a class="active" href="inicio.php"> <span class="material-icons-round">home</span></a>
        <a href="comunicados.php"><span class="material-icons-outlined">account_balance</span></a>
        <!-- Button trigger modal -->
        <a href="chats.php"><span class="material-icons-outlined">local_post_office</span></a>

        <button id="N" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#notificaciones">
            <span class="material-icons-outlined">notifications</span>
        </button>
        <a href="perfil.php"> <span class="material-icons-outlined">person</span></a>
        <!-- Button trigger modal -->
        <button id="N" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#publicacion">
            <span class="material-icons-outlined">campaign</span>
        </button>
        <button id="N" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#opciones">
            <span class="material-icons-outlined">menu</span>
        </button>
        <form action="buscar.php" method="get" id="buscar">
        <input type="text" id="mySearch" name="buscar" onkeyup="myFunction()" placeholder=" Search.." title="Type in a category">
        </form>
    </div>
    </header>
    <section class="Lateral">
        <!--grupos-->
        <div class="grupos">
            <table>
                <tr>
                    <td>
                        <!---Nombre de la sección-->
                        <a class="twitter-timeline" href="https://twitter.com/IPN_MX?ref_src=twsrc%5Etfw">Tweets by IPN_MX</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>                    <!---Nombre de la sección-->
                    </td>
                </tr>
               
                
                <!--Sesión comunicados-->
            </table>
        </div>
        <!--grupos-->
        
        
    </section> <br>
            <br>
            <br>
            <br>
    <h5>Bienvenido al chat con <?php echo $usu[0]['nom_usu']?></h5>

        <div class="container">
           
            <div class="row">
                <div class="offset-md-3 col-md-6" id="mensaje-div"> <!-- div donde van los mensajes -->

                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>

            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <br>
                    
                    <textarea name="mensaje" id="mensaje" class="form-control"></textarea> <!-- TEXTAREA mensaje -->
                    <br>
                    <button id="btn" class="btn btn-info">Enviar</button> <!-- BOTON A ENVIAR -->
                </div>
            </div>
        </div>
    </body>
</html>
