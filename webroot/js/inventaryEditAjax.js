$.get("index.php?controller=Client&view=ajax",function(e){
  
  
  var result = JSON.parse(e);
      var dd = $("#idcliente");
      for(var i in result){
        var $op =  $("<option>");
        $op.attr("value",result[i].id);
        $op.text(result[i].Name);
        dd.append($op);
      }

});

$("#idcliente").on('change',function(e){
	var id= $("#idcliente").val();
	$.get("index.php?controller=vehicle&view=ajaxById&id="+id,function(e){
  	var result = JSON.parse(e);
      var dd = $("#idvehicle");
      for(var i in result){
        var $op =  $("<option>");
        $op.attr("value",result[i][0].id);
        $op.text(result[i][0].vin);
        dd.append($op);
      }

});

});

$("#idserviceForm").on('change',function(e){

$.ajax({
	url: "index.php?controller=inventory&view=serviceEdit",
	data: { id : $("#idserviceForm option:selected").val() },
	type: 'GET',

	}).done(function(e){
		
		$('#serviceForm child').remove();
		$('#serviceForm').append(e);		
		inspectionEdit();	
	});

	
});

$('#idvehicle').on('change',chargeDataService());

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
	
}


function inspectionEdit(){
debugger;
	$.ajax({
	url: "index.php?controller=inventory&view=inpectionEdit",
	data: { id : $("#idserviceForm option:selected").val()},
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
	data: { id :$("#idserviceForm option:selected").val() },
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