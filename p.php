
<?php
    session_start();
    require('clases/clases.php');
    require('funcion.php');
    verificars();
    verificarad();
    $error="";
   if(isset($_GET['id_usu'])){
    $des=(($_GET['id_usu']/1215161)*4);

       $usu=usuarios::busca($des);
       if(empty($usu)) header('location:index.php');
        $verifica=amigos::ver($_SESSION['id_usu'],$des);
        $publi=publi::publi_por_usuario($des);
   }
   if(isset($_GET['agregar'])){
       $envia_am=$_SESSION['id_usu'];
       $recibe_am=$_GET['agregar'];
       amigos::agregar( $envia_am,$recibe_am);
       header('location:perfil.php');
   }
   if(isset($_POST['comentar']) and !empty($_POST['txtcom'])){
    $id_usu=$_SESSION['id_usu'];
    $texto_com=$_POST['txtcom'];
    $id_publi=$_POST['comentar'];
    comentarios::agregar($id_usu,$texto_com,$id_publi);
    noti::agregar(1,$_POST['comentar'],$_SESSION['id_usu']);
    header('location:inicio.php');
    }
    if(isset($_GET['re'])){
        reacciones::agregar($des,$_SESSION['id_usu']);
        noti::agregar(false,$_GET['id_publi'],$_SESSION['id_usu']);
        header('location:inicio.php');
    }

    if(isset($_GET['rep'])){
        publi::reportar($_SESSION['id_usu'],$_GET['id_usu'],$_GET['id_publi']);
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
    <!--tipograf??as-->
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
        <img src="./img/Logo The 9?? Planet.PNG">
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
              <a class="twitter-timeline" href="https://twitter.com/IPN_MX?ref_src=twsrc%5Etfw">Tweets by IPN_MX</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>                    <!---Nombre de la secci??n-->
              </td>
          </tr>
         
          <!--Sesi??n comunicados-->
      </table>
  </div>
  <!--grupos-->
  

</section>
   
    <section class="public">
        <div class="publicaciones">
            <!--Nombre de la pagina-->
            <nav id="nombrepagina">
                <?php if($_GET['id_usu']!=$_SESSION['id_usu']):?>
                    <h4>Bienvenido al perfil de <?php echo $usu[0]['nom_usu']?></h4>
                    <?php else:?>
                        <h4>Bienvenido a tu perfil  <?php $_SESSION['nom_usu']?></h4>
                    <?php endif;?>
                    </nav>
                <div class="publicacionA">
                <img src="<?php echo $usu[0]['foto_usu'];?>"></img>
                <div class="textpublicacionA">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2"><?php echo $usu[0]['nom_usu']," ",$usu[0]['app_usu']," ",$usu[0]['apm_usu'];?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Alias</th>
                                <td><?php echo $usu[0]['alias_usu']?></td>
                            </tr>
                            <tr>
                                <th scope="row">Fecha de nacimiento</th>

                                <td><?php echo $usu[0]['fecha_usu']?></td>
                            </tr>
                            <tr>
                                <th scope="row">Rol</th>

                                <td><?php echo $usu[0]['rol_usu']?></td>
                            </tr>
                            
                            <tr>
                            <?php if($_GET['id_usu']!=$_SESSION['id_usu']):?>
                            <tr>
                                <th scope="row">Estado</th>

                                <td>
                                    <?php if(empty($verifica)):?>
                                    <a href="p.php?agregar=<?php echo $des;?>">agregar</a>
                                <?php elseif($verifica[0]['estado_am']==0):?>
                                    <h7>Solicitud pendiente</h7>
                                    <?php elseif($verifica[0]['estado_am']==1):?>
                                        <h7>Amigos</h7>

                                        <?php endif;?>

                                    <?php endif;?>
                                </td>
                            </tr>
                            
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Editar perfil-->
            <br>
            
            <!--Agregar publicaci??n-->
            <br>
            <!--Publicaci??n de Usuario-->
            <div class="PubliNueva">
                <?php
                if(!empty($publi)):
                ?>
                <?php foreach($publi as $publis):?>
                 <!--Publicaci??n de Usuario-->
                <div class="publicacionU">
                    <!--Nombre, Alias, Tiempo de publicaci??n, Opciones-->
                    <div class="DatosU">
                        <table>
                            <tr>
                            <td>
                                    <div class="iconoFotoU">
                                        <h2>
                                        <img src="<?php echo $publis['foto_usu']?>">
                                        </h2>
                                    </div>
                                </td>
                            
                                <td>
                                    <div class="NombreU">
                                        <h4>
                                            <?php echo $publis['nom_usu'];?> 
                                        </h4>
                                    </div>
                                </td>
                                <td>
                                    <div class="NombreU">
                                        <h4>
                                            <?php echo $publis['alias_usu'];?> 
                                        </h4>
                                    </div>
                                </td>                               
                            </tr>
                        </table>
                    </div>
                    <br>
                
                    <!--Nombre, Alias, Tiempo de publicaci??n, Opciones-->
                    <!--Texto de la publicaci??n-->
                    <div class="textpublicacionU">
                        <table>
                            <tr>
                                <td>
                                    <div class="FechaPU">
                                        <h2>
                                            <?php echo $publis['fecha_publi'];?>
                                        </h2>
                                    </div>
                                </td>
                            </tr>
                            <!--imagen de la publiacci??n -->
                            <tr>
                                <td>
                                    <div class="TextoPU">
                                        <h2>
                                            <?php echo $publis['texto_publi'];?> 
                                        </h2>
                                    
                                        <!--Imagen de la publicaci??n-->
                                        <?php
                                           if($publis['foto_publi']=='fotos/' || $publis['foto_publi']=='NULL' ){
                                           echo "";
                                           }else{
                                           require('confoto.php');
                                        }                     
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--Texto de la publicaci??n-->
                    <div class="iconoReaccionU">
                        <table>
                            <tr>
                                <td>
                                    <p><?php echo reacciones::mostrar($publis['id_publi'])[0][0];?> reacciones</p>
                                </td>
                                <td>
                                    <p><?php echo comentarios::contar($publis['id_publi'])[0][0];?> comentarios</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--Comentarios-->
                    <div class="ComentariosP">
                        <?php $comentario=comentarios::mostrar($publis['id_publi']);?>
                        <?php if(!empty($comentario)):?>
                        <?php foreach($comentario as $c):?>
                            
                        <table>
                        
                            <tr>
                                <td>
                                <div class="NombreU">
                                    <a  href="p.php?id_usu=<?php echo $c['id_usu']?>">
                                        <h4>
                                            <?php echo $c['nom_usu'];?> 
                                        </h4></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="FechaPUeC">
                                        <h4> 
                                            <?php echo $c['fecha_com']?>
                                        </h4>
                                    </div>
                                </td>
                            </tr>
                            <tr >
                                <td colspan="2">
                                    <div class="texteC">
                                        <h6><?php echo $c['texto_com']?></h7>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <?php endforeach;?>
                        <?php endif;?>
                    </div>
                    <br>
                    <!--este es para la interaccion de los usuarios -->
                    <div class="ReaccionAP">
                        <?php if(reacciones::verifica($publis['id_publi'],$_SESSION['id_usu'])==0):?>
                        <table>
                            <tr>
                                <td> 
                                    <div class="LikeS">
                                        <a href="<?php echo $_SERVER['PHP_SELF']?>?re=1 && id_publi=<?php echo $publis['id_publi']?>"> 
                                            <span class="material-icons-outlined">favorite </span>
                                            
                                        </a>
                                       
                                    </div>
                                </td>
                                <td>
                                    <div class="ComentarioS">
                                        <a href="<?php echo $_SERVER['PHP_SELF']?>?ree=-1 && id_publi=<?php echo $publis['id_publi']?>"> 
                                            <span class="material-icons-outlined">chat_bubble</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <?php else:?>
                        <?php endif;?>                    
                    </div>
                    <br>
                    <div class="comentario">
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="comentar" >
                            
                            <div  class="comentarioU" >
                                <div class="form-floating">
                                    <input type="text" name="txtcom" class="form-control" data-bs-toggle="collapse" href="#publicar" 
                                        aria-expanded="false" aria-controls="collapseExample" id="floatingInputGrid" placeholder="Comentar">
                                    </input>
                                    <input type="hidden" name="comentar" class="btn btn-primary" value="<?php echo $publis['id_publi'];?>" data-bs-toggle="collapse" href="#publicar" 
                                        aria-expanded="false" aria-controls="collapseExample";></input>
                                    <label for="floatingInputGrid">Agrega un comentario</label>
                                </div>
                            </div>
                            
                        </form>
                        
                        
                    </div>
                        <br>
                    </div>
                </div>
                <br>
                
                <?php endforeach;?>
                 <?php endif;?>
               
               
                
            </div>
            <!--Fin de Publicaci??n Usuario-->
            <!--Fin de Publicaci??n Usuario-->
            <br>
             <!--Publicaci??n de Usuario-->
             
            <!--Fin de Publicaci??n Usuario-->
            <br>
        </div>

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

    <!-- Modal  de publicacion-->
    <div class="modal fade" id="publicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Publicaci??n</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!--Agregar publicaci??n-->
                    <div class="publicacionA">
                        <img src="./img/foto de perfil x.jpg">

                        <div class="textpublicacionA">
                            <textarea placeholder="??Qu?? esta sucediendo?" rows="3.5" cols="40" name="msg" minlength="2"
                                maxlength="180"></textarea>

                            <div class="imgpublicacionA">
                                <span class="material-icons-outlined">
                                    image
                                </span>
                            </div>
                        </div>
                    </div>
                    <!--Agregar publicaci??n-->

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
    <!-- Modal  de publicacion-->

    <!-- Modal  de opciones-->
  
    <!-- Modal  de opciones-->
    <!--Modal restablecer contrase??a-->
    
    <!--Modal restablecer contrase??a-->

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
                    <h5 class="modal-title" id="exampleModalLabel">Publiaci??n</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="publicacionA">
                        <img <?php ?>>
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>"enctype="multipart/form-data" method="post">
                            <div class="textpublicacionA">
                                <input type="text" name="txt" class="btn btn-primary" data-bs-toggle="collapse" href="#publicar" 
                                    aria-expanded="false" aria-controls="collapseExample" placeholder="??Qu?? esta sucediendo?">
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

                    <a href="cerrars.php"><h4>Cerrar sesi??n</h4></a>

                </div>
            </div>
        </div>
    </div>
   

    <!-- Modal editar perfil-->
    <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Publicaci??n</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="publicacionA">
                    <img src="<?php echo $_SESSION['foto_usu']?>"></img>
                        <div class="textpublicacionA">
                            <table class="table">
                                <thead>
         <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="editarperfil" enctype="multipart/form-data" onsubmit="return validar(this)">
            <br>
            <h2>Editar datos</h2>
            <br>
            <div>
                <input type="text" name="nom"   class="input-control" placeholder="Nombre">                    
                <input type="text" name="app"   class="input-control" placeholder="Apellido Paterno">
                       
            </div>
            <br>
            <div>
                <input type="text" name="apm"   class="input-control" placeholder="Apellido Materno">
                <input type="text" name="alias"  class="input-control" placeholder="Alias">

            </div>       
            <br>

           
            <?php if(!empty($error)):?>
                <p class="error"><?php echo $error; ?> </p>
            <?php endif;?>

            <input type="submit" value="Guardar cambios" name="editar" class="log-btn">
            <input type="checkbox" class="form-check-input" >  
            <input type="file" name="imagenper"></input>
            <br>
            <br>
        </form>
                                  
               

            </div>
        </div>
    </div>
    <!--Modal editar perfil-->

</body>

</html>