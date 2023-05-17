<?php
final class Router
{
    //А почему они статические, это так нужно?
    //Потом закрыть доступ к некоторыс переменным, зачем он всем?
    public static $routes = [];
    public static $routingResult = []; //массив ['controller' => 'controllerName', params => ['id' ...] ]
    public static $requestedUri = null;

    public function __construct($requestedUri)
    {
        self::$requestedUri = $requestedUri;
    }

    public static function deleteSlashUrl(string $url)
    {
        $url = preg_replace("~/*~", '/', $url);

        if ($url) {
            return $url;
        }
    }

    public static function cutParamsUrl(string $url): string
    {
        $pos = strpos($url, '?');
        if ($pos) {
            $url = substr($url, 0, $pos);
        }

        return $url;
    }

    public static function cutBaseUrl(string $url): string
    {
        if (stripos($url, BASE_URL)) {
            $url = substr($url, strlen(BASE_URL));
        }

        return $url;
    }

    private function parseRequestedUri(): void
    {
        self::$requestedUri = self::cutBaseUrl(self::$requestedUri);
        self::$requestedUri = self::cutParamsUrl(self::$requestedUri);
        self::$requestedUri = self::deleteSlashurl(self::$requestedUri);
    }

    public function addRoutes(array $routes)
    {
        if (is_array($routes)) {
            self::$routes = array_merge($routes, self::$routes);
        } else {
            throw new Exception('Can\'t add routes');
        }
    }

    public static function bindUri(string $url)
    {
        $macros = [
            '~:num~' => '([1-9]+\d*)',
        ];
        foreach ($macros as $key => $value) {
            $url = preg_replace($key, $value, $url);
        }

        return $url;
    }

    public function dispatch()
    {
        if (self::$requestedUri === null) {
            throw new Exception('Uri didn\'t set');
        }
        if (empty(self::$routes)) {
            throw new Exception('Routes didn\'t set');
        }
        self::$routingResult['controller'] = 'e404';

        self::parseRequestedUri();
        $matches = [];
        foreach (self::$routes as $route) {
            $routePattern = self::bindUri($route['reg']);

            if (preg_match($routePattern, self::$requestedUri, $matches)) {
                self::$routingResult['controller'] = $route['controller'];
                if (isset($route['params'])) {
                    foreach ($route['params'] as $name => $num) {
                        self::$routingResult['params'][$name] = $matches[$num];
                    }
                }
            }
        }
    }
}
