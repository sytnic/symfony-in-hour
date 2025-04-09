<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProductRepository;
use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

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
    #[Route('/product/{id<\d+>}', name: 'product_show' )]
    public function show(Product $product): Response 
    {
        return $this->render('product/show.html.twig', [
            'product' => $product
        ]);

    }

    #[Route('/product/new', name: 'product_new')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $product = new Product;

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // добавляем данные из формы в БД
            $manager->persist($product);
            $manager->flush();

            $this->addFlash(
                'notice',
                'Product created successfully!'
            );

            // заменяем вывод dd() на другой,
            // здесь мы получали массив
            //dd($request->request->all());            
            // теперь получаем объект Product
            //dd($product);

            // сразу переходим на страницу созданного продукта,
            // передаём имя маршрута product_show и id продукта
            return $this->redirectToRoute('product_show', [
                'id' => $product->getId(),
            ]); 
        }

        return $this->render('product/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/product/{id<\d+>}/edit', name: 'product_edit' )]
    public function edit(Product $product, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // добавляем данные из формы в БД
            
            // эта строка не нужна, т.к. запись уже существует
            // $manager->persist($product);
            
            $manager->flush();

            $this->addFlash(
                'notice',
                'Product updated successfully!'
            );            

            // сразу переходим на страницу созданного продукта,
            // передаём имя маршрута product_show и id продукта
            return $this->redirectToRoute('product_show', [
                'id' => $product->getId(),
            ]); 
        }

        return $this->render('product/edit.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/product/{id<\d+>}/delete', name: 'product_delete')]
    public function delete(Request $request, Product $product, EntityManagerInterface $manager): Response
    {
        if($request->isMethod('POST')) {

            // удаляем
            $manager->remove($product);
            $manager->flush();

            // отправляем сообщение
            $this->addFlash(
                'notice',
                'Product deleted successfully!'
            );

            // редирект
            return $this->redirectToRoute('product_index');
        }

        // рендерим вью
        return $this->render('product/delete.html.twig', [
            'id' => $product->getId()
        ]);
    }
}
