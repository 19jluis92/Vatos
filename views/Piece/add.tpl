{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=Piece">List Piece</a></li>
		</ul>
	</div>
	<div class="piece form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" action="index.php?controller=Piece&view=create">
			<fieldset>
			<legend>Add Piece</legend>
				<div class="input text required">
					<label for="name">Name</label>
					<input type="text" name="name" required="required" maxlength="45" id="name">
				</div>
			</fieldset>
			<button type="submit">Submit</button>
		</form>
	</div>
</div>
{/block}