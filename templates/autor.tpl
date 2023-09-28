{include 'header.tpl'}
<div class="vinFlex">
    <div class="divImg">
        <img src="{$autor->Imagen}" class="vinImg">
    </div>
    <div class="caracteristicas">
        <h1>{$autor->nombreAutor}</h1>
        <div class="discos">
            <h3>Discos disponibles de {$autor->nombreAutor}:</h3>
            {foreach from=$vinilos item=$vinilo}
                <div class="disc">
                    <h3>{$vinilo->nombreDisco}</h3>
                </div>
            {{/foreach}}
        </div>
    </div>
</div>
{include 'footer.tpl'}