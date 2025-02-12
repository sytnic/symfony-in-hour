<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/')]
    public function index(): Response
    {   
        // 1 вариант вывода html
        // путь подразумевает папку templates/home/...
        //$contents = $this->renderView('home/index.html.twig');
        //return new Response($contents);

        // 2 вариант вывода html
        return $this->render('home/index.html.twig');
    }
}


