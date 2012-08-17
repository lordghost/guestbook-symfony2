# GUESTBOOK

## A example project made with symfony2 framework

### INSTALLATION

+ **Deploy the source code on your server and make sure the webserver
knows about it.**

Access the link (we assume localhost):

*http://localhost/guestbook/web/config.php*

to see any further modifications in need to be done.

+ **Modify app/config/parameters.ini to match your sql credentials**

+ **Create the database and the tables**

`cd <guestbook_dir>

php app/console doctrine:database:create

php app/console doctrine:schema:update --force`

+ **Insert into the table user a test record**


``user:root
password:toor

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `full_username`, `is_active`) 
VALUES (1, 'root', '51975339b55fc72d1b6b504f07d95b5ad1d5f39f', 'e9eee246baa90e1d40d58f422c1a4131', 'Root', 1);``


+ **Access the frontend**

*http://localhost/guestbook/web/app_dev.php*


