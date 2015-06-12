## API Installation

### Server Requirements
* PHP >= 5.4
* Mcrypt PHP Extension
* OpenSSL PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension

### Step 1: Setup the Shopify store Private App
* Go to the administration panel of your Shopify store > Apps > Private Apps
* Create a new Private App
* Give it a name, "Shopify API" for example

### Step 2: Clone the repository and install the project
* Clone the repository on your Apache server
```
#!bash

git clone https://github.com/fbouyer/lumen-shopify-api.git
```
* Go inside the directory created
```
#!bash

cd lumen-shopify-api
```
* Download Composer

```
#!bash

curl -sS https://getcomposer.org/installer | php
```
* Install all the dependencies through Composer (Lumen Framework, Shopify API Client)
```
#!bash

php composer.phar install
```

### Step 3: Setup Shopify API Client credentials in Lumen
* Make a copy of .env.example and name it .env
* In .env change the values of:
* * SHOPIFY_SHOP, this is the URL of your shopify shop
* * SHOPIFY_API_KEY, you will find this on the Shopify private app page
* * SHOPIFY_PASSWORD, you will find this on the Shopify private app page


## Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)