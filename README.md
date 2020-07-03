# Master Email Template

#required software and its version
APACHE 2.4.37\
PHP 7.3.1\
SYMFONY 4.4.9\
MYSQL 5.7.24 

#SET-UP:
* Clone the project from git repository 

* Change the working directory to email_template

* Configure the virtual host for the project directory (email_template)

* Run the command to update the vendor folder\
     composer install
     
* Clear symfony cashe \
    php bin/console cache:clear --ENV=prod\
    php bin/console cache:clear --ENV=dev
    
* Edit .env file to setup database configuration and jwt(add private and public key)

* Create a database called "master_email_template"

* Run a command to update the db stucture \
    php bin/console  doctrine:schema:update --dump-sql \
    php bin/console  doctrine:schema:update --force
     
* Enable the symfony profiler (in dev mode*)

* Run a command to update the css and js files \
    php bin/console assets:install
    

    
    
    
#Required main symfony bundles

1. sonata-project/admin-bundle - "^3.68"
2. dompdf/dompdf - "^0.8.5"
3. lexik/jwt-authentication-bundle - "^2.7"
