<?php

function conexion($usu,$pwd){
    try{
        $conn=new PDO('mysql:host=us-cdbr-east-04.cleardb.com;dbname=heroku_e7a9c4172836d17', $usu,$pwd);
        return $conn;
    
    }catch(PDOException $e){
        return $e->getMessage();
    }

}
  
    function verificars(){
        if(!isset($_SESSION['id_usu'])){
            header('location:index.php');
        }
    }
    function verificarads(){
        if(!isset($_SESSION['id_admin'])){
            header('location:index.php');
        }
    }
    function verificarse(){
        if(isset($_SESSION['id_usu'])){
            header('location:inicio.php');
        }
    }
    function verificarad(){
        if(isset($_SESSION['id_admin'])){
            header('location:inicioad.php');
        }
    }
    function vacio($datos){
        $vacio=false;
        $tam=count($datos);
        for($c=0;$c<$tam;$c++){
            if(empty($datos[$c])){
                $vacio=true;
                break;
            }
        }
        return $vacio;

    }

    function limpia($datos){
        $tam=count($datos);
        for($c=0;$c<$tam; $c++){
           if($c !=6 && $c!=7){
                $datos[$c]=htmlspecialchars($datos[$c]);
                $datos[$c]=trim($datos[$c]);
                $datos[$c]=stripcslashes($datos[$c]);
           }
        }
        return $datos;
    }
?>