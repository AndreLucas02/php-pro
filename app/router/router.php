<?php 

function routes()
{
   return require "routes.php";
}

function exacUri($uri, $routes)
{
    if(array_key_exists($uri, $routes)) {
        return [$uri => $routes[$uri]];
    }

    return [];
}


function regularRoutes($uri, $routes) {

    return array_filter(
        $routes,
        function ($value) use($uri) {
            $regex = str_replace('/', '\/', ltrim($value, '/'));
            return preg_match("/^$regex$/", ltrim($uri, '/'));
        },
        ARRAY_FILTER_USE_KEY
    );

}

function params($uri, $matchedUri) {
    if(!empty($matchedUri)) {
        $matchedParams = array_keys($matchedUri)[0];
        return array_diff(
            explode('/', ltrim($uri, '/')),
            explode('/', ltrim($matchedParams, '/'))
        );

    }

    return [];
}

function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
    $routes = routes();

    $matchedUri = exacUri($uri, $routes);
    if (empty($matchedUri)) {
        $matchedUri = regularRoutes($uri, $routes);
        $params= params($uri, $matchedUri);
        var_dump($params); die;
    }


    var_dump($matchedUri);
  
}