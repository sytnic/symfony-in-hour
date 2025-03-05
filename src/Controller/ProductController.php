<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'product_index')]
    public function index(ProductRepository $repository): Response
    {
        //$repository = new ProductRepository;
        // вместо такой попытки, которая ведёт по цепочке к расширениям классов 
        // и их возможным зависимостям,
        // будет использован Service Container
        // и вызов нужного класса в качестве аргумента здесь в методе index()
        // как index(ProductRepository $repository)

        $products = $repository->findAll();

        // отображает данные дальше, скрипт не останавливается
        // dump($products);

        // не отображает данные дальше, конец скрипта
        dd($products);
        
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}
