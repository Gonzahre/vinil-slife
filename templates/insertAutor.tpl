{include 'header.tpl'}
{if $autor==null}
    <h2>INSERTAR FORMULARIO</h2>
    {else}
        <h2>Update Formulario</h2>
    {/if}

<form {if $autor==null}action="{BASE_URL}autores/aniadir" {else} action="{BASE_URL}autores/editar/{$autor->id}" {/if} method="post">
    <label>Inserte el nombre del autor.</label>
    <input type="text" name="nombreAutor" {if $autor!=null}value="{$autor->nombreAutor}"
        {/if}placeholder="Nombre del autor">
    <label>Inserte el año del autor</label>
    <input type="number" name="anioAutor" {if $autor!=null}value="{$autor->anioAutor}" {/if}
        placeholder="Inserte el año de nacimiento del autor">
    <label>Inserte la url de la imagen</label>
    <input type="text" name="Imagen" placeholder="Ingrese su imagen">
    {if $autor==null}
        <button type="submit" class="btn btn-primary">Agregar</button>

    {else}
        <button type="submit" class="btn btn-primary">Actualizar</button>
    {/if}
</form>

{include 'footer.tpl'}