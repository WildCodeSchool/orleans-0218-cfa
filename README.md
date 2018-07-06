cfasmsblois
===========

A Symfony project created on May 15, 2018, 5:55 pm.

*Description*

PHP Symfony 3.4 project

*Steps*

  Clone the repos from Github
  Go to the depository
  Run composer install
  Configure the database and email in parameters.yml:
  
    database_host:  your_db_host;
    database_port: null;
    database_name: your_db_name;
    database_user: your_db_user_wich_is_not_root
    database_password: your_db_password;
  
   Install the dependencies by running:
     - npm install
     - php bin/console ckeditor:install
     - php bin/console assets:install web
   
   Create and update your database with:
     - php bin/console doctrine:database:create
     - php bin/console doctrine:schema:update --force
   
   Build the assets with:
     - ./node_modules/.bin/encore dev (in development environment)      
     - ./node_modules/.bin/encore production (in prod environment)      
 
   run a server with php bin/console server:run (for dev environment)
