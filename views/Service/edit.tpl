{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li>
				<form action="index.php?controller=Service&view=delete&id={$service->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">
				</form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Delete
				</a>
			</li>
			<li><a href="index.php?controller=Service">List Service</a></li>
		</ul>
	</div>
	<div class="service form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" action="index.php?controller=Service&view=edit&id={$service->id}">

			<fieldset>
				<legend>Edit Service</legend>
				<div class="input datetime required">
					<label for="startDate">Start Date</label>
					<input type="date" required="required" name="startDate" value="{$service->startDate}"> 
				</div>
				<div class="input datetime required">
					<label for="endDate">Start Date</label>
					<input type="date" name="endDate" value="{$service->endDate}">
				</div>
				<div class="input number required">
					<label for="idcarworkshop">Id Car Work Shop</label>
					<input type="number" name="idCarWorkShop" required="required" id="idcarworkshop" value="{$service->idCarWorkShop}">
				</div>
				<div class="input number required">
					<label for="idvehicle">Id Vehicle</label>
					<input type="number" name="idVehicle" required="required" id="idvehicle" value="{$service->idVehicle}">
				</div>
				<div class="input number required">
				<label for="idemployee">Id Employee</label>
				<input type="number" name="idEmployee" required="required" id="idemployee" value="{$service->idEmployee}">
				</div>
			</fieldset>
			<button type="submit">Submit</button>
		</form>
	</div>
</div>
{/block}