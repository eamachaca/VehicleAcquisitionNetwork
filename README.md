<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


# Vehicle Acquisition Network
Clonar el proyecto, configurarlo y ejecutar las migraciones
### Crea un comando que inserte todos los usuarios en una base de datos
He creado el objecto `UserCommand.php` con el comando artisan `vehicles:users`
### Crea un comando que inserte todos los posts
He creado el objecto `PostCommand.php` con el comando artisan `vehicles:posts`
### Programa un task que corra cada hora que seleccione un post aleatoriamente y cree un comentario
He creado el Job `CreateCommentsJob.php` y luego lo he llamado dentro de `App\Console\Kernel` aplicando una frecuencia predefinida por Laravel "hourly"

Para configurar este tema podría crear un crontab en linux o utilizar supervisor para gestionarlo, en el caso de windows tendría que utilizar el Task Schedule y configurarlo

### Crea una vista que enseñe a todos los usuarios
Dentro la carpeta vehicle dentro de las vistas existe el objeto `user.blade.php` y utilicé el controlador `HomeController` para gestionarlo con las rutas 
### Crea un vista de usuario que enseñe todos sus posts
Similar que el de usuarios pero con `posts.blade.php`
### Usa TDD para desarrollar el proyecto
Por el tema de los caminos que elegí en los comandos, no pude completar los tdd's (y mejor ni hablemos del de Job), continúo aprendiendo.
## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
