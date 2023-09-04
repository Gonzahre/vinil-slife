<!DOCTYPE html>
<html lang="en">

<head>
<style > /*nav*/
html{
   height: 100%;
}
body {
    margin: 0;
    display: flex;
    flex-direction: column;
    min-height: 100%;
    background-color: rgb(27, 27, 26);
    color: white !important;
}

nav {
    background-color: #101010;
    margin: 0;

}

.nav {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.Logo {
    font-size: 25px;
    text-decoration: none;
    color: rgb(179, 179, 179);
}

.Logo:hover {
    color: white;
}

.navLinks {
    list-style: none;
    margin: 0;
    display: flex;
    flex-direction: row;
}


.navLinks li a {
    text-decoration: none;
    color: rgb(178, 180, 60);
    font-size: 16px;
}

.navLinks li a:hover {
    color: orange;
}

nav {
    height: auto;
}

.navLinks {
    flex-direction: column;
    display: none;
}

.navLinks li {
    height: 25px;
}

.actnav {
    visibility: visible;
}

.nav {
    flex-direction: column;
    margin: 0;
    align-items: center;
}



.mostrar {
    display: flex;

}


.success {
    background-color: rgb(196, 196, 196);
    border: 3px solid #04AA6D;
    border: none;
    color: black;
    padding: 14px 28px;
    cursor: pointer;
    border-radius: 5px;

}

.success:hover {
    background-color: #46a049;
    color: white;
}

.Portada h2 {
    margin: 0;
}

.Portada {
    background-image: url('images/record-player-1851576_1280.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position-y: 100%;
    background-position-x: 75%;
    height: 15rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

/*vinilos css*/
.vinilos {
    display: flex;
    flex-direction: column;
    margin: 10px 2px;

}

.contenedor {
    display: flex;
    flex-direction: row;
    align-content: center;

}

.contenedorimg {
    max-width: 41%;
    aspect-ratio: 1/1;
}

.contenedorimg img {
    width: 100%;

}

.caracteristicas {
    font-family: Arial, Helvetica, sans-serif;

}

/*footer*/
footer {

    width: 100%;
    height: 3rem;
    background-color: #101010;
    font-size: large;
    text-align: center;
    margin-top: auto;
}

footer p {
    color: white;
    font-family: Arial, Helvetica, sans-serif;
}
.loginDiv{
   height: 80vh;
   display: flex;
   justify-content: center;
   align-content: center;
   background-color: rgb(27, 27, 26);
   
}

.loginDiv form{
   margin-top: 15vh;
   width: 300px;
   height: 300px;
   display: flex;
   flex-direction: column;
   align-items: center;
   justify-content: center;
   background-color: rgb(8, 8, 8);
}
.loginDiv form h1{
   margin: 0 0 10px 0;
   color: white;
}
.loginDiv form label{
   color: white;
}
.loginDiv form input{
   border-radius: 5px;
   border-color: #1B3358;
}
.btnSub{
   width: 50%;
}

/*Media Query para pc, ya que estamos desarrollando mobile first*/
@media (min-width: 600px) {
    nav {
        height: 4rem;
        align-items: center;
        display: flex;
    }

    .navLinks li {
        margin-right: 15px;
    }

    .actnav {
        visibility: hidden;
    }

    .nav {
        margin: 0 25px;
        flex-direction: row;
    }

    .navLinks {
        display: flex;
        flex-direction: row;
    }

    .Portada {
        background-size: cover;
        background-blend-mode: multiply;
        height: 85vh;
        background-position: 0;
    }

    /*vinilos css*/
    .vinilos {
       flex-wrap: wrap;
        flex-direction: row;
    }

    .contenedor {
        flex-direction: column;
        justify-content: center;
        border: thin solid gray;
        box-shadow: 2px;

    }

    .contenedor:hover {
        border: thin solid transparent;
        box-shadow: 0px;
    }

    .contenedorimg {

        max-width: 17rem;
    }

    .contenedorimg img {
        aspect-ratio: 1/1;
        height: 15rem;
        width: 15rem;
        margin: 15px;
    }

    .contenedor {
        margin: 0 14px;
        text-align: center;
    }
}</style>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio html</title>
    <link rel="stylesheet" href="public\style.css">
</head>

<body>
    <nav>
        <div class="nav">
            <div class="flexnav">
                <a class="Logo" href="inicio">Vinil´s life</a>

            </div>
            <button class="actnav"></button>
            <ul class="navLinks">
                <li><a href="inicio">Inicio</a></li>
                <li><a href="vinilos">Vinilos</a></li>
            </ul>
        </div>
</nav>