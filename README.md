Domotekhnika Test
=================

Установка
=========
- БД расположена в dump.sql
- Переписать файлы в папку /var/www/domotekhnika
- Дать доступ к папке /var/www/domotekhnika для www-data
- Добавить в конфигурацию apache следующие строки
```
   Alias /domotekhnika /var/www/domotekhnika
   
   <Directory /var/www/domotekhnika>
     Options FollowSymLinks
     DirectoryIndex index.php
   </Directory>

```
- открыть в браузере http://localhost/domotekhnika

Параметры запуска
=================
| Параметр | Описание |
|----------|----------|
|format    | возвращаемый формат данных xml, json |
|user_id   | просмотр пользователя с ID = user_id |
|nick&email| для POST запроса обновляют поля nick & email для пользователя c ID = user_id|

Высокопроизводительное окружение
================================
- NGINX + phpfpm
- eAccelerator
- Оптимизация запросов к БД (кеширование) и БД (индексирование)
- Memcached
- MySQL в tmpfs (память)
