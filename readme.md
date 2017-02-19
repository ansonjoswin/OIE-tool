#OIE Analytics - Capstone Spring 2017 Sec 003

## GitHub Ignore
Github ignores certain files and folders for security reasons, they include :

#Folders that will not be copied:

|Folders|
|-------------|
|node_modules|
|public/storage|
|public/hot|
|storage/*.key|
|vendor|
|.idea|

#Files that will not be copied:
|Files|
|-------------|
|Homestead.json|
|Homestead.yaml|
|.env|
|composer.lock|

Please pull down the code and add the .env file from another project of yours because github doesnt upload the .env files, find the required CSV files for file upload under /resources/assets/csv folder.

##Configure your .env file so it can access the application.

| Key | Values |
|-----|--------|
|APP_ENV=|local| 
|APP_KEY=|generated automatically , or you can generate it with php artisan key:generate|
|APP_DEBUG=|true|
|APP_LOG_LEVEL=|debug|	
|APP_URL=|http://localhost|

##Configure your .env file so it can access the database.

| Key | Values |
|-----|--------|
|DB_CONNECTION=|mysql| 
|DB_HOST=|localhost|
|DB_PORT=|3306|
|DB_DATABASE=|oie|	
|DB_USERNAME=|Username|
|DB_PASSWORD=

## Configure your mail drivers so that it can send a mail.

| Key | Values |
|-----|--------|
|MAIL_DRIVER=|smtp| 
|MAIL_HOST=|smtp.gmail.com|
|MAIL_PORT=|587|
|MAIL_USERNAME=|your email|	
|MAIL_PASSWORD=|your password|
|MAIL_ENCRYPTION=|tls|


## Development Tools

### Laravel PHP Framework

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

### Built With
|Tools|
|-----------------------------------------------------------------------|
|Laravel 5.4.* - PHP Framework|
|PHP 7.0.4|
|Heroku - Integration Environmnet|
|Yodiz - Issue and Project Management|
|Laravel Dusk - Testing|
|GitHub - Version Control|

### Heroku Cloud

# Heroku Repo plugin

This plugin adds some commands to the heroku gem to interact with the app's repo

## Installation

To install:

    $ heroku plugins:install heroku-repo

## Commands

### clone

    $ heroku repo:clone -a appname

This will clone the applications repo to your local filesystem. No collaboration necessary!

### download

    $ heroku repo:download -a appname

This will download the applications repo as a tarball.

### gc

    $ heroku repo:gc -a appname

This will run a `git gc --agressive` against the applications repo. This is done inside a run process on the application.

### purge_cache

    $ heroku repo:purge_cache -a appname

This will delete the contents of the build cache stored in the repository. This is done inside a run process on the application.

### reset

    $ heroku repo:reset -a appname

This will empty the remote repository.

