<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio html</title>
    <link rel="stylesheet" href="{BASE_URL}public/style.css">
</head>

<body>
    <nav>
        <div class="nav">
            <div class="flexnav">
                <a class="Logo" href="inicio">Vinil´s life</a>
            </div>
            <button class="actnav"></button>
            <ul class="sesions navLinks">
            {if isset($smarty.session.ROL) && $smarty.session.ROL=="admin"}
            <li><a class="css-button-sharp--yellow" href="desloguearse">Desloguearse</a></li>
            {/if}
             <li><a class="css-button-sharp--yellow" href="iniciarsesion">Iniciar Sesión</a></li>
             <li><a class="css-button-sharp--yellow" href="registrarse">Registrarse</a></li>
            </ul>
            <ul class="navLinks">
             
                <li><a href="inicio">Inicio</a></li>
                <li><a href="vinilos">Vinilos</a></li>
                <li><a href="autores">Autores</a></li>
                
            </ul>
        </div>
</nav>
