{include 'header.tpl'}
{if $smarty.session.ROL=='usuario'}
<h1>HOLA USUARIO</h1>
{/if}
<div class="loginDiv">
    <form action="iniciars" method="post">
        <h1>Iniciar Sesion</h1>
        <label>Ingrese su usuario.</label>
        <input type="text" name="usuario">
        <label>Ingrese su contraseña</label>
        <input type="password" name="contrasenia">
        <input type="submit" class="btnSub">
    </form>
</div>

{include 'footer.tpl'}