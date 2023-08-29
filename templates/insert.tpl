{include 'header.tpl'}

<h2>INSERTAR FORMULARIO</h2>

<form action="insert" method="post">
    <label>Inserte el nombre del disco.</label>
    <input type="text" name="nombreV" placeholder="Nombre del disco">
    <label>Inserte el año del disco</label>
    <input type="number" name="añoV" placeholder="Inserte el id del autor">
    <label>Inserte el id del autor</label>
    <input type="text" name="idA" placeholder="Inserte el id del autor">
    <label>Inserte la url de la imagen</label>
    <input type="text" name="imagen" placeholder="Ingrese su imagen">
    <button type="submit" class="btn btn-primary">Agregar</button>
</form>

<h2>UPDATE FORMULARIO</h2>
{include 'footer.tpl'}