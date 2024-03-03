<?php

namespace Framework;
class Router{
    protected $routes = [];


    public function registerRoute($method, $uri, $action)
    {
        list($controller, $controllerMethod) = explode('@' , $action);

        return $this->routes[] = [
            'method' => $method ,
            'uri' =>$uri ,
            'controller' =>$controller,
            'controllerMethod' => $controllerMethod
        ];
    }

    /**
     *add GET method for route
     * @param string $uri
     * @param string $controller
     * @return void
     *
     */
    public function get($uri , $controller)
    {
       $this->registerRoute('GET' , $uri , $controller);
    }

    /**
     *add POST method for route
     * @param string $uri
     * @param string $controller
     * @return void
     *
     */
    public function post($uri , $controller)
    {
        $this->registerRoute('POST' , $uri , $controller);
    }
    /**
     *add PUT method for route
     * @param string $uri
     * @param string $controller
     * @return void
     *
     */
    public function put($uri , $controller)
    {
        $this->registerRoute('PUT' , $uri , $controller);

    }

    /**
     *add DELETE method for route
     * @param string $uri
     * @param string $controller
     * @return void
     *
     */

    public function delete($uri , $controller)
    {
        $this->registerRoute('DELETE' , $uri , $controller);

    }

    public function NotFindUri(){
        http_response_code(404);
        echo "url mored nazar vojod nadarad";
    }
    public function route($uri , $method_uri ){
        foreach ($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === $method_uri){
                $controller = 'App\\Controllers\\'.$route['controller'];
                $controllerMethod = $route['controllerMethod'];

                //instantiate from controller and execute method
                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod();
                return;
            }
        }
        $this->NotFindUri();

    }


}


