#OIE Analytics - Capstone Spring 2017 Sec 003

### Live Demo

<link>Heroku website

### Screen Shots



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


## Our Team
<!--Kavya-->
Kavya
<img src="https://cloud.githubusercontent.com/assets/22160054/23142033/7bb9dfb8-f77f-11e6-80db-639b410a87df.JPG" width="200px" height="200px"></img> <!--Tulasi-->Tulasi<img src="https://cloud.githubusercontent.com/assets/22160054/23142086/b5ee30b2-f77f-11e6-8da6-e39cda29ffe8.jpg" width="200px" height="200px">Tulasi</img> <!--Apoorva--><img src="https://cloud.githubusercontent.com/assets/22160054/23142072/a7ac362a-f77f-11e6-82bf-f84729cc5b52.jpg" width="200px" height="200px">Apoorva</img> <!--Mathias--><img src="https://cloud.githubusercontent.com/assets/22160054/23142136/fe049602-f77f-11e6-882c-b78edef73309.jpg" width="200px" height="200px"></img> <!--Manjiri--><img src="https://cloud.githubusercontent.com/assets/22160054/23142118/e0ee5ce2-f77f-11e6-8dfc-7afbd771e503.jpg" width="200px" height="200px"></img> <!--Anson--><img src="https://cloud.githubusercontent.com/assets/22160054/23142061/988cbda4-f77f-11e6-8597-f898f3b18b7c.jpg" width="200px" height="200px"></img> <!--Hrishi--><img src="https://cloud.githubusercontent.com/assets/22160054/23142109/d27ac9fc-f77f-11e6-9ba2-be7b71a5a8c8.jpg" width="200px" height="200px"></img> 
<!--Pavithra--><img src="{{ asset('images/team/Pavithra.jpg') }}" class="img-responsive" width="20%"></img> 
<!--Nikitha--><img src="https://cloud.githubusercontent.com/assets/22160054/23142144/0a6c9106-f780-11e6-898b-0c03b9187912.jpg" width="200px" height="200px"></img> 
<!--Elaine--><img src="https://cloud.githubusercontent.com/assets/22160054/23142096/c30b6904-f77f-11e6-801f-787bfedc7fb8.JPG" width="200px" height="200px"></img> 
<!--Anusha--><img src="" width="200px" height="200px"></img> 

## Advisors
<!--Pawaskar--><img src="https://cloud.githubusercontent.com/assets/22160054/23142125/ef4138be-f77f-11e6-8f30-00b7ff854f38.png" width="200px" height="200px"></img> 
<!--Praveen--><img src="" width="200px" height="200px"></img> 
