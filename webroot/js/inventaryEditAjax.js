$("#idvehicle").on('change',function(e){

$.ajax({
	url: "index.php?controller=inventory&view=serviceEdit",
	data: { id : $("#idvehicle").val() },
	type: 'GET',

	}).done(function(e){
		
		$('#serviceForm child').remove();
		$('#serviceForm').append(e);	
		chargeDataService();
	});

	inspectionEdit();	
});

function chargeDataService(){
	$.get("index.php?controller=service&view=ajax",function(e){
  
  
  var result = JSON.parse(e);
      var dd = $("#idserviceForm");
      for(var i in result){
        var $op =  $("<option>");
        $op.attr("value",result[i].id);
        $op.text(result[i].id);
        dd.append($op);
      }

});
	inspectionEdit();	
}

$("#idserviceForm").on('change',function(e){
	$.ajax({
	url: "index.php?controller=inventory&view=serviceEdit",
	data: { id : $("#idvehicle").val() },
	type: 'GET',

	}).done(function(e){
		
		$('#serviceForm child').remove();
		$('#serviceForm').append(e);	
		chargeDataService();
	});
	inspectionEdit();	
})
function inspectionEdit(){

	$.ajax({
	url: "index.php?controller=inventory&view=inpectionEdit",
	data: { id : $("#idserviceForm selected:option").val() },
	type: 'GET',

	}).done(function(e){
		
		$('#inspectionForm child').remove();
		$('#inspectionForm').append(e);	
		 ubicationEdit();	
	});
}

$("#inspectionEdit").on('click',function(e){

	
	$('#InspeccionModal').modal('show')

});

$("#ubicacionEdit").on('click',function(e){
	
			$('#RehubicacionModalEdit').modal('show');
		
});


function ubicationEdit(){

	$.ajax({
	url: "index.php?controller=inventory&view=ubicationEdit",
	data: { id : $("#idserviceForm").val() },
	type: 'GET',

	}).done(function(e){
		
		$('#relocationForm child').remove();
		$('#relocationForm').append(e);		
	});
}

$("#inspectionEdit").on('click',function(e){

	
	$('#InspeccionModal').modal('show')

});

$("#ubicacionEdit").on('click',function(e){
	
			$('#RehubicacionModal').modal('show');
		
});