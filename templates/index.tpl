 {include 'templates/header.tpl'}
 <div class="Portada">
     <button class="btn success" id="vinilos" href="vinilos">Ver Vinilos</button>
 </div>
 {if isset($smarty.session.ROL) && $smarty.session.ROL=="admin"}
    <h1 style="font-size: 56px;">HOLA ADMIN {$smarty.session.USERNAME}</h1>
{/if}
 <script src="public\nav.js"></script>
 <script src="public\app.js"></script>

{include 'templates/footer.tpl'}