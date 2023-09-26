{include 'header.tpl'}

<h2>INSERTAR FORMULARIO</h2>

<form {if $vinilo==null}action="insert"{else} action="actualizar/{$vinilo->idVin}" {/if} method="post">
    <label>Inserte el nombre del disco.</label>
<input type="text" name="nombreV" {if $vinilo!=null}value="{$vinilo->nombreDisco}"{/if}placeholder="Nombre del disco">
    <label>Inserte el año del disco</label>
    <input type="number" name="añoV" {if $vinilo!=null}value="{$vinilo->fechaDisco}"{/if} placeholder="Inserte el id del autor">
    <label>Inserte el id del autor</label>
    <input type="text" name="idA"{if $vinilo!=null}value="{$vinilo->idAutor}"{/if} placeholder="Inserte el id del autor">
    <label>Inserte la url de la imagen</label>
    <input type="text" name="imagen" placeholder="Ingrese su imagen">
    
   
    {if $vinilo==null}
    <button type="submit" class="btn btn-primary">Agregar</button>
  
    {else}
        <button type="submit" class="btn btn-primary">Actualizar</button>
    {/if}
</form>

<h2>UPDATE FORMULARIO</h2>
<script>

</script>
{include 'footer.tpl'}