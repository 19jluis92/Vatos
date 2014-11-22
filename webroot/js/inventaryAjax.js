
$.get("index.php?controller=Client&view=ajax",function(e){
  
  debugger;
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
        $op.attr("value",result[i].id);
        $op.text(result[i][0].vin);
        dd.append($op);
      }

});

});

$("#idvehicle").on('change',function(e){
	var id= $("#idvehicle").val();
	debugger;
	if(id>0)
	$("#serviceForm").dialog({
            width: 590,
            height: 350,
            show: "scale",
            hide: "scale",
            resizable: "false",
            position: "center"     
        });

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