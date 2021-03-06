function getValueByHashParameter(name) {
	name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
	var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	results = regex.exec(window.location.hash);
	return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

var actualDate = new Date();
$("#startDate,#inspectiondate").val(actualDate.getDate() + "/"+ (actualDate.getMonth()  +1) + "/"+actualDate.getFullYear());

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

$("#inventory-table .element-option").on("click",function(e){
	e.preventDefault();
	$("#inventory-table tr").removeClass("info");
	$(this).parents("tr").addClass("active info");
	$("#inventory-table .element-option i").removeClass("glyphicon-check");
	$("#inventory-table .element-option i").addClass("glyphicon-unchecked");
	$(this).find("i").removeClass("glyphicon-unchecked").addClass("glyphicon-check");
	window.location.hash = "?clientid="+$(this).attr("data-id");
	return false;
});		

$(window).on('hashchange',function(e){
	var id= getValueByHashParameter("clientid");
	if(isNaN(parseInt(id)))
		return;
	$.get("index.php?controller=vehicle&view=ajaxById&id="+id,function(e){
		var result = JSON.parse(e);
		var dd = $("#idvehicle");
		dd.html("<option value=''>-- none --</option>");
		for(var i in result){
			var $op =  $("<option>");
			$op.attr("value",result[i][0].id);
			$op.text(result[i][0].vin);
			dd.append($op);
		}

	});

});

$("#idvehicle").on('change',function(e){
	if($(this).val() != '')
		$("#bto1").removeClass("disabled");
	else
		$("#bto1").addClass("disabled");
	$('.serviceIdVehicle').attr('data-id',$('#idvehicle').val());
	$('.serviceIdVehicle').val($("#idvehicle option:selected").text());


});

$("#servicio").on('click',function(e){

	var id= $("#idvehicle").val();
	if(id>0)
		$('#myModal').modal('show')
	else
		$('#error').modal('show');
});

$("#inspeccion").on('click',function(e){
	var id= $("#idvehicle").val();
	if(id>0)
	{

		var exist =$('#bto1').length;
		if(exist==0)
			$('#InspeccionModal').modal('show');
		else
			$('#error').modal('show');
	}
	else
		$('#error').modal('show');
});

$("#ubicacion").on('click',function(e){
	var id= $("#idvehicle").val();
	if(id>0)
	{

		var exist =$('#bto2').length;
		if(exist==0)
			$('#RehubicacionModal').modal('show');
		else
			$('#error').modal('show');
	}
	else
		$('#error').modal('show');
});



$.get("index.php?controller=CarWorkShop&view=ajax",function(e){
	var result = JSON.parse(e);
	var dd = $("#idvehicleService");
	for(var i in result){
		var $op =  $("<option>");
		$op.attr("value",result[i].id);
		$op.text(result[i].name);
		dd.append($op);
	}

});

/*$('#idvehicleService').on('change',function(e){
	$('#idcarworkshop').attr('value',$('#idvehicleService option:selected').text())
	$('#idcarworkshop').attr('data-id',$('#idvehicleService option:selected').val())
	
});
*/
$.get("index.php?controller=department&view=ajax",function(e){


	var result = JSON.parse(e);
	var dd = $("#idDepartment");
	for(var i in result){
		var $op =  $("<option>");
		$op.attr("value",result[i].id);
		$op.text(result[i].name);
		dd.append($op);
	}

});

$.get("index.php?controller=service&view=ajax",function(e){


	var result = JSON.parse(e);
	var dd = $("#idService");
	for(var i in result){
		var $op =  $("<option>");
		$op.attr("value",result[i].id);
		$op.text(result[i].id);
		dd.append($op);
	}

});

function onlyInspection(){
	$.get("index.php?controller=service&view=ajax",function(e){


		var result = JSON.parse(e);

		for(var i in result){

			$(".idservins").attr('value',result[i].id);
		}

	});
}

$('#bto1').on('click',function(e){
	e.preventDefault();
	$("#collapseTwo").collapse('show');
	
});

$('#bto2').on('click',function(e){
	e.preventDefault();
	if($("#frm-inventory").valid())
	$.ajax({
		url:'index.php?controller=service&view=createInventary',
		type:'POST',
		data:{
			startDate : $('#startDate').val() ,
			endDate : $('#endDate').val(),
			idvehicleService :$("#idvehicleService").val(),
			idVehicle : $('#idvehicle option:selected').val(),
		}
	}).done(function(e){
		$('#bto1').remove();
		$('.bloqserv').attr('readonly',true);
		onlyInspection();
		$.ajax({
			url:'index.php?controller=inspection&view=createInventary',
			type:'POST',
			data:{
				idService : JSON.parse(e).id,
				mileage : $('#mileage').val() ,
				fuel : $('#fuel').val(),
				inspectionDate : $('#inspectiondate').val() ,
				type: $('#type').val(),
			}
		}).done(function(e){
			$('#bto2').remove()
			$('.bloqIns').attr('readonly',true);
			$('#bien').modal('show');
			window.location= "?controller=inventory";
		});
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