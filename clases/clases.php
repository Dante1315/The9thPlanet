<?php
class usuarios {
    public static function registrar($datos){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("insert into usuarios(id_usu,nom_usu,app_usu,apm_usu,fecha_usu,contra_usu,sexo_usu,correo_usu,alias_usu,rol_usu,foto_usu) values(null,:nom_usu,:app_usu,:apm_usu,:fecha_usu,:contra_usu,:sexo_usu,:correo_usu,:alias_usu,'Alumno',:foto_usu)");
        $consulta->execute(array(
            ':nom_usu'=>$datos[0],
            ':app_usu'=>$datos[1],
            ':apm_usu'=>$datos[2],
            ':alias_usu'=>$datos[3],
            ':fecha_usu'=>$datos[4],
            ':contra_usu'=>$datos[5],
            ':sexo_usu'=>$datos[6],
            ':correo_usu'=>$datos[7],
            ':foto_usu'=>'./img/sinfotoperfil.jpg'

        ));
    }
    public static function mostraram($id_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select U.id_usu,U.alias_usu,U.nom_usu,U.app_usu,U.apm_usu,U.foto_usu,A.envia_am,A.recibe_am  from usuarios U inner join amigos A on (U.id_usu=A.recibe_am or U.id_usu=A.envia_am) where (A.envia_am=:id_usu and estado_am=1 or A.recibe_am=:id_usu and estado_am=1) ORDER BY A.id_am DESC");
        $consulta->execute(array(':id_usu'=>$id_usu));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function registrarad($datos){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("insert into administrador(id_admin,nom_admin,app_admin,apm_admin,fecha_admin,contra_admin,correo_admin) values(null,:nom_admin,:app_admin,:apm_admin,:fecha_admin,:contra_admin,:correo_admin)");
        $consulta->execute(array(
            ':nom_admin'=>$datos[0],
            ':app_admin'=>$datos[1],
            ':apm_admin'=>$datos[2],
            ':fecha_admin'=>$datos[3],
            ':contra_admin'=>$datos[4],
            ':correo_admin'=>$datos[5]

        ));
    }
    public static function registrapr($datos){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("insert into usuarios(id_usu,nom_usu,app_usu,apm_usu,fecha_usu,contra_usu,sexo_usu,correo_usu,alias_usu,rol_usu,area_usu,foto_usu) values(null,:nom_usu,:app_usu,:apm_usu,:fecha_usu,:contra_usu,:sexo_usu,:correo_usu,:alias_usu,'Profesor',:area_usu,:foto_usu)");
        $consulta->execute(array(
            ':nom_usu'=>$datos[0],
            ':app_usu'=>$datos[1],
            ':apm_usu'=>$datos[2],
            ':alias_usu'=>$datos[3],
            ':fecha_usu'=>$datos[4],
            ':contra_usu'=>$datos[5],
            ':sexo_usu'=>$datos[6],
            ':correo_usu'=>$datos[7],
            ':area_usu'=>$datos[8],
            ':foto_usu'=>'./img/sinfotoperfil.jpg'
        ));
    }
  
    
    public static function editar($nombre,$app,$apm,$alias,$id_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("update usuarios set nom_usu=:nom_usu,app_usu=:app_usu,apm_usu=:apm_usu,alias_usu=:alias_usu where id_usu=:id_usu");
        $consulta->execute(array(
            ':nom_usu'=>$nombre,
            ':app_usu'=>$app,
            ':apm_usu'=>$apm,
            ':alias_usu'=>$alias,
            ':id_usu'=>$id_usu

        ));

    }
    public static function editarf($id_usu,$foto_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("update usuarios set foto_usu=:foto_usu where id_usu=:id_usu");
        $consulta->execute(array(
            ':foto_usu'=>$foto_usu,
            ':id_usu'=>$id_usu

        ));

    }
    
   
    public static function busca($id_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select * from usuarios where id_usu=:id_usu");
        $consulta->execute(array(':id_usu'=>$id_usu));
        $resultado=$consulta->fetchAll();
        return $resultado;

    }
    public static function verificara($correo_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select * from administrador where correo_admin=:correo_admin");
        $consulta->execute(array(':correo_admin'=>$correo_usu));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function verificar($correo_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select * from usuarios where correo_usu=:correo_usu");
        $consulta->execute(array(':correo_usu'=>$correo_usu));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function verificaralias($alias_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select * from usuarios where alias_usu=:alias_usu");
        $consulta->execute(array(':alias_usu'=>$alias_usu));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function verre(){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select * from reportes");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function contar($reportado_rep){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select count(*) from reportes where reportado_rep=:reportado_rep");
        $consulta->execute(array(':reportado_rep'=>$reportado_rep));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function inter(){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select U.id_usu,U.rol_usu,U.app_usu,U.apm_usu,U.nom_usu,U.foto_usu,P.id_publi,P.fecha_publi from usuarios U inner join publicaciones P on U.id_usu=P.id_usu where U.rol_usu='Profesor'  ORDER BY P.id_publi DESC");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        return $resultado;
    }

   
}

class publi{
    public static function publicacionsg($id_usu,$texto_publi,$foto_publi){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("insert into publicaciones(id_publi,id_usu,texto_publi,foto_publi,fecha_publi) values(null,:id_usu,:texto_publi,:foto_publi,Now());");
        $consulta->execute(array(':id_usu'=>$id_usu,':texto_publi'=>$texto_publi,':foto_publi'=>$foto_publi));
    }
    public static function publicaciong($id_usu,$texto_publi,$foto_publi,$id_g){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("insert into publicaciones(id_publi,id_usu,texto_publi,id_g,foto_publi,fecha_publi) values(null,:id_usu,:texto_publi,:id_g,:foto_publi,Now());");
        $consulta->execute(array(':id_usu'=>$id_usu,':texto_publi'=>$texto_publi,':foto_publi'=>$foto_publi,':id_g'=>$id_g));
    }
 
    public static function publi_por_usuario($id_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select U.id_usu,U.alias_usu,U.nom_usu,U.foto_usu,P.id_publi,P.texto_publi,P.foto_publi,P.fecha_publi from usuarios U inner join publicaciones P on U.id_usu=P.id_usu where P.id_usu=:id_usu ORDER BY P.id_publi DESC");
        $consulta->execute(array(':id_usu'=>$id_usu));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function eliminar($id_publi){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("delete from publicaciones where id_publi=:id_publi");
        $consulta->execute(array(':id_publi'=>$id_publi));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function eliminarc($id_publi){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("delete from comentarios where id_publi=:id_publi");
        $consulta->execute(array(':id_publi'=>$id_publi));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function eliminarr($id_publi){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("delete from reacciones where id_publi=:id_publi");
        $consulta->execute(array(':id_publi'=>$id_publi));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function eliminarre($id_publi){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("delete from reportes where id_publi=:id_publi");
        $consulta->execute(array(':id_publi'=>$id_publi));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }

    public static function mostrarper($id_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select U.id_usu,U.rol_usu,U.nom_usu,U.alias_usu,U.foto_usu,P.id_publi,P.texto_publi,P.foto_publi,P.fecha_publi from usuarios U inner join publicaciones P on U.id_usu=P.id_usu where  P.id_usu in ($id_usu)  ORDER BY P.id_publi DESC");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
   
    public static function mostrar($amigos){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select U.id_usu,U.rol_usu,U.nom_usu,U.alias_usu,U.foto_usu,P.id_publi,P.texto_publi,P.foto_publi,P.fecha_publi from usuarios U inner join publicaciones P on U.id_usu=P.id_usu where U.rol_usu='Alumno' and P.id_usu in ($amigos)  ORDER BY P.id_publi DESC");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function mostrarpr($amigos){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select U.id_usu,U.rol_usu,U.nom_usu,U.alias_usu,U.foto_usu,P.id_publi,P.texto_publi,P.foto_publi,P.fecha_publi from usuarios U inner join publicaciones P on U.id_usu=P.id_usu where U.rol_usu='Profesor' and P.id_usu in ($amigos) ORDER BY P.id_publi DESC");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        return $resultado;
    }

    public static function mostra_codigo($id_publi){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select U.id_usu,U.nom_usu,U.alias_usu,U.foto_usu,P.id_publi,P.texto_publi,P.foto_publi from usuarios U inner join publicaciones P on U.ud_usu=P.id_usu where P.id_publi=:id_publi ORDER BY P.id_publi DESC");
        $consulta->execute(array(':id_publi'=>$id_publi));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function reportar($id_usu,$reportado,$id_publi){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("insert into reportes(id_rep,id_publi,id_usu,fecha_rep,reportado_rep) values(null,:id_publi,:id_usu,Now(),:reportado_rep);");
        $consulta->execute(array(':id_usu'=>$id_usu,':reportado_rep'=>$reportado,':id_publi'=>$id_publi));
    }
 
}

class amigos{

    public static function agregar($envia_am,$recibe_am){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("insert into amigos(id_am,envia_am,recibe_am,estado_am) values(null,:envia_am,:recibe_am,0)");
        $consulta->execute(array(':envia_am'=>$envia_am,':recibe_am'=>$recibe_am));
    }

    public static function ver($envia_am,$recibe_am){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select * from amigos where (envia_am=:envia_am and recibe_am=:recibe_am) or (envia_am=:recibe_am and recibe_am=:envia_am)");
        $consulta->execute(array(':envia_am'=>$envia_am,':recibe_am'=>$recibe_am));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }

    public static function verto($id_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select group_concat(envia_am,',',recibe_am) as amigos from amigos where (envia_am=:id_usu or recibe_am=:id_usu) and estado_am=1");
        $consulta->execute(array(':id_usu'=>$id_usu));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }

    public static function solicitud($id_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select U.id_usu,U.nom_usu,U.app_usu,U.apm_usu,A.id_am,A.envia_am from usuarios U inner join amigos A on U.id_usu=A.envia_am where A.recibe_am=:id_usu and A.estado_am!=1");
        $consulta->execute(array(':id_usu'=>$id_usu));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    
    public static function aceptar($id_am){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare(" update amigos set estado_am=1 where id_am=:id_am");
        $consulta->execute(array(':id_am'=>$id_am));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function eliminar($id_am){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("delete from amigos where id_am=:id_am");
        $consulta->execute(array(':id_am'=>$id_am));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function buscarusu($nom_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select * from usuarios where nom_usu like :nom_usu");
        $consulta->execute(array(':nom_usu'=>"%$nom_usu%"));
        $resultado=$consulta->fetchAll();
        return $resultado;

    }

 public static function cantidad($id_usu){
    $conn=conexion("be76f7e687d567","1e15a88c");
    $consulta=$conn->prepare("select count(*) from amigos where (envia_am=:id_usu or recibe_am=:id_usu) and estado_am=1");
        $consulta->execute(array(':id_usu'=>$id_usu));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }


    
}
    
class comentarios{

    public static function agregar($id_usu,$texto_com,$id_publi){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("insert into comentarios(id_com,id_usu,texto_com,id_publi,fecha_com) values(null,:id_usu,:texto_com,:id_publi,Now());");
        $consulta->execute(array(':id_usu'=>$id_usu,':texto_com'=>$texto_com,':id_publi'=>$id_publi));
    }
    public static function contar($id_publi){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select count(*) from comentarios where id_publi=:id_publi");
        $consulta->execute(array(':id_publi'=>$id_publi));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }

    public static function mostrar($id_publi){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select U.nom_usu,C.id_usu,C.texto_com,C.fecha_com from usuarios U inner join comentarios C on U.id_usu=C.id_usu where C.id_publi=:id_publi");
        $consulta->execute(array(':id_publi'=>$id_publi));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }

    public static function mostrarpr($id_publi){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select U.id_usu,U.nom_usu,U.rol_usu,C.id_usu,C.texto_com,C.fecha_com from usuarios U inner join comentarios C on U.id_usu=C.id_usu where C.id_publi=:id_publi and U.rol_usu=Profesor");
        $consulta->execute(array(':id_publi'=>$id_publi));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
}
class reacciones{
    public static function agregar($id_publi,$id_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("insert into reacciones(id_re,id_publi,id_usu) values(null,:id_publi,:id_usu)");
        $consulta->execute(array(':id_publi'=>$id_publi,':id_usu'=>$id_usu));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function mostrar($id_publi){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select count(*) from reacciones where id_publi=:id_publi");
        $consulta->execute(array(':id_publi'=>$id_publi));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }

    public static function verifica($id_publi,$id_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select id_re from reacciones where id_publi=:id_publi and id_usu=:id_usu");
        $consulta->execute(array(':id_publi'=>$id_publi,':id_usu'=>$id_usu));
        $resultado=$consulta->fetchAll();
        return count($resultado);
    }
}
class noti{
    public static function agregar($accion_no,$id_publi,$id_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("insert into notificaciones(id_no,accion_no,id_publi,id_usu,visto,fecha_no) values(null,:accion_no,:id_publi,:id_usu,0,Now())");
        $consulta->execute(array(':accion_no'=>$accion_no,':id_publi'=>$id_publi,':id_usu'=>$id_usu));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function mostrar($id_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select U.id_usu,U.nom_usu,U.app_usu,U.apm_usu,N.id_no,N.accion_no,N.id_publi from notificaciones N inner join usuarios U on U.id_usu=N.id_usu where N.id_usu=:id_usu");
        $consulta->execute(array(':id_usu'=>$id_usu));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }

    public static function verifica($id_publi,$id_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select id_re from reacciones where id_publi=:id_publi and id_usu=:id_usu");
        $consulta->execute(array(':id_publi'=>$id_publi,':id_usu'=>$id_usu));
        $resultado=$consulta->fetchAll();
        return count($resultado);
    }
}
class msg{
    public static function agregar($envia_men,$recibe_men,$texto_men){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("insert into mensajes(id_men,,recibe_men,texto_men,fecha_men) values(null,:envia_men,:recibe_men,:texto_men,Now())");
        $consulta->execute(array(':envia_men'=>$envia_men,':recibe_men'=>$recibe_men,':texto_men'=>$texto_men));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function mostrar($envia_men,$recibe_men){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select * from mensajes  where (envia_men=:recibe_men and recibe_men=:envia_men) or (envia_men=:envia_men and recibe_men=:recibe_men)");
        $consulta->execute(array(':envia_men'=>$envia_men,':recibe_men'=>$recibe_men));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
    public static function mostrara($envia_men,$recibe_men){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select * from mensajes  where (recibe_men=:envia_men and envia_men=:recibe_men)");
        $consulta->execute(array(':envia_men'=>$envia_men,':recibe_men'=>$recibe_men));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
}
class grupos {
    public static function registrar($id_usu,$nom,$des,$foto_g){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("insert into grupos(id_g,nom_g,descripcion,id_usu,foto_g) values(null,:nom_g,:descripcion,:id_usu,:foto_g)");
        $consulta->execute(array(
            ':nom_g'=>$nom,
            ':descripcion'=>$des,
            ':id_usu'=>$id_usu,
             ':foto_g'=>$foto_g

        ));
        
    }
   
 
    
    public static function mostrar($id_usu){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select U.id_usu,U.rol_usu,U.nom_usu,U.alias_usu,U.foto_usu,G.id_g,G.nom_g,G.foto_g from usuarios U inner join grupos G on U.id_usu=G.id_usu where G.id_usu=:id_usu  ORDER BY G.id_g DESC");
        $consulta->execute(array(':id_usu'=>$id_usu));
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
   
    public static function busca($id_g){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select * from grupos where id_g=:id_g");
        $consulta->execute(array(':id_g'=>$id_g));
        $resultado=$consulta->fetchAll();
        return $resultado;

    }
    public static function editarf($id_g,$foto_g){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("update grupos set foto_g=:foto_g where id_g=:id_g");
        $consulta->execute(array(
            ':foto_g'=>$foto_g,
            ':id_g'=>$id_g

        ));

    }

    public static function editar($nom_g,$descripcion,$id_g){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("update grupos set nom_g=:nom_g,descripcion=:descripcion where id_g=:id_g");
        $consulta->execute(array(
            ':nom_g'=>$nom_g,
            ':descripcion'=>$descripcion,
            ':id_g'=>$id_g

        ));
    }

    public static function acceso($envia_am,$recibe_am){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("insert into mg(idMG,id_usu,id_g,fecha) values(null,:envia_am,:recibe_am,Now())");
        $consulta->execute(array(':envia_am'=>$envia_am,':recibe_am'=>$recibe_am));
    }
    public static function mostrarp($amigos){
        $conn=conexion("be76f7e687d567","1e15a88c");
        $consulta=$conn->prepare("select U.id_usu,U.rol_usu,U.nom_usu,U.alias_usu,U.foto_usu,P.id_publi,P.texto_publi,P.foto_publi,P.fecha_publi,P.id_g from usuarios U inner join publicaciones P on U.id_usu=P.id_usu where  P.id_g in ($amigos)  ORDER BY P.id_publi DESC");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        return $resultado;
    }
}
class graficas{
    public static function datos(){

            $conn=conexion("be76f7e687d567","1e15a88c");
            $consulta=$conn->prepare("SELECT id_publi,fecha_publi 
            from publicaciones order by fecha_publi");          
              $consulta->execute();
            $resultado=$consulta->fetchAll();
            return $resultado;
        
       
    }

}
?>