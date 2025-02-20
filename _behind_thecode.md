## Install

    composer create-project symfony/skeleton:"7.2.x" my_project_directory


## Debug bar Error

> Если не загружается debug toolbar, нужна строчка в конфигурации Apache

> Это также влияет на работу маршрутов, которые иначе могут не работать!

    FallbackResource /index.php

Пример

    ServerName symfony.local
    ServerAdmin webmaster@localhost
    DocumentRoot /home/user/server/symfony.local/public/
    <Directory /home/user/server/symfony.local/public/>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Require all granted
        FallbackResource /index.php
    </Directory>

Ссылки

https://modern-develop.ru/blogs/oshibka-error-occurred-while-loading-web-debug-toolbar-v-symfony

https://symfony.com/doc/current/setup/web_server_configuration.html#apache

https://stackoverflow.com/questions/50059794/symfony-4-an-error-occurred-while-loading-the-web-debug-toolbar

## Twig

https://symfony.com/doc/current/templates.html

    composer require symfony/twig-bundle

## Code generators

> Наподобие php artisan в Laravel.

https://symfony.com/bundles/SymfonyMakerBundle/current/index.html

Аллиасы, другие названия для пакетов:

https://github.com/symfony/recipes/blob/flex/main/RECIPES.md

    php bin/console
    php bin/console list

    bin/console
    bin/console list

    composer require --dev symfony/maker-bundle
    # или, благодаря аллиасу,
    composer require maker --dev

После установки `maker` появляется куча команд make:... в списке команд bin/console list .  

Получение справки по командам bin/console:  

    bin/console help make:controller

Создать контроллер. Будет создан контроллер и шаблон.

    bin/console make:controller Product

    ->
    created: src/Controller/ProductController.php  
    created: templates/product/index.html.twig

Также можно создать контроллер не указав сначали имени, а когда CLI  спросит, указать это имя маленькими буквами. Будет создан контроллер ProductController.php и шаблон.

     bin/console make:controller
     > product

## Route names

Фyнкции Twig

https://symfony.com/doc/current/reference/twig_reference.html

Просмотр маршрутов

    bin/console debug:router

## Databases

Doctrine - доступ к БД наподобие PDO.

https://symfony.com/doc/current/doctrine.html   
https://symfony.ru/doc/current/doctrine.html

Установка Doctrine

    composer require symfony/orm-pack

Далее - настроить .env файл в корне проекта.  
Подсказки тут:  

https://symfony.com/doc/current/doctrine.html#configuring-the-database

https://symfony.ru/doc/current/doctrine.html#konfiguracia-bazy-dannyh

В списке команд добавились команды Doctrine, посмотреть

    bin/console list

Создать БД (в env была настроена база SQlite)

    bin/console doctrine:database:create 

## Entities

Объект класса Entities представляет собой отдельную запись в таблице базы данных.  






