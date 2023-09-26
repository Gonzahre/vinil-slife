{include 'templates/header.tpl'}

<div class="vinilos">
    {foreach from=$vinilos item=$vinilo}
        <div class="contenedor" onmouseover="hover({$vinilo->idVin})" onclick="verVinilo({$vinilo->idVin})">

            <div class="contenedorimg">
                <img src="{$vinilo->imagen}" alt="" srcset="">
            </div>
            <div class="caracteristicas">
                <h3 class="descripcion hov">{$vinilo->nombreDisco}</h3>
                <p>{$vinilo->nombreAutor}</p>
                <p>Año de lanzamiento: {$vinilo->fechaDisco}</p>
                {if isset($smarty.session.ROL) && $smarty.session.ROL==admin}
                <a href="{BASE_URL}vinilos/{$vinilo->idVin}/eliminar">Borrar Vinilo</a>
                <a href="{BASE_URL}vinilos/{$vinilo->idVin}/editar">Editar Vinilo</a>
            {/if} 
            </div>
        </div>
    {/foreach}
</div>

 

{include 'templates/footer.tpl'}