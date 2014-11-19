{extends file="../_Layouts/master.tpl"}
{block name=title}Agregar Usuario{/block}
{block name=pageheader}Usuario{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div  class="actions col-md-2">
		<h3>Acciones</h3>
		<ul class="list-group">
			<li><a class="list-group-item"  href="index.php?controller=User">Mostrar Usuarios</a>
			</li>
		</ul>
	</div>
	<div class="brand col-md-10">
		<form method="post" accept-charset="utf-8" action="index.php?controller=User&view=create" class="form-horizontal">
		<div style="display:none;">
         <input type="hidden" name="_method" value="POST">
			</div>
			<fieldset>
				<legend>Agregar Usuario</legend>
				<div class="form-group input-group">
					<div class="row">
               	<div class="col-md-8">
						<label for="email" class="input-group-addon">Email</label>
						<input type="text" name="email" required="required" id="email" placeholder="Email" class="form-control"></div><div class="input number required">
                </div>
                <div class="col-md-4">
						<label for="password" class="input-group-addon">Password</label>
						<input type="password" name="password" required="required" id="password" placeholder="Password" class="form-control"></div>
                </div>  
              </div>
              <br />
				</fieldset>
				<button class="btn btn-default pull-right" type="submit">Submit</button></form></div>
				{/block}