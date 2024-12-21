# SprintCode

<div align="center">
    <img width="200" src="/docs/images/sprintcode.jpeg" alt="SprintCode-Logo">
</div>

<div align="center">

Proyecto de creación de una aplicación software para las prácticas de la asignatura "Ingeniería del Software".

**Manual de Usuario en video:** [https://youtu.be/eeByrv5zsxo](https://youtu.be/eeByrv5zsxo)  
**App desplegada:** [https://sprintcode.onrender.com/](https://sprintcode.onrender.com/)  
**Usuario admin:** `admin@uco.es`  
**Contraseña:** 🔢

</div>

## Acknowledgements

Este proyecto ha sido creado por:

-   [Darío Martínez Kostyuk](https://github.com/000Volk000)
-   [David Martínez Molina](https://github.com/darkghost078)
-   [Arturo Vicente Perez](https://github.com/ARVIPE/)
-   [Madizhan Islambek](https://github.com/zhanymsoulz)

## Dependencias

-   [Composer 2.8.4](https://getcomposer.org/)
-   [Xampp 8.2.12-0](https://www.apachefriends.org/es/index.html)

## Cómo correr el proyecto

Sigue los pasos a continuación para configurar y ejecutar el proyecto:

```bash
# 1. Git clone en la carpeta htdocs de xampp
#   -- En Windows -- C:\xampp\htdocs
#   -- En Linux   -- /opt/lampp/htdocs/

# 2. Encender Apache y MySQL en xampp
#   -- En Windows -- Ejecutar xampp y darle a start a Apache y MySQL
#   -- En Linux   --
sudo /opt/lampp/lampp start

# 3. Instala las dependencias del proyecto
composer install

# 4. Copia el archivo de entorno
cp .env.example .env

# 5. Genera la clave de la aplicación
php artisan key:generate

# 6. Ejecuta las migraciones
php artisan migrate

# 7. Rellena la base de datos con datos iniciales
php artisan db:seed

# 8. Corre el proyecto en local
php artisan serve

# 9. Accede al puerto en el que se esta ejecutando
# (Normalmente http://127.0.0.1:8000)

```

## Preguntas frecuentes

**¿Como puedo restaurar la base de datos tras modificar valores?**

Usa el siguiente comando para eliminar los registros y generar otros aleatorios

```bash
php artisan migrate:fresh --seed
```
