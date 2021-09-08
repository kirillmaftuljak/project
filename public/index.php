<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use DI/composer

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();

AppFactory::setContainer($container);

$continer->set('templating', function(){
    return new Mustache_Engine([
            'loader' => new Mustache_Loader_ProductionFilesystemLoader(
        __DIR__'/../templates',['extension' => ''])
    ]);

});

$app = AppFactory::create();
    
    $app->get('hello/{name}', function(Request $request, Response $response, array $args = []){
        $html = $this->get('templating')->render('hello.html', ['name' => $args['name']
    ]);
        $response->getBody()->write($html);
        return $response
    })

$app->run();