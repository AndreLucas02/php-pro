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
            $uri,
            explode('/', ltrim($matchedParams, '/'))
        );

    }

    return [];
}

function paramsFormat($uri, $params) {
    $paramsData = [];
    foreach ($params as $index => $param) {
        $paramsData = [$uri[$index - 1]] = $param;

    }

    return $paramsData;
}

function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
    $routes = routes();

    $matchedUri = exacUri($uri, $routes);
    if (empty($matchedUri)) {
        $matchedUri = regularRoutes($uri, $routes);
        $uri =explode('/', ltrim($uri, '/'));
        $params= params($uri, $matchedUri);
        $params = paramsFormat($uri, $params);

        var_dump($params); die();

    }


    var_dump($matchedUri); 
}