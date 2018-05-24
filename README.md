cfasmsblois
===========

A Symfony project created on May 15, 2018, 5:55 pm.

*Description*

PHP Symfony 3.4 project

*Steps*

  Clone the repos from Github
  Run composer install
  Configure the database and email en in parameters.yml:
  
    database_host:  your_db_host;
    database_port: null;
    database_name: your_db_name;
    database_user: your_db_user_wich_is_not_root
    database_password: your_db_password;
  
  run a server with php bin/console server:run
