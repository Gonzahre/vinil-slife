{include 'header.tpl'}

{if isset($smarty.session.ROL)}
<p>Primero debes desloguearte.</p>

{else}
<div class="loginDiv">
<form action="Registrar" method="post">
<h1>Registrarse</h1>
<label>Ingrese su usuario.</label>
<input type="text" name="usuario">
<label>Ingrese su contraseña</label>
<input type="password" name="contrasenia">
<input type="submit" class="btnSub">
</form>
</div>
{/if}
{include 'footer.tpl'}