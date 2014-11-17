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
				<form action="index.php?controller=Inspection&view=delete&id={$inspection->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">
				</form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Delete
				</a>
			</li>
			<li><a href="index.php?controller=Inspection">List Inspection</a></li>
		</ul>
	</div>
	<div class="inspection form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" action="index.php?controller=Inspection&view=edit&id={$inspection->id}">
			<fieldset>
				<legend>Add Inspection</legend>
				<div class="input number required">
					<label for="idservice">Id Service</label><input type="number" name="idService" required="required" id="idservice" value="{$inspection->idService}">
				</div>
				<div class="input number required">
					<label for="mileage">Mileage</label>
					<input type="number" name="mileage" required="required" step="0.01" id="mileage" value="{$inspection->mileage}"></div>
					<div class="input number required">
						<label for="fuel">Fuel</label>
						<input type="number" name="fuel" required="required" step="0.01" id="fuel" value="{$inspection->fuel}"></div>
						<div class="input datetime"><label for="inspectiondate">Inspection Date</label>
							<input type="date" name="inspectiondate" required="required" id="inspectiondate" value="{$inspection->inspectionDate}">
						</div>
						<div class="input textarea">
							<label for="type">Type</label><input type="checkbox" name="type" id="type" {if $inspection->type} checked="checked" {/if}></div>
						</fieldset>
						<button type="submit">Submit</button>
					</form>
				</div>
			</div>
			{/block}