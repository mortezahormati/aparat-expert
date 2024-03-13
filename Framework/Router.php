<?php

namespace Framework;

use App\Controllers\Error\ErrorController;
use Framework\middleware\Authorize;

class Router
{
    protected $routes = [];

    /**
     *registerRoute function
     * @param string $uri
     * @param string $method
     * @param string $action
     * @param array $middleware
     * @return array
     *
     */
    public function registerRoute($method, $uri, $action , $middleware=[])
    {
        list($controller, $controllerMethod) = explode('@', $action);
        return $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod ,
            'middleware' => $middleware
        ];
    }

    /**
     *add GET method for route
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     *
     */
    public function get($uri, $controller , array $middleware=[])
    {
        $this->registerRoute('GET', $uri, $controller,$middleware);
    }

    /**
     *add POST method for route
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     *
     */
    public function post($uri, $controller , $middleware=[])
    {
        $this->registerRoute('POST', $uri, $controller , $middleware);
    }

    /**
     *add PUT method for route
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     *
     */
    public function put($uri, $controller,$middleware=[])
    {
        $this->registerRoute('PUT', $uri, $controller,$middleware);

    }

    /**
     *add DELETE method for route
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     *
     */

    public function delete($uri, $controller,$middleware=[])
    {
        $this->registerRoute('DELETE', $uri, $controller,$middleware);

    }

    public function route($uri)
    {
        $method_uri = $_SERVER['REQUEST_METHOD'];
        foreach ($this->routes as $route) {


            //split the current uri
            $uriSeg = explode('/', trim($uri, '/'));
            //split all route
            $routeSeg = explode('/', trim($route['uri'], '/'));

            $match = true;
            //check if the number
            if (count($uriSeg) === count($routeSeg) && strtoupper($route['method']) === $method_uri) {

                $params = [];
                $match = true;

                for ($i = 0; $i < count($uriSeg); $i++) {

                    if ($routeSeg[$i] !== $uriSeg[$i] && !preg_match('/\{(.+?)\}/', $routeSeg[$i])) {
                        $match = false;
                        break;
                    }
                    if (preg_match('/\{(.+?)\}/', $routeSeg[$i], $matches)) {
                        $params[$matches[1]] = $uriSeg[$i];
                    }
                }
                if ($match) {
                    foreach ($route['middleware'] as $middleware){
                        (new Authorize())->handle($middleware);
                    }
                    $controller = 'App\\Controllers\\' . $route['controller'];
                    $controllerMethod = $route['controllerMethod'];

                    //instantiate from controller and execute method
                    $controllerInstance = new $controller();
                    $controllerInstance->$controllerMethod($params);
                    return;
                }


            }
        }

        ErrorController::notFind();

    }


}


