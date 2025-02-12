<?php

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;

class HomeController
{
    #[Route('/')]
    public function index()
    {
        echo "Hello from a controller";
    }
}


