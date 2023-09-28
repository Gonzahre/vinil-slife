{include 'header.tpl'}
<div class="vinFlex">
    <div class="divImg">
        <img src="{$vinilo->imagen}" class="vinImg">
    </div>
    <div class="caracteristicas">
        <h1>{$vinilo->nombreDisco}</h1>
        <h2>Su autor es: {$vinilo->nombreAutor}</h2>
        <p>Año de lanzamiento: {$vinilo->fechaDisco}</p>
    </div>

</div>
{include 'footer.tpl'}