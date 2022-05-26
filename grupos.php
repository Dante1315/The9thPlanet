
<?php
    session_start();
    require('clases/clases.php');
    require('funcion.php');
    verificars();
    verificarad();
 
    if(isset($_POST['crear'])){
            $nom=$_POST['nom'];
            $des=$_POST['des'];
            $destino='fotos/';
            $foto_g=$destino . $_FILES['imagenper']['name'];
            $tmp=$_FILES['imagenper']['tmp_name'];  
            move_uploaded_file($tmp,$foto_g);
            $id_usu=$_SESSION['id_usu'];

        
            grupos::registrar($id_usu,$nom,$des,$foto_g);
            header('location:grupos.php'); 

    }
   
    

    if($_SESSION['id_usu']!=" "){
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
                <h2>Grupos</h2>
            </nav>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="crea" enctype="multipart/form-data" onsubmit="return validar(this)">
            
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" name="nom"   class="form-control" placeholder="Nombre del grupo" id="floatingInputGrid" 
                        tabindex="0" class="btn btn-lg btn-danger" data-bs-toggle="popover"  data-bs-placement="left" data-bs-trigger="focus"
                        data-bs-content="">  
                        <label for="floatingInputGrid">Nombre del grupo</label>
                    </div>
                </div>

                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" name="des"  class="form-control" placeholder="Alias" id="floatingInputGrid"
                        tabindex="0" class="btn btn-lg btn-danger" role="button" data-bs-toggle="popover"  data-bs-placement="right" data-bs-trigger="focus"
                        data-bs-content="Así te reconoceran tus amigos bartizianos, sin acentos y sustituye la letra ñ por n.Ingresa 3 a 15 letras
                        
                        Reglas:
                        *Debe tener entre 3 y 15 caracteres.">
                        <label for="floatingInputGrid"> Descripcion </label>
                    </div>
                </div>
            </div>
            <br>
        <h3>Editar foto de perfil</h3>

            <div>
                <input type="file" name="imagenper" ></input>
                <input type="submit" value="Guardar cambios" name="editarf" class="log-btn">
            </div>

            <input type="submit" value="crear" name="crear" class="btn btn-lg btn-primary" type="button">
            <br><br>
        </form>   
                        
<?php 

$id_usu=$_SESSION['id_usu'];
$g=grupos::mostrar($id_usu);
                        ?>

        <?php foreach($g as $gg):?>
                 <!--Publicación de Usuario-->
                <div class="publicacionU">
                    <!--Nombre, Alias, Tiempo de publicación, Opciones-->
                    <div class="DatosU">
                        <table>
                            <tr>
                                <td>
                                    <div class="iconoFotoU">
                                    <a  href="paginag.php?id_g=<?php echo $gg['id_g']?>">
                                        <h2>
                                        <img src="<?php echo $gg['foto_g']?>">
                                        </h2></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="NombreU">
                                    <a  href="paginag.php?id_g=<?php echo $gg['id_g']?>">
                                        <h4>
                                            <?php echo $gg['nom_g'];?> 
                                        </h4></a>
                                    </div>
                                </td>
                                <td>
                               
                              
                            

                            </tr>
                        </table>
                    </div>
                    <br>
                    
                        <br>
                    </div>
                </div>
                <br>
                
                <?php endforeach;?>

   

</body>

</html>
<?php
}else{
    header('location:index.php');
}?>