{include 'templates/header.tpl'}

<div class="vinilos">
    {foreach from=$vinilos item=$vinilo}
        <div class="contenedor">
            <div class="contenedorimg">
                <img src="{$vinilo->imagen}" alt="" srcset="">
            </div>
            <div class="caracteristicas">
                <h3 class="descripcion">{$vinilo->nombreDisco}</h3>
                <p>{$vinilo->idAutor}</p>
                <p>Año de lanzamiento: {$vinilo->fechaDisco}</p>
                {if isset($smarty.session.ROL) && $smarty.session.ROL==admin}
                <a href="{BASE_URL}vinilos/{$vinilo->id}/eliminar">Borrar Vinilo</a>
                <a href="{BASE_URL}vinilos/{$vinilo->id}">ir al vinilo</a>
                <a href="{BASE_URL}vinilos/{$vinilo->id}/editar">Editar Vinilo</a>
                {/if}
            </div>
        </div>
    {/foreach}
</div>
    <script src="public\nav.js"></script>
{include 'templates/footer.tpl'}