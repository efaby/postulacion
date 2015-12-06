$(document).ready(function(){
$('#modalOpen').click(function(){	  
	$('.modal-dialog').css('width','650');
	loadModal(0,'Registro Título',1);
});
	$('#modalOpen1').click(function(){	  
		$('.modal-dialog').css('width','650');
		loadModal(0,'Registro Curso',2);
	});
	$('#modalOpen2').click(function(){	  
		$('.modal-dialog').css('width','800');
		loadModal(0,'Registro Historial Laboral',3);
	});
	});

function loadModal(id, title, opcion){
	$(".modal-header h3").html(title);
	$('.modal-body').load('index.php?action=loadForm&id=' + id + '&opcion='+opcion,function(result){
	    $('#confirm-submit').modal({show:true});
	});
}

function redirect(id,opcion){
	var url = 'index.php?action=deleteData&id=' + id + '&opcion=' + opcion;
	location.href = url;
}