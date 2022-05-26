<?php 
	require_once "php/conexion.php"; 

	$conexion=conexion();
    $destino='fotos/';
    $texto_publi=$_POST['txt'];
    $foto_publi=$destino . $_FILES['imagen']['name'];
     $tmp=$_FILES['imagen']['tmp_name'];
    move_uploaded_file($tmp,$foto_publi);

    $id_usu=$_SESSION["id_usu"];
	$sql="INSERT into publicaciones (id_publi,id_usu,texto_publi,foto_publi,fecha_publi) values(null,'$id_usu','$texto_publi','$foto_publi',Now());";	
    echo $result=mysqli_query($conexion,$sql);
    

 ?>