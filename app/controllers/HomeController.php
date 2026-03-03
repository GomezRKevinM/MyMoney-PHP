<?php
class HomeController {
    public function index(): void {
        $title   = 'Home | My Money';
        $header  = 'Bienvenido';
        $message = 'Esta es la página de inicio.';

        // Captura el contenido de la vista en un buffer
        ob_start();
        require_once __DIR__ . '/../views/homeView.php';
        $content = ob_get_clean();

        // Inyecta el contenido en el layout
        require_once __DIR__ . '/../views/layouts/main.php';
    }
}