#Appunti sul PHP 7.4

####2020 Alessandro Lanni

### PHP su Docker

#####PHP 7.4

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

TODO: aggiungere riferimenti a guida Docker

 
   
### Composer

Nei Dockerfile viene gia' installato il composer a livello globale, per provarlo eseguire:

````
docker-compose exec lab composer
````

Per installare i pacchetti definiti nel file `composer.json` sara' sufficiente eseguire il comando:

````
docker-compose exec lab composer install
````

### PSR-4 Autoloading

Per l'autoloading, definire il path di ogni Namespace nel composer.json. 

Includere il file  `./vendor/autoload.php` all' interno dei file in cui si necessita usarlo.
