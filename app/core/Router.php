<?php

class Router {
    private array $routes = [];

    // Registrar una ruta
    public function add(string $method, string $uri, string $controller, string $action): void {
        $this->routes[] = [
            'method'     => strtoupper($method),
            'uri'        => trim($uri, '/'),
            'controller' => $controller,
            'action'     => $action
        ];
    }

    // Métodos de conveniencia
    public function get(string $uri, string $controller, string $action): void {
        $this->add('GET', $uri, $controller, $action);
    }

    public function post(string $uri, string $controller, string $action): void {
        $this->add('POST', $uri, $controller, $action);
    }

    // Punto de entrada principal
    public function dispatch(): void {
        $method = strtoupper($_SERVER['REQUEST_METHOD']);
        $uri    = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['uri'] === $uri) {
                $this->resolve($route['controller'], $route['action']);
                return;
            }
        }

        // Ninguna ruta coincidió
        $this->resolve('ErrorController', 'notFound');
    }

    // Cargar controlador y ejecutar acción
    private function resolve(string $controller, string $action): void {
        $path = __DIR__ . '/../controllers/' . $controller . '.php';

        if (!file_exists($path)) {
            die("Controller no encontrado: $controller");
        }

        require_once $path;

        if (!class_exists($controller)) {
            die("Clase no encontrada: $controller");
        }

        $instance = new $controller();

        if (!method_exists($instance, $action)) {
            die("Método no encontrado: $action en $controller");
        }

        $instance->$action();
    }
}