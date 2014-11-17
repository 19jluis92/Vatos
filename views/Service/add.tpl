{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=Service">List Service</a></li>
		</ul>
	</div>
	<div class="service form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" action="index.php?controller=Service&view=create">
			<fieldset>
				<legend>Add Service</legend>
				<div class="input datetime required">
					<label for="startDate">Start Date</label>
					<input type="date" required="required" name="startDate">x 
				</div>
				<div class="input datetime required">
					<label for="endDate">Start Date</label>
					<input type="date" name="endDate"></select>
				</div>
				<div class="input number required">
					<label for="idcarworkshop">Id Car Work Shop</label>
					<input type="number" name="idCarWorkShop" required="required" id="idcarworkshop">
				</div>
				<div class="input number required">
					<label for="idvehicle">Id Vehicle</label>
					<input type="number" name="idVehicle" required="required" id="idvehicle">
				</div>
				<div class="input number required"><label for="idemployee">Id Employee</label><input type="number" name="idEmployee" required="required" id="idemployee"></div>	</fieldset>
				<button type="submit">Submit</button>
			</form>
		</div>
	</div>
	{/block}