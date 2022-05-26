function agregardatos(txt,foto){
l
	cadena="txt=" + txt + 
			"&foto=" + foto;

	$.ajax({
		type:"POST",
		url:"php/agregarpu.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('paginap.php');
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}