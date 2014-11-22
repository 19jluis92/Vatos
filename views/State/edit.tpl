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
				<form action="index.php?controller=State&view=delete&id={$state->id}" name="post_54684496c4fdf026147299" style="display:none;" method="post">
					<input type="hidden" name="_method" value="POST">

				</form>
				<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # %s?&quot;)) { document.post_54684496c4fdf026147299.submit(); } event.returnValue = false; return false;">Delete
				</a>

			</li>
			<li><a href="index.php?controller=State">List State
			</a>
		</li>
		
	</ul>
	
</div>
<div class="bump form large-10 medium-9 columns">
	<form method="post" accept-charset="utf-8" action="index.php?controller=State&view=edit&id={$state->id}">
		<fieldset>
			<legend>Edit State</legend>
		<div class="form-group input-group">
			<label for="name" class="input-group-addon">Name</label>
			<input type="text" name="name" required="required" id="name" value="{$state->name}" class="form-control">
		</div>
		<div class="form-group input-group">
			<label for="idCountry" class="input-group-addon">Pais</label>
         <select name="idCountry" required="required" id="idCountry" class="form-control">
           <option value=''>-- none --</option>
           {html_options options=$countries}
        </select>
		</div>

	</fieldset>
	<button type="submit">Submit
	</button>
</form>
</div>

</div>
{/block}