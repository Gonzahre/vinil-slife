{include 'templates/header.tpl'}

<div class="vinilos">
    {foreach from=$vinilos item=$vinilo}
        <div class="contenedor">
            <div class="contenedorimg">
                <img src="{$vinilo->imagen}" alt="" srcset="">
            </div>
            <div class="caracteristicas">
                <h3>{$vinilo->nombreDisco}</h3>
                <p>{$vinilo->idAutor}</p>
                <p>Año de lanzamiento: {$vinilo->fechaDisco}</p>
            </div>
        </div>
    {/foreach}

    <script src="public\nav.js"></script>
{include 'templates/footer.tpl'}