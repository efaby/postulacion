$(document).ready(function(){
$('#modalOpen').click(function(){	  
	loadModal(0);
});


});

function loadModal(id){
	$('.modal-body').load('index.php?action=loadForm&id=' + id,function(result){
	    $('#confirm-submit').modal({show:true});
	});
}

function redirect(id){
	var url = 'index.php?action=deleteData&id=' + id;
	location.href = url;
}