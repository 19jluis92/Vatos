
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

$("#idvehicle").on('change',function(e){
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
	$('#InspeccionModal').modal('show')
	else
		$('#error').modal('show');
});

$("#ubicacion").on('click',function(e){
	var id= $("#idvehicle").val();
	if(id>0)
	$('#RehubicacionModal').modal('show')
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

$('#bto1').on('click',function(e){
	//$('.bloqIns').attr('readonly',true);
	debugger;
	$.ajax({
		url:'index.php?controller=service&view=createInventary',
		type:'POST',
		data:{
		startDate : $('#startDate').val() ,
		endDate : $('#endDate').val(),
		idvehicleService : 0,
		idVehicle : $('#idvehicle option:selected').val(),
		}
	}).done(function(e){
			$('#error').modal('show');
		});
});
