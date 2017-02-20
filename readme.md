#OIE Analytics - Capstone Spring 2017 Sec 003

### Live Demo

<link>Heroku website

### Screen Shots

![](http://makeagif.com/i/ds-2Qm.gif)

![alt tag](http://makeagif.com/i/ds-2Qm)

### Cloning Instructions

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

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects. Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Contributing

Thank you for considering contributing to the OIE ANALYTICS website! If you discover a security vulnerability within our website, please send an e-mail to Dr. Sachin Pawaskar at spawaskar@unomaha.edu. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

### Built With

    Laravel 5.4.* - PHP Framework

    Heroku - Integration Environment

    Yodiz - Issue and Project Management

    Laravel Dusk - Testing

    GitHub - Version Control

    PHP 7.0.4 , HTML 5, CSS, JScript , D3.JS - Web Development


### Our Team
<!--Kavya-->
<img src="{{ asset('images/team/Kavya.jpg') }}" class="img-responsive" width="50%"></img> 
<!--Tulasi-->
<img src="{{ asset('images/team/Tulasi.jpg') }}" class="img-responsive" width="50%"></img> 
<!--Apoorva-->
<img src="{{ asset('images/team/Apoorva.jpg') }}" class="img-responsive" width="50%"></img> 
<!--Mathias-->
<img src="{{ asset('images/team/Mathias.jpg') }}" class="img-responsive" width="50%"></img> 
<!--Manjiri-->
<img src="{{ asset('images/team/Manjiri.jpg') }}" class="img-responsive" width="50%"></img> 
<!--Anson-->
<img src="{{ asset('images/team/Anson.jpg') }}" class="img-responsive" width="50%"></img> 
<!--Hrishi-->
<img src="{{ asset('images/team/Hrishikesh.jpg') }}" class="img-responsive" width="50%"></img> 
<!--Pavithra-->
<img src="{{ asset('images/team/Pavithra.jpg') }}" class="img-responsive" width="50%"></img> 
<!--Nikitha-->
<img src="{{ asset('images/team/nikitha.jpg') }}" class="img-responsive" width="50%"></img> 
<!--Elaine-->
<img src="{{ asset('images/team/Elaine.jpg') }}" class="img-responsive" width="50%"></img> 
<!--Anusha-->
<img src="{{ asset('images/team/Anusha.jpg') }}" class="img-responsive" width="50%"></img> 
<!--Pawaskar-->
<img src="{{ asset('images/sachin-pawaskar.png') }}" class="img-responsive" width="50%"></img> 
<!--Praveen-->
<img src="{{ asset('images/Praveen.jpg') }}" class="img-responsive" width="50%"></img> 
