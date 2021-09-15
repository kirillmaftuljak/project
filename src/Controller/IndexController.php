<?php 

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Container\ContainerInterface;

class IndexController extends Controller
{
    protected $ci;

    public function __construct(ContainerInterface $ci){
        $this->ci = $ci;
    }

	public function homepage(Request $request, Response $response){
		return $this->render($response,'homepage.html');
	}
}