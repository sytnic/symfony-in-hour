## Install

    composer create-project symfony/skeleton:"7.2.x" my_project_directory


## Debug bar Error

Если не загружается debug toolbar, нужна строчка в конфигурации Apache

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

##
