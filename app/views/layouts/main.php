<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'My Money' ?></title>
    <link rel="stylesheet" href="/assets/styles/index.css">
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
        <?= $content ?>
    </main>
    <footer></footer>
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