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
		
		$('#serviceForm #serviceChild').remove();
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
		
		$('#inspectionForm #inspectionChild').remove();
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
		
		$('#relocationForm #relocationChild').remove();
		$('#relocationForm').append(e);

		$("#idServiceInspection").attr('value',$("#idserviceForm option:selected").val());		
		$("idService").attr('value',$("#idserviceForm option:selected").val());		
	});
}

$("#inspectionEdit").on('click',function(e){

	
	$('#InspeccionModal').modal('show')

});

$("#ubicacionEdit").on('click',function(e){
	
			$('#RehubicacionModal').modal('show');
		
});

$('#bto1').on('click',function(e){
	
	
	$.ajax({
		url:'index.php?controller=service&view=createInventary',
		type:'POST',
		data:{
		startDate : $('#startDate').val() ,
		endDate : $('#endDate').val(),
		idvehicleService : 1,
		idVehicle : $('#idvehicle option:selected').val(),
		idEmployee: 3,//$('#idemployee').val(),
		}
	}).done(function(e){
		$('#bto1').remove();
		$('.bloqserv').attr('readonly',true);
			
			//onlyInspection();
		});
});

$('#bto2').on('click',function(e){
	
	
	$.ajax({
		url:'index.php?controller=inspection&view=createInventary',
		type:'POST',
		data:{
		idService : $('#idServiceInspection').val(),
		mileage : $('#mileage').val() ,
		fuel : $('#fuel').val(),
		inspectionDate : $('#inspectiondate').val() ,
		type: $('#type').val(),
		}
	}).done(function(e){
		$('#bto2').remove()
		$('.bloqIns').attr('readonly',true);
			$('#bien').modal('show');
		});
});

$('#bto3').on('click',function(e){
	
	
	$.ajax({
		url:'index.php?controller=relocation&view=createInventary',
		type:'POST',
		data:{
		relocationDate : $('#relocationDate').val() ,
		idEmployee : 3,//$('idEmployee').val(),
		reason : $('#reason').val(),
		idDepartment : $('#idDepartment option:selected').val() ,
		idService: $('#idServiceInspection').val(),
		}
	}).done(function(e){
		$('#bto3').remove()
		$('.bloqIns').attr('readonly',true);
			$('#bien').modal('show');
		});
});