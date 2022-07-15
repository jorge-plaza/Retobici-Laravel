#Retobici Back End

## Despliegue Back End

A continuación se muestran los pasos a seguir para instalar e iniciar
del sistema Back End. Cabe destacar que estos pasos son los referentes
al entorno que se ha utilizado en el proyecto, en este caso se ha
utilizado el propio ordenador portátil como servidor, con un sistema
operativo macOS, por lo que en otro sistema operativo los comandos de
instalación serán diferentes. MacOS ofrece un sistema de paquetes
**[Homebrew](https://brew.sh/)** que facilita enormemente el proceso de
instalación y configuración de la gran mayoría de herramientas.

### Instalación PHP 8.0.8

1.  Iniciar un emulador de terminal en cualquier directorio del sistema

2.  Ejecutar el comando `brew install php`

3.  Si el sistema no detecta automáticamente la instalación, se puede
    cargar en el arranque del terminal de la siguiente manera

    1.  Editar el contenido del fichero `.bashrc` o `.zshrc` dependiendo
        de que lenguaje de bash utilices. Normalmente ubicado en el
        directorio principal del usuario. Un comando para editar
        `vim  /.bashrc`

    2.  Exporta la ubicación de la instalación de PHP agregando la
        siguiente línea `export PATH="/Applications/MAMP/bin/php/php8.0.8/bin:$PATH`.

### Instalación PostgreSQL

1.  Iniciar un emulador de terminal en cualquier directorio del sistema

2.  Ejecutar el comando `brew install postgresql`

3.  Iniciar el servicio con `brew services start postgres`

4.  Entrar en la interfaz de comandos de postgresql con `psql postgres`

5.  Cambiar la contraseña del usuario que se vaya a usar, en este caso
    root y de contraseña también root, es recomendable que para un
    entorno de producción no se utilice ni el usuario root ni una
    contraseña tan débil. El comando sería
    `ALTER USER root WITH PASSWORD ’password’;`

6.  Crear la base de datos con el comando `create database retobici;`

### Generar claves API Mapbox

Para utilizar el sistema de mapas es necesaria una cuenta y generar las
claves para el uso del sistema. Una vez creada la cuenta, en la
dirección https://account.mapbox.com/ se pueden generar las dos claves, tanto la pública como la privada, que se
usarán más adelante en ambas partes del proyecto.

### Instalación Back End

El código se encuentra en este repositorio.

1.  Si no está instalado el sistema de versiones git, el comando para
    instalarlo en macOS `brew install git`.

2.  Descargar o clonar el repositorio en el directorio deseado con el
    comando\
    `git clone https://gitlab.inf.uva.es/jorplaz/plazalazojorge_2022_backend.git`.

Ahora, con el código del repositorio descargado es necesario configurar
el entorno del proyecto:

1. Desde la carpeta raíz del proyecto copiar el fichero de entorno de
    ejemplo con `cp .env.example .env`.

2. Agregar los contenidos al fichero .env
    ``` 
    DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=retobici
   DB_USERNAME=root
   DB_PASSWORD=root
   MAPBOX_TOKEN=clave pública generada en el paso anterior
    ```

3. Generar la clave de aplicación con el comando
    `php artisan key:generate`

4. Instalar las dependencias del fichero `composer.yml` con el comando
    `composer install`

Con la instalación y la configuración completada solo sería necesario
lanzar el servidor, para ello hay que tener en cuenta de que el proyecto
se ha desarrollado de manera local, entonces para que se comunique la
aplicación Android con el Back End, ambos tienen que estar en la misma
red WiFi.

1.  Obtener la dirección IP del servidor en la red WiFi con el comando
    `ifconfig`

2.  Lanzar el servidor apuntando a la IP de la red WiFi obtenida en el
    paso anterior\
    `php artisan serv –host=192.168.65.9 –port=8000`

3.  Migrar la base de datos para generar la estructura de las tablas y
    poblar la base de datos de información con el comando
    `php artisan migrate:fresh –seed`
