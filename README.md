## _Prueba técnica_

Esta es un pequeño programa que se realizo con el objetivo de cumplir una prueba técnica
Tecnologías Utilizadas:

- PHP ^8.0
- Laravel 8
- Bootstrap
- MySQL 8

## Características

- Cualquier usuario se puede registrar como cliente
- Cualquier cliente puede realizar compras
- Cada compra es unicamente de un solo producto
- Puede comprar todos los productos que quiera
- El usuario administrador es el que puede generar las facturas
- Cada factura se genera para un solo cliente
- En cada factura se toma en cuenta todos los productos comprados NO facturados

## Instrucciones para instalar el proyecto
- Clonar el repositorio con:
 ```sh
git clone https://github.com/edgar294/poderjudicialvirtual.git
```
- Entrar en la carpeta del proyecto con
```sh
cd  poderjudicialvirtual
```
- Copiar el archivo de configuracion y editarlo
- Configuar las credenciales de la base de datos
- Instalar dependencias del proyecto con
```sh
composer install
```
- Generar clave del proyecto con
```sh
php artisan key:generate
```
- Ejecutar migraciones y seeder con
```sh
php artisan migrate --seed
```
- Ejecutar proyecto en el puerto 8000 con
```sh
php artisan serve
```

Crecenciales del usuario administrador:
correo: edgar@correo.com
password: password