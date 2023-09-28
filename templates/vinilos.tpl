{include 'templates/header.tpl'}
{if isset($autor)}
    <h1>Se muestran los vinilos de: {$autor->nombreAutor}.</h1>
{/if}
<div class="divFormularios">
    <form id="filtrar">
        <h3>Filtrar Por Autor: </h3>
        <select id="nombre">
            {foreach from=$autores item=$autor}
                <option value="{$autor->id}">{$autor->nombreAutor}</option>

            {/foreach}
        </select>
        <button type="submit">submit</button>
    </form>


    {if isset($smarty.SESSION.ROL) && $smarty.session.ROL=="admin"}

        <a href="formVin">Añadir Vinilo</a>
    {/if}
</div>
<div class="vinilos">
    {foreach from=$vinilos item=$vinilo}
        <div class="contenedor" onclick="verVinilo({$vinilo->idVin})">

            <div class="contenedorimg">
                <img src="{$vinilo->imagen}" alt="" srcset="">
            </div>
            <div class="caracteristicas">
                <h3 class="descripcion hov">{$vinilo->nombreDisco}</h3>
                <p>{$vinilo->nombreAutor}</p>
                {if isset($smarty.session.ROL) && $smarty.session.ROL==admin}
                    <a href="{BASE_URL}vinilos/{$vinilo->idVin}/eliminar">Borrar Vinilo</a>
                    <a href="{BASE_URL}vinilos/{$vinilo->idVin}/editar">Editar Vinilo</a>
                {/if}
            </div>
        </div>
    {/foreach}
</div>
<script>
    function verVinilo(id) {
        location.href = "vinilos/" + id;
    }

    const formulario = document.getElementById('filtrar');

    formulario.addEventListener('submit', function(event) {
        // Previene el comportamiento predeterminado del formulario (recargar la página)
        event.preventDefault();

        // Realiza alguna validación personalizada o acciones aquí
        const nombre = document.getElementById('nombre').value;

        location.href = 'vinilos/filtrar/' + nombre;

    });
</script>


{include 'templates/footer.tpl'}