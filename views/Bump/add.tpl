{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=Bump">List Bumps</a>
			</li>
		</ul>
	</div>
	<div class="bump form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" action="index.php?controller=Bump&view=create">
			<fieldset>
				<legend>Add Bump</legend>
				<div class="input number required">
					<label for="idpiece">Id Piece</label>
					<input type="number" name="idPiece" required="required" id="idpiece"></div><div class="input number required">
					<label for="idseverity">Id Severity</label>
					<input type="number" name="idSeverity" required="required" id="idseverity"></div><div class="input number required">
					<label for="idinspection">Id Inspection</label>
					<input type="number" name="idInspection" required="required" id="idinspection"></div>
				</fieldset>
				<button type="submit">Submit</button></form></div>
				{/block}