# Template project

- Docker
- PHP 8.2
- Apache
- MySQL 5.7.39 (имя БД указывается в docker-compose.yml)
- Adminer

## Запуск Docker

Запуск контейнеров

    docker-compose build
    
    # либо запуск без кэша,
    # может понадобиться, если некоторые команды в Dockerfile
    # не отработают, но останутся в кэше даже после удаления образа,
    # например, не установится composer в одной из команд из Dockerfile

    docker-compose build --no-cache


    docker-compose up -d

> Проверка в браузере

    127.0.0.1:8081
    127.0.0.1:6081  # adminer
    # порты берутся из docker-compose.yml

> Вход в бд

    db, root, 123
    # берётся из docker-compose.yml

## Пример входа в контейнер при необходимости

    cd /d E:\
    cd E:\docker_sandbox\lamp_php8.1
    dir

    docker ps

    docker exec -it container_id bash 
    # не работает в GitBash, работает в cmd

    # apt-get install nano

## Остановка контейнеров

    docker-compose stop