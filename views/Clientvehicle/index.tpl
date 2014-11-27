{extends file="../_Layouts/master.tpl"}
{block name=title}Mis vehiculos{/block}
{block name=pageheader}Mis vehiculos{/block}
{block name=head}
{/block}
{block name=body}
<div class="row">
  <div class="col-md-12">
    <h2>Mis Vehiculos</h2>
    <table class="table" cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th>IdClient</th>
          <th>IdVehicle</th>
        </tr>
      </thead>
      <tbody>
        {foreach item=clientVehicle from=$clientVehicles}
        <tr>
          <td>{$clientVehicle.idClient}</td>
          <td>{$clientVehicle.idVehicle}</td>
        </tr>
        {/foreach}
      </tbody>
    </table>
  </div>
{/block}
