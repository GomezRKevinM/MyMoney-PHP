<?php

class ErrorController {
    public function notFound(): void {
        http_response_code(404);
        $title   = '404 Not Found | My Money';
        $header  = 'Error 404';
        $header2 = 'Upps... pagina no encontrada';
        $message = 'La página <strong id="route">'.$_SERVER['REQUEST_URI'].'</strong> a la que intentas acceder no existe.';

        // Captura el contenido de la vista en un buffer
        ob_start();
        require_once __DIR__ . '/../views/NotFound.php';
        $content = ob_get_clean();

        // Inyecta el contenido en el layout
        require_once __DIR__ . '/../views/layouts/main.php';
    }
}