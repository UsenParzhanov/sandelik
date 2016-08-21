<?php



/**
 * Description of Router
 *
 * @author Usen
 */
class Router {
    
    private function getUri(){
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');
        if($uri == ''){
            $uri = 'main';
        }
        return $uri;
    }


    public function run(){
        $uri = $this->getUri();
        
        $routes = include Root.'/config/routes.php';
        
        foreach ($routes as $uriPattern => $path){
            if(preg_match("~$uriPattern~", $uri)){
                $segments = explode('/', $path);
                
                $controllerName = array_shift($segments);
                $controllerName = ucfirst($controllerName);
                $controllerName = $controllerName.'Controller';
                
                $actionName = array_shift($segments);
                $actionName = ucfirst($actionName);
                $actionName = 'action'.$actionName;
                
                if(file_exists(Root.'/controllers/'.$controllerName.'.php')){
                    require Root.'/controllers/'.$controllerName.'.php';
                }
               
                $controller = new $controllerName;
                $controller -> $actionName();
                
                return false;
            } 
        }
        
     }
}
