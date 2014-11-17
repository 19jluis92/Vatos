{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
	<div class="actions columns large-2 medium-3">
		<h3>Actions</h3>
		<ul class="side-nav">
			<li><a href="index.php?controller=User">List Users</a>
			</li>
		</ul>
	</div>
	<div class="bump form large-10 medium-9 columns">
		<form method="post" accept-charset="utf-8" action="index.php?controller=User&view=create">
			<fieldset>
				<legend>Add User</legend>
				<div class="input number required">
					<label for="id">Id User</label>
					<input type="number" name="idPiece" required="required" id="idpiece"></div><div class="input number required">
					<label for="email">Email</label>
					<input type="text" name="email" required="required" id="email"></div><div class="input number required">
					<label for="password">Id Inspection</label>
					<input type="password" name="password" required="required" id="password"></div>
				</fieldset>
				<button type="submit">Submit</button></form></div>
				{/block}