{extends file="../_Layouts/master.tpl"}
{block name=title}Clientes{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="col-md-10">
		<table class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th>
						<a href="index.php?controller=client&amp;sort=id&amp;direction=asc">Id</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=name&amp;direction=asc">Nombre</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=lastname&amp;direction=asc">Apellido</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=rfc&amp;direction=asc">RFC</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=email&amp;direction=asc">Email</a>
					</th>
					<th>
						<a href="index.php?controller=client&amp;sort=address&amp;direction=asc">Direccion</a>
					</th>
					</th>
					
				</tr>
			</thead>
			<tbody>
				

				<tr>
					<td>{$client->id}</td>
					<td>{$client->name}</td>
					<td>{$client->lastName}</td>
					<td>{$client->rfc}</td>
					<td>{$client->email}</td>
					<td>{$client->address}</td>
				</tr>
			</tbody>
			
		</table>
      <table class="table" cellpadding="0" cellspacing="0">
         <thead>
            <tr>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=id&amp;direction=asc">Id</a>
               </th>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=vin&amp;direction=asc">Vin</a>
               </th>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=model&amp;direction=asc">Modelo</a>
               </th>
               <th>
                  <a href="index.php?controller=vehicle&amp;sort=color&amp;direction=asc">Color</a>
               </th>
            </tr>
         </thead> <tbody>
            {foreach item=vehicle from=$vehicles}
            <tr>
               <td>{$vehicle.id}</td>
               <td>{$vehicle.vin}</td>
               <td>{$vehicle.idModel}</td>
               <td>{$vehicle.idColor}</td>
            </tr>
            {/foreach}
         </tbody>
      </table>

		<div class="paginator">
			<ul class="pagination">
				<li class="prev disabled"><a href="">&lt; previous</a></li><li class="next disabled"><a href="">next &gt;</a></li>		</ul>
				<p>1 of 1</p>
			</div>
		</div>
	</div>
{/block}