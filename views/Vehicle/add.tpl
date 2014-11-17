{extends file="../_Layouts/master.tpl"}
{block name=title}My Page Title{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
   <div class="actions columns large-2 medium-3">
      <h3>Actions</h3>
      <ul class="side-nav">
         <li><a href="index.php?controller=vehicle">List vehicle</a></li>
      </ul>
   </div>
   <div class="vehicle form large-10 medium-9 columns">
      <form method="post" accept-charset="utf-8" action="index.php?controller=vehicle&view=create"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> <fieldset>
         <legend>Add vehicle</legend>
         <div class="input text required"><label for="name">vin</label><input type="text" name="name" required="required" maxlength="45" id="name"></div>  </fieldset>
         <button type="submit">Submit</button></form></div>
      </div>
{/block}