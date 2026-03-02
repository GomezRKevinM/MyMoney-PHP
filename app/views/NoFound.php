<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>
    <link rel="stylesheet" href="/styles/index.css">
    <link rel="stylesheet" href="/styles/NotFound.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
        <div class="error-container">
            <div class="header-error">
                <i class="bi bi-journal-x"></i>
                <h1>Error 404</h1>
            </div>
            <div class="main-error">
                <h2>Upps...Página No Encontrada</h2>
                <p>parece que la página <strong id="route"><?= $_SERVER['REQUEST_URI'] ?></strong> que intentas buscar no existe.</p>
            </div>
            <div class="controls">
                <button onclick="window.history.back()">
                    <i class="bi bi-arrow-left-circle-fill"></i>
                    <p>Volver</p>
                </button>
            </div>
        </div>
        
        
    </main>