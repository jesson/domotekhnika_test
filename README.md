domotekhnika_test
=================

Установка
=========
- БД расположена в dump.sql
- добавить в конфигурацию apache следующие строки
```
   Alias /domotekhnika /var/www/domotekhnika
   
   <Directory /var/www/domotekhnika>
     ¦ Options FollowSymLinks
     ¦ DirectoryIndex index.php
   </Directory>

```
