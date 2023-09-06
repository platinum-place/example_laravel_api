# Introducción
Este repositorio contiene una implementación sencilla de una API CRUD utilizando el framework Laravel. Esta API te permite realizar operaciones básicas de creación, lectura, actualización y eliminación de recursos.

El objetivo principal es brindarte una guía clara y concisa sobre cómo utilizar y personalizar esta API según tus necesidades. A lo largo de esta documentación, encontrarás información detallada sobre los endpoints disponibles, los parámetros admitidos y las respuestas esperadas.

Para comenzar, te recomendamos seguir los siguientes pasos:

- Clonar o descargar este repositorio en tu entorno de desarrollo.
- Configurar y asegurarte de cumplir con los requisitos previos mencionados en el archivo de documentación.
- Explorar la estructura del proyecto y familiarizarte con los archivos y directorios clave.
- Configurar tu entorno y ejecutar la API en tu servidor local o en un entorno de pruebas.

## Requisitos y Dependencias

- Laravel 10 o superior.
- PHP 8 o superior.

## Instalación

La instalación se realiza para un proyecto de Laravel utilizando [Sail](https://laravel.com/docs/sail) para facilitar el uso de la base de datos.

## Estructura del Proyecto

El proyecto sigue la convención de proyectos API de Laravel y además utiliza el patrón de servicio y helpers para facilitar los procesos de negocio.

## Rutas y Controladores

Las rutas están definidas en el archivo `api.web`.

## Modelos y Base de Datos

La API se utiliza para mostrar cómo utilizar el ORM de manera eficiente.

## Respuestas y Formato

La API se basa en las estructuras convencionales de API y utiliza respuestas JSON estándar. Asegúrate de incluir en el encabezado: Accept => application/json, al usar herramientas como Postman.

## Ejemplos de Uso

### Crear un nuevo registro

#### Ruta

- Método: POST.
- URL: `http://127.0.0.1:8000/api/residents`.

#### Cuerpo

```json
{
    "Nombre": "Warlyn",
    "Apellidos": "Garcia",
    "Telefono": "123456789",
    "Correo": "Warlyn200@gmail.com",
    "Edad": 24,
    "Direccion": "Las caobas",
    "Comida_Entregada": false,
    "Observacion": "Nada que comentar"
}

{
    "data": {
        "Nombre": "Warlyn",
        "Apellidos": "Garcia",
        "Telefono": "123456789",
        "Correo": "Warlyn200@gmail.com",
        "Edad": 24,
        "Direccion": "Las caobas",
        "Comida_Entregada": false,
        "Observacion": "Nada que comentar",
        "updated_at": "2023-06-04T02:54:57.000000Z",
        "created_at": "2023-06-04T02:54:57.000000Z",
        "id": 11
    },
    "message": "Registro creado con éxito"
}
```

### Editar un registro
Edita la información de un registro existente en la base de datos.

#### Parámetros

- id: clave primaria en la base de datos del registro.

#### Ruta

- Método: PUT.
- Url: <http://127.0.0.1:8000/api/residents/{id}>.

#### Cuerpo

```json
{
    "Nombre": "Karlyn",
    "Apellidos": "Garcia",
    "Telefono": "123456789",
    "Correo": "<Warlyn200@gmail.com>",
    "Edad": 24,
    "Direccion": "Las caobas",
    "Comida_Entregada": false,
    "Observacion": "Nada que comentar"
}
```

#### Retorno

```json
{
    "data": {
        "id": 11,
        "created_at": "2023-06-04T02:54:57.000000Z",
        "updated_at": "2023-06-04T02:56:24.000000Z",
        "Nombre": "Karlyn",
        "Apellidos": "Garcia",
        "Telefono": "123456789",
        "Correo": "Warlyn200@gmail.com",
        "Edad": 24,
        "Direccion": "Las caobas",
        "Comida_Entregada": false,
        "Observacion": "Nada que comentar"
    },
    "message": "Registro actualizado"
}
```
### Eliminar un registro
Elimina un registro de la base de datos.

#### Parámetros

- id: clave primaria en la base de datos del registro.

#### Ruta

- Método: DELETE.
- Url: <http://127.0.0.1:8000/api/residents/{id}>

#### Retorno

```json
{
    "message": "Registro eliminado"
}
```
### Lista de registros
Retornara un listado completo de todos los registros.

#### Ruta

- método: GET.
- Url: <http://127.0.0.1:8000/api/residents>

#### Retorno

```json
{
    "data": [
        {
            "id": 1,
            "created_at": "2023-06-04T22:10:01.000000Z",
            "updated_at": "2023-06-04T22:10:01.000000Z",
            "nombre": "Octavia",
            "apellidos": "Fadel",
            "telefono": "1-586-904-8503",
            "correo": "mckenzie.dominic@example.org",
            "edad": 24,
            "direccion": "21268 Giuseppe Mountain Suite 051\nOnastad, VT 24040",
            "comida_entregada": true,
            "observacion": "Blanditiis est molestias reiciendis autem. Voluptas esse accusamus ut quos odit eligendi. Rerum aspernatur minus laudantium quia eum quae. Assumenda perspiciatis repellendus ipsa non voluptatem repellendus. Officiis nihil sint sapiente exercitationem eos sunt nam soluta."
        }
    ],
    "links": {
        "first": "http://localhost/api/residents?page=1",
        "last": "http://localhost/api/residents?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost/api/residents?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://localhost/api/residents",
        "per_page": 15,
        "to": 1,
        "total": 1
    },
    "message": "Listado de registros"
}
```

Para buscar registros por ID, Nombre o Correo.

#### Cuerpo

```json
{
    "search": "Warlyn",
}
```
También acepta params con [] para buscar múltiples valores de un mismo campo.

Lista de registros con opciones para paginar y ordenar. En caso de no colocar nada, los parámetros tendrán valores por defecto.

Una vez se defina el límite de registros, podrá colocar las páginas que estén disponibles en el listado. Ejemplo: ?page=2 al final de una lista filtrada retornara la lista en la página 2 de la base de datos.

#### Parámetros

- order: Columna por la que se ordenara la lista.
- sort: Orden de la lista, ascendente (asc) o descendente (desc).
- limit: cantidad de registros que mostrara. Si se coloca

#### Ruta

- Método: GET.
- Url: <http://127.0.0.1:8000/api/residents?orderBy={1}&sortBy={1}&sort={1}&perPage={1}>.
Mostrar un registro
Retorna la información de un registro.

#### Parámetros

- id: clave primaria en la base de datos del registro.

#### Ruta

- Método: GET.
- Url: <http://127.0.0.1:8000/api/residents/{id}>

#### Retorno

```json
{
    "data": {
        "Nombre": "Warlyn",
        "Apellidos": "Garcia",
        "Telefono": "123456789",
        "Correo": "Warlyn200@gmail.com",
        "Edad": 24,
        "Direccion": "Las caobas",
        "Comida_Entregada": false,
        "Observacion": "Nada que comentar",
        "updated_at": "2023-06-04T02:54:57.000000Z",
        "created_at": "2023-06-04T02:54:57.000000Z",
        "id": 11
    },
    "message": "Registro encontrado"
}
```

## Contribución
Es posible contribuir usando las herramientas de Github, como los [Pull Request](https://github.com/platinum-place/laravel_rest_api/pulls).

## Recursos Adicionales
- [documentación de Laravel](https://laravel.com/docs).
## Licencia
Al estar basado en Laravel, esta licendiado bajo la [MIT license](https://opensource.org/licenses/MIT).
