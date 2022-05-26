
<?php
    session_start();
    require('clases/clases.php');
    require('funcion.php');
    verificars();
    verificarad();
   if(isset($_GET['buscar'])){
       $nom_usu=$_GET['buscar'];
       $conn=conexion("be76f7e687d567","1e15a88c");
       $consulta=$conn->prepare("select * from usuarios where nom_usu like :nom_usu");
       $consulta->execute(array(':nom_usu'=>"%$nom_usu%"));
        $resultado=$consulta->fetchAll();
     }
     if(isset($_GET['agregar'])){
         $envia_am=$_SESSION['id_usu'];
         $recibe_am=$r['id_usu'];
         amigos::agregar($envia_am,$recibe_am);
         header('location:inicio.php');
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
              <a class="twitter-timeline" href="https://twitter.com/IPN_MX?ref_src=twsrc%5Etfw">Tweets by IPN_MX</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>                    <!---Nombre de la sección-->
              </td>
          </tr>
         
          <!--Sesión comunicados-->
      </table>
  </div>
  <!--grupos-->
  

</section>
    
    <section class="public">
        <div class="publicaciones">
             <!--Nombre de la pagina-->
             <nav id="nombrepagina">
                <h2> Batizianos </h2>
            </nav>


            <?php if(!empty($resultado)):?>
            <?php foreach($resultado as $r):?>
                <?php
                    $en=(($r['id_usu']*1215161)/4);
                    ?>
              
                <div class="publicacionU">
                    <!--Nombre, Alias, Tiempo de publicación, Opciones-->
                    <div class="DatosU">
                        <table>
                            <tr>
                                <td>
                                    <div class="iconoFotoU">
                                        <a  href="p.php?id_usu=<?php echo $en?>">
                                        <img src="<?php echo $r['foto_usu']?>">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="NombreU">
                                    <a  href="p.php?id_usu=<?php echo $en?>">
                                        <h2>
                                            <?php echo $r['nom_usu']?>
                                        </h2>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
               <?php endforeach;?>
               <?php else:?>
                <h4>No se encontraron resultados con tu búsqueda</h4>

            <?php endif;?>
        </div>

    </section>
    <?php $no=noti::mostrar($_SESSION['id_usu'])?>
    <div class="modal fade" id="notificaciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Notificaciones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php if(!empty($no)):?>
                <?php foreach($no as $n):?>
                    <?php if($n['accion_no']==1):?>
                    <p><?php echo $n['nom_usu']," ",$n['app_usu']," ",$n['apm_usu']?>  comento a tu publicacion</p>
                    <?php else:?>

                    <p><?php echo $n['nom_usu']," ",$n['app_usu']," ",$n['apm_usu']?>  reacciono tu publicacion</p>
                    <?php endif;?>

<?php endforeach;?>
<?php endif;?>
                </div>
                

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="publicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Publiación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="publicacionA">
                        <img <?php ?>>
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>"enctype="multipart/form-data" method="post">
                            <div class="textpublicacionA">
                                <input type="text" name="txt" class="btn btn-primary" data-bs-toggle="collapse" href="#publicar" 
                                    aria-expanded="false" aria-controls="collapseExample" placeholder="¿Qué esta sucediendo?">
                                </input>
                            </div>
                            <nav class="AgregarImg">
                                <span class="material-icons-outlined" type="file" name="imagen">image</span>
                                <input type="file" name="imagen"> </input>
                            </nav>
                            <div class="bottonA">
                                <input type="submit" name="publicar" class="btn btn-primary" data-bs-toggle="collapse" href="#publicar" 
                                    aria-expanded="false" aria-controls="collapseExample";> 
                                </input>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="opciones" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Opciones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <a href="cerrars.php"><h4>Cerrar sesión</h4></a>

                </div>
            </div>
        </div>
    </div>
   
</body>

</html>