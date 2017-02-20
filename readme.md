#OIE Analytics - Capstone Spring 2017 Sec 003

### Live Demo

<link>Heroku website

### Screen Shots

<div class="panel-body">
                    <!-- Carousel
                    ================================================== -->
                <div id="myCarousel" class="carousel slide"  data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" style="text-align: center;">
                            <div class="item active" style="text-align: center;">
                                <a href="http://www.unomaha.edu/college-of-information-science-and-technology" target="_blank">
                                    <img src=" {{ asset('images/User.png') }}" class="img-responsive">
                                </a>
                            </div>
                            <div class="item" style="text-align: center;">
                                    
                                    <a href="http://www.unomaha.edu/college-of-information-science-and-technology/academics/advising.php" target="_blank">
                                        <img src="{{ asset('images/StudentFaculty.jpg') }}" class="img-responsive">
                                        {{-- {{ HTML::image('/images/StudentFaculty.jpg', '', array('class' => ' img-responsive')) }} --}}                           
                                    </a>
                            </div>
                            <div class="item" style="text-align: center;">
                                    <a href="http://www.unomaha.edu" target="_blank">
                                        <img src="{{ asset('images/StudentLearning.jpg') }}" class="img-responsive">
                                    </a>
                            </div>
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="icon-prev"></span></a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="icon-next"></span></a>
</div>
                    <!-- /.carousel -->
</div>


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

<img src="https://cloud.githubusercontent.com/assets/4307137/10105283/251b6868-63ae-11e5-9918-b789d9d682ec.png" width="20%"></img> <img src="https://cloud.githubusercontent.com/assets/4307137/10105290/2a183f3a-63ae-11e5-9380-50d9f6d8afd6.png" width="20%"></img> <img src="https://cloud.githubusercontent.com/assets/4307137/10105284/26aa7ad4-63ae-11e5-88b7-bc523a095c9f.png" width="20%"></img> <img src="https://cloud.githubusercontent.com/assets/4307137/10105288/28698fae-63ae-11e5-8ba7-a62360a8e8a7.png" width="20%"></img> <img src="https://cloud.githubusercontent.com/assets/4307137/10105283/251b6868-63ae-11e5-9918-b789d9d682ec.png" width="20%"></img> <img src="https://cloud.githubusercontent.com/assets/4307137/10105290/2a183f3a-63ae-11e5-9380-50d9f6d8afd6.png" width="20%"></img>           