{include 'templates/header.tpl'}

<div class="vinilos">
    {foreach from=$autores item=$autor}
        <div class="contenedor" onclick="verAutores({$autor->id})">

            <div class="contenedorimg">
                <img src="{$autor->Imagen}" alt="" srcset="">
            </div>
            <div class="caracteristicas">
                <h3 class="descripcion hov">{$autor->nombreAutor}</h3>
                <p>Año de lanzamiento: {$autor->anioAutor}</p>
                {if isset($smarty.session.ROL) && $smarty.session.ROL==admin}
                <a href="{BASE_URL}autores/{$autor->id}/eliminar">Borrar Vinilo</a>
                <a href="{BASE_URL}autores/{$autor->id}/editar">Editar Vinilo</a>
            {/if} 
            </div>
        </div>
    {/foreach}
</div>
<script>

    function verAutores(id){
        location.href="autores/"+id;
    }
</script>
    <script src="public\nav.js"></script>
    <script src="public\app.js"></script>
{include 'templates/footer.tpl'}