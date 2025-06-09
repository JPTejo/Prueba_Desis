# Prueba Desis

Este proyecto corresponde a una **prueba de diagnóstico** solicitada por la empresa **Desis**.

- Versión de PHP utilizada: 8.2.12  
- Motor de base de datos: MariaDB 11.7.2

----------------------------------------

## Requisitos previos

Se recomienda utilizar **XAMPP** como entorno de servidor local para ejecutar correctamente el proyecto.

----------------------------------------

## Instrucciones de instalación

### 1. Clonar o descargar el repositorio

Puedes clonar este repositorio con Git:

    git clone https://github.com/JPTejo/prueba_desis.git

O bien, descargar el archivo ZIP desde GitHub y extraerlo en la carpeta `htdocs` de XAMPP (usualmente en `C:\xampp\htdocs`).

### 2. Crear la base de datos

1. Abre **phpMyAdmin** o tu herramienta favorita para gestionar bases de datos.
2. Crea una nueva base de datos con el nombre:

       prueba_desis

3. Importa el archivo `prueba_desis.sql` incluido en este repositorio para cargar las tablas necesarias.

### 3. Configurar el archivo de conexión

Abre el archivo `php/conexion.php` y ajusta los valores según tu configuración local:

```php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "prueba_desis";
