function nuevoAjax()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
return xmlhttp;
}
xmlhttp = nuevoAjax();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    	var result = JSON.parse(xmlhttp.responseText);
    	var dd = document.getElementById("idseverity");
    	for(var i in result){
    		var op =  document.createElement("option");
    		op.value = result[i].id;
    		op.innerText = result[i].name;
    		dd.appendChild(op);
    	}
    }
}
xmlhttp.open("GET","index.php?controller=Piece&view=ajax",true);
xmlhttp.send();


$.get("index.php?controller=Piece&view=ajax",function(e){
	var result = JSON.parse(e);
    	var dd = $("#idseverity");
    	for(var i in result){
    		var $op =  $("<option>");
    		$op.attr("value",result[i].id);
    		$op.text(result[i].name);
    		dd.append($op);
    	}

});

$.get("index.php?controller=city&view=ajax",function(e){
  var result = JSON.parse(e);
      var dd = $("#idCity");
      for(var i in result){
        var $op =  $("<option>");
        $op.attr("value",result[i].id);
        $op.text(result[i].name);
        dd.append($op);
      }

});

$.get("index.php?controller=user&view=ajax",function(e){
  var result = JSON.parse(e);
      var dd = $("#idUser");
      for(var i in result){
        var $op =  $("<option>");
        $op.attr("value",result[i].id);
        $op.text(result[i].email);
        dd.append($op);
      }

});


$.get("index.php?controller=CarWorkShop&view=ajax",function(e){
  var result = JSON.parse(e);
      var dd = $("#idCarWorkShop");
      for(var i in result){
        var $op =  $("<option>");
        $op.attr("value",result[i].id);
        $op.text(result[i].name);
        dd.append($op);
      }

});