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
				<form action="index.php?controller=Bump&view=delete&id={$bump->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">

				</form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Delete
				</a>

			</li>
			<li><a href="index.php?controller=Bump">List Bump
			</a>
		</li>
		
	</ul>
	
</div>
<div class="bump form large-10 medium-9 columns">
	<form method="post" accept-charset="utf-8" action="index.php?controller=Bump&view=edit&id={$bump->id}">
		<fieldset>
			<legend>Edit Bump</legend>
			<label for="idpiece">Id Piece</label>
			<input type="number" name="idPiece" required="required" id="idpiece" value="{$bump->idPiece}">
		</div>
		<div class="input number required">
			<label for="idseverity">Id Severity</label>
			<input type="number" name="idSeverity" required="required" id="idseverity" value="{$bump->idSeverity}">
		</div>
		<div class="input number required">
			<label for="idinspection">Id Inspection</label>
			<input type="number" name="idInspection" required="required" id="idinspection" value="{$bump->idInspection}">
		</div>	
	</fieldset>
	<button type="submit">Submit
	</button>
</form>
</div>

</div>
{/block}