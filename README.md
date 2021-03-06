
## Appunti sul PHP 7.4
##### di Alessandro Lanni, prima versione Marzo 2020

### PHP su Docker

Nelle directory php7.4 e php5.6 trovi i files `Dockerfile` e `docker-compose.yml`;
puoi procedere con questi comandi per avviare il servizio:

````
   docker-compose build
   docker-compose up -d
````
I Dockerfile creano una immagine custome basata du php*-apache.

Per eseguire un comando specifico, a servizio avviato, puoi procedere come in questo esempio:

````
docker-compose exec lab php cli-test.php
````

Attenzione, `exec` esegue il comando nel container gia' avviato, mentre `run` avvia un nuovo container.

[Documentazione sul comando exec](https://docs.docker.com/compose/reference/exec/)

[Documentazione sul comando run](https://docs.docker.com/compose/reference/run/)
 
   
### Composer

Nei Dockerfile viene gia' installato il composer a livello globale, per provarlo eseguire:

````
docker-compose exec lab composer
````

Per installare i pacchetti definiti nel file `composer.json` sara' sufficiente eseguire il comando:

````
docker-compose exec lab composer install
````

#### Scripts

E' possibile creare degli script e delegarne al composer l' esecuzione.
Nel `composer.json` creare la sezione scripts, come di seguito:

````
"scripts": {
    "cli-test": "php cli-test.php",
    "autoloader-test": "php autoloader-test.php"
  }
````

Per eseguire lo script `cli-test`, ad esempio, bastera' digitare:

````
docker-compose exec lab composer cli-test
````


### PSR-4 Autoloading

Per l'autoloading, definire il path di ogni Namespace nel composer.json. 

Includere il file  `./vendor/autoload.php` all' interno dei file in cui si necessita usarlo.


### Debug - Configurazione di x-debug

Aggiungere i comandi nel Dockerfile per installare e configurare xdebug:

````
RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_connect_back=on" >> /usr/local/etc/php/conf.d/xdebug.ini
````
#### Profiler

Per abilitare il profiler, modificare il valore di:

````
profiler_enable_trigger = 1
````

Nel Dockerfile e' gia' settato. Per invocare il  profiler, aggiungere il parametro:

````
XDEBUG_PROFILE=1
````

A $_GET, $_POST o $_COOKIE. Per invocarlo da cli:

````
docker-compose exec lab php -d "xdebug.profiler_enable=On" -d "xdebug.profiler_output_dir=/var/www/profilerout" script.php
````



Configurare il debugger di PHPStorm in modo standard per utilizzare il container.

### Unit testing con PHPUnit

Installare mediante composer:

````
docker-compose exec lab composer require --dev phpunit/phpunit ^9.0
````

Per lanciare un test definito nel file `phpunit.xml` usando il container Docker, puoi usare questo comando:

````
docker-compose exec lab ./vendor/bin/phpunit
````

Per lanciare solo un testsuite, usare il comando:

````
docker-compose exec lab ./vendor/bin/phpunit --testsuite basic
````

Per avere un feedback a video migliore, usare l'opzione:

````
--colors=auto
````

Per generare un file Textdox, nei vari formati:

````
--testdox-html <file>
````

### Caching System

#### OP Cache

#### Redis

#### API result cache 

### Doctrine

### phpDocumentor

Per la generazione della documentazione puoi installare phpDocumentor.
Si puo' installare mediante composer, sia globalmente che nel progetto (usanto i require-dev).

Installazione global (home dell'utente):

````
composer global require phpdocumentor/phpdocumentor
````

Installazione nel progetto, usando il require-dev:

````
docker-compose exec lab composer require --dev phpdocumentor/phpdocumentor
````

Ad installazione terminata, puoi generare la documentazione usando questo comando:

````
~/.composer/vendor/bin/phpdoc -d ./src -t ./docs
```` 

Dove `-d ./src` e' la directory che contiene i sorgenti e `-t ./docs` e' la directory di destinazione.

Il comando ritornera' un messaggio di successo o di errore in base alle eventuali anomalie individuate nei sorgenti.
Se un file ha delle anomalie, non comparira' nella documentazione generata. 


### Phing Build script

https://www.phing.info/

### Git Hooks

https://git-scm.com/book/it/v2/Customizing-Git-Git-Hooks

E' stata creata la directory:

````
php7.4/commit-scripts
````

Un cui saranno collofati gli scirpts git-hooks.
Questi script vanno copiati o linkati (ln -s) nella directory:

````
.git/hooks
````

### Approfondimenti

* \DateTime -  php7.4/datetime-tests.php 
* Generators - php7.4/generators-test.php
    * Invocare il profiler per ispezionare le differenze: 
        ````
        docker-compose exec lab php -d "xdebug.profiler_enable=On" -d "xdebug.profiler_output_dir=/var/www/profilerout" generators-test.php
        ````
* Generators Delegation - php7.4/generators-delegation.php
  
