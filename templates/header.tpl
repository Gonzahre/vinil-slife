<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinil's Life</title>
    <link rel="icon" type="image/ico" href="public\images\icon.png">
    <link rel="stylesheet" href="{BASE_URL}public/style.css">
</head>

<body>
    <nav>
        <div class="nav">
            <div class="flexnav">
                <a class="Logo" href="inicio">Vinil´s life</a>
            </div>
            <button class="actnav">Menú</button>
            <ul class="sesions navLinks">
                {if isset($smarty.session.ROL) && ($smarty.session.ROL=="admin" or $smarty.session.ROL=="usuario")}
                    <li><a class="css-button-sharp--yellow" href="desloguearse">Desloguearse</a></li>
                {/if}
                <li><a class="css-button-sharp--yellow" href="iniciarsesion">Iniciar Sesión</a></li>
                <li><a class="css-button-sharp--yellow" href="registrarse">Registrarse</a></li>
            </ul>
            <ul class="sesions navLinks">
                <li><a class="css-button-sharp--white" href="inicio">Inicio</a></li>
                <li><a class="css-button-sharp--white" href="vinilos">Vinilos</a></li>
                <li><a class="css-button-sharp--white" href="autores">Autores</a></li>
            </ul>
        </div>
</nav>