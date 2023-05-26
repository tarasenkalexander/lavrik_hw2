<?php
final class Router
{
    //Потом закрыть доступ к некоторым переменным, зачем они всем?
    public static $routes = [];
    public static $routingResult = [];
    public static $requestedUri = null;

    public function __construct($requestedUri)
    {
        self::$requestedUri = $requestedUri;
        self::initRoutes();
        self::$routingResult['controller'] = 'app/controller/e404';
    }

    private static function initRoutes(): void
    {
        self::addRoutes([
            [
                'reg' => '~^/?$~',
                'controller' => 'articles/all',
            ],
            [
                'reg' => '~^/?article/add/?$~',
                'controller' => 'articles/add',
            ],
            [
                'reg' => "~^/?article/:num/?$~",
                'controller' => 'articles/article',
                'params' => ['id' => 1],
            ],
            [
                'reg' => "~^/?article/:num/edit/?$~",
                'controller' => 'articles/edit',
                'params' => ['id' => 1],
            ],
            [
                'reg' => "~^/?article/:num/delete/?$~",
                'controller' => 'articles/delete',
                'params' => ['id' => 1],
            ],
            [
                'reg' => "~^/?logs/?$~",
                'controller' => 'logs/logs',
            ],
            [
                'reg' => "~^/?log/:any/?$~",
                'controller' => 'logs/log',
                'params' => ['logfileName' => 1],
            ],
            [
                'reg' => "~^/?articles/:num/?$~",
                'controller' => 'categories/articlesByCategory',
                'params' => ['categoryId' => 1],
            ],
            [
                'reg' => "~^/?e404/?$~",
                'controller' => 'errors/e404',
            ],
            [
                'reg' => "~^/?e505/?$~",
                'controller' => 'errors/e500'
            ],
            [
                'reg' => "~^/?category/:num/edit/?$~",
                'controller' => 'categories/edit',
                'params' => ['categoryId' => 1],
            ],
            [
                'reg' => "~^/?category/:num/delete/?$~",
                'controller' => 'categories/delete',
                'params' => ['categoryId' => 1],
            ],
            [
                'reg' => "~^/?category/add/?$~",
                'controller' => 'categories/add',
            ],
            [
                'reg' => "~^/?categories/?$~",
                'controller' => 'categories/all',
            ],
            [
                'reg' => "~^/?login/?$~",
                'controller' => 'auth/login',
            ]
        ]);
    }

    public static function deleteSlashUrl(string $url)
    {
        $url = preg_replace("~/+~", '/', $url);

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

    private static function parseRequestedUri(): void
    {
        self::$requestedUri = self::cutBaseUrl(self::$requestedUri);
        self::$requestedUri = self::cutParamsUrl(self::$requestedUri);
        self::$requestedUri = self::deleteSlashUrl(self::$requestedUri);
    }

    public static function addRoutes(array $routes)
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
            '~:any~' => '([aA-zZ0-9_-]+)',
        ];
        foreach ($macros as $key => $value) {
            $url = preg_replace($key, $value, $url);
        }

        return $url;
    }

    public static function dispatch()
    {
        if (self::$requestedUri === null) {
            throw new Exception('Uri didn\'t set');
        }
        if (empty(self::$routes)) {
            throw new Exception('Routes didn\'t set');
        }
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