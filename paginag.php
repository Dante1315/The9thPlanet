
<?php
    session_start();
    require('clases/clases.php');
    require('funcion.php');
    verificars();
    verificarad();
    $error="";

   if(isset($_GET['id_g'])){
    $publi=grupos::mostrarp($_GET['id_g']);

       $mgg=grupos::busca($_GET['id_g']);
      

    } 
    if(isset($_POST['publicar']) and !empty($_FILES) and !empty($_POST['txt'])){
        $destino='fotos/';
        $texto_publi=$_POST['txt'];
        $foto_publi=$destino . $_FILES['imagen']['name'];
         $tmp=$_FILES['imagen']['tmp_name'];
         $id_g=$_POST['publicar'];
        publi::publicaciong($_SESSION['id_usu'],$texto_publi,$foto_publi,$id_g);
        move_uploaded_file($tmp,$foto_publi);
        header('location:inicio.php');
        
}

if(isset($_GET['acceso'])){
    $envia_am=$_SESSION['id_usu'];
    $recibe_am=$_GET['acceso'];
    grupos::acceso( $envia_am,$recibe_am);
    header('location:paginag.php');
}
if(isset($_POST['comentar']) and !empty($_POST['txtcom'])){
    $id_usu=$_SESSION['id_usu'];
    $texto_com=$_POST['txtcom'];
    $id_publi=$_POST['comentar'];
    comentarios::agregar($id_usu,$texto_com,$id_publi);
    header('location:inicio.php');
    }
    if(isset($_GET['re'])){
        reacciones::agregar($_GET['id_publi'],$_SESSION['id_usu']);
        header('location:inicio.php');
    }
    if(isset($_POST['editar'])) {
        $nom_g=$_POST['nom'];
        $descipcion=$_POST['app'];
        $id_g=$_POST['editar'];
        grupos::editar($nom_g,$descipcion,$id_g);
        }
        if(isset($_POST['editarf'])){
            $destino='fotos/';
            $foto_usu=$destino . $_FILES['imagenper']['name'];
        $tmp=$_FILES['imagenper']['tmp_name'];
            move_uploaded_file($tmp,$foto_usu);
            $id_g=$_POST['editarf'];
            grupos::editarf($id_g,$foto_usu);
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
                        <!---Nombre de la sección-->
                        <blockquote class="twitter-tweet"><p lang="es" dir="ltr">Activismo Día 13<a href="https://twitter.com/hashtag/16diasdeactivismo?src=hash&amp;ref_src=twsrc%5Etfw">#16diasdeactivismo</a> <a href="https://twitter.com/hashtag/eliminaci%C3%B3ndelaviolenciacontralasmujeresenelIPN?src=hash&amp;ref_src=twsrc%5Etfw">#eliminacióndelaviolenciacontralasmujeresenelIPN</a> <a href="https://twitter.com/hashtag/25NdIadelaeliminaci%C3%B3ndelaviolenciacontralasmujeres?src=hash&amp;ref_src=twsrc%5Etfw">#25NdIadelaeliminacióndelaviolenciacontralasmujeres</a> <a href="https://t.co/L6oycQcFgl">pic.twitter.com/L6oycQcFgl</a></p>&mdash; cecyt9 (@_cecyt9) <a href="https://twitter.com/_cecyt9/status/1462903925934338055?ref_src=twsrc%5Etfw">November 22, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>                    
                    </td>
                </tr>
                <tr>
                    <td>
                        <!---Nombre de la sección-->
                        <blockquote class="twitter-tweet"><p lang="es" dir="ltr">Activismo Día 12<a href="https://twitter.com/hashtag/16diasdeactivismo?src=hash&amp;ref_src=twsrc%5Etfw">#16diasdeactivismo</a> <a href="https://twitter.com/hashtag/eliminaci%C3%B3ndelaviolenciacontralasmujeresenelIPN?src=hash&amp;ref_src=twsrc%5Etfw">#eliminacióndelaviolenciacontralasmujeresenelIPN</a> <a href="https://twitter.com/hashtag/25NdIadelaeliminaci%C3%B3ndelaviolenciacontralasmujeres?src=hash&amp;ref_src=twsrc%5Etfw">#25NdIadelaeliminacióndelaviolenciacontralasmujeres</a> <a href="https://t.co/LZpoXVmEee">pic.twitter.com/LZpoXVmEee</a></p>&mdash; cecyt9 (@_cecyt9) <a href="https://twitter.com/_cecyt9/status/1462435635923402759?ref_src=twsrc%5Etfw">November 21, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!---Nombre de la sección-->
                        <blockquote class="twitter-tweet"><p lang="es" dir="ltr">📢Aviso importante📢, Tercer corte de Evaluación, más información en el siguiente enlace: <a href="https://t.co/F6KIPz3YhT">https://t.co/F6KIPz3YhT</a> <a href="https://t.co/1GDD413PV4">pic.twitter.com/1GDD413PV4</a></p>&mdash; cecyt9 (@_cecyt9) <a href="https://twitter.com/_cecyt9/status/1462135949345767424?ref_src=twsrc%5Etfw">November 20, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!---Nombre de la sección-->
                        <blockquote class="twitter-tweet"><p lang="es" dir="ltr">Activismo Día 11<a href="https://twitter.com/hashtag/16diasdeactivismo?src=hash&amp;ref_src=twsrc%5Etfw">#16diasdeactivismo</a> <a href="https://twitter.com/hashtag/eliminaci%C3%B3ndelaviolenciacontralasmujeresenelIPN?src=hash&amp;ref_src=twsrc%5Etfw">#eliminacióndelaviolenciacontralasmujeresenelIPN</a> <a href="https://twitter.com/hashtag/25NdIadelaeliminaci%C3%B3ndelaviolenciacontralasmujeres?src=hash&amp;ref_src=twsrc%5Etfw">#25NdIadelaeliminacióndelaviolenciacontralasmujeres</a> <a href="https://t.co/MRG68ZmaTt">pic.twitter.com/MRG68ZmaTt</a></p>&mdash; cecyt9 (@_cecyt9) <a href="https://twitter.com/_cecyt9/status/1462118286208897026?ref_src=twsrc%5Etfw">November 20, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>                    </td>
                </tr>
                <tr>
                    <td>
                        <!---Nombre de la sección-->
                        <blockquote class="twitter-tweet"><p lang="es" dir="ltr">💲💲Aviso importante Becas💲💲 más información en los siguientes enlaces: <a href="https://t.co/VkigeBMU5r">https://t.co/VkigeBMU5r</a><a href="https://t.co/IWzDzEeSs8">https://t.co/IWzDzEeSs8</a> <a href="https://t.co/7BakyZtg6T">pic.twitter.com/7BakyZtg6T</a></p>&mdash; cecyt9 (@_cecyt9) <a href="https://twitter.com/_cecyt9/status/1461827217567191040?ref_src=twsrc%5Etfw">November 19, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>                    </td>
                </tr>
                <tr>
                    <td>
                        <!---Nombre de la sección-->
                        <blockquote class="twitter-tweet"><p lang="es" dir="ltr">📢Aviso importante📢 Ventanilla de atención virtual, hacer clic en el siguiente enlace: <a href="https://t.co/MyBO18ReqY">https://t.co/MyBO18ReqY</a> <a href="https://t.co/hfUhJY7ku4">pic.twitter.com/hfUhJY7ku4</a></p>&mdash; cecyt9 (@_cecyt9) <a href="https://twitter.com/_cecyt9/status/1461818679520382987?ref_src=twsrc%5Etfw">November 19, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>                    </td>
                </tr>
                <tr>
                    <td>
                        <!---Nombre de la sección-->
                        <blockquote class="twitter-tweet"><p lang="es" dir="ltr">Activismo Día 10<a href="https://twitter.com/hashtag/16diasdeactivismo?src=hash&amp;ref_src=twsrc%5Etfw">#16diasdeactivismo</a> <a href="https://twitter.com/hashtag/eliminaci%C3%B3ndelaviolenciacontralasmujeresenelIPN?src=hash&amp;ref_src=twsrc%5Etfw">#eliminacióndelaviolenciacontralasmujeresenelIPN</a> <a href="https://twitter.com/hashtag/25NdIadelaeliminaci%C3%B3ndelaviolenciacontralasmujeres?src=hash&amp;ref_src=twsrc%5Etfw">#25NdIadelaeliminacióndelaviolenciacontralasmujeres</a> <a href="https://t.co/49PEmGscnh">pic.twitter.com/49PEmGscnh</a></p>&mdash; cecyt9 (@_cecyt9) <a href="https://twitter.com/_cecyt9/status/1461762660383571974?ref_src=twsrc%5Etfw">November 19, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>                    </td>
                </tr>
                <tr>
                    <td>
                        <!---Nombre de la sección-->
                        <blockquote class="twitter-tweet"><p lang="es" dir="ltr">Activismo Día 09<a href="https://twitter.com/hashtag/16diasdeactivismo?src=hash&amp;ref_src=twsrc%5Etfw">#16diasdeactivismo</a> <a href="https://twitter.com/hashtag/eliminaci%C3%B3ndelaviolenciacontralasmujeresenelIPN?src=hash&amp;ref_src=twsrc%5Etfw">#eliminacióndelaviolenciacontralasmujeresenelIPN</a> <a href="https://twitter.com/hashtag/25NdIadelaeliminaci%C3%B3ndelaviolenciacontralasmujeres?src=hash&amp;ref_src=twsrc%5Etfw">#25NdIadelaeliminacióndelaviolenciacontralasmujeres</a> <a href="https://t.co/JR1gQGrbmi">pic.twitter.com/JR1gQGrbmi</a></p>&mdash; cecyt9 (@_cecyt9) <a href="https://twitter.com/_cecyt9/status/1461396766541164546?ref_src=twsrc%5Etfw">November 18, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>                    </td>
                </tr>
                <tr>
                    <td>
                        <!---Nombre de la sección-->
                        <blockquote class="twitter-tweet"><p lang="es" dir="ltr">📢Atenta invitación📢 a los siguientes eventos, en cada banner encontrarán un código QR que los enviará al formulario para realizar la inscripción a cada webinar, más información en el siguiente enlace: <a href="https://t.co/WT291L0RTc">https://t.co/WT291L0RTc</a> <a href="https://t.co/55fCekvrYk">pic.twitter.com/55fCekvrYk</a></p>&mdash; cecyt9 (@_cecyt9) <a href="https://twitter.com/_cecyt9/status/1461392811731955712?ref_src=twsrc%5Etfw">November 18, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>                    </td>
                </tr>
                <tr>
                    <td>
                        <!---Nombre de la sección-->
                        <blockquote class="twitter-tweet"><p lang="es" dir="ltr">Activismo Día 08<a href="https://twitter.com/hashtag/16diasdeactivismo?src=hash&amp;ref_src=twsrc%5Etfw">#16diasdeactivismo</a> <a href="https://twitter.com/hashtag/eliminaci%C3%B3ndelaviolenciacontralasmujeresenelIPN?src=hash&amp;ref_src=twsrc%5Etfw">#eliminacióndelaviolenciacontralasmujeresenelIPN</a> <a href="https://twitter.com/hashtag/25NdIadelaeliminaci%C3%B3ndelaviolenciacontralasmujeres?src=hash&amp;ref_src=twsrc%5Etfw">#25NdIadelaeliminacióndelaviolenciacontralasmujeres</a> <a href="https://t.co/s1jgg65XZY">pic.twitter.com/s1jgg65XZY</a></p>&mdash; cecyt9 (@_cecyt9) <a href="https://twitter.com/_cecyt9/status/1461145966619373583?ref_src=twsrc%5Etfw">November 18, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>                    </td>
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
                    <h4>Bienvenido al grupo  <?php echo $mgg[0]['nom_g']?></h4>
                        
                    </nav>
                <div class="publicacionA">
                <img src="<?php echo $mgg[0]['foto_g'];?>"></img>
                <div class="textpublicacionA">
                    <table class="table">
                      
                        <thead>
                            <tr>
                                <th colspan="2"><?php echo $mgg[0]['nom_g'];?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Descripcion</th>
                                <td><?php echo $mgg[0]['descripcion'];?></td>
                            </tr>
                            <a href="paginag.php?acceso=<?php echo $_GET['id_g'];?>">acceso</a>

                        </tbody>
                    </table>
                    <td colspan="2">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editar">
                                        Editar
                                    </button>

                                </td>
                </div>
            </div>


            <div class="PubliNueva">
                <?php
                if(!empty($publi)):
                ?>
                <?php foreach($publi as $publis):?>
                 <!--Publicación de Usuario-->
                <div class="publicacionU">
                    <!--Nombre, Alias, Tiempo de publicación, Opciones-->
                    <div class="DatosU">
                        <table>
                            <tr>
                                <td>
                                    <div class="iconoFotoU">
                                    <a  href="p.php?id_usu=<?php echo $publis['id_usu']?>">
                                        <h2>
                                        <img src="<?php echo $publis['foto_usu']?>">
                                        </h2></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="NombreU">
                                    <a  href="p.php?id_usu=<?php echo $publis['id_usu']?>">
                                        <h4>
                                            <?php echo $publis['nom_usu'];?> 
                                        </h4></a>
                                    </div>
                                </td>
                                <td>
                                <div class="NombreU">
                                    <a  href="p.php?id_usu=<?php echo $publis['id_usu']?>">
                                        <h4>
                                            <?php echo $publis['alias_usu'];?> 
                                        </h4></a>
                                    </div>
                                </td>
                                <?php if($publis['id_usu']!=$_SESSION['id_usu']):?>

                                    <td>
                                <div class="NombreU">
                                <a href="<?php echo $_SERVER['PHP_SELF']?>?rep=1 && id_publi=<?php echo $publis['id_publi']?> && id_usu=<?php echo $publis['id_usu']?>">Reportar</a>
                                    </div>
                                </td>
                               <?php else:?>

                                <?php endif;?>
                            </tr>
                        </table>
                    </div>
                    <br>
                
                    <!--Nombre, Alias, Tiempo de publicación, Opciones-->
                    <!--Texto de la publicación-->
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
                            <!--imagen de la publiacción -->
                            <tr>
                                <td>
                                    <div class="TextoPU">
                                        <h2>
                                            <?php echo $publis['texto_publi'];?> 
                                        </h2>
                                    
                                        <!--Imagen de la publicación-->
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
                    <!--Texto de la publicación-->
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
                                        <h4>
                                            <?php echo $c['nom_usu'];?> 
                                        </h4>
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
            
            <!--Editar perfil-->
            <br>
            <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Publicación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="publicacionA">
                    <img src="<?php echo $mgg[0]['foto_g']?>"></img>
                        <div class="textpublicacionA">
                            <table class="table">
                                <thead>
                                <h7>Puedes editar tus datos personales o tu foto de perfil, pero no ambas al mismo tiempo, los cambios en la informacion de tu perfil se veran reflejados en tu siguiente inicio de sesion, pero en tus publicaciones se veran reflados al instante</h7>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="editarperfil" onsubmit="return validar(this)">
            <h3>Editar datos</h3>
            <br>
            <div>
                <input type="text" name="nom"   class="input-control" placeholder="Nombre" value="<?php echo $mgg[0]['nom_g'];?>">                    
                <input type="text" name="app"   class="input-control" placeholder="Apellido Paterno" value="<?php echo $mgg[0]['descripcion'];?>">
                       
            </div>
            <br>
               
            <br>
            <div>
                <input type="submit" value="<?php echo ($_GET['id_g']);?>" name="editar" class="log-btn">
            </div>
        
        </form> 
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="editarf" enctype="multipart/form-data" onsubmit="return validar(this)">
        <h3>Editar foto de perfil</h3>

            <div>
                <input type="file" name="imagenper" ></input>
                <input type="submit" value="<?php echo ($_GET['id_g']);?>" name="editarf" class="log-btn">
            </div>

        </form>
                                  
               

            </div>
        </div>
    </div>
</body>

</html>