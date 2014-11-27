{extends file="../_Layouts/master.tpl"}
{block name=title}Marcas{/block}
{block name=pageheader}Marcas{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a class="list-group-item" href="index.php?controller=CarWorkShop&view=create">Agregar Marca</a></li>
		</ul>
	</div>
	<div class="col-md-10">
		<h2>Talleres</h2>
		<table class="table" cellpadding="0" cellspacing="0" id="workshop-table">
			<thead>
				<tr>
					<th></th>
					<th><a href="/vatoscake/carworkshop?sort=id&amp;direction=asc">Id</a></th>
					<th><a href="/vatoscake/carworkshop?sort=name&amp;direction=asc">Nombre</a></th>
					<th><a href="/vatoscake/carworkshop?sort=name&amp;direction=asc">Dirección</a></th>
					<th class="actions">Acciones</th>
				</tr>
			</thead>
			<tbody>
				{foreach item=carworkshop from=$carworkshops}
				<tr>
					<td><a data-id="{$carworkshop.id}" href="#" class="element-option"><i class="glyphicon glyphicon-unchecked" aria-hidden="true"></i></a></td>
					<td>{$carworkshop.id}</td>
					<td>{$carworkshop.name}</td>
					<td>{$carworkshop.address}</td>
					<td class="actions">
						<div class="btn-group" role="group" aria-label="...">
							<a  class="btn btn-default" href="index.php?controller=CarWorkShop&view=details&id={$carworkshop.id}">Ver</a>				
							<a  class="btn btn-default" href="index.php?controller=CarWorkShop&view=edit&id={$carworkshop.id}">Editar</a>		
							<form action="index.php?controller=CarWorkShop&view=delete&id={$carworkshop.id}" name="post_carworkshop_{$carworkshop.id}" style="display:none;" method="post">
								<input type="hidden" name="_method" value="POST">
							</form>
							<a  class="btn btn-default" href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 1?&quot;)) { document.post_carworkshop_{$carworkshop.id}.submit(); } event.returnValue = false; return false;">Eliminar</a>
						</div>
					</td>
				</tr>
				{/foreach}
			</tbody>
		</table>

		<div class="col-sm-8">
			<h2>Áreas</h2>
			<table class="table" id="areas-table" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th></th>
						<th><a href="/vatoscake/carworkshop?sort=name&amp;direction=asc">Nombre</a></th>
						<th class="actions">Acciones</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>

			<h2>Secciones</h2>
			<table class="table" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th></th>
						<th><a href="/vatoscake/carworkshop?sort=id&amp;direction=asc">Id</a></th>
						<th><a href="/vatoscake/carworkshop?sort=name&amp;direction=asc">Nombre</a></th>
						<th><a href="/vatoscake/carworkshop?sort=name&amp;direction=asc">Dirección</a></th>
						<th class="actions">Acciones</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
		<div class="col-sm-4">
			<div>
				<h3>Tienda</h3>
			</div>

		</div>
	</div>
	{if isset($deleted)}
	<script type="text/javascript">
		alert("eliminación correcta");
	</script>
	{/if}

	{/block}
	{block name=scripts}
	{literal}
	<script type="text/javascript">
		var areas = {
			actualWorkshop : null,
			init: function(){
				this.bind();
				this.loadData();
			},
			bind : function(){
				$(window).on("hashchange",this.loadData);
				$("#workshop-table .element-option").on("click",function(e){
					e.preventDefault();
					$(this).parents("tr").addClass("active info");
					$("#workshop-table .element-option i").removeClass("glyphicon-check");
					$("#workshop-table .element-option i").addClass("glyphicon-unchecked");
					$(this).find("i").removeClass("glyphicon-unchecked").addClass("glyphicon-check");
					window.location.hash = "carworkshop="+$(this).attr("data-id");
					return false;
				});
				$("#areas-table").on("click",".element-option",function(e){
					e.preventDefault();
					$("#areas-table tr").removeClass("active info");
					$(this).parents("tr").addClass("active info");
					$("#areas-table .element-option i").removeClass("glyphicon-check");
					$("#areas-table .element-option i").addClass("glyphicon-unchecked");
					$(this).find("i").removeClass("glyphicon-unchecked").addClass("glyphicon-check");
					var hash = window.location.hash.substr(0, window.location.hash.indexOf("?"));
					hash = hash == undefined? window.location.hash: hash;
					window.location.hash = hash+"&area="+$(this).attr("data-id");
					return false;
				})		
			},
			loadData : function(){
				var $workshopid= areas.getParameter("carworkshop") ;
				if($workshopid != null && $workshopid != areas.actualWorkshop){
					areas.actualWorkshop = $workshopid;
					$.ajax({
						url : "index.php?controller=location&view=getByCarWorkShop",
						type: "POST",
						data : {id: $workshopid},
						success:function(result){
							var res = JSON.parse(result);
							console.log(result);
							for(var i in res){
								var $tr = $("<tr>");
								$("#areas-table").append($tr.html('<td><a data-id='+res[i].id+' href="#" class="element-option"><i class="glyphicon glyphicon-unchecked" aria-hidden="true"></i></a></td><td>'+res[i].name+'</td>'));
							}
						},
						error:function(){
							alert("error al mostrar los datos");
						}

					});
				}

			},
			getParameter : function (paramName) {
				if(window.location.hash == '' || window.location.hash == '#')
					return;
				var params = window.location.hash.substr(1).split('&');
				for (var i in params) {
					var param = params[i].split('=');
					if(param[0] == paramName)
						return param[1];
				};
				return null;
			}
		};
		areas.init();
	</script>
	{/literal}
	{/block}