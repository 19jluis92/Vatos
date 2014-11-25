{extends file="../_Layouts/master.tpl"}
{block name=title}Vehiculos{/block}
{block name=pageheader}Vehiculos{/block}
{block name=head}
{/block}
{block name=body}

   {if isset($deleted)}
   <script type="text/javascript">
      alert("eliminación correcta");
   </script>
   {/if}
   {/block}