{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=Inspection">List Inspection</a></li>
		</ul>
	</div>
	<div class="inspection form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" action="index.php?controller=Inspection&view=create">
			<fieldset>
				<legend>Add Inspection</legend>
				<div class="input number required">
					<label for="idservice">Id Service</label><input type="number" name="idService" required="required" id="idservice">
				</div>
				<div class="input number required">
					<label for="mileage">Mileage</label>
					<input type="number" name="mileage" required="required" step="0.01" id="mileage"></div>
					<div class="input number required">
						<label for="fuel">Fuel</label>
						<input type="number" name="fuel" required="required" step="0.01" id="fuel"></div>
						<div class="input datetime"><label for="inspectiondate">Inspection Date</label>
						<input type="date" name="inspectiondate" required="required" id="inspectiondate">
						</div>
						<div class="input textarea">
							<label for="type">Type</label><input type="checkbox" name="type" id="type"></div>
						</fieldset>
						<button type="submit">Submit</button>
					</form>
				</div>
			</div>
			{/block}