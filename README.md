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

- [Darío Martínez Kostyuk](https://github.com/000Volk000)
- [David Martínez Molina](https://github.com/darkghost078)
- [Arturo Vicente Perez](https://github.com/ARVIPE/)
- [Madizhan Islambek](https://github.com/zhanymsoulz)


## Cómo correr el proyecto

Sigue los pasos a continuación para configurar y ejecutar el proyecto:

```bash
# 1. Copia el archivo de entorno
cp .env.example .env

# 2. Genera la clave de la aplicación
php artisan key:generate

# 3. Instala las dependencias del proyecto
composer install

# 4. Ejecuta las migraciones
php artisan migrate:refresh

# 5. Rellena la base de datos con datos iniciales
php artisan db:seed



