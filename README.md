# Instalación

```composer install```
```cp .env.example .env```

Setear las credenciales de la base de datos en .env, y luego:

```php artisan migrate```

> No es necesario compilar assets puesto que ya han sido publicados en el repo.

# Dummy Data

```php artisan db:seed```

* Se crearán 20 encuestas ya contestadas.
* Se creará a 1 usuario admin:

``` (login) => dev@dorellango.cl | (🔑) => "password" ```

# TEST

```vendor/bin/phpunit```

## Dentro de estas 4 hrs. debes incluir las mejoras que sugerirías a tu propia solución si tuvieras más tiempo para implementarla, separando por siguientes aspectos:

### Arquitectura
Daría a cada quizz como modelo la posibilidad de ofrecer preguntas de manera dinámica, esto tomando en cuenta que a futuro las preguntas/respuestas podrían cambiar.

Quizás con algún campo en JSON a la DB o un nuevo modelo "Question";

### Seguridad
Protegería la API REST con algún token, permitiendo el acceso solo a usuarios autenticados, y por supuesto aquellos que tengan rol de administrador.

### Escalabilidad
***

### Rendimiento
Desde el lado del frontend intentaría eliminar las clases en desuso del propio bootstapp y tailwindcss, lo cual haría con alguna librería webpack como: purgecss.

Desde el lado del backend intentaría separar la api a su propio microservicio con conexión a la base de datos, dejando esta proyecto solo web.

### Diseño

Intentaría simplificar aún más los controlladores y crear quizás algun repositorio por cada modelo.

### Despliegue

Para el **deployment**, y tomando en cuenta que el sitio está desarrolladao en laravel, recomendaría hacer uno de una herramiento como Laravel Forge. De servidor, alguna arquitectura en la nube como AWS.

### Otro

Integraria las pruebas realizadas a un sistema de integración continua CI.
