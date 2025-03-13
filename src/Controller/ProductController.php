<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{
    // показать все записи
    #[Route('/products', name: 'product_index')]
    public function index(ProductRepository $repository): Response
    {
        //$repository = new ProductRepository;
        // вместо такой попытки, которая ведёт по цепочке к расширениям классов 
        // и их возможным зависимостям,
        // будет использован Service Container
        // и вызов нужного класса в качестве аргумента здесь в методе index()
        // как index(ProductRepository $repository)

        // $products = $repository->findAll();

        // отображает данные дальше, скрипт не останавливается
        // dump($products);

        // не отображает данные дальше, конец скрипта
        //dd($products);
        
        return $this->render('product/index.html.twig', [
            'products' => $repository->findAll(),
        ]);
    }

    // показать одну запись
    // {id} - называется корневой переменной, Route variable.
    // Т.к. $id может принять любое значение, даже строку,
    // применяется регулярное выражение <\d+> для ограничения такого поведения
    // и применения только цифр
    #[Route('/product/{id<\d+>}')]
    public function show($id): Response 
    {
        // посмотреть полученное
        dd($id);

    }
}
