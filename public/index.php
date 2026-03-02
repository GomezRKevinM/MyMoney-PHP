<?php

    require_once __DIR__ . '/../app/core/Enrouter.php';

    $enrouter = new Enrouter();
    $route = $enrouter->getRoute();
    

    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Money</title>
    </head>
    <body>
        <header>
            <h1>My Money</h1>
            <nav>
                <a href="/">Inicio</a>
                <a href="/about">About</a>
                <a href="/help">Help</a>
                <button>K</button>
            </nav>
        </header>
        <main>
            <?php
                if($enrouter->validateRoute($route['controller'])){
                    $enrouter->route($route['controller']);
                }else{
                    require_once __DIR__ . '/../app/views/NoFound.php';
                }
            ?>
        </main>
        <script>
            const url = window.location.pathname;
            const ancores = document.querySelectorAll('nav a');
            ancores.forEach(ancore => {
                if(ancore.getAttribute('href') === url){
                    ancore.classList.add('active');
                }
            });
        </script>
    </body>
    </html>


