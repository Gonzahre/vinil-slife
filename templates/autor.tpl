{include 'header.tpl'}
<div class="vinFlex">
<div class="divImg">
    <img src="{$autor->Imagen}" class="vinImg">
</div>
<div class="caracteristicas">
    <h1>{$autor->nombreAutor}</h1>
</div>
<div class="divDiscos">
{foreach from=$vinilos item=$vinilo}
    <div class="disc">
        <h3>{$vinilo->nombreDisco}</h3>
    </div>
{{/foreach}}
</div>
</div>
{include 'footer.tpl'}